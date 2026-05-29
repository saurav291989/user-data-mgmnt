<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="mb-4 text-center">Update User</h2>

        <form action="{{ url('update/'.$user->id) }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $user->name }}">
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number"
                       name="age"
                       class="form-control"
                       value="{{ $user->age }}">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ $user->email }}">
            </div>

            <div class="mb-3">
                <label>City</label>
                <input type="text"
                       name="city"
                       class="form-control"
                       value="{{ $user->city }}">
            </div>

            <div class="mb-3">
                <label>Gender</label>

                <select name="gender" class="form-control">

                    <option value="Male"
                        {{ $user->gender == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ $user->gender == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                </select>
            </div>

            <button type="submit" class="btn btn-success">
                Update User
            </button>

            <a href="{{ url('display') }}"
               class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>