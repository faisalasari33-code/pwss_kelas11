<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-info navbar-dart">
        <div class="container ">
            <a class="navbar-brand text-light" href="#">TOKOKU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-togler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="{{ route('admin') }}">Dasboard</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-light" href="/category">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/products">Products</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-while" href="/admin/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('template')
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
