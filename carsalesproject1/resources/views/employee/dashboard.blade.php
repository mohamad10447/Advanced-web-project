<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f5f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header .navbar {
            background: linear-gradient(90deg, #212529, #495057);
            border-bottom: 3px solid #ffc107;
        }

        header .navbar-brand {
            font-weight: bold;
            font-size: 1.75rem;
            color: #fff;
        }

        header .navbar-brand span {
            color: #ffc107;
        }

        header .nav-link {
            color: #fff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        header .nav-link:hover,
        header .nav-link.active {
            color: #ffc107;
        }

        .btn-outline-light:hover {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }

        .container h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 2rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

        footer {
            margin-top: 2rem;
            padding: 1rem 0;
            background-color: #212529;
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

        .container {
            flex: 1;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('employee.dashboard') }}">
                    Employee<span>Dashboard</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#employeeNavbar"
                    aria-controls="employeeNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="employeeNavbar">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('employee.registeredUsers') ? 'active' : '' }}"
                                href="{{ route('employee.registeredUsers') }}">Manage Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('employee.cars') ? 'active' : '' }}"
                                href="{{ route('employee.cars') }}">Manage Cars</a>
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
        <h1 class="text-center">Employee Dashboard</h1>

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
        </div>

        <!-- Management Sections -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <h4>Users Management</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('employee.registeredUsers') ? 'active' : '' }}"
                                href="{{ route('employee.registeredUsers') }}">Registered Users</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4">
                    <h4>Car Inventory</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('employee.cars') ? 'active' : '' }}"
                                href="{{ route('employee.cars') }}">Manage Cars</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2024 Employee Dashboard. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
