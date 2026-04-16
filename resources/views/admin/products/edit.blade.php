@extends('admin.template')
@section('template')
<div class="row mt-4">
    <div class="col-md-12">
        <h3>Tambah Data Category</h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.products.update', Crypt::encrypt($product->id)) }}" method="post">
            @csrf
            @method('put')
             <div class="mb-3">
                <label for="name" class="form-label">Nama Product</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" placeholder="Masukan Nama Product">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Masukan Harga">
            </div>

            <div class="mb-3">
                <label>Stock</label>
                <input type="number" name="stok" value="{{ $product->stok }}" class="form-control" placeholder="Masukkan stock">
            </div>

            <div class="mb-3">
                <p>Category_id</p>
                <select name="category_id" class="form-select form-select-sm mt-3" id="">
                    <option value="">Pilih Category</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}"{{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" value="{{ $product->deskripsi }}" class="form-control" placeholder="Masukkan Deskripsi">
            </div>
            <input type="submit" value="Simpan Data" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
