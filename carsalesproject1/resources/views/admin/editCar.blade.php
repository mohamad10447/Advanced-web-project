<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Edit Car</h1>

        <!-- Success and Error Messages -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form to Edit Car -->
        <form action="{{ route('admin.updateCar', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="brand" class="form-label fw-bold">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="model" class="form-label fw-bold">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ old('model', $car->model) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label fw-bold">Type</label>
                    <input type="text" name="type" class="form-control" value="{{ old('type', $car->type) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="year" class="form-label fw-bold">Year</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year', $car->year) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="mileage" class="form-label fw-bold">Mileage</label>
                    <input type="number" name="mileage" class="form-control" value="{{ old('mileage', $car->mileage) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fuel_type" class="form-label fw-bold">Fuel Type</label>
                    <input type="text" name="fuel_type" class="form-control" value="{{ old('fuel_type', $car->fuel_type) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="transmission" class="form-label fw-bold">Transmission</label>
                    <input type="text" name="transmission" class="form-control" value="{{ old('transmission', $car->transmission) }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $car->price) }}" required>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary me-2">Update Car</button>
                <a href="{{ route('admin.cars') }}" class="btn btn-secondary">Back to Cars</a>
            </div>
        </form>
        <!-- Back to Admin Dashboard -->
        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Admin Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>