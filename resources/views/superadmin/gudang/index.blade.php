@extends('layouts.app')
@push('css')

<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
<div class="row">
    <div class="col-12">

        <a href="/superadmin/gudang/add" class="btn btn-md btn-primary">TAMBAH DATA</a>

        <a href="/superadmin/gudang/pdf" target="_blank" class="btn btn-md btn-danger">EXPORT PDF</a>
        <br /><br />
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Gudang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bangunan</th>
                            <th>Tipe</th>
                            <th>Nama Pemilik</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>No Izin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)

                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nama_bangunan}}</td>
                            <td>{{$item->tipe}}</td>
                            <td>{{$item->nama_pemilik}}</td>
                            <td>{{$item->kontak_pemilik}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->kecamatan}}</td>
                            <td>{{$item->kelurahan}}</td>
                            <td>{{$item->no_izin}}</td>
                            <td class="d-flex gap-2">
                                <a href="/superadmin/detail/{{$item->id}}" class="btn btn-md btn-primary">DETAIL</a>
                                <a href="/superadmin/gudang/edit/{{$item->id}}" class="btn btn-md btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/gudang/delete/{{$item->id}}" class="btn btn-md btn-danger"
                                    onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection
@push('js')

<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endpush