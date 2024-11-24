<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        h1 {
            color: #007bff;
            font-weight: bold;
        }

        .h5 {
            font-weight: bold;
        }

        .text-success {
            font-size: 1.25rem;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-dark {
            background-color: #343a40;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #e9f5ff;
            cursor: pointer;
        }

        .btn {
            transition: all 0.3s ease-in-out;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-lg {
            font-size: 1.2rem;
        }

        .back-btn {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Sales Analytics Dashboard</h1>

        <!-- Total Cars Sold -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Total Cars Sold:</h4>
            </div>
            <div class="card-body">
                <p class="h5 text-center"><strong>{{ $totalCarsSold }}</strong></p>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Total Revenue Generated:</h4>
            </div>
            <div class="card-body">
                <p class="h5 text-center text-success"><strong>${{ number_format($totalRevenue, 2) }}</strong></p>
            </div>
        </div>

        <!-- Monthly Sales Trends -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Monthly Sales Trends:</h4>
            </div>
            <div class="card-body">
                @if($salesTrends->isEmpty())
                <p class="text-center">No sales data available.</p>
                @else
                <table class="table table-bordered table-hover">
                    <thead>
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
        </div>

        <!-- Cars Sold -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h4>Cars Sold:</h4>
            </div>
            <div class="card-body">
                @if($soldCars->isEmpty())
                <p class="text-center">No cars have been sold yet.</p>
                @else
                <table class="table table-bordered table-hover">
                    <thead>
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
        </div>

        <!-- Back to Admin Dashboard -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg back-btn">Back to Admin Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>