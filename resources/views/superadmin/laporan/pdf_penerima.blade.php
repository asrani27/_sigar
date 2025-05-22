<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>

    <table width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/logo-kalsel.png'))) }}"
                    width="70px"> &nbsp;&nbsp;
            </td>
            <td style="text-align: center;" width="60%">
                <font size="24px"><b>DINAS SOSIAL <br />
                        PEMERINTAH PROVINSI KALIMANTAN SELATAN<br /></b></font>
                Jl. Letjend. R. Soeprapto No.8, Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan
                Selatan 70231h
            </td>
            <td width="15%">
            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA PENERIMA BANTUAN<br>PERIODE : {{angkaKeBulan($bulan)}} -
        {{$tahun}}
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tgl Lahir</th>
            <th>Tempat Lahir</th>
            <th>Jkel</th>
            <th>Agama</th>
            <th>Kab/Kota</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>DiInput Oleh</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->penerima}}</td>
            <td>{{$item->tanggal_lahir}}</td>
            <td>{{$item->tempat_lahir}}</td>
            <td>{{$item->jkel}}</td>
            <td>{{$item->agama}}</td>
            <td>{{$item->kabupaten}}</td>
            <td>{{$item->telp}}</td>
            <td>{{$item->alamat}}</td>

            <td>
                @if ($item->status == null)
                <span class="badge badge-warning">di proses</span>
                @elseif($item->status == 'diterima')
                <span class="badge badge-success">{{$item->status}}</span>
                @else
                <span class="badge badge-danger">{{$item->status}}</span>
                @endif
            </td>
            <td>
                @if ($item->user == null)
                Admin
                @else
                {{$item->user->name}}
                @endif
            </td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Banjarmasin, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Kepala Dinas Sosial <br />Provinsi Kalimantan Selatan<br /><br /><br /><br /><br />

                <u>-</u><br />
                NIP.
            </td>
        </tr>
    </table>
</body>

</html>