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
    <h3 style="text-align: center">LAPORAN DATA DISTRIBUSI BANTUAN<br>PERIODE : {{angkaKeBulan($bulan)}} -
        {{$tahun}}
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Penerima</th>
            <th>Nama Petugas</th>
            <th>Pangan Yg Diterima</th>
            <th>keterangan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
            <td>{{$item->penerima == null ? '-' : $item->penerima->penerima}}</td>
            <td>{{$item->petugas == null ? '-' : $item->petugas->nama}}</td>
            <td>{{$item->pangan == null ? '-' : $item->pangan->nama}}</td>
            <td>{{$item->keterangan}}</td>



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