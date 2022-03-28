<?php

use App\Http\Controllers\patientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/patient/create/{id}/', 'patientController@create');
Route::get('/patient/register/', 'patientController@register');

Route::resource('vaccine', vaccineController::class);
Route::resource('patient', 'patientController', ['except' => ['create']]);
