@extends('layout.main')

@section('barang_masuk', 'active')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Barang Masuk</strong>
            </div>
            <div class="card-body card-block">
                <form action="/tbhBarang_masuk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Kode Barang Masuk</label>
                            <input type="text" class="form-control" id="kode_mb" name="kode_bm" value="{{ $kode_bm }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="supplier">Supplier</label>
                            @if (isset($id))
                            <select id="supplier" class="form-control" name="supplier" onchange="supplier_id()">
                                <option selected>Pilih Supplier...</option>
                                @foreach ($supplier as $item)
                                <option value="{{ $item->id_pemasok }}"
                                    {{ ($id == $item->id_pemasok) ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                                @endforeach
                            </select>
                            @else
                            <select id="supplier" class="form-control" name="supplier" onchange="supplier_id()">
                                <option selected>Pilih Supplier...</option>
                                @foreach ($supplier as $item)
                                <option value="{{ $item->id_pemasok }}">{{ $item->nama }}
                                </option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgl_masuk">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                        </div>
                    </div>

                    @if (isset($produk))
                    <hr>
                    <div class="form-row">
                        <div class="table-responsive">
                            <table id="barang" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <input type="hidden" name="satuan[]" value="{{ $item->satuan }}">
                                            <input type="hidden" name="nama[]" value="{{ $item->nama }}">
                                            {{ $item->nama }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="harga_ambil[]" value="{{ $item->harga_ambil }}">
                                            Rp. {{ number_format($item->harga_ambil) }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="id_barang[]" value="{{ $item->id_barang }}">
                                            <input type="hidden" name="kategori_id[]" value="{{ $item->kategori_id }}">
                                            <input class="form-control" name="jumlah[]" type="number" min="0" value="0">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    @endif
                    <button type="submit" class="btn btn-sm btn-primary">Top Up Barang</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('lihat-barang')
<script type="text/javascript">
    $(document).ready(function () {
        $('#barang').DataTable();
    });

    function supplier_id() {
        var id_pemasok = document.getElementById("supplier").value;
        var url = "{{ url('list') }}" + '/' + id_pemasok;
        window.location.href = url;

    }

</script>
@endsection
