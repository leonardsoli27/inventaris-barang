@extends('layout.main')

@section('pemasok', 'active')

@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header"><b>Edit Supllier</b></div>
            <div class="card-body card-block">
                @foreach ($pemasok as $item)
                <form method="POST" action="/edtPemasok/{{ $item->id_pemasok }}">
                    @method('put')
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id_pemasok }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{ $item->nama }}" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="{{ $item->alamat }}" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $item->email }}" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" value="{{ $item->telepon }}"
                            name="telepon">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    <a href="/pemasok" class="btn btn-sm btn-danger">Kembali</a>
                </form>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
