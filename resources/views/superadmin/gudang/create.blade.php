@extends('layouts.app')
@push('css')

<!-- DataTables -->
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<style>
    #mapid {
        height: 380px;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-8">

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Bangunan</h3>
            </div>

            <form method="post" action="/superadmin/gudang/add">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Bangunan</label>
                        <input type="text" class="form-control" name="nama_bangunan">
                    </div>
                    <div class="form-group">
                        <label>No Izin</label>
                        <input type="text" class="form-control" name="no_izin">
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik">
                    </div>
                    <div class="form-group">
                        <label>Kontak Pemilik</label>
                        <input type="text" class="form-control" name="kontak_pemilik">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label>Kelurahan</label>
                        <select class="form-control select2" name="kelurahan">
                            @foreach (kelurahan() as $item)
                            <option value="{{$item->kelurahan}}">{{$item->kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan">
                    </div> --}}
                    <div class="form-group">
                        <label>Peruntukan</label>
                        <input type="text" class="form-control" name="peruntukan">
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan">
                    </div>
                    <div class="form-group">
                        <label>no IMB</label>
                        <input type="text" class="form-control" name="no_imb">
                    </div>


                    <div id="mapid"></div>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" id="lat" name="lat" readonly required>
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" id="long" name="long" readonly required>
                    </div>
                    <input type="hidden" class="form-control" name="tipe" value="gudang">

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Foto Bangunan</h3>
            </div>
        </div>

    </div>
    <!-- /.col -->
</div>
@endsection
@push('js')

<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })

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

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>


<script>
    var map = L.map('mapid').setView([-3.327653847548605,114.5884147286779], 16);
    googleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);
  
    //L.marker([-3.327653847548605,114.5884147286779]).addTo(map);  

    var theMarker = {};
    
    map.on('click', function(e) {
        
        document.getElementById("lat").value = e.latlng.lat;
        document.getElementById("long").value = e.latlng.lng;
        
        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };
        
        theMarker = L.marker([e.latlng.lat,e.latlng.lng]).addTo(map);  
    });
    
</script>
@endpush