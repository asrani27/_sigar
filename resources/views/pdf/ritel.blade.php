<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th style="text-align: center">No</th>
            <th style="text-align: center">Nama Bangunan</th>
            <th style="text-align: center">Tipe</th>
            <th style="text-align: center">Nama Pemilik</th>
            <th style="text-align: center">No HP</th>
            <th style="text-align: center">Alamat</th>
            <th style="text-align: center">Kecamatan</th>
            <th style="text-align: center">No Izin</th>
            <th style="text-align: center">Kelurahan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr style="font-family: Arial, Helvetica, sans-serif; font-size:12px">
            <td style="text-align: center;">{{1 + $key}}</td>
            <td style="text-align: center;">{{$item->nama_bangunan}}</td>
            <td style="text-align: center;">{{$item->tipe}}</td>
            <td style="text-align: center;">{{$item->nama_pemilik}}</td>
            <td style="text-align: center;">{{$item->kontak_pemilik}}</td>
            <td style="text-align: center;">{{$item->alamat}}</td>
            <td style="text-align: center;">{{$item->kecamatan}}</td>
            <td style="text-align: center;">{{$item->no_izin}}</td>
            <td style="text-align: center;">{{$item->kelurahan}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>