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
use App\Http\Controllers\SuperadminController;
use App\Http\Middleware\Superadmin;

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
    Route::get('/superadmin/ritel', [SuperadminController::class, 'ritel']);
    Route::get('/superadmin/ritel/add', [SuperadminController::class, 'add_ritel']);
    Route::post('/superadmin/ritel/add', [SuperadminController::class, 'store_ritel']);
    Route::post('/superadmin/ritel/foto/{id}', [SuperadminController::class, 'foto_ritel']);
    Route::get('/superadmin/ritel/edit/{id}', [SuperadminController::class, 'edit_ritel']);
    Route::post('/superadmin/ritel/edit/{id}', [SuperadminController::class, 'update_ritel']);
    Route::get('/superadmin/ritel/delete/{id}', [SuperadminController::class, 'delete_ritel']);
    Route::get('/superadmin/gudang', [SuperadminController::class, 'gudang']);
    Route::get('/superadmin/gudang/add', [SuperadminController::class, 'add_gudang']);
    Route::post('/superadmin/gudang/foto/{id}', [SuperadminController::class, 'foto_gudang']);
    Route::post('/superadmin/gudang/add', [SuperadminController::class, 'store_gudang']);
    Route::get('/superadmin/gudang/edit/{id}', [SuperadminController::class, 'edit_gudang']);
    Route::post('/superadmin/gudang/edit/{id}', [SuperadminController::class, 'update_gudang']);
    Route::get('/superadmin/gudang/delete/{id}', [SuperadminController::class, 'delete_gudang']);
    Route::get('/superadmin/detail/{id}', [SuperadminController::class, 'detail']);
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Telah Logout');
    return redirect('/');
});
