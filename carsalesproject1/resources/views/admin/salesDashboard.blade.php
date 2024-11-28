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
        <h1 class="text-center mb-5" style="color: #ff4d4d; font-weight: 700; font-size: 2.5rem;">Sales Analytics Dashboard</h1>

        <!-- Total Cars Sold -->
        <div class="card shadow-lg border-0 mb-4" style="border-radius: 12px;">
            <div class="card-header" style="background-color: #1e1e1e; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                <h4>Total Cars Sold</h4>
            </div>
            <div class="card-body text-center">
                <p class="h4" style="color: #ff4d4d; font-weight: 700;"><strong>{{ $totalCarsSold }}</strong></p>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="card shadow-lg border-0 mb-4" style="border-radius: 12px;">
            <div class="card-header" style="background-color: #1e1e1e; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                <h4>Total Revenue Generated</h4>
            </div>
            <div class="card-body text-center">
                <p class="h4" style="color: #28a745; font-weight: 700;"><strong>${{ number_format($totalRevenue, 2) }}</strong></p>
            </div>
        </div>

        <!-- Monthly Sales Trends -->
        <div class="card shadow-lg border-0 mb-4" style="border-radius: 12px;">
            <div class="card-header" style="background-color: #1e1e1e; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                <h4>Monthly Sales Trends</h4>
            </div>
            <div class="card-body">
                @if($salesTrends->isEmpty())
                <p class="text-center" style="color: #ff4d4d; font-size: 1.2rem;">No sales data available.</p>
                @else
                <table class="table table-striped table-bordered table-hover">
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
        </div>

        <!-- Cars Sold -->
        <div class="card shadow-lg border-0 mb-4" style="border-radius: 12px;">
            <div class="card-header" style="background-color: #1e1e1e; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                <h4>Cars Sold</h4>
            </div>
            <div class="card-body">
                @if($soldCars->isEmpty())
                <p class="text-center" style="color: #ff4d4d; font-size: 1.2rem;">No cars have been sold yet.</p>
                @else
                <table class="table table-striped table-bordered table-hover">
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
        </div>

        <!-- Back to Admin Dashboard -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-lg" style="background-color: #ff4d4d; border-color: #ff4d4d; color: #fff; font-weight: 700; padding: 12px 30px; border-radius: 8px; text-transform: uppercase; transition: background-color 0.3s ease, transform 0.3s ease;">
                Back to Admin Dashboard
            </a>
        </div>
    </div>

    <footer>
        <p>© 2024 Admin Dashboard. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>