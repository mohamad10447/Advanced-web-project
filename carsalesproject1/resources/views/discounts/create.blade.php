<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Discount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Create Discount</h1>

        <form action="{{ route('discounts.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="code" class="form-label">Discount Code</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="percentage" class="form-label">Discount Percentage</label>
                    <input type="number" name="percentage" id="percentage" class="form-control" required min="0" max="100" step="0.01">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="starting_time" class="form-label">Starting Time</label>
                    <input type="datetime-local" name="starting_time" id="starting_time" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="ending_time" class="form-label">Ending Time</label>
                    <input type="datetime-local" name="ending_time" id="ending_time" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label for="car_id" class="form-label">Select Car</label>
                <select name="car_id" id="car_id" class="form-select" required>
                    <option value="">Select a car</option>
                    @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Create Discount</button>
        </form>

        <!-- Back to Admin Dashboard -->
        <div class="mt-3 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Back to Admin Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>