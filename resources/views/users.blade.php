<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tab name -->
    <title>User Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    table tbody tr:hover {
        transform: scale(1.01);
        transition: 0.2s ease-in-out;
    }
    </style>
</head>

<body class="bg-success-subtle">

<div class="container mt-4">

    @if(session('success'))
    <div id="success-alert"
         class="alert alert-success alert-dismissible fade show"
         role="alert">
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
        </button>
    </div>
    @endif

    <div class="card shadow-lg border-0 ">

        <!-- Header -->
        <div class="card-header bg-secondary text-white px-4 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="mb-0">
                    User Management System
                </h2>

                <!-- Add User Button -->
                 
                <a href="{{ route('form') }}" target='_blank' class="btn btn-warning fw-bold">
                     + Add User
                </a>

            </div>

        </div>

        <div class="card-body bg-primary-subtle">

            <!-- Title -->
            <div class="text-center mb-1">
                <h4 class="text-primary display-10 border-bottom pb-1 d-inline-block">
                    User Records
                </h4>
            </div>

            <!-- Table -->
            <div class="table-responsive">

                 <table class="table table-hover align-middle text-center shadow-sm rounded overflow-hidden">

                    <thead class="table-secondary">

                        <tr class="text-dark">

                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Gender</th>
                            <th>Action</th>

                         </tr>

                    </thead>

                    <tbody>

                         @forelse($users as $user)

                        <tr class="{{ $loop->even ? 'table-primary' : 'table-info' }}">

                            <td>
                                <span class="badge bg-dark">
                                    {{ $user->id }}
                                </span>
                            </td>

                            <td class="fw-semibold text-primary">
                                {{ $user->name }}
                            </td>

                            <td>
                                {{ $user->age }}
                            </td>

                            <td class="text-muted">
                                {{ $user->email }}
                            </td>

                            <td>
                                <span class="badge bg-secondary">
                                    {{ $user->city }}
                                </span>
                            </td>

                            <td>
                                 @if(strtolower($user->gender) == 'male')
                                    <span class="badge bg-info px-4 py-2">
                                        Male
                                    </span>
                                @else
                                     <span class="badge bg-danger px-4 py-2">
                                        Female
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit/'.$user->id) }}" class="btn btn-warning btn-sm me-2"
                                    target="_blank">
                                    Edit
                                </a>

                                <a href="{{ url('delete/'.$user->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure ? you want to delete this user?')">
                                    Delete
                                </a>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-danger fw-bold py-4">
                                No Records Found
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Bottom Section -->
            <div class="d-flex justify-content-between align-items-center mt-4">

                <!-- Pagination -->
                <div>
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>

                <!-- Total Records -->
                <div class="text-black-subtle">
                    Total Records: {{ $totalcount }}
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    setTimeout(function () {
        let alertBox = document.getElementById('success-alert');

        if (alertBox) {
            alertBox.remove();
        }
    }, 3000); // 3000 milliseconds = 3 seconds
</script>

</body>
</html>