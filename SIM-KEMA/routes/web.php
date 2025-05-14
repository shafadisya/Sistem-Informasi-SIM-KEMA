<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Login dan Register
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Halaman Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [KegiatanController::class, 'index'])->name('admin.dashboard');

    Route::get('/daftar-panitia', function () {
        return view('admin.daftar-panitia');
    })->name('admin.daftar-panitia');

    Route::get('/pelaporan', function () {
        return view('admin.pelaporan');
    })->name('admin.pelaporan');

    // Kegiatan
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('admin.kegiatan.store');
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('admin.kegiatan.update');

    Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('admin.sertifikat');
    Route::post('/sertifikat', [SertifikatController::class, 'store'])->name('admin.sertifikat.store');
    Route::put('/sertifikat/{id}', [SertifikatController::class, 'update'])->name('admin.sertifikat.update');
    Route::delete('/sertifikat/{id}', [SertifikatController::class, 'destroy'])->name('admin.sertifikat.destroy');

    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('admin.dokumentasi');
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('admin.dokumentasi.store');
    Route::put('/dokumentasi/{id}', [DokumentasiController::class, 'update'])->name('admin.dokumentasi.update');
    Route::delete('/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('admin.dokumentasi.destroy');

    // Menampilkan form tambah dokumentasi
    Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('admin.dokumentasi.create');

    // Menyimpan data dokumentasi
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('admin.dokumentasi.store');
});

// Halaman User
Route::middleware(['auth', 'role:mahasiswa'])->prefix('user')->group(function () {
    Route::get('/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');

    Route::get('/daftar-panitia', function () {
        return view('user.daftar-panitia');
    });

    Route::get('/pelaporan', function () {
        return view('user.pelaporan');
    });

    Route::get('/sertifikat', function () {
        return view('user.sertifikat');
    });

    Route::get('/dokumentasi', function () {
        return view('user.dokumentasi');
    });
});
