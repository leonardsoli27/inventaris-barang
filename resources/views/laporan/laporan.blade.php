@extends('layout.main')

@section('laporan', 'active')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Cetak Laporan</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('cetak_laporan') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tgl_awal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="jenis_laporan">Jenis Laporan</label>
                            <select id="jenis_laporan" name="jenis_laporan" class="form-control">
                                <option selected>Pilih Jenis Laporan...</option>
                                <option value="masuk">Laporan Barang Masuk</option>
                                <option value="keluar">Laporan Barang Keluar</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
