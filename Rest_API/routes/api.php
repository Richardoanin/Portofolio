<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PengirimController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/barang',[ApiController::class, 'create']);
Route::get('/barangs',[ApiController::class, 'show']);
Route::get('/barangs/{id}',[ApiController::class, 'showId']);
Route::put('/update/{id}',[ApiController::class, 'update']);
Route::delete('/delete/{id}',[ApiController::class, 'delete']);

// Penerima
Route::post('/penerima', [PenerimaController::class, 'create']);
Route::get('/penerimas', [PenerimaController::class, 'show']);
Route::get('/penerimas/{id}',[PenerimaController::class, 'showId']);
Route::put('/penerima/update/{id}', [PenerimaController::class, 'update']);
Route::delete('/penerima/delete/{id}', [PenerimaController::class, 'delete']);

// Pengirim
Route::post('/pengirim', [PengirimController::class, 'create']);
Route::get('/pengirims', [PengirimController::class, 'show']);
Route::get('/pengirims/{id}',[PengirimController::class, 'showId']);
Route::put('/pengirim/update/{id}', [PengirimController::class, 'update']);
Route::delete('/pengirim/delete/{id}', [PengirimController::class, 'delete']);

// Pengiriman
Route::get('/pengiriman', [PengirimanController::class, 'show']);
Route::get('/pengiriman/{id}',[PengirimanController::class, 'showData']);
Route::delete('/pengiriman/delete/{id}', [PengirimanController::class, 'delete']);
Route::post('/pengirimans', [PengirimanController::class, 'create']);