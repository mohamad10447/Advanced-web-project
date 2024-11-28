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
            color: #ff4d4d;
            /* Bright red for the main heading */
            font-weight: bold;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #330000;
            /* Dark red background */
            color: #ffcccc;
            /* Light red text */
            font-weight: bold;
            font-size: 1.2rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .table thead th {
            background-color: #292929;
            /* Black background for table headers */
            color: white;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f9e6e6;
            /* Light red hover effect */
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

        .btn-info {
            background-color: #ff4d4d;
            /* Bright red for buttons */
            border-color: #ff4d4d;
        }

        .btn-info:hover {
            background-color: #e63939;
            /* Darker red on hover */
            border-color: #e63939;
        }

        .btn-danger {
            background-color: #660000;
            /* Deep red for delete button */
            border-color: #660000;
        }

        .btn-danger:hover {
            background-color: #800000;
            /* Darker red on hover */
        }

        .btn-primary {
            background-color: #292929;
            /* Black for primary buttons */
            border-color: #292929;
        }

        .btn-primary:hover {
            background-color: #1e1e1e;
            /* Darker black on hover */
            border-color: #1a1a1a;
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
        <h3 class="mb-4 text-center">Registered Users</h3>
        <div class="card shadow-sm">
            <div class="card-header">
                <span>Manage Registered Users</span>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-info btn-sm me-2">
                                    Edit
                                </a>
                                <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Back to Admin Dashboard -->
        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Admin Dashboard</a>
        </div>
    </div>
    <footer>
        <p>© 2024 Admin Dashboard. All rights reserved.</p>
    </footer>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>