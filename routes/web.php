<?php

use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\PanitiaController;
use App\Http\Controllers\Admin\SertifikatController;
use App\Http\Controllers\Admin\DokumentasiController;
use App\Http\Controllers\Admin\PelaporanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\KegiatanController as UserKegiatanController;
use App\Http\Controllers\User\PanitiaController as UserPanitiaController;
use App\Http\Controllers\User\SertifikatController as UserSertifikatController;
use App\Http\Controllers\User\DokumentasiController as UserDokumentasiController;
use App\Http\Controllers\User\PelaporanController as UserPelaporanController;

// Auth Routes (Login, Register, Logout)
Auth::routes();

// Route::middleware(['auth', 'admin'])->get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// // Admin Routes (menggunakan middleware 'auth' dan 'admin' untuk akses hanya admin)
// Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
//     // Kegiatan Routes (Admin dapat melakukan CRUD)
//     Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
//     Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
//     Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
//     Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
//     Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
//     Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
    
//     // Pendaftaran Panitia Routes (Admin dapat mengelola pendaftaran panitia)
//     Route::get('/panitia', [PanitiaController::class, 'index'])->name('panitia.index');
//     Route::get('/panitia/create', [PanitiaController::class, 'create'])->name('panitia.create');
//     Route::post('/panitia', [PanitiaController::class, 'store'])->name('panitia.store');
//     Route::get('/panitia/{id}/edit', [PanitiaController::class, 'edit'])->name('panitia.edit');
//     Route::put('/panitia/{id}', [PanitiaController::class, 'update'])->name('panitia.update');
//     Route::delete('/panitia/{id}', [PanitiaController::class, 'destroy'])->name('panitia.destroy');

//     // Sertifikat Routes
//     Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
//     Route::get('/sertifikat/{id}/download', [SertifikatController::class, 'download'])->name('sertifikat.download');
    
//     // Dokumentasi Routes
//     Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
//     Route::post('/dokumentasi/upload', [DokumentasiController::class, 'upload'])->name('dokumentasi.upload');
    
//     // Pelaporan Routes
//     Route::get('/pelaporan', [PelaporanController::class, 'index'])->name('pelaporan.index');
//     Route::post('/pelaporan/create', [PelaporanController::class, 'create'])->name('pelaporan.create');
// });

// // User Routes (hanya menggunakan middleware 'auth' untuk akses user yang sudah login)
// Route::middleware('auth')->group(function () {
//     // Kegiatan Routes (User hanya bisa melihat daftar kegiatan)
//     Route::get('/daftar-kegiatan', [UserKegiatanController::class, 'index'])->name('user.kegiatan.index');
    
//     // Pendaftaran Panitia Routes (User hanya bisa mendaftar panitia)
//     Route::get('/daftar-panitia', [UserPanitiaController::class, 'index'])->name('user.daftar.panitia');
//     Route::get('/formulir-pendaftaran/{kegiatan}', [UserPanitiaController::class, 'formulirPendaftaran'])->name('formulir.pendaftaran');
//     Route::post('/daftar-panitia/{kegiatan}', [UserPanitiaController::class, 'daftar'])->name('user.panitia.daftar');

//     // Sertifikat Routes (User hanya bisa melihat sertifikat dan mengunduhnya)
//     Route::get('/sertifikat', [UserSertifikatController::class, 'index'])->name('user.sertifikat.index');
//     Route::get('/sertifikat/{id}/download', [UserSertifikatController::class, 'download'])->name('user.sertifikat.download');

//     // Dokumentasi Routes (User hanya bisa melihat dokumentasi)
//     Route::get('/dokumentasi', [UserDokumentasiController::class, 'index'])->name('user.dokumentasi.index');
    
//     // Pelaporan Routes (User hanya bisa melihat pelaporan)
//     Route::get('/pelaporan', [UserPelaporanController::class, 'index'])->name('user.pelaporan.index');
// });
