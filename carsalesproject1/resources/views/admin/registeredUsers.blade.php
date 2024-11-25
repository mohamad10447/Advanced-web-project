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
    </style>
</head>

<body>
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

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>