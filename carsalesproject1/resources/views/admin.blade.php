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

        <!-- Admin Dashboard Header -->
        <h1 class="text-center mb-5">Admin Dashboard</h1>

        <!-- Display Total Registered Users -->
        <h3 class="mb-4"><strong>Total Registered Users: </strong>{{ $userCount }}</h3>

        <!-- Form to Register User -->
        <h3 class="mb-3">Register New User</h3>
        <form action="{{ route('admin.registerUser') }}" method="POST" class="p-4 border rounded-3 bg-light shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register User</button>
        </form>

        <!-- Existing User List -->
        <div class="mt-5">
            <h4>Registered Users:</h4>
            <ul class="list-group shadow-sm">
                @foreach ($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $user->name }} ({{ $user->role }})</span>

                    <div>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-info btn-sm me-2">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Car Inventory -->
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
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>