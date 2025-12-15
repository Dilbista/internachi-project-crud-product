<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

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

                    <h3 class="text-center mb-4 fw-bold">Welcome Login</h3>

                    {{-- Success Message --}}
                    @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- Error Message --}}
                    @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
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


                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf

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

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <a href="#" class="text-decoration-none small">
                                Forgot password?
                            </a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Don’t have an account?
                            <a href="/register" class="text-decoration-none fw-semibold">Register</a>
                        </small>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>