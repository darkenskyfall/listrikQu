@extends('adm.app')

@section('page-content')
<h1 class="h3 mb-2 text-gray-800">Detil Katalog</h1>
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
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url('images/'.$catalogue->image_url) }}" class="rounded mx-auto d-block w-100" alt="...">
                </div>
                <div class="col-md-6">
                    <h5><strong>Nama</strong></h5>
                    <p>{{ $catalogue->name }}</p>
                    <h5><strong>Sub</strong></h5>
                    <p>{{ $catalogue->Sub }}</p>
                    <h5><strong>Deskripsi</strong></h5>
                    <p>{{ $catalogue->description }}</p>
                    <h5><strong>Harga</strong></h5>
                    <p>{{ $catalogue->price }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection