@extends('layout.main')

@section('barang_keluar', 'active')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Barang Keluar</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('tbhBarang_keluar') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="kode_bk">Kode Barang Keluar</label>
                            <input type="text" class="form-control" id="kode_bk" name="kode_bk" value="{{ $kode_bk }}"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <select id="nama_pegawai" name="nama_pegawai" class="form-control">
                                <option selected>Pilih Pegawai...</option>
                                @foreach ($pegawai as $item)
                                <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tgl_keluar">Tanggal Keluar</label>
                            <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nama_barang">Pilih Nama Barang</label>
                            <select id="nama_barang" name="nama_barang" class="form-control" onchange="barang_id()">
                                <option selected>Pilih Barang...</option>
                                @foreach ($barang as $item)
                                <option value="{{ $item->id_barang }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <table class="table table-striped">
                            <thead>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Jumlah</th>
                                <th></th>
                            </thead>
                            <tbody class="isi">

                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" style="float: right">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('lihat-barang')
<script type="text/javascript">
    function barang_id() {
        var id_barang = document.getElementById("nama_barang").value;
        var url = "{{ url('tampil_bk') }}" + '/' + id_barang;
        // var kosong = $(this);
        // window.location.href = url;
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: url,
            success: function (data) {
                console.log(data);
                var nilai = '';
                nilai += '<tr>';
                nilai += '<td>';
                nilai += data.data_bk.kode_barang;
                nilai += '<input type="hidden" value="' + data.data_bk.id_barang +
                    '" id="id_barang[]" name="id_barang[]">';
                nilai += '</td>';
                nilai += '<td>';
                nilai += data.data_bk.nama;
                nilai += '</td>';
                nilai += '<td>';
                nilai += data.data_bk.jumlah;
                nilai += ' ';
                nilai += data.data_bk.satuan;
                nilai += '</td>';
                nilai += '<td>';
                nilai +=
                    '<input type="number" value="0" min="0" class="form-control" id="jml[]" name="jml[]">';
                nilai += '<input type="hidden" value="' + data.data_bk.satuan +
                    '" id="satuan[]" name="satuan[]">';
                nilai += '</td>';
                nilai += '</td>';
                nilai += '<td>';
                nilai += '<button class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></button>';
                nilai += '</td>';
                nilai += '</tr>';

                $('.isi').append(nilai);
            }
        })
    }

    $(document).ready(function () {
        $('#data_bk').DataTable();

        $('body').on('click', '.hapus', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        })
    });

</script>
@endsection
