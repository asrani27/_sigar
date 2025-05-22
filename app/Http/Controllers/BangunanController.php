<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use Illuminate\Http\Request;

class BangunanController extends Controller
{
    public function ritel()
    {
        $data = Bangunan::where('tipe', 'ritel')->get();
        return view('ritel', compact('data'));
    }
    public function detail($id)
    {
        $data = Bangunan::find($id);
        return view('detail', compact('data'));
    }
    public function gudang()
    {
        $data = Bangunan::where('tipe', 'gudang')->get();
        return view('gudang', compact('data'));
    }
    public function ritel_kecamatan($kecamatan)
    {
        $result = str_replace("banjarmasin", "banjarmasin ", $kecamatan);
        $data = Bangunan::where('tipe', 'ritel')->where('kecamatan', $result)->get();
        return view('ritel', compact('data'));
    }
    public function gudang_kecamatan($kecamatan)
    {
        $result = str_replace("banjarmasin", "banjarmasin ", $kecamatan);
        $data = Bangunan::where('tipe', 'gudang')->where('kecamatan', $result)->get();
        return view('gudang', compact('data'));
    }
}
