<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background-color:#d8e7df;
        }

        .main-card{
            background:#c8d7f0;
            border:none;
            box-shadow:0 4px 12px rgba(0,0,0,0.15);
        }

        .card-header{
            background:#6c757d;
            color:white;
        }

        .menu-btn{
            height:70px;
            font-size:20px;
            font-weight:bold;
        }

    </style>

</head>

<body>

@include('layouts.navbar')

<div class="container mt-4">

    <div class="card main-card">

        <!-- <div class="card-header bg-info text-black d-flex justify-content-between align-items-center">

            <h1 class="mb-0">
                User Management System
            </h1>

            <div>

                <span class="me-3">
                    Welcome,
                    <strong>{{ auth()->user()->name }}</strong>
                    <br>
                    <small>{{ auth()->user()->email }}</small>
                </span>

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-inline">

                    @csrf

                    <button type="submit"
                            class="btn btn-danger">
                        Logout
                    </button>

                </form>

            </div>

        </div> -->

        <div class="card-body text-center p-5">

            <h2 class="text-primary mb-5">
                Dashboard
            </h2>

        <div class="row justify-content-center">

            <div class="col-md-5 mb-4">
                <a href="/upload"
                class="btn btn-primary w-100 menu-btn " target="_blank">
                    Upload Data
                </a>
            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-5 mb-4">
                <a href="{{ route('users.create') }}"
                class="btn btn-info w-100 menu-btn text-white" target="_blank">
                    Add User
                </a>
            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-5 mb-4">
                <a href="{{ route('users.index') }}"
                class="btn btn-success w-100 menu-btn" target="_blank">
                    View Users
                </a>
            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-5">
                <a href="/users-api"
                class="btn btn-warning text-white w-100 menu-btn" target="_blank">
                    API View
                </a>
            </div>

        </div>

</div>

    </div>

</div>
@include('layouts.footer')
</body>
</html>