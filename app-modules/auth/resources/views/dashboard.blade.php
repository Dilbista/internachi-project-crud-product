<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Dashboard</h1>



            <a href="{{ route('product.index') }}" class="btn btn-success btn-lg">
                <i class="bi bi-plus-circle"></i> productsList
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <div class="row">

            <h1 class="text-center">
                Welcome to the Auth Dashboard
            </h1>

        </div>
    </div>
</body>

</html>