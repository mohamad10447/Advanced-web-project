<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
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
        <h1 class="mb-4 text-center" style="font-size: 2.5rem; font-weight: 700; color: #ff4d4d;">Edit Car</h1>

        <!-- Success and Error Messages -->
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #28a745; border-color: #28a745; color: #fff;">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #ff4d4d; border-color: #ff4d4d; color: #fff;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <!-- Form to Edit Car -->
        <form action="{{ route('admin.updateCar', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="brand" class="form-label fw-bold" style="font-size: 1.1rem;">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="model" class="form-label fw-bold" style="font-size: 1.1rem;">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ old('model', $car->model) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label fw-bold" style="font-size: 1.1rem;">Type</label>
                    <input type="text" name="type" class="form-control" value="{{ old('type', $car->type) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="year" class="form-label fw-bold" style="font-size: 1.1rem;">Year</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year', $car->year) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="mileage" class="form-label fw-bold" style="font-size: 1.1rem;">Mileage</label>
                    <input type="number" name="mileage" class="form-control" value="{{ old('mileage', $car->mileage) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fuel_type" class="form-label fw-bold" style="font-size: 1.1rem;">Fuel Type</label>
                    <input type="text" name="fuel_type" class="form-control" value="{{ old('fuel_type', $car->fuel_type) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="transmission" class="form-label fw-bold" style="font-size: 1.1rem;">Transmission</label>
                    <input type="text" name="transmission" class="form-control" value="{{ old('transmission', $car->transmission) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold" style="font-size: 1.1rem;">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $car->price) }}" required>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary me-2" style="font-size: 1.1rem; padding: 10px 30px; border-radius: 8px; background-color: #ff4d4d; color: #fff; text-transform: uppercase; border: none;">
                    Update Car
                </button>
                <a href="{{ route('admin.cars') }}" class="btn btn-secondary" style="font-size: 1.1rem; padding: 10px 30px; border-radius: 8px; text-transform: uppercase;">
                    Back to Cars
                </a>
            </div>
        </form>

        <!-- Back to Admin Dashboard -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary" style="font-size: 1.1rem; padding: 10px 30px; border-radius: 8px; text-transform: uppercase;">
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