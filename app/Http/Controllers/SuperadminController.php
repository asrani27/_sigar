<?php

namespace App\Http\Controllers;

use App\Models\Bangunan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuperadminController extends Controller
{
    public function ritel()
    {
        $data = Bangunan::where('tipe', 'ritel')->orderBy('id', 'DESC')->get();
        return view('superadmin.ritel.index', compact('data'));
    }
    public function add_ritel()
    {
        return view('superadmin.ritel.create');
    }

    public function store_ritel(Request $req)
    {
        $param = $req->all();
        $param['kecamatan'] = Kelurahan::where('kelurahan', $req->kelurahan)->first()->kecamatan ?? null;

        Bangunan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/ritel');
    }
    public function edit_ritel($id)
    {
        $data = Bangunan::find($id);

        $latlong = [
            'lat' => $data->lat,
            'lng' => $data->long
        ];
        return view('superadmin.ritel.edit', compact('data', 'latlong'));
    }

    public function update_ritel(Request $req, $id)
    {
        $param = $req->all();
        $param['kecamatan'] = Kelurahan::where('kelurahan', $req->kelurahan)->first()->kecamatan ?? null;
        Bangunan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/ritel');
    }
    public function delete_ritel($id)
    {
        Bangunan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/ritel');
    }
    public function gudang()
    {
        $data = Bangunan::where('tipe', 'gudang')->orderBy('id', 'DESC')->get();
        return view('superadmin.gudang.index', compact('data'));
    }
    public function add_gudang()
    {
        return view('superadmin.gudang.create');
    }

    public function store_gudang(Request $req)
    {
        $param = $req->all();
        $param['kecamatan'] = Kelurahan::where('kelurahan', $req->kelurahan)->first()->kecamatan ?? null;

        Bangunan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/gudang');
    }
    public function edit_gudang($id)
    {
        $data = Bangunan::find($id);

        $latlong = [
            'lat' => $data->lat,
            'lng' => $data->long
        ];
        return view('superadmin.gudang.edit', compact('data', 'latlong'));
    }

    public function update_gudang(Request $req, $id)
    {
        $param = $req->all();
        $param['kecamatan'] = Kelurahan::where('kelurahan', $req->kelurahan)->first()->kecamatan ?? null;
        Bangunan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/gudang');
    }
    public function delete_gudang($id)
    {
        Bangunan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/gudang');
    }
    public function detail($id)
    {
        $data = Bangunan::find($id);
        return view('superadmin.detail', compact('data'));
    }
}
