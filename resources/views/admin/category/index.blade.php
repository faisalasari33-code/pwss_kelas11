@extends('admin.template')
@section('template')
<div class="row mt-4">
    <div class="col-md-6 ">
        <h3>Data Category</h3>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-9">
                <form action="{{ route('admin.category.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Tambah Data</a>
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Category</th>
                        <th>Created At</th>
                        <th>Update At</th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at}}</td>
                        <td>
                            <a href="{{ route('admin.category.edit',$item->id) }}" class="btn btn-warning btn-sm">edit</a>
                            <form action="{{ route("admin.category.destroy",$item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" value="hapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Anda ingin Menghapus data ini?')">

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
