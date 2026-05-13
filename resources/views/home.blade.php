@extends('template')
@section('content')
    <div class="container pt-5 mt-3">
        <div class="center text-center  h5">Welcome</div>
        <div id="strip" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($product as $key => $item)
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $key }}" class="carousel-indicator-button {{ $key == 0 ? 'active' : '' }}"> </button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($product as $key => $item)
                    <div class="carousel-item active {{ $key == 0 ? 'active:' : '' }}">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="d-block w-100"
                            style="height: 400px;">
                    </div>
                @endforeach
            </div>


            <button class="carousel-control-prev" type="button" data-bs-target="#strip" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#strip" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>


        <div class="container">
            <ul class="nav nav-tabs mt-5 justify-content-center">
                @foreach ($categories as $key => $item)
                    <li class="nav-item">
                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                            href="#category{{ $key + 1 }}">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content mt-4">
                @foreach ($categories as $key => $item)
                    <div class="tab-pane container {{ $key == 0 ? 'active' : '' }}" id="category{{ $key + 1 }}">
                        <div class="row gap-3 pt-2">
                            @foreach ($item->products as $product)
                                <div class="col-md-3">
                                    <a href="{{ route('home.detail', Crypt::encrypt($product->id)) }} "
                                        style="text-decoration: none; color: #000;">
                                        <div class="card" style="width: 300px">
                                            <img class="card-img-top p-3" style="height: 300px"
                                                src="{{ asset('storage/' . $product->image) }}" alt="Card image">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $product->name }}</h4>
                                                <h6>Rp {{ number_format($product->price, 0, ',', '.') }}</h6>
                                                <p class="card-text">{{ substr($product->description, 0, 50) }}...</p>
                                                <a href="#" class="btn btn-primary">Tambah Keranjang</a>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
