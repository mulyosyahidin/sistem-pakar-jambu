<?php

use App\Http\Controllers\Admin\BasisPengetahuanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\HamaController;
use App\Http\Controllers\Admin\KategoriGejalaController;
use App\Http\Controllers\Admin\DiagnosaController as AdminDiagnosaController;
use App\Http\Controllers\Admin\SolusiController;
use App\Http\Controllers\Admin\SolusiHamaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
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

Route::group(['middleware' => ['auth', 'role:user'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('diagnosa', \App\Http\Controllers\User\DiagnosaController::class)->except('edit', 'update');
});

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
    Route::get('/diagnosa', [AdminDiagnosaController::class, 'index'])->name('diagnosa.index');
    Route::get('/diagnosa/{diagnosa}', [AdminDiagnosaController::class, 'show'])->name('diagnosa.show');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'profil', 'as' => 'profil.'], function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::put('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/delete-profile-picture', [ProfileController::class, 'deleteProfilePicture'])->name('delete-profile-picture');
});

require __DIR__.'/auth.php';
