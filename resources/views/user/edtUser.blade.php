@extends('layout.main')

@section('user', 'active')

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><b>Tambah User</b></div>
            <div class="card-body card-block">
                @foreach ($user as $item)
                <form method="POST" action="/edtUser/{{ $item->id_user }}">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id_user }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{ $item->nama }}" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $item->email }}" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">User Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="{{ $item->role }}">{{ $item->role }}</option>
                            <option value="Admin">Admin</option>
                            <option value="Lurah">Lurah</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    <a href="/user" class="btn btn-sm btn-danger">Kembali</a>
                </form>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
