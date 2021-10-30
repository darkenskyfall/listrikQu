@extends('adm.app')

@section('page-content')
<h1 class="h3 mb-2 text-gray-800">Admin</h1>
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
                <a href="{{ url('/admin/akun/tambah') }}" class="btn btn-success">Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->username }}</td>
                            <td>{{ ($admin->role == 1) ?  "Super Admin" : "Admin" }}</td>
                            <td class="w-25">
                                <form method="POST" action="{{ route('admin.destroy',$admin->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a href="{{ route('admin.edit',$admin->id)}}" class="btn btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
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