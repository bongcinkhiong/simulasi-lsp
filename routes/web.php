<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KotaController;
use App\Http\Controllers\Admin\MaskapaiController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PenggunaController as AdminPenggunaController;
use App\Http\Controllers\Admin\RuteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pengguna\PenggunaController;
use App\Http\Controllers\Pengguna\TiketController;
use App\Http\Controllers\Petugas\JadwalController as PetugasJadwalController;
use App\Http\Controllers\Petugas\KotaController as PetugasKotaController;
use App\Http\Controllers\Petugas\OrderController as PetugasOrderController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\Petugas\RuteController as PetugasRuteController;
use App\Models\Jadwal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // dd('asd');
    $jadwal = Jadwal::with('rute')->latest()->get();
    return view('welcome', compact('jadwal'));
});

Route::prefix('admin')->middleware('CekRole:admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::prefix('pengguna')->controller(AdminPenggunaController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('maskapai')->controller(MaskapaiController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('kota')->controller(KotaController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('rute')->controller(RuteController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('jadwal')->controller(JadwalController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('konfirmasi')->controller(OrderController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/riwayat', 'riwayat');
        Route::get('/{id}/terima', 'terima');
        Route::get('/{id}/tolak', 'tolak');
        Route::get('/{id}/hapus', 'hapus');
    });

});

Route::prefix('petugas')->middleware('CekRole:petugas')->group(function () {
    Route::get('/', [PetugasController::class, 'index']);

    Route::prefix('kota')->controller(PetugasKotaController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('rute')->controller(PetugasRuteController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('jadwal')->controller(PetugasJadwalController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('konfirmasi')->controller(PetugasOrderController::class)->group(function () {

        Route::get('/', 'index');
        Route::get('/riwayat', 'riwayat');
        Route::get('/{id}/terima', 'terima');
        Route::get('/{id}/tolak', 'tolak');
    });
});

Route::prefix('pengguna')->middleware('CekRole:pengguna')->group(function () {
    Route::get('/', [PenggunaController::class, 'index']);

    Route::controller(TiketController::class)->group(function () {
        Route::get('/jadwal','jadwal');
        Route::post('/jadwal/konfirmasi','konfirmasi');
        Route::get('/jadwal/{id}','show');
        Route::get('/riwayat','riwayat');
        Route::get('/riwayat/{id}','detail');
        Route::post('/jadwal/pesan','pesan');
        Route::get('/jadwal/riwayat/{id}','detailRiwayat');
    });
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/login','index')->name('login');
    Route::post('/login','login');
    Route::get('/register','register');
    Route::post('/register','store');
    Route::get('/logout','logout');
});
