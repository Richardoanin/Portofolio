<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PsikologController;
use App\Http\Controllers\Admin\ProductRequest;
use App\Http\Controllers\PembelianController;



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

// Route::get('/', function () {
//     return view('landing');
// });

Route::get('/', [LandingController::class, 'index']);

Route::get('/masuk', function () {
    return view('login');
})->name('masuk');

Route::post('/profile', [LoginController::class, 'login']);
Route::post('/masuk', [LoginController::class, 'login']);
Route::get('daftar', [RegistController::class, 'index'])->name('daftar');
Route::post('daftar', [RegistController::class, 'store']);
Route::get('profile/{id}', [ProfileController::class, 'show']);
Route::get('/edit/{id}', [ProfileController::class, 'edit']);
Route::post('/edit/{id}', [ProfileController::class, 'update']);
Route::get('/logout', [ProfileController::class, 'logout']);
Route::get('schedule/{userId}', [ProfileController::class, 'schedule']);
Route::get('payment/{userId}', [ProfileController::class, 'payment']);
Route::get('video', [ProfileController::class, 'video']);

//Admin
Route::get('/admin', [DashboardController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/payment', [PaymentController::class, 'index']);
Route::post('/payment/edit/{id}', [PaymentController::class, 'update']);
Route::get('/product/AddProduct', function () { return view('/admin/AddProduct');});
Route::post('/product/add', [ProductController::class, 'store']);
Route::get('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/update/{id}', [ProductController::class, 'update']);
Route::post('/product/destroy/{id}', [ProductController::class, 'destroy']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/landing', [ProfileController::class, 'akun']);
});

Route::get('jadwal/{id}', [PsikologController::class, 'index']);
Route::get('/chat', [PsikologController::class, 'chat']);
Route::get('/profil', [PsikologController::class, 'profil']);
Route::get('/profil/{id}', [PsikologController::class, 'show']);
Route::get('/edit/psikolog/{id}', [PsikologController::class, 'edit']);
Route::post('/update/psikolog/{id}', [PsikologController::class, 'update']);
Route::post('/input/jadwal/{id}', [PsikologController::class, 'input']);


Route::post('/upload/bukti/{id}', [PembelianController::class, 'upload']);
Route::post('/bayar', [PembelianController::class, 'bayar']);
