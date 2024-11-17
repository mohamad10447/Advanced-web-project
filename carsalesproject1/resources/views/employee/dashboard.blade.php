<!-- resources/views/employee/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pusher-js@7.2.0/dist/web/pusher.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <!-- Success and Error Messages -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Header -->
        <h1 class="text-center mb-5">Employee Dashboard</h1>

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

          <!-- View Shop Button -->
          <div class="mt-5 text-center">
            <a href="{{ url('shop') }}" class="btn btn-primary btn-lg">View Shop</a>
        </div>

        <!-- Notifications -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h4>Live Notifications</h4>
                <ul id="notifications" class="list-group">
                    <li class="list-group-item">No new notifications</li>
                </ul>
            </div>
        </div>

        <!-- User List (Employee Section) -->
        <div class="mt-5">
            <h4>Registered Users</h4>
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

    </div>

    <!-- Real-time Notifications Setup with Pusher -->
    <script>
        // Pusher Setup for Real-Time Updates
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true,
        });

        // Subscribe to the 'employee-notifications' channel
        const channel = pusher.subscribe('employee-notifications');

        // Listen for 'new-notification' event
        channel.bind('new-notification', function(data) {
            const notificationsList = document.getElementById('notifications');
            notificationsList.innerHTML = `<li class="list-group-item">${data.message}</li>` + notificationsList.innerHTML;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
