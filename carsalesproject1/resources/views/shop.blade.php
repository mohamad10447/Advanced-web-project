<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Car Shop</title>
</head>

<body>

    <div class="container py-5">
        <div class="row">
            @foreach($cars as $car)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- Placeholder image or a real image when available -->
                    <img src="{{ $car->image ? $car->image : 'https://via.placeholder.com/300x200?text=No+Image+Available' }}"
                        class="card-img-top" alt="{{ $car->brand }} - {{ $car->model }}" style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title text-truncate" style="max-width: 250px;">{{ $car->brand }} - {{ $car->model }}</h5>
                        <p class="card-text">
                            <strong>Type:</strong> {{ $car->type }}<br>
                            <strong>Year:</strong> {{ $car->year }}<br>
                            <strong>Price:</strong> ${{ number_format($car->price, 2) }}<br>
                            <strong>Mileage:</strong> {{ $car->mileage }} miles<br>
                            <strong>Fuel Type:</strong> {{ $car->fuel_type }}<br>
                            <strong>Transmission:</strong> {{ $car->transmission }}<br>
                        </p>
                        @if($car->purchase_date_time)
                        <p><strong>Purchased by:</strong> User ID {{ $car->purchased_by_user_id }} on {{ $car->purchase_date_time }}</p>
                        @else
                        <a href="#" class="btn btn-primary w-100">Buy Now</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>