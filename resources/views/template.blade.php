<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gradient bg-light">
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">

        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-user mx-3"></i>TOKOKU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="toggle">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><i class="fa-solid fa-person-arrow-down-to-line"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <br>
    <br>
    <div class="container-fluid bg-secondary text-center p-3">
        <div class="row">
            <div class="col px-5">
                <div class="row gy-3 mb-3">
                    <h2 class="mt-3">Sepatu Adidas</h2>
                    <span style="font-size: 15px; width: 50%; ">Sepatu Produk Kami tidak akan Membuat Anda menyasal, Di
                        Jamin Nyaman dan Bikin Kaian kece, jangan Lupa Kasih Bintang Lima nya ya, semoga sepatu produk
                        kami membuat kalian senang </span>
                </div>
                <a href="#"class="btn border border-light w-45">Baca Lebih Banyak Tentang kami</a>
            </div>
            <div class="col mt-2">
                <h5>Halaman</h5>
                <ul class="navbar-nav ">
                    <li class="navbar-item">
                        <a href="" class="nav-link text-light">Login/Daftar</a>
                    </li>
                    <li class="navbar-item">
                        <a href="" class="nav-link text-light">Cara Order</a>
                    </li>
                    <li class="navbar-item">
                        <a href="" class="nav-link text-light">Kebijakan Pripasi</a>
                    </li>
                    <li class="navbar-item">
                        <a href="" class="nav-link text-light">Syarat dan Ketentuan penukaran</a>
                    </li>
                </ul>
            </div>
            <div class="col mt-2">
                <h5>Kontak</h5>
                <ul class="navbar-nav ">
                    <li class="navbar-item">
                        <a href="" class="nav-link text-light"> wa -</a>
                    </li>
                    <li class="navbar-item">
                        <a href="" class="nav-link text-light">Alamat</a>
                    </li>
                    <div class="row">

                    </div>
                </ul>
            </div>
        </div>
        <div class="text-center">
            <span class="text-center">@ Adidas Samba</span>
        </div>
    </div>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
