<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\ContactController;
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
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Auth::routes();
Route::post('dologin', [AuthController::class, 'dologin'])->name('dologin');
Route::post('doregister', [AuthController::class, 'doregister'])->name('doregister');
Route::get('logout', [AuthController::class, 'logout'])->name('dologout');
Route::resource('menu', MenuController::class);
Route::get('order/create/{id}', [OrderController::class, 'create'])->name('order.create');
Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
Route::resource('status', StatusController::class);
Route::resource('web', WebController::class);
Route::resource('contact', ContactController::class);
Route::resource('operational', OperationalController::class);