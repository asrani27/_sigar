@extends('welcome')
@push('css')

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
                <h3 class="card-title">Detail Bangunan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-home mr-1"></i> Nama Bangunan</strong>

                <p class="text-muted">
                    {{$data->nama_bangunan}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> No Izin</strong>
                <p class="text-muted">
                    {{$data->no_izin}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Nama Pemilik</strong>
                <p class="text-muted">
                    {{$data->nama_pemilik}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Kontak Pemilik</strong>
                <p class="text-muted">
                    {{$data->kontak_pemilik}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Alamat</strong>
                <p class="text-muted">
                    {{$data->alamat}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Kelurahan</strong>
                <p class="text-muted">
                    {{$data->kelurahan}}
                </p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Kecamatan</strong>
                <p class="text-muted">
                    {{$data->kecamatan}}
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Peruntukkan</strong>
                <p class="text-muted">
                    {{$data->peruntukan}}
                </p>

                <hr>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
            <div id="mapid"></div>
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-4">
        <div class="card"
            style="background-image: url('/assets/dist/img/photo1.png'); background-size:cover;height:50%">

        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

@endsection
@push('js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>


<script>
    var lokasi = {!! json_encode($data) !!};
    console.log(lokasi);

    var map = L.map('mapid').setView([lokasi.lat, lokasi.long], 16);
    googleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);
    var marker = L.marker([lokasi.lat, lokasi.long]).addTo(map);
    L.marker([lokasi.lat, lokasi.long]).addTo(map)
    .bindPopup(lokasi.nama_bangunan)
    .openPopup();
</script>
@endpush