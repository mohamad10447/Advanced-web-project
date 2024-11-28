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
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: #ff4d4d;
            /* Bright red for "Cars in Stock" */
            font-weight: 700;
        }

        .alert-info {
            background-color: #330000;
            /* Dark red background */
            border-color: #660000;
            /* Matching border */
            color: #ffcccc;
            /* Light red text for "Total Cars in Stock" */
            font-weight: 600;
        }

        h2 {
            color: #292929;
            /* Black for "Manage Cars" */
            font-weight: 700;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f5f8;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
            text-align: center;
            border-top: 2px solid #dee2e6;
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
            background-color: #ff4d4d;
            border-color: #ff4d4d;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #e63939;
            border-color: #e63939;
        }

        .form-control {
            border-radius: 0.375rem;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #ff4d4d;
            box-shadow: 0 0 0 0.25rem rgba(255, 77, 77, 0.5);
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #ff4d4d;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .modal-footer {
            background-color: #f8f9fa;
        }

        .btn-back {
            background-color: #292929;
            /* Black for "Back" button */
            border-color: #292929;
            color: white;
            padding: 10px 20px;
        }

        .btn-back:hover {
            background-color: #1e1e1e;
            /* Darker black */
            border-color: #1a1a1a;
        }

        .table-responsive {
            margin-bottom: 30px;
        }

        /* Navbar Styling */
        header .navbar {
            background: linear-gradient(90deg, #000, #333);
            border-bottom: 3px solid #ff0000;
        }

        header .navbar-brand {
            font-weight: bold;
            font-size: 1.75rem;
            color: #fff;
        }

        header .navbar-brand span {
            color: #ff0000;
        }

        header .nav-link {
            color: #fff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        header .nav-link:hover,
        header .nav-link.active {
            color: #ff0000;
        }

        .btn-outline-light:hover {
            background-color: #ff0000;
            border-color: #ff0000;
            color: #000;
        }

        /* Footer Styling */
        footer {
            margin-top: 2rem;
            padding: 1rem 0;
            background-color: #000;
            color: #fff;
            text-align: center;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Content wrapper takes up remaining space above the footer */
        .container {
            flex: 1;
        }

        .card-body {
            padding: 1.5rem;
        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    Admin<span>Dashboard</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar"
                    aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="adminNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.registeredUsers') ? 'active' : '' }}"
                                href="{{ route('admin.registeredUsers') }}">Manage Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.showRegisterUserForm') ? 'active' : '' }}"
                                href="{{ route('admin.showRegisterUserForm') }}">Register User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.cars') ? 'active' : '' }}"
                                href="{{ route('admin.cars') }}">Manage Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('discounts.index') ? 'active' : '' }}"
                                href="{{ route('discounts.index') }}">Manage Discounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.salesDashboard') ? 'active' : '' }}"
                                href="{{ route('admin.salesDashboard') }}">Sales Dashboard</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-light">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
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
                <div class="col-md-3">
                    <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}" min="0">
                </div>
                <div class="col-md-3">
                    <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}" min="0">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
                <div class="col-md-2">
                    <!-- Reset Button -->
                    <button type="reset" class="btn btn-secondary w-100" onclick="window.location.href = '{{ route('admin.cars') }}'">Reset Filter</button>
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
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewCarModal-{{ $car->id }}">
                                View
                            </button>
                            <a href="{{ route('admin.editCar', $car->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                            <form action="{{ route('admin.deleteCar', $car->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal for viewing car details -->
                    <div class="modal fade" id="viewCarModal-{{ $car->id }}" tabindex="-1" aria-labelledby="viewCarModalLabel-{{ $car->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewCarModalLabel-{{ $car->id }}">Car Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <img src="{{ asset($car->image_path) }}" alt="{{ $car->brand }} {{ $car->model }}" class="img-thumbnail w-100">
                                        </div>
                                        <div class="col-md-8">
                                            <p><strong>Brand:</strong> {{ $car->brand }}</p>
                                            <p><strong>Model:</strong> {{ $car->model }}</p>
                                            <p><strong>Type:</strong> {{ $car->type }}</p>
                                            <p><strong>Price:</strong> ${{ number_format($car->price, 2) }}</p>
                                            <p><strong>Year:</strong> {{ $car->year }}</p>
                                            <p><strong>Mileage:</strong> {{ number_format($car->mileage) }} km</p>
                                            <p><strong>Fuel Type:</strong> {{ ucfirst($car->fuel_type) }}</p>
                                            <p><strong>Transmission:</strong> {{ ucfirst($car->transmission) }}</p>
                                            <p><strong>Description:</strong> {{ $car->description }}</p>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-back" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Admin Dashboard</a>
        </div>
    </div>
    <footer>
        <p>© 2024 Admin Dashboard. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>