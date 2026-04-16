@extends('admin.template')
@section('template')
    <div class="row mt-4">
        <div class="col-md-6 ">
            <h3>Data Category</h3>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-9">
                    <form action="{{ route('admin.products.index') }}" method="get">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success btn">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Category_id</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->image) }}" width="50">
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', Crypt::encrypt($item->id)) }}"
                                    class="btn btn-warning btn-sm">edit</a>
                                <form action="{{ route('admin.products.destroy', Crypt::encrypt($item->id)) }}"
                                    method="post" class="">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="hapus" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin Anda ingin Menghapus data ini?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
