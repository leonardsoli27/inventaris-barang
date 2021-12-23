@extends('layout.main')

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><b>Profil User</b></div>
            <div class="card-body card-block">
                @foreach ($user as $item)
                <form method="POST" action="/edtProfil/{{ $item->id_user }}">
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
                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><b>Ganti Password</b></div>
            <div class="card-body card-block">
                <form method="POST" action="/edtPassword/{{ $item->id_user }}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Ganti</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
