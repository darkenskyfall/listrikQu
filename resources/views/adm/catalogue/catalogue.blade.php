@extends('adm.app')

@section('page-content')
<h1 class="h3 mb-2 text-gray-800">Katalog</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    @if(session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session()->get('success') }}
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
            <div class="mb-4">
                <a href="{{ url('/admin/katalog/tambah') }}" class="btn btn-success">Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Sub</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Sub</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($catalogues as $catalogue)
                        <tr>
                            <td class="w-25"><img src="{{ url('images/'.$catalogue->image_url) }}" class="rounded mx-auto d-block w-100 h-3" alt="..."></td>
                            <td>{{ $catalogue->name }}</td>
                            <td>{{ $catalogue->sub }}</td>
                            <td>{{ $catalogue->price }}</td>
                            <td class="w-25">
                                <form method="POST" action="{{ route('catalogue.destroy',$catalogue->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a href="{{ route('catalogue.edit',$catalogue->id)}}" class="btn btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{ route('catalogue.show', $catalogue->id) }}" class="btn btn-dark">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="submit"  class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button> 
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