@extends('template')
@section('content')
<div class="container mt-5 pt-5">
    <div class="card p-5 pt-3 shadow">
        <h2 class="mb-3">Detail Product</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="product-detail" style="width: 100%; height: auto;">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-body">
                        <h1 class="card-title">{{ $product->name }}</h1>
                        <p class="text-muted m-1">kategori: {{ $product->category->name }}</p>
                        <p class="fs-3 text-primary fw-bold">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="card-text">{{ $product->description }}</p>

                        <div class="d-flex flex-column flex-sm-row gap-2 mb-3">
                            <a href="#" class="btn btn-primary btn-lg">Tambah ke Keranjang</a>
                            <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">Kembali ke Home</a>
                        </div>

                        <div class="alert alert-secondary" role="alert">
                            Stock:{{ $product->stok }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
