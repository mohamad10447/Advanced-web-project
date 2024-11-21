<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Admin Dashboard Header -->
        <h1 class="text-center mb-5">Admin Dashboard</h1>

        <!-- Display Total Registered Users -->
        <h3 class="mb-4"><strong>Total Registered Users: </strong>{{ $userCount }}</h3>

        <!-- Users Section -->
        <div class="p-4 border rounded-3 bg-light shadow-sm">
            <h4>Users Management</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('admin.registeredUsers') }}">Registered Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('admin.showRegisterUserForm') }}">Register New User</a>
                </li>
            </ul>
        </div>

        <!-- Car Inventory Section -->
        <div class="mt-5 p-4 border rounded-3 bg-light shadow-sm">
            <h4>Car Inventory</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('admin.cars') }}">Manage Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('discounts.index') }}">Manage Discounts</a>
                </li>
            </ul>
        </div>

        <!-- Sales Analytics Section -->
        <div class="mt-5 p-4 border rounded-3 bg-light shadow-sm">
            <h4>Sales Analytics</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-primary" href="{{ route('admin.salesDashboard') }}">View Sales Dashboard</a>
                </li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>