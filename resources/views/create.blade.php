<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #d9e5df;
            font-family: Arial, sans-serif;
        }

        .main-card {
            max-width: 750px;
            margin: 50px auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.69);
        }

        .card-header-custom {
            background:rgb(142, 160, 175);
            color: white;
            padding: 20px;
        }

        .card-header-custom h2 {
            margin: 0;
            font-weight: bold;
        }

        .card-body-custom {
            background:rgb(139, 255, 174);
            padding: 35px;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px;
        }

        .btn-update {
            background:rgba(12, 231, 12, 0.69);
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
        }

        .btn-update:hover {
            background: #157347;
        }

        .btn-back {
            background: #6c757d;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #5c636a;
            color: white;
        }
    </style>
</head>

<body>

@include('layouts.navbar')

    <div class="container">

        <div class="main-card">

            <div class="card-header-custom d-flex justify-content-between align-items-center">
                <h2>➕ Add New User</h2>

                <a href="{{ route('users.index') }}"
                   class="btn btn-warning fw-bold">
                    ← Back
                </a>
            </div>

            <div class="card-body-custom">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('users.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}">

                        @error('name')
                            <div class="text-danger mt-1">
                               {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}">

                        @error('email')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>City</label>
                        <input type="text"
                               name="city"
                               class="form-control"
                               value="{{ old('city') }}">

                        @error('city')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Age</label>
                        <input type="number"
                               name="age"
                               class="form-control"
                               value="{{ old('age') }}">

                        @error('age')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label>Gender</label>

                        <select name="gender"
                                class="form-select">

                            <option value="Male">Male</option>

                            <option value="Female">Female</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Department</label>

                        <select name="department_id"
                                class="form-select">

                            @foreach($departments as $department)

                                <option value="{{ $department->id }}">
                                    {{ $department->department_name }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="d-flex gap-2">

                        <button type="submit"
                                class="btn-update">
                            Save User
                        </button>

                        <a href="{{ route('users.index') }}"
                           class="btn-back">
                            Cancel
                        </a>

                    </div>
               
                </form>

            </div>

        </div>

    </div>
    @include('layouts.footer')
</body>

</html>