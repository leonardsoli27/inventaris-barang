@extends('layout.main')

@section('pegawai', 'active')

@section('content')

<a href="{{ url('/tbhPegawai') }}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Pegawai</a>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Daftar Pegawai</strong>
            </div>
            <div class="card-body">
                <table id="data-pegawai" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pegawai</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_pegawai }}</td>
                            <td>{{ $item->nama_pegawai }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a data-toggle="modal" data-target="#key{{ $item->id_pegawai }}"
                                    class="btn btn-sm btn-warning"><i class="fa fa-key"></i></a>
                                <a href="/edtPegawai/{{ $item->id_pegawai }}" class="btn btn-sm btn-success"><i
                                        class="fa fa-pencil-square-o"></i></a>
                                <a href="/hpsPegawai/{{ $item->id_pegawai }}" class="btn btn-sm btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach ($pegawai as $item)
<div class="modal fade" id="key{{ $item->id_pegawai }}" tabindex="-1" role="dialog" aria-labelledby="keyLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="keyLabel"><b>Hak Akses</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('konfir', ['id'=>$item->id_pegawai]) }}" method="POST">
                @method('put')
                @csrf
                <input type="hidden" name="id_pegawai" value="{{ $item->id_pegawai }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="kode_pegawai" class="form-label">Kode pegawai</label>
                        <input type="text" class="form-control" id="kode_pegawai" name="kode_pegawai"
                            value="{{ $item->kode_pegawai }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pegawai" class="form-label">Nama pegawai</label>
                        <input type="hidden" name="email" value="{{ $item->email }}">
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                            value="{{ $item->nama_pegawai }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Hak Akses</label>
                        <select name="jabatan" id="jabatan" class="form-control" onchange="konfirmasi()">
                            <option value="">Pilih Hak Akses..</option>
                            <option value="Admin">Admin</option>
                            <option value="Lurah">Lurah</option>
                        </select>
                    </div>
                    <div class="mb-3" id="isi_password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-sm" type="submit">Konfir</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('lihat-barang')
<script type="text/javascript">
    $(document).ready(function () {
        $('#data-pegawai').DataTable();
    });

    function konfirmasi() {
        // console.log('hasil');
        document.getElementById("isi_password").innerHTML = ' <label for="' +
            'password " class="' +
            ' form - label ">Password</label> <' +
            'input type = "password"' +
            'class = "form-control"' +
            'id = "password"' +
            ' name = "password" > ';
    }

</script>
@endsection
