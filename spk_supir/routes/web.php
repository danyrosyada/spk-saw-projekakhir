<?php

use App\Http\Controllers\AlgoritmaController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PertanyaanController;
use Illuminate\Routing\RouteGroup;
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
//     return view('/');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']); // post login sistemnya
Route::post('/logout', [LoginController::class, 'logout']); // post logout sistemnya

// Route::group(['middleware' => 'super_admin'], function () {
// });

Route::resource('/user', UserController::class)->middleware('super_admin');


Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('crips', CripsController::class)->middleware('auth');
Route::resource('/periode', PeriodeController::class)->middleware('auth')->parameters([
    'periode' => 'periode:id_periode',
]);
Route::resource('/supir', SupirController::class)->middleware('auth')->parameters([
    'supir' => 'supir:id_supir',
]);

Route::resource('/kriteria', KriteriaController::class)->middleware('super_admin');
Route::resource('/penilaian', PenilaianController::class)->middleware('super_admin');
Route::resource('supir.penilaian', PenilaianController::class)->middleware('super_admin');
Route::resource('kriteria.pertanyaan', PertanyaanController::class)->middleware('super_admin');
Route::resource('kriteria.pertanyaan.jawaban', JawabanController::class)->middleware('super_admin');

Route::get('/perhitungan', [AlgoritmaController::class, 'index'])->name('perhitungan.index')->middleware('auth');
