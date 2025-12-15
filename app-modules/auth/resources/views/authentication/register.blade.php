<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            min-height: 100vh;
        }

        .card {
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4 fw-bold">Create Account</h3>

                    {{-- Success Message --}}
                    @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="/register">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="Enter your name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter password">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                Register
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Already have an account?
                            <a href="/login" class="text-decoration-none fw-semibold">Login</a>
                        </small>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>