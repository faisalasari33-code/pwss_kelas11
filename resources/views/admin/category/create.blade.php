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
        <form action="{{ route('admin.category.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Category</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <input type="submit" value="Simpan Data" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
