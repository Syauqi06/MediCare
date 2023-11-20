<?php

use App\Http\Controllers\historyController;
use App\Http\Controllers\MasukObatController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\ApotekerController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['guest'])->group(function () {
//     Route::get('/', [AuthController::class, 'index'])->name('login');
//     Route::post('/', [AuthController::class, 'login']);
// });

// Route::get('/home', function () {
//     return redirect('dashboard/surat');
// });

// Route::middleware(['auth'])->group(function () {

Route::prefix('apoteker')->group(function () {
    //Data Apoteker
    Route::get('/data', [ApotekerController::class, 'index']);
    Route::get('/data/tambah', [ApotekerController::class, 'create']);
    Route::post('/data/simpan', [ApotekerController::class, 'store']);
    Route::get('/data/edit/{id}', [ApotekerController::class, 'edit']);
    Route::post('/data/edit/simpan', [ApotekerController::class, 'update']);
    Route::delete('/data/hapus', [ApotekerController::class, 'destroy']);

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

    //Masuk Obat
    Route::get('/masuk_obat', [MasukObatController::class, 'index']);
    Route::get('/masuk_obat/tambah', [MasukObatController::class, 'create']);
    Route::post('/masuk_obat/simpan', [MasukObatController::class, 'store']);
    Route::get('/masuk_obat/edit/{id}', [MasukObatController::class, 'edit']);
    Route::post('/masuk_obat/edit/simpan', [MasukObatController::class, 'update']);
    Route::delete('/masuk_obat/hapus', [MasukObatController::class, 'destroy']);
});
Route::prefix('resepsionis')->group(function () {

});
Route::prefix('history')->group(function () {
    Route::get('/logs', [historyController::class, 'index']);
    Route::post('/logs/hapus', [historyController::class, 'destroy']);
});
// Route::get('/logout', [AuthController::class, 'logout']);
// });