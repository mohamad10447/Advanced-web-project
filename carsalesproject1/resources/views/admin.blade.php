<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        /* Page Title */
        .container h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #000;
            margin-bottom: 2rem;
        }

        /* Cards Styling */
        .card {
            border: none;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

        .card h4 {
            font-weight: bold;
            color: #000;
        }

        .card p {
            color: #ff0000;
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
        <h1 class="text-center">Admin Dashboard</h1>

        <div class="row">
            <!-- Total Registered Users -->
            <div class="col-md-4 mb-4">
                <div class="card text-center p-4">
                    <h4>Total Registered Users</h4>
                    <p class="display-6">{{ $userCount }}</p>
                </div>
            </div>

            <!-- Total Cars in Inventory -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 text-center">
                    <h4>Total Cars in Inventory</h4>
                    <p class="display-6">{{ $carCount }}</p>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 text-center">
                    <h4>Total Revenue</h4>
                    <p class="display-6">${{ number_format($totalRevenue, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Management Sections -->
        <div class="row">
            <!-- Users Management -->
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <h4>Users Management</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.registeredUsers') }}">Registered Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.showRegisterUserForm') }}">Register New User</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Car Inventory -->
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <h4>Car Inventory</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.cars') }}">Manage Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('discounts.index') }}">Manage Discounts</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sales Analytics -->
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <h4>Sales Analytics</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.salesDashboard') }}">View Sales Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2024 Admin Dashboard. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>