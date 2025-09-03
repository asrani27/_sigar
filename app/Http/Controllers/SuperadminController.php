<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bangunan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public function foto_ritel(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required|image|max:5120', // max 5MB
        ]);

        $path = $request->file('foto')->store('foto-bangunan', 'public');
        $filename = basename($path);
        Bangunan::find($id)->update([
            'gambar' => $filename,
        ]);

        return back()->with('success', 'Foto berhasil diupload: ' . $path);
    }

    public function foto_gudang(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required|image|max:5120', // max 5MB
        ]);

        $path = $request->file('foto')->store('foto-bangunan', 'public');
        $filename = basename($path);
        Bangunan::find($id)->update([
            'gambar' => $filename,
        ]);

        return back()->with('success', 'Foto berhasil diupload: ' . $path);
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

    public function pdf_ritel()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_ritel.pdf';
        $data = Bangunan::where('tipe', 'ritel')->orderBy('id', 'DESC')->get();
        $pdf = Pdf::loadView('pdf.ritel', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper([0, 0, 800, 1100], 'landscape');
        return $pdf->stream($filename);
    }
    public function pdf_gudang()
    {
        $filename = Carbon::now()->format('d-m-Y-H-i-s') . '_gudang.pdf';
        $data = Bangunan::where('tipe', 'ritel')->orderBy('id', 'DESC')->get();
        $pdf = Pdf::loadView('pdf.gudang', compact('data'))->setOption([
            'enable_remote' => true,
        ])->setPaper([0, 0, 800, 1100], 'landscape');
        return $pdf->stream($filename);
    }
}
