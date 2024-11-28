<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>

    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h3 {
            color: #007bff;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #e9f5ff;
            cursor: pointer;
        }

        .table td,
        .table th {
            vertical-align: middle;
            text-align: center;
        }

        .btn {
            transition: all 0.3s ease-in-out;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-danger:hover {
            background-color: #d9534f;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-sm {
            padding: 0.3rem 0.6rem;
        }

        .mt-4 a {
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        header .navbar {
            background: linear-gradient(90deg, #212529, #495057);
            border-bottom: 3px solid #ff4d4d;
            /* Red border matching the primary color */
        }

        header .navbar-brand {
            font-weight: bold;
            font-size: 1.75rem;
            color: #fff;
        }

        header .navbar-brand span {
            color: #ff4d4d;
            /* Red color */
        }

        header .nav-link {
            color: #fff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        header .nav-link:hover,
        header .nav-link.active {
            color: #ff4d4d;
            /* Red color for hover */
        }

        .btn-outline-light:hover {
            background-color: #ff4d4d;
            /* Red hover effect */
            border-color: #ff4d4d;
            color: #212529;
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
        <h3 class="mb-4 text-center" style="color: #000;">Registered Users</h3>

        <div class="card shadow-sm">
            <div class="card-header" style="background-color: #ff0000; color: #fff;">
                <span>Manage Registered Users</span>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr style="background-color: #000; color: #fff;">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Back to Admin Dashboard -->
        <div class="mt-4">
            <a href="{{ route('employee.dashboard') }}" class="btn" style="background-color: #ff0000; color: #fff;">Back to Dashboard</a>
        </div>
    </div>

    <footer class="text-center mt-4" style="background-color: #333; color: #fff; padding: 10px;">
        <p>© 2024 Employee Dashboard. All rights reserved.</p>
    </footer>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>