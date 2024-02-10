<?php

use App\Http\Controllers\BasisPengetahuanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\HamaController;
use App\Http\Controllers\KategoriGejalaController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\SolusiHamaController;
use App\Http\Controllers\UserController;
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

Route::get('/', [BerandaController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('hama', HamaController::class);
    Route::resource('solusi', SolusiController::class);

    Route::get('/hama/{hama}/solusi', [SolusiHamaController::class, 'edit'])->name('hama.solusi.edit');
    Route::put('/hama/{hama}/solusi', [SolusiHamaController::class, 'update'])->name('hama.solusi.update');

    Route::resource('kategori-gejala', KategoriGejalaController::class)->except('show');
    Route::resource('gejala', GejalaController::class);

    Route::get('/basis-pengetahuan', [BasisPengetahuanController::class, 'index'])->name('basis-pengetahuan.index');
    Route::get('/basis-pengetahuan/{hama}/edit', [BasisPengetahuanController::class, 'edit'])->name('basis-pengetahuan.edit');
    Route::put('/basis-pengetahuan/{hama}', [BasisPengetahuanController::class, 'update'])->name('basis-pengetahuan.update');

    Route::resource('users', UserController::class)->only(['index', 'show', 'destroy']);
    Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi.index');
    Route::get('/konsultasi/{konsultasi}', [KonsultasiController::class, 'show'])->name('konsultasi.show');

    Route::get('/profil', [ProfileController::class, 'edit'])->name('profil.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profil.update');
    Route::delete('/profil/delete-profile-picture', [ProfileController::class, 'deleteProfilePicture'])->name('profil.delete-profile-picture');
});

require __DIR__.'/auth.php';
