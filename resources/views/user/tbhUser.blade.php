@extends('layout.main')

@section('user', 'active')

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><b>Tambah User</b></div>
            <div class="card-body card-block">
                <form method="POST" action="{{ route('tbhUser') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">User Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="">Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Lurah">Lurah</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    <a href="/user" class="btn btn-sm btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
