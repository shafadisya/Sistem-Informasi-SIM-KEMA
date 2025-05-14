<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\DokumentasiController;


// Route::get('/admin/dokumentasi', function () {
//     return view('admin.dokumentasi');
// })->name('dokumentasi');

// Halaman Admin
Route::get('/admin/daftar-panitia', function () {
    return view('admin.daftar-panitia');
})->name('admin.daftar-panitia');

Route::get('/admin/pelaporan', function () {
    return view('admin.pelaporan');
})->name('admin.pelaporan');

// Kegiatan
Route::get('/admin/dashboard', [KegiatanController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/kegiatan', [KegiatanController::class, 'store'])->name('admin.kegiatan.store');
Route::put('/admin/kegiatan/{id}', [KegiatanController::class, 'update'])->name('admin.kegiatan.update');

Route::get('/admin/sertifikat', [SertifikatController::class, 'index'])->name('admin.sertifikat');
Route::post('/admin/sertifikat', [SertifikatController::class, 'store'])->name('admin.sertifikat.store');
Route::put('/admin/sertifikat/{id}', [SertifikatController::class, 'update'])->name('admin.sertifikat.update');
Route::delete('/admin/sertifikat/{id}', [SertifikatController::class, 'destroy'])->name('admin.sertifikat.destroy');

Route::prefix('admin')->group(function () {
    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('admin.dokumentasi');
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('admin.dokumentasi.store');
    Route::put('/dokumentasi/{id}', [DokumentasiController::class, 'update'])->name('admin.dokumentasi.update');
    Route::delete('/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('admin.dokumentasi.destroy');
});
