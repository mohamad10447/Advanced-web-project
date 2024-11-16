<h1>Create Discount</h1>

<form action="{{ route('discounts.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="code" class="form-label">Discount Code</label>
        <input type="text" name="code" id="code" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="percentage" class="form-label">Discount Percentage</label>
        <input type="number" name="percentage" id="percentage" class="form-control" required min="0" max="100" step="0.01">
    </div>

    <div class="mb-3">
        <label for="starting_time" class="form-label">Starting Time</label>
        <input type="datetime-local" name="starting_time" id="starting_time" class="form-control">
    </div>

    <div class="mb-3">
        <label for="ending_time" class="form-label">Ending Time</label>
        <input type="datetime-local" name="ending_time" id="ending_time" class="form-control">
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

    <button type="submit" class="btn btn-primary">Create Discount</button>
</form>