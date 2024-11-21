<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Discount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Discount</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('discounts.update', $discount->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="code" class="form-label">Discount Code</label>
                    <input type="text" name="code" id="code" value="{{ old('code', $discount->code) }}" class="form-control" required>
                    @error('code')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="percentage" class="form-label">Discount Percentage</label>
                    <input type="number" name="percentage" id="percentage" value="{{ old('percentage', $discount->percentage) }}" class="form-control" required min="0" max="100" step="0.01">
                    @error('percentage')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="starting_time" class="form-label">Starting Time</label>
                    <input type="datetime-local" name="starting_time" id="starting_time" value="{{ old('starting_time', optional($discount->starting_time)->format('Y-m-d\TH:i')) }}" class="form-control">
                    @error('starting_time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="ending_time" class="form-label">Ending Time</label>
                    <input type="datetime-local" name="ending_time" id="ending_time" value="{{ old('ending_time', optional($discount->ending_time)->format('Y-m-d\TH:i')) }}" class="form-control">
                    @error('ending_time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="car_id" class="form-label">Select Car</label>
                <select name="car_id" id="car_id" class="form-select" required>
                    <option value="">Select a car</option>
                    @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $car->id == $discount->car_id ? 'selected' : '' }}>
                        {{ $car->brand }} {{ $car->model }}
                    </option>
                    @endforeach
                </select>
                @error('car_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Discount</button>
        </form>

        <!-- Back to Discounts Button -->
        <div class="mt-4 text-center">
            <a href="{{ route('discounts.index') }}" class="btn btn-secondary">Back to Discounts</a>
        </div>

        <!-- Back to Admin Dashboard -->
        <div class="mt-3 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Back to Admin Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>