<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Penerima;
use App\Models\Tksk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifikasiController extends Controller
{
    public function index()
    {
        $data = Penerima::where('status', '!=', null)->paginate(10);
        return view('superadmin.verifikasi.index', compact('data'));
    }
    public function add()
    {
        $penerima = Penerima::where('status',  null)->get();
        $tksk = Tksk::get();
        return view('superadmin.verifikasi.create', compact('penerima', 'tksk'));
    }
    public function edit($id)
    {
        $penerima = Penerima::where('status',  null)->get();
        $tksk = Tksk::get();
        $data = Penerima::find($id);
        return view('superadmin.verifikasi.edit', compact('penerima', 'tksk', 'data'));
    }
    public function delete($id)
    {
        Distribusi::where('penerima_id', $id)->delete();
        $data = Penerima::find($id);
        $data->status = null;
        $data->tksk_id = null;
        $data->keterangan = null;
        $data->save();
        return back();
    }
    public function store(Request $req)
    {
        $data =  Penerima::find($req->penerima_id);
        $data->status = $req->status;
        $data->tksk_id = $req->tksk_id;
        $data->keterangan = $req->keterangan;
        $data->update();
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/verifikasi');
    }
    public function update(Request $req, $id)
    {
        $data =  Penerima::find($id);
        $data->status = $req->status;
        $data->tksk_id = $req->tksk_id;
        $data->keterangan = $req->keterangan;
        $data->update();
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/verifikasi');
    }
}
