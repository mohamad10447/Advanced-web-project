<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
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
        <h1 class="mb-4 text-center" style="color: #000;">Edit Car</h1>

        <!-- Success and Error Messages -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form to Edit Car -->
        <form action="{{ route('employee.updateCar', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="brand" class="form-label fw-bold" style="color: #000;">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="model" class="form-label fw-bold" style="color: #000;">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ old('model', $car->model) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label fw-bold" style="color: #000;">Type</label>
                    <input type="text" name="type" class="form-control" value="{{ old('type', $car->type) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="year" class="form-label fw-bold" style="color: #000;">Year</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year', $car->year) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="mileage" class="form-label fw-bold" style="color: #000;">Mileage</label>
                    <input type="number" name="mileage" class="form-control" value="{{ old('mileage', $car->mileage) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fuel_type" class="form-label fw-bold" style="color: #000;">Fuel Type</label>
                    <input type="text" name="fuel_type" class="form-control" value="{{ old('fuel_type', $car->fuel_type) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="transmission" class="form-label fw-bold" style="color: #000;">Transmission</label>
                    <input type="text" name="transmission" class="form-control" value="{{ old('transmission', $car->transmission) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold" style="color: #000;">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $car->price) }}" required>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn" style="background-color: #ff0000; color: #fff;">Update Car</button>
                <a href="{{ route('employee.cars') }}" class="btn btn-secondary" style="background-color: #333; color: #fff;">Back to Cars</a>
            </div>
        </form>

        <!-- Back to Dashboard -->
        <div class="mt-4">
            <a href="{{ route('employee.dashboard') }}" class="btn" style="background-color: #ff0000; color: #fff;">Back to Employee Dashboard</a>
        </div>
    </div>

    <footer>
        <p>© 2024 Employee Dashboard. All rights reserved.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>