@extends('layout.main')

@section('pemasok', 'active')

@section('content')

<a href="{{ url('/tbhPemasok') }}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Supplier</a>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Daftar Supplier</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasok as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>
                                <a href="/edtPemasok/{{ $item->id_pemasok }}" class="btn btn-sm btn-success"><i
                                        class="fa fa-pencil-square-o"></i></a>
                                <a href="/hpsPemasok/{{ $item->id_pemasok }}" class="btn btn-sm btn-danger"><i
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
@endsection

@section('table')
<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });

</script>
@endsection
