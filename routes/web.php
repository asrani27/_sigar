<?php

use App\Models\Deviasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IkpaController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\TkskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\PanganController;
use App\Http\Controllers\RevisiController;
use App\Http\Controllers\DeviasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\PenyerapanController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\AdminRevisiController;
use App\Http\Controllers\AdminDeviasiController;
use App\Http\Controllers\AdminPenyerapanController;
use App\Http\Controllers\BangunanController;

Route::get('/', [LoginController::class, 'welcome']);
Route::get('/ritel', [BangunanController::class, 'ritel']);
Route::get('/gudang', [BangunanController::class, 'gudang']);
Route::get('/ritel/{kecamatan}', [BangunanController::class, 'ritel_kecamatan']);
Route::get('/gudang/{kecamatan}', [BangunanController::class, 'gudang_kecamatan']);
Route::get('/detail/{id}', [BangunanController::class, 'detail']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar', [DaftarController::class, 'store']);

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard']);

    Route::get('/user/ajukan', [UserController::class, 'ajukan']);
    Route::get('/user/ajukan/add', [UserController::class, 'add_ajukan']);
    Route::post('/user/ajukan/add', [UserController::class, 'store_ajukan']);
    Route::get('/user/ajukan/edit/{id}', [UserController::class, 'edit_ajukan']);
    Route::post('/user/ajukan/edit/{id}', [UserController::class, 'update_ajukan']);
    Route::get('/user/ajukan/delete/{id}', [UserController::class, 'delete_ajukan']);

    Route::get('/user/pengaduan', [UserController::class, 'pengaduan']);
    Route::get('/user/pengaduan/add', [UserController::class, 'add_pengaduan']);
    Route::post('/user/pengaduan/add', [UserController::class, 'store_pengaduan']);
    Route::get('/user/pengaduan/edit/{id}', [UserController::class, 'edit_pengaduan']);
    Route::post('/user/pengaduan/edit/{id}', [UserController::class, 'update_pengaduan']);
    Route::get('/user/pengaduan/delete/{id}', [UserController::class, 'delete_pengaduan']);
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin', [HomeController::class, 'superadmin']);
    Route::get('/superadmin/pengaduan', [PengaduanController::class, 'index']);
    Route::get('/superadmin/laporan', [LaporanController::class, 'index']);

    Route::get('/superadmin/laporan/bulan', [LaporanController::class, 'bulan']);
    Route::get('/superadmin/petugas', [PetugasController::class, 'index']);
    Route::get('/superadmin/petugas/add', [PetugasController::class, 'add']);
    Route::post('/superadmin/petugas/add', [PetugasController::class, 'store']);
    Route::get('/superadmin/petugas/edit/{id}', [PetugasController::class, 'edit']);
    Route::post('/superadmin/petugas/edit/{id}', [PetugasController::class, 'update']);
    Route::get('/superadmin/petugas/delete/{id}', [PetugasController::class, 'delete']);

    Route::get('/superadmin/tksk', [TkskController::class, 'index']);
    Route::get('/superadmin/tksk/add', [TkskController::class, 'add']);
    Route::post('/superadmin/tksk/add', [TkskController::class, 'store']);
    Route::get('/superadmin/tksk/edit/{id}', [TkskController::class, 'edit']);
    Route::post('/superadmin/tksk/edit/{id}', [TkskController::class, 'update']);
    Route::get('/superadmin/tksk/delete/{id}', [TkskController::class, 'delete']);

    Route::get('/superadmin/pangan', [PanganController::class, 'index']);
    Route::get('/superadmin/pangan/add', [PanganController::class, 'add']);
    Route::post('/superadmin/pangan/add', [PanganController::class, 'store']);
    Route::get('/superadmin/pangan/edit/{id}', [PanganController::class, 'edit']);
    Route::post('/superadmin/pangan/edit/{id}', [PanganController::class, 'update']);
    Route::get('/superadmin/pangan/delete/{id}', [PanganController::class, 'delete']);


    Route::get('/superadmin/distribusi', [DistribusiController::class, 'index']);
    Route::get('/superadmin/distribusi/add', [DistribusiController::class, 'add']);
    Route::post('/superadmin/distribusi/add', [DistribusiController::class, 'store']);
    Route::get('/superadmin/distribusi/edit/{id}', [DistribusiController::class, 'edit']);
    Route::post('/superadmin/distribusi/edit/{id}', [DistribusiController::class, 'update']);
    Route::get('/superadmin/distribusi/delete/{id}', [DistribusiController::class, 'delete']);

    Route::get('/superadmin/verifikasi', [VerifikasiController::class, 'index']);
    Route::get('/superadmin/verifikasi/add', [VerifikasiController::class, 'add']);
    Route::post('/superadmin/verifikasi/add', [VerifikasiController::class, 'store']);
    Route::get('/superadmin/verifikasi/edit/{id}', [VerifikasiController::class, 'edit']);
    Route::post('/superadmin/verifikasi/edit/{id}', [VerifikasiController::class, 'update']);
    Route::get('/superadmin/verifikasi/delete/{id}', [VerifikasiController::class, 'delete']);

    Route::get('/superadmin/penerima', [PenerimaController::class, 'index']);
    Route::get('/superadmin/penerima/add', [PenerimaController::class, 'add']);
    Route::post('/superadmin/penerima/add', [PenerimaController::class, 'store']);
    Route::get('/superadmin/penerima/edit/{id}', [PenerimaController::class, 'edit']);
    Route::post('/superadmin/penerima/edit/{id}', [PenerimaController::class, 'update']);
    Route::get('/superadmin/penerima/delete/{id}', [PenerimaController::class, 'delete']);
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Telah Logout');
    return redirect('/');
});
