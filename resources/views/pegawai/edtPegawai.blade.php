@extends('layout.main')

@section('pegawai', 'active')

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><b>Edit Pegawai</b></div>
            <div class="card-body card-block">
                @foreach ($pegawai as $item)
                <form method="POST" action="{{ route('uptPegawai', ['id'=>$item->id_pegawai]) }}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="kode_pegawai" class="form-label">Kode Pegawai</label>
                        <input type="text" class="form-control" id="kode_pegawai" name="kode_pegawai"
                            value="{{ $item->kode_pegawai}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                            value="{{ $item->nama_pegawai}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $item->email}}">
                    </div>
                    <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                    <a href="/pegawai" class="btn btn-sm btn-danger">Kembali</a>
                </form>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
