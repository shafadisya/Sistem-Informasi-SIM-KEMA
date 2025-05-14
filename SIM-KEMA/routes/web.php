<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;

// Halaman Admin
Route::get('/admin/daftar-panitia', function () {
    return view('admin.daftar-panitia');
})->name('admin.daftar-panitia');

Route::get('/admin/sertifikat', function () {
    return view('admin.sertifikat');
})->name('admin.sertifikat');

Route::get('/admin/dokumentasi', function () {
    return view('admin.dokumentasi');
})->name('admin.dokumentasi');

Route::get('/admin/pelaporan', function () {
    return view('admin.pelaporan');
})->name('admin.pelaporan');

// Kegiatan
Route::get('/admin/dashboard', [KegiatanController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/kegiatan', [KegiatanController::class, 'store'])->name('admin.kegiatan.store');
Route::put('/admin/kegiatan/{id}', [KegiatanController::class, 'update'])->name('admin.kegiatan.update');
