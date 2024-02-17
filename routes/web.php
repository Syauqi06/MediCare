<?php


use App\Http\Controllers\historyController;
use App\Http\Controllers\MasukObatController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\DashboardController;
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


Route::get('/',[AuthController::class,'index']);
Route::post('/',[AuthController::class,'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('apoteker')->middleware(['akses:apoteker'])->group(function () {
    Route::get('/resep', [ResepObatController::class, 'index']);
    Route::get('/rekam', [RekamMedisController::class, 'index']);
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::prefix('data_obat')->group(function () {
    //Tipe Obat  
    Route::get('/tipe', [TipeController::class, 'index']);
    Route::get('/tipe/tambah', [TipeController::class, 'create']);
    Route::post('/tipe/simpan', [TipeController::class, 'store']);
    Route::get('/tipe/edit/{id}', [TipeController::class, 'edit']);
    Route::post('/tipe/edit/simpan', [TipeController::class, 'update']);
    Route::delete('/tipe/hapus', [TipeController::class, 'destroy']);

    //Obat
    Route::get('/obat', [ObatController::class, 'index']);
    Route::get('/obat/detail/{id}', [ObatController::class, 'detail']);
    Route::get('/obat/tambah', [ObatController::class, 'create']);
    Route::post('/obat/simpan', [ObatController::class, 'store']);
    Route::get('/obat/edit/{id}', [ObatController::class, 'edit']);
    Route::post('/obat/edit/simpan', [ObatController::class, 'update']);
    Route::delete('/obat/hapus', [ObatController::class, 'destroy']);
    Route::get('/obat/cetak', [ObatController::class, 'unduh']);
    

    //Masuk Obat
    Route::get('/masuk_obat', [MasukObatController::class, 'index']);
    Route::get('/masuk_obat/tambah', [MasukObatController::class, 'create']);
    Route::post('/masuk_obat/simpan', [MasukObatController::class, 'store']);
    Route::get('/masuk_obat/edit/{id}', [MasukObatController::class, 'edit']);
    Route::post('/masuk_obat/edit/simpan', [MasukObatController::class, 'update']);
    Route::delete('/masuk_obat/hapus', [MasukObatController::class, 'destroy']);
});
    });

Route::prefix('resepsionis')->middleware(['akses:resepsionis'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    //Pendaftarab=n
    Route::prefix('data-pendaftaran')->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index']);
    Route::get('/pendaftaran/tambah', [PendaftaranController::class, 'create']);
    Route::post('/pendaftaran/simpan', [PendaftaranController::class, 'store']);
    Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit']);
    Route::post('/pendaftaran/edit/simpan', [PendaftaranController::class, 'update']);
    Route::delete('/pendaftaran/hapus', [PendaftaranController::class, 'destroy']);
});
    //Pasien
    Route::prefix('data-pasien')->group(function () {
    Route::get('/pasien', [PasienController::class, 'index']);
    Route::get('/pasien/tambah', [PasienController::class, 'create']);
    Route::post('/pasien/simpan', [PasienController::class, 'store']);
    Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);
    Route::get('/pasien/detail/{id}', [PasienController::class, 'detail']);
    Route::post('/pasien/edit/simpan', [PasienController::class, 'update']);
    Route::delete('/pasien/hapus', [PasienController::class, 'destroy']);
    });
});

Route::prefix('asisten')->middleware(['akses:asisten'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    //Poli
    Route::prefix('daftar')->group(function () {
        Route::get('/poli', [PoliController::class, 'index']);
        Route::get('/poli-tambah', [PoliController::class, 'create']);
        Route::post('/poli-simpan', [PoliController::class, 'store']);
        Route::get('/poli-edit/{id}', [PoliController::class, 'edit']);
        Route::post('/poli-edit/simpan', [PoliController::class, 'update']);
        Route::delete('/poli-hapus', [PoliController::class, 'destroy']);
    });
    
    //Rekam Medis
    Route::prefix('data-rekam')->group(function () {
        Route::get('/rekam', [RekamMedisController::class, 'index']);
        Route::get('/rekam-detail/{id}', [RekamMedisController::class, 'detail']);
        Route::get('/rekam-tambah', [RekamMedisController::class, 'create']);
        Route::post('/rekam-simpan', [RekamMedisController::class, 'store']);
        Route::get('/rekam-edit/{id}', [RekamMedisController::class, 'edit']);
        Route::post('/rekam-edit/simpan', [RekamMedisController::class, 'update']);
        Route::delete('/rekam-hapus', [RekamMedisController::class, 'destroy']);
        Route::get('/rekam/cetak', [RekamMedisController::class, 'unduh']);
    });

    //Resep Obat
    Route::prefix('data-resep')->group(function () {
        Route::get('/resep', [ResepObatController::class, 'index']);
        Route::get('/resep-detail/{id}', [ResepObatController::class, 'detail']);
        Route::get('/resep-tambah', [ResepObatController::class, 'create']);
        Route::post('/resep-simpan', [ResepObatController::class, 'store']);
        Route::get('/resep-edit/{id}', [ResepObatController::class, 'edit']);
        Route::post('/resep-edit/simpan', [ResepObatController::class, 'update']);
        Route::delete('/resep-hapus', [ResepObatController::class, 'destroy']);
        Route::get('/resep/cetak', [ResepObatController::class, 'unduh']);
    });

        //Dokter
        Route::prefix('data-dokter')->group(function () {
            Route::get('/dokter', [DokterController::class, 'index']);
            Route::get('/dokter-detail/{id}', [DokterController::class, 'detail']);
            Route::get('/dokter-tambah', [DokterController::class, 'create']);
            Route::post('/dokter-simpan', [DokterController::class, 'store']);
            Route::get('/dokter-edit/{id}', [DokterController::class, 'edit']);
            Route::post('/dokter-edit/simpan', [DokterController::class, 'update']);
            Route::delete('/dokter-hapus', [DokterController::class, 'destroy']);
        });
    });
        Route::prefix('history')->group(function () {
            Route::get('/logs', [historyController::class, 'index']);
            Route::post('/logs/hapus', [historyController::class, 'destroy']);
        });
     });

