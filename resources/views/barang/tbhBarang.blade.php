@extends('layout.main')

@section('barang_masuk', 'active')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Barang</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('tbhBarang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                                value="{{ $kode_b }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pemasok_id">Supplier</label>
                            <select id="pemasok_id" name="pemasok_id" class="form-control">
                                <option selected>Pilih Supplier...</option>
                                @foreach ($supplier as $item)
                                <option value="{{ $item->id_pemasok }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kategori_id">Kategori</label>
                            <select id="kategori_id" class="form-control" name="kategori_id">
                                <option selected>Pilih Kategori...</option>
                                @foreach ($kategori as $item)
                                <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="satuan">Satuan</label>
                            <input type="text" name="satuan" id="satuan" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="harga">Harga Beli</label>
                            <input type="text" class="form-control" id="harga_ambil" name="harga_ambil">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="mb-4 ml-2">
                            <label for="gambar" class="form-label">Gambar Promosi</label>
                            <img class="lihat-gambar img-fluid mb-3 col-sm-5">
                            <input class="  @error('gambar') is-invalid
                            @enderror" type="file" onchange="tampilGambar()" name="gambar" id="gambar">
                            <div class="invalid-feedback">
                                Wajib Diisi | Format file jpg, jpeg, png.
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Tambah</button>
                    <a href="/barang" class="btn btn-sm btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('table')
<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });

</script>
@endsection

@section('lihat-gambar')
<script>
    function tampilGambar() {
        const image = document.querySelector('#gambar');
        const lihatImg = document.querySelector('.lihat-gambar');

        lihatImg.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            lihatImg.src = oFREvent.target.result;
        }
    }

</script>
@endsection
