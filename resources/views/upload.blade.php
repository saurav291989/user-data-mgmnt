<!DOCTYPE html>
<html>
<head>
    <title>User Data Upload</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-primary-subtle bg-gradient">

    <div class="container vh-100 d-flex justify-content-center align-items-center">

        <div class="card shadow-lg p-4 rounded-4"
            style="width: 500px; background-color:rgb(145, 240, 193);">

            <div class="text-center mb-4">
                <h2 class="text-warning-subtle fw-bold">
                    User Data Upload
                </h2>

                <p class="text-muted">
                    Upload CSV / Excel File
                </p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Upload Form -->
            <form action="{{ route('user.import') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Select File
                    </label>

                    <input type="file"
                           name="file"
                           class="form-control"
                           required>
                </div>

                <div class="d-grid">
                    <button type="submit"
                            class="btn btn-warning btn-lg rounded-pill">

                        Upload File
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>