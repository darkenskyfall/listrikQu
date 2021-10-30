@extends('adm.app')

@section('page-content')
<h1 class="h3 mb-2 text-gray-800">Edit Katalog</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <strong>Perhatian!</strong> {{ $error }}.
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('catalogue.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" value="{{ $catalogue->name }}" required>
                </div>
                <div class="form-group">
                    <label>Sub Pekerjaan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Sub Pekerjaan" name="sub" value="{{ $catalogue->sub }}" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" placeholder="Masukkan Deskripsi" rows="3" name="description" required>{{ $catalogue->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" placeholder="Masukkan Harga" name="price" value="{{ $catalogue->price }}" required>
                </div>
                <div class="form-group">
                    <img src="{{ url('images/'.$catalogue->image_url) }}" class="rounded d-block w-25 mb-3" alt="..." id="blah">
                    <label>Unggah Foto</label>
                    <input type="file" class="form-control" name="image" onchange="readURL(this);">
                    <small>Kosongi bila tidak mengupdate gambar</small>
                </div>
                <button type="submit" class="btn btn-warning">Tambah</button>
            </form>
        </div>
    </div>
@endsection