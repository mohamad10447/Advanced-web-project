<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h1 {
            color: red;
            font-weight: bold;
        }

        .table thead th {
            background-color: black;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: red;
            border-color: red;
        }

        .btn-primary:hover {
            background-color: darkred;
            border-color: darkred;
        }

        .btn-danger {
            background-color: red;
            border-color: red;
        }

        .btn-danger:hover {
            background-color: darkred;
            border-color: darkred;
        }

        .btn-back {
            background-color: black;
            color: white;
            border: none;
        }

        .btn-back:hover {
            background-color: darkgray;
            color: black;
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
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
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
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.messages') ? 'active' : '' }}"
                                href="{{ route('admin.messages') }}">View Messages</a>
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
        <h1 class="text-center mb-4">Client Messages</h1>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->username }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->created_at }}</td>
                                <td>
                                    <form action="{{ route('admin.deleteMessage', $message->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>© 2024 Admin Dashboard. All rights reserved.</p>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>