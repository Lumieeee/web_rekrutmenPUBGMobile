<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPlayerController;
use App\Http\Controllers\AnalisisPrediksiController;
use App\Http\Controllers\TambahAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\ImportPlayerController;
use App\Http\Controllers\HasilClusteringController;

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    Route::get('/dataPlayer', [DataPlayerController::class, 'index'])->name('dataPlayer.index');
    // Tambah Data Player
    Route::get('/dataPlayer/create', [DataPlayerController::class, 'create'])->name('dataPlayer.create');
    Route::post('/dataPlayer', [DataPlayerController::class, 'store'])->name('dataPlayer.store');
    // Edit Data Player
    Route::get('/dataPlayer/{id}/edit', [DataPlayerController::class, 'edit'])->name('dataPlayer.edit');
    Route::put('/dataPlayer/{id}', [DataPlayerController::class, 'update'])->name('dataPlayer.update');
    //Delete Data Player
    Route::delete('/dataPlayer/{id}', [DataPlayerController::class, 'destroy'])->name('dataPlayer.destroy');


    Route::get('/hasilClustering', [HasilClusteringController::class, 'index'])->name('hasilClustering.index');

    Route::get('hasil-clustering', [HasilClusteringController::class, 'index'])->name('hasilClustering.index');
    Route::post('hasil-clustering/import', [HasilClusteringController::class, 'import'])->name('hasilClustering.import');

    Route::get('/prediksiSVM', [AnalisisPrediksiController::class, 'index'])->name('prediksiSVM.index');
    Route::get('/prediksiSVM/prediksi/{id}', [AnalisisPrediksiController::class, 'prediksi'])->name('prediksiSVM.prediksi');

    Route::get('/tambahAdmin', [TambahAdminController::class, 'index'])->name('tambahAdmin.index');
    // Tambah Data Akun
    Route::get('/tambahAdmin/create', [TambahAdminController::class, 'create'])->name('tambahAdmin.create');
    Route::post('/tambahAdmin/store', [TambahAdminController::class, 'store'])->name('tambahAdmin.store');
    //Delete Data Akun
    Route::delete('/tambahAdmin/{id}', [TambahAdminController::class, 'destroy'])->name('tambahAdmin.destroy');
});

// Redirect ke login jika user mengakses root URL
Route::get('/', function () {
    return redirect()->route('login.index');
});
