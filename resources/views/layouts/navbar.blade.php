<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="/dashboard">
            User Management System
        </a>

        <div class="navbar-nav">

            <a class="nav-link" href="/dashboard">
                Dashboard
            </a>

            <a class="nav-link" href="/upload" target="_blank">
                Upload
            </a>

            <a class="nav-link" href="{{ route('users.create') }}" target="_blank">
                Add User
            </a>


            <a class="nav-link" href="{{ route('users.index') }}" target="_blank">
                Users
            </a>

            <a class="nav-link" href="/users-api" target="_blank">
                API View
            </a>

        </div>

        <div class="d-flex align-items-center">

            <span class="text-white me-3">
                Welcome,
                <strong>{{ auth()->user()->name }}</strong>
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>