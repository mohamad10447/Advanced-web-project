<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Discount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
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
        <h1 class="text-center mb-4" style="color: #ff4d4d; font-weight: bold;">Create Discount</h1>

        <form action="{{ route('discounts.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="code" class="form-label" style="color: #330000; font-weight: bold;">Discount Code</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="percentage" class="form-label" style="color: #330000; font-weight: bold;">Discount Percentage</label>
                    <input type="number" name="percentage" id="percentage" class="form-control" required min="0" max="100" step="0.01">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="starting_time" class="form-label" style="color: #330000; font-weight: bold;">Starting Time</label>
                    <input type="datetime-local" name="starting_time" id="starting_time" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="ending_time" class="form-label" style="color: #330000; font-weight: bold;">Ending Time</label>
                    <input type="datetime-local" name="ending_time" id="ending_time" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label for="car_id" class="form-label" style="color: #330000; font-weight: bold;">Select Car</label>
                <select name="car_id" id="car_id" class="form-select" required>
                    <option value="">Select a car</option>
                    @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn" style="background-color: #ff4d4d; border-color: #ff4d4d; color: #fff; font-weight: bold;">Create Discount</button>
        </form>

        <!-- Back to Admin Dashboard -->
        <div class="mt-3 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn" style="background-color: #292929; border-color: #292929; color: #fff;">Back to Admin Dashboard</a>
        </div>
    </div>

    <footer>
        <p>© 2024 Admin Dashboard. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>