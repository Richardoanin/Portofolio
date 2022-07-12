<?php

use App\Http\Controllers\Answercontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PartisipanController;
use App\Http\Controllers\PernyataanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SurveyController;
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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/nilai/hapus/{id}', [DashboardController::class, 'destroy']);

    Route::get('/partisipan', [PartisipanController::class, 'partisipan']);
    Route::get('/partisipan/cari', [PartisipanController::class, 'cari']);
    Route::post('/tambah', [PartisipanController::class, 'store']);
    Route::post('/edit/{id}', [PartisipanController::class, 'edit']);
    Route::post('/ubah/{id}', [PartisipanController::class, 'update']);
    Route::post('/hapus/{id}', [PartisipanController::class, 'destroy']);
    Route::post('/import/partisipan', [PartisipanController::class, 'import']);

    Route::get('/materi', [MateriController::class, 'materi']);
    Route::get('/materi/cari', [MateriController::class, 'cari']);
    Route::get('/materi/user/cari', [SurveyController::class, 'carii']);
    Route::post('/tambah/materi', [MateriController::class, 'store']);
    Route::post('/edit/materi/{id}', [MateriController::class, 'edit']);
    Route::post('/ubah/materi/{id}', [MateriController::class, 'update']);
    Route::post('/hapus/materi/{id}', [MateriController::class, 'destroy']);

    Route::get('/survey', [SurveyController::class, 'survey']);
    Route::get('/survey/cari', [SurveyController::class, 'cari']);
    Route::get('/survey/user', [SurveyController::class, 'show']); //menampilkan soal
    Route::get('/survey/users', [SurveyController::class, 'shows']); //menampilkan halaman start
    Route::get('/nilai', [NilaiController::class, 'show']); //menampilkan nilai
    Route::post('/survey/start', [SurveyController::class, 'start']);
    Route::post('/survey/jawab', [Answercontroller::class, 'store']);
    Route::post('/tambah/survey', [SurveyController::class, 'store']);
    Route::post('/edit/survey/{id}', [SurveyController::class, 'edit']);
    Route::post('/ubah/survey/{id}', [SurveyController::class, 'update']);
    Route::post('/edit/semua/sesi', [SurveyController::class, 'updateAll']);
    Route::post('/hapus/survey/{id}', [SurveyController::class, 'destroy']);
    Route::post('/import/soal', [SurveyController::class, 'import']);
    Route::post('/sesi', [SesiController::class, 'store']);
    Route::post('/ubah/sesi/{id}', [SesiController::class, 'update']);
    Route::post('/hapus/sesi/{id}', [SesiController::class, 'destroy']);

    Route::get('/pernyataan/{id}', [PernyataanController::class, 'pernyataan']);
    Route::get('/pernyataan/cari', [PernyataanController::class, 'cari']);
    Route::post('/tambah/pernyataan/{id}', [PernyataanController::class, 'input']);

    Route::get('/feedback', [FeedbackController::class, 'index']);
    Route::get('/feedback/cari', [FeedbackController::class, 'cari']);
    Route::post('/feedback/send', [FeedbackController::class, 'store']);
});