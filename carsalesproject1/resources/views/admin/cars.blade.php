<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            color: #007bff;
            font-weight: 700;
        }

        .alert-info {
            background-color: #e9f7ff;
            border-color: #b3e5ff;
            color: #0056b3;
            font-weight: 600;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f5f8;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
            text-align: center;
        }

        .table td,
        .table th {
            vertical-align: middle;
            text-align: center;
        }

        .table img {
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .table img:hover {
            transform: scale(1.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-warning {
            color: #212529;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            color: #212529;
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger:hover {
            background-color: #bd2130;
            border-color: #b21f2d;
        }

        .form-control {
            border-radius: 0.375rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Cars in Stock</h1>

        <div class="alert alert-info text-center">
            <strong>Total Cars in Stock:</strong> {{ $totalCars }}
        </div>

        <h2 class="text-center mb-4">Manage Cars</h2>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.cars') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="type" class="form-control" placeholder="Search by Type" value="{{ request('type') }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="brand" class="form-control" placeholder="Search by Brand" value="{{ request('brand') }}">
                </div>
                <div class="col-md-3">
                    <input type="number" name="mileage" class="form-control" placeholder="Max Mileage" value="{{ request('mileage') }}">
                </div>
                <div class="col-md-3">
                    <select name="fuel_type" class="form-control">
                        <option value="">Select Fuel Type</option>
                        <option value="petrol" {{ request('fuel_type') == 'petrol' ? 'selected' : '' }}>Petrol</option>
                        <option value="diesel" {{ request('fuel_type') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="electric" {{ request('fuel_type') == 'electric' ? 'selected' : '' }}>Electric</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="transmission" class="form-control">
                        <option value="">Select Transmission</option>
                        <option value="manual" {{ request('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                        <option value="automatic" {{ request('transmission') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Year</th>
                        <th scope="col">Mileage</th>
                        <th scope="col">Fuel Type</th>
                        <th scope="col">Transmission</th>
                        <th scope="col">SSN</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Purchased By</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                    <tr>
                        <td><img src="{{ asset($car->image_path) }}" alt="{{ $car->brand }} {{ $car->model }}" class="img-thumbnail" style="width: 100px;"></td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->type }}</td>
                        <td>${{ number_format($car->price, 2) }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->mileage }} miles</td>
                        <td>{{ $car->fuel_type }}</td>
                        <td>{{ $car->transmission }}</td>
                        <td>{{ $car->ssn }}</td>
                        <td>{{ \Carbon\Carbon::parse($car->purchase_date_time)->format('Y-m-d H:i') }}</td>
                        <td>{{ $car->purchased_by_user_id }}</td>
                        <td>{{ $car->comment }}</td>
                        <td>
                            <a href="{{ route('admin.editCar', $car->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                            <form action="{{ route('admin.deleteCar', $car->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>