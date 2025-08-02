@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12 text-center">
        <img src="/logo/bjm.png" width="5%"><br /><br />
        <h2>Selamat Datang di Aplikasi SIGAR Perdagin</h2>
    </div>
</div>
<h5 class="mb-2">TOTAL RITEL MODERN : {{totalritel()}}</h5>
<div class="row">
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/ritel/banjarmasinutara" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM UTARA</span>
                    <span class="info-box-number">{{ritel('banjarmasinutara')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/ritel/banjarmasinbarat" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM BARAT</span>
                    <span class="info-box-number">{{ritel('banjarmasinbarat')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/ritel/banjarmasinselatan" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM SELATAN</span>
                    <span class="info-box-number">{{ritel('banjarmasinselatan')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/ritel/banjarmasintimur" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM TIMUR</span>
                    <span class="info-box-number">{{ritel('banjarmasintimur')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/ritel/banjarmasintengah" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM TENGAH</span>
                    <span class="info-box-number">{{ritel('banjarmasintengah')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>

</div>

<h5 class="mb-2">TOTAL GUDANG : {{totalgudang()}}</h5>
<div class="row">
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/gudang/banjarmasinutara" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM UTARA</span>
                    <span class="info-box-number">{{gudang('banjarmasinutara')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/gudang/banjarmasinbarat" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM BARAT</span>
                    <span class="info-box-number">{{gudang('banjarmasinbarat')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/gudang/banjarmasinselatan" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM SELATAN</span>
                    <span class="info-box-number">{{gudang('banjarmasinselatan')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/gudang/banjarmasintimur" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM TIMUR</span>
                    <span class="info-box-number">{{gudang('banjarmasintimur')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <a href="/gudang/banjarmasintengah" style="color:black">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="far fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">BJM TENGAH</span>
                    <span class="info-box-number">{{gudang('banjarmasintengah')}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>

</div>
@endsection

@push('js')

@endpush