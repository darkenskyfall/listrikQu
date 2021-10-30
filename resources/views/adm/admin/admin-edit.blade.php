@extends('adm.app')

@section('page-content')
<h1 class="h3 mb-2 text-gray-800">Edit Admin</h1>
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
            <form method="post" action="{{ route('admin.update', $admin->id) }}">
                @method("PATCH")
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" placeholder="Username" value="{{ $admin->username }}" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" class="form-control" placeholder="Masukkan Password Lama" name="old_password">
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" class="form-control" placeholder="Masukkan Password Baru" name="password">
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" placeholder="Masukkan Konfirmasi Password Baru" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-warning">Sunting</button>
            </form>
        </div>
    </div>
@endsection