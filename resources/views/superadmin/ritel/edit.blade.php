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
                <h3 class="card-title">Edit Data Bangunan</h3>
            </div>

            <form method="post" action="/superadmin/ritel/edit/{{$data->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Bangunan</label>
                        <input type="text" class="form-control" name="nama_bangunan" value="{{$data->nama_bangunan}}">
                    </div>
                    <div class="form-group">
                        <label>No Izin</label>
                        <input type="text" class="form-control" name="no_izin" value="{{$data->no_izin}}">
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control" name="nama_pemilik" value="{{$data->nama_pemilik}}">
                    </div>
                    <div class="form-group">
                        <label>Kontak Pemilik</label>
                        <input type="text" class="form-control" name="kontak_pemilik" value="{{$data->kontak_pemilik}}">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
                    </div>
                    <div class="form-group">
                        <label>Kelurahan</label>
                        <select class="form-control select2" name="kelurahan">
                            @foreach (kelurahan() as $item)
                            <option value="{{$item->kelurahan}}" {{$data->kelurahan == $item->kelurahan ?
                                'selected':''}}>{{$item->kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan">
                    </div> --}}
                    <div class="form-group">
                        <label>Peruntukan</label>
                        <input type="text" class="form-control" name="peruntukan" value="{{$data->peruntukan}}">
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan"
                            value="{{$data->nama_perusahaan}}">
                    </div>
                    <div class="form-group">
                        <label>no IMB</label>
                        <input type="text" class="form-control" name="no_imb" value="{{$data->no_imb}}">
                    </div>


                    <div id="mapid"></div>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" id="lat" name="lat" readonly required
                            value="{{$data->lat}}">
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" id="long" name="long" readonly required
                            value="{{$data->long}}">
                    </div>
                    <input type="hidden" class="form-control" name="tipe" value="ritel">

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>
        </div>

    </div>

    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Upload Foto Bangunan</h3>
            </div>
            <div class="card-body text-center">
                <form action="/superadmin/ritel/foto/{{$data->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="foto" accept="image/*" capture="environment" onchange="this.form.submit()"
                        style="display:none;" id="takePhotoInput">

                    <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('takePhotoInput').click()">
                        Take A Photo
                    </button>
                </form>
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
    var latlng = {!!json_encode($latlong)!!}
    
    var map = L.map('mapid').setView(latlng, 16);
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);
  
    L.marker([latlng.lat,latlng.lng]).addTo(map);  

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