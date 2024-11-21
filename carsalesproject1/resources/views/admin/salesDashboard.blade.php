<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Sales Analytics Dashboard</h1>

        <!-- Display Total Cars Sold -->
        <div class="mb-4">
            <h4>Total Cars Sold:</h4>
            <p class="h5"><strong>{{ $totalCarsSold }}</strong></p>
        </div>

        <!-- Display Total Revenue -->
        <div class="mb-4">
            <h4>Total Revenue Generated:</h4>
            <p class="h5 text-success"><strong>${{ number_format($totalRevenue, 2) }}</strong></p>
        </div>

        <!-- Sales Trends Chart -->
        <div class="mb-4">
            <h4>Monthly Sales Trends:</h4>
            @if($salesTrends->isEmpty())
            <p>No sales data available.</p>
            @else
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Month</th>
                        <th>Cars Sold</th>
                        <th>Total Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesTrends as $trend)
                    <tr>
                        <td>{{ DateTime::createFromFormat('!m', $trend->month)->format('F') }}</td>
                        <td>{{ $trend->cars_sold }}</td>
                        <td>${{ number_format($trend->revenue, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <!-- Display Sold Cars -->
        <div class="mb-4">
            <h4>Cars Sold:</h4>
            @if($soldCars->isEmpty())
            <p>No cars have been sold yet.</p>
            @else
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Car Brand</th>
                        <th>Car Model</th>
                        <th>Price</th>
                        <th>Purchase Date</th>
                        <th>Buyer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soldCars as $car)
                    <tr>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>${{ number_format($car->price, 2) }}</td>
                        <td>{{ $car->purchase_date_time ? $car->purchase_date_time->format('Y-m-d H:i') : 'N/A' }}</td>
                        <td>{{ $car->buyer ? $car->buyer->name : 'Unknown' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <!-- Back to Admin Dashboard -->
        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Admin Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>