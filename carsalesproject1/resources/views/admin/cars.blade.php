<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary">Cars in Stock</h1>

        <div class="alert alert-info text-center">
            <strong>Total Cars in Stock:</strong> {{ $totalCars }}
        </div>

        <h2 class="text-center mb-4">Manage Cars</h2>
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
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
                        <td><img src="{{ asset($car->image_path) }}" alt="{{ $car->brand }} {{ $car->model }}" class="img-thumbnail" style="width: 100px; height: auto;"></td>
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