<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Discounts</h1>

    <!-- Success and Error Messages -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Button to Create New Discount -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('discounts.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Create New Discount
        </a>
    </div>

    <!-- Discounts Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Code</th>
                    <th>Percentage</th>
                    <th>Starting Time</th>
                    <th>Ending Time</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Year</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                <tr>
                    <td>{{ $discount->code }}</td>
                    <td>{{ $discount->percentage }}%</td>
                    <td>{{ $discount->starting_time ? $discount->starting_time->format('Y-m-d H:i') : 'N/A' }}</td>
                    <td>{{ $discount->ending_time ? $discount->ending_time->format('Y-m-d H:i') : 'N/A' }}</td>
                    <td>{{ $discount->car->brand }}</td>
                    <td>${{ number_format($discount->car->price, 2) }}</td>
                    <td>{{ ucfirst($discount->car->type) }}</td>
                    <td>{{ $discount->car->year }}</td>
                    <td class="text-center">
                        <!-- Edit Button -->
                        <a href="{{ route('discounts.edit', $discount->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>

                        <!-- Delete Form -->
                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this discount?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Back to Admin Dashboard -->
    <div class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Admin Dashboard</a>
    </div>
</div>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">