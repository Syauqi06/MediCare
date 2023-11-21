<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\ResepsionisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Jika belom login, maka muncul
// Route::middleware(['guest'])->group(function () {
//     Route::get('/', [AuthController::class, 'index'])->name('login');
//     Route::post('/', [AuthController::class, 'check']);
// });

// Jika sudah login, kembali ke dalam halaman 
Route::get('/',[AuthController::class,'index']);
Route::post('login',[AuthController::class,'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    //Resepsionis
    // Route::prefix('pendaftaran')->group(function () {
    //     Route::get('/resepsionis', [ResepsionisController::class, 'index']);
    //     Route::get('/resepsionis/tambah', [ResepsionisController::class, 'create']);
    //     Route::post('/resepsionis/simpan', [ResepsionisController::class, 'store']);
    //     Route::get('/resepsionis/edit/{id}', [ResepsionisController::class, 'edit']);
    //     Route::get('/resepsionis/detail/{id}', [ResepsionisController::class, 'detail']);
    //     Route::post('/resepsionis/edit/simpan', [ResepsionisController::class, 'update']);
    //     Route::delete('/resepsionis/hapus', [ResepsionisController::class, 'destroy']);
    // });

    //Poli
    Route::prefix('daftar')->group(function () {
        Route::get('/poli', [PoliController::class, 'index']);
        Route::get('/poli-tambah', [PoliController::class, 'create']);
        Route::post('/poli-simpan', [PoliController::class, 'store']);
        Route::get('/poli-edit/{id}', [PoliController::class, 'edit']);
        Route::post('/poli-edit/simpan', [PoliController::class, 'update']);
        Route::delete('/poli-hapus', [PoliController::class, 'destroy']);
    });

    // Pasien
    // Route::prefix('dashboard')->group(function () {
    //     Route::get('/pasien', [PasienController::class, 'index']);
    //     Route::get('/pasien/tambah', [PasienController::class, 'create']);
    //     Route::post('/pasien/simpan', [PasienController::class, 'store']);
    //     Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);
    //     Route::get('/pasien/detail/{id}', [PasienController::class, 'detail']);
    //     Route::post('/pasien/edit/simpan', [PasienController::class, 'update']);
    //     Route::delete('/pasien/hapus', [PasienController::class, 'destroy']);
    // });

    //Apoteker
    // Route::prefix('obat')->group(function () {
    //     Route::get('/apoteker', [ApotekerController::class, 'index']);
    //     Route::get('/apoteker/tambah', [ApotekerController::class, 'create']);
    //     Route::post('/apoteker/simpan', [ApotekerController::class, 'store']);
    //     Route::get('/apoteker/edit/{id}', [ApotekerController::class, 'edit']);
    //     Route::post('/apoteker/edit/simpan', [ApotekerController::class, 'update']);
    //     Route::delete('/apoteker/hapus', [ApotekerController::class, 'destroy']);
    // });

    //Tipe Obat
    // Route::prefix('obat')->group(function () {
    //     Route::get('/tipe', [TipeController::class, 'index']);
    //     Route::get('/tipe/tambah', [TipeController::class, 'create']);
    //     Route::post('/tipe/simpan', [TipeController::class, 'store']);
    //     Route::get('/tipe/edit/{id}', [TipeController::class, 'edit']);
    //     Route::post('/tipe/edit/simpan', [TipeController::class, 'update']);
    //     Route::delete('/tipe/hapus', [TipeController::class, 'destroy']);
    // });

    //Rekam Medis
    Route::prefix('rekam')->group(function () {
        Route::get('/asisten', [RekamMedisController::class, 'index']);
        Route::get('/rekam-tambah', [RekamMedisController::class, 'create']);
        Route::post('/rekam-simpan', [RekamMedisController::class, 'store']);
        Route::get('/rekam-edit/{id}', [RekamMedisController::class, 'edit']);
        Route::post('/rekam-edit/simpan', [RekamMedisController::class, 'update']);
        Route::delete('/rekam-hapus', [RekamMedisController::class, 'destroy']);
    });

    //Resep Obat
    Route::prefix('resep')->group(function () {
        Route::get('/asisten', [ResepObatController::class, 'index']);
        Route::get('/resep-tambah', [ResepObatController::class, 'create']);
        Route::post('/resep-simpan', [ResepObatController::class, 'store']);
        Route::get('/resep-edit/{id}', [ResepObatController::class, 'edit']);
        Route::post('/resep-edit/simpan', [ResepObatController::class, 'update']);
        Route::delete('/resep-hapus', [ResepObatController::class, 'destroy']);
    });

    //Transaksi klinik
    // Route::prefix('transaksi')->group(function () {
    //     Route::get('/klinik', [TransaksiController::class, 'index']);
    //     Route::post('/klinik/hapus', [TransaksiController::class, 'destroy']);
    // });

    //Akun
    // Route::prefix('dashboard')->group(function () {
    //     Route::get('/akun', [AkunController::class, 'index']);
    //     Route::get('/akun/tambah', [AkunController::class, 'create']);
    //     Route::post('/akun/simpan', [AkunController::class, 'store']);
    //     Route::delete('/akun/hapus/', [AkunController::class, 'destroy']);
    //     Route::post('/akun/simpan', [AkunController::class, 'store']);
    //     Route::get('/akun/edit/{id}', [AkunController::class, 'edit']);
    //     Route::post('/akun/edit/simpan', [AkunController::class, 'update']);
    //     Route::delete('/akun/hapus', [AkunController::class, 'destroy']);
    // });

        //Dokter
        Route::prefix('dashboard')->group(function () {
            Route::get('/dokter', [DokterController::class, 'index']);
            Route::get('/dokter-tambah', [DokterController::class, 'create']);
            Route::post('/dokter-simpan', [DokterController::class, 'store']);
            Route::get('/dokter-edit/{id}', [DokterController::class, 'edit']);
            Route::post('/dokter-edit/simpan', [DokterController::class, 'update']);
            Route::delete('/dokter-hapus', [DokterController::class, 'destroy']);
        });

     //Profil
    //  Route::prefix('dashboard')->group(function () {
    //     Route::get('/profile', [ProfileController::class, 'index']);
    //     Route::get('/profile/edit/{id}', [ProfileController::class, 'edit']);
    //     Route::post('/profile/edit/simpan', [ProfileController::class, 'update']);
    // });

    //Logout
    // Route::prefix('auth')->group(function(){
    //    Route::get('/',[AuthController::class, 'index']);
    //    Route::get('/logout',[AuthController::class, 'logout']);
    //    Route::post('/check',[AuthController::class,'check']);
     });