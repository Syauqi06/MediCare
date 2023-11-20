<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

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
Route::get('/pasien', [PasienController::class, 'index']);
Route::get('/', function () {
    return view('templates/layout');
});



// pasien
Route::prefix('pasien')->group(function () {
    Route::get('/data', [PasienController::class, 'index']);
    Route::get('/data/tambah', [PasienController::class, 'create']);
    Route::post('/data/simpan', [PasienController::class, 'store']);
    Route::get('/data/edit/{id}', [PasienController::class, 'edit']);
    Route::get('/data/detail/{id}', [PasienController::class, 'detail']);
    Route::post('/data/edit/simpan', [PasienController::class, 'update']);
    Route::delete('/data/hapus', [PasienController::class, 'destroy']);
});

//account
Route::prefix('account')->group(function () {
    Route::get('/data', [AkunController::class, 'index']);
    Route::get('/data/tambah', [AkunController::class, 'create']);
    Route::post('/data/simpan', [AkunController::class, 'store']);
    Route::get('/data/edit/{id}', [AkunController::class, 'edit']);
    Route::get('/data/detail/{id}', [AkunController::class, 'detail']);
    Route::post('/data/edit/simpan', [AkunController::class, 'update']);
    Route::delete('/data/hapus', [AkunController::class, 'destroy']);
});