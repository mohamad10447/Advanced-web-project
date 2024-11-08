<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Welcome, {{ Auth::user()->name }}!</h2>

    <h3 class="my-4">Car Management</h3>
    
    <!-- Search Box -->
    <input type="text" id="searchBox" placeholder="Search for cars..." class="form-control mb-3">

    <!-- Car Form -->
    <form id="carForm" class="form-group mb-4">
        @csrf
        <input type="hidden" name="id">
        <div class="form-row">
            <div class="col">
                <input class="form-control" type="text" name="make" placeholder="Car Make" required>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="model" placeholder="Car Model" required>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="year" placeholder="Year" required>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="price" placeholder="Price" required>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary mt-4" type="submit">Submit</button>
            </div>
        </div>
    </form>

    <!-- Car Table -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="carTableBody">
            @foreach ($cars as $car)
            <tr id="car-{{ $car->id }}">
                <td>{{ $car->make }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>${{ number_format($car->price, 2) }}</td>
                <td>
                    <button onclick="editCar({{ $car->id }})" class="btn btn-warning btn-sm">Edit</button>
                    <button onclick="deleteCar({{ $car->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function editCar(id) {
        $.ajax({
            url: '{{ route('cars.get') }}',
            method: 'GET',
            data: { id: id },
            success: function(data) {
                $('input[name="id"]').val(data.id);
                $('input[name="make"]').val(data.make);
                $('input[name="model"]').val(data.model);
                $('input[name="year"]').val(data.year);
                $('input[name="price"]').val(data.price);
            }
        });
    }

    function deleteCar(id) {
        if (confirm("Are you sure you want to delete this car?")) {
            $.ajax({
                url: '{{ route('cars.delete') }}',
                method: 'POST',
                data: {
                    id: id,
                    _token: $('input[name="_token"]').val()
                },
                success: function() {
                    $(`#car-${id}`).remove();
                }
            });
        }
    }


    $('#searchBox').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#carTableBody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    
    $('#carForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('cars.save') }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                location.reload(); 
            }
        });
    });
</script>
@endsectiongit