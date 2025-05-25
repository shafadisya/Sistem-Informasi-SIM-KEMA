<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\PendaftaranPanitiaController;
use App\Models\PendaftaranPanitia;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('users.login');
});

// Auth routes (public)
Route::get('/login', [AuthController::class, 'showLogin'])->name('users.login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('users.register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===================== ADMIN ROUTES =====================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [KegiatanController::class, 'index'])->name('admin.dashboard');

    // Kegiatan
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('admin.kegiatan.store');
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('admin.kegiatan.update');

    // Sertifikat
    Route::get('/sertifikat', [SertifikatController::class, 'indexAdmin'])->name('admin.sertifikat');
    Route::post('/sertifikat', [SertifikatController::class, 'store'])->name('admin.sertifikat.store');
    Route::put('/sertifikat/{id}', [SertifikatController::class, 'update'])->name('admin.sertifikat.update');
    Route::delete('/sertifikat/{id}', [SertifikatController::class, 'destroy'])->name('admin.sertifikat.destroy');

    // Dokumentasi
    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('admin.dokumentasi');
    Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('admin.dokumentasi.create');
    Route::post('/dokumentasi', [DokumentasiController::class, 'store'])->name('admin.dokumentasi.store');
    Route::put('/dokumentasi/{id}', [DokumentasiController::class, 'update'])->name('admin.dokumentasi.update');
    Route::delete('/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('admin.dokumentasi.destroy');

    // Daftar Panitia
    Route::get('/daftar-panitia', function () {
        $pendaftaran = PendaftaranPanitia::all();
        return view('admin.daftar-panitia', compact('pendaftaran'));
    })->name('admin.daftar-panitia');
    Route::put('/panitia-konfirmasi/{id}', [PendaftaranPanitiaController::class, 'konfirmasi'])->name('admin.panitia.konfirmasi');

    // Pelaporan
    Route::get('/pelaporan', [PelaporanController::class, 'indexAdmin'])->name('admin.pelaporan');
    Route::post('/pelaporan/{id}/balas', [PelaporanController::class, 'balas'])->name('admin.pelaporan.balas');
});

// ===================== USER ROUTES =====================
Route::middleware(['auth', 'role:user'])->group(function () {
    // Dashboard User
    Route::get('/dashboard', function () {
        $userId = Auth::id();
        $kegiatan = Kegiatan::all()->map(function ($item) use ($userId) {
            $pendaftaran = DB::table('pendaftaran_panitia')
                ->where('user_id', $userId)
                ->where('kegiatan_id', $item->id)
                ->first();
            $item->status_pendaftaran = $pendaftaran->status ?? 'Belum daftar';
            return $item;
        });
        return view('users.dashboard', compact('kegiatan'));
    })->name('users.dashboard');

    // Daftar Panitia
    Route::get('/daftar-panitia', [PendaftaranPanitiaController::class, 'indexUser'])->name('users.daftar-panitia');
    Route::post('/daftar-panitia', [PendaftaranPanitiaController::class, 'store'])->name('users.daftar-panitia.store');
    Route::get('/formulir-panitia/{id}', function ($id) {
        $kegiatan = Kegiatan::findOrFail($id);
        $user = Auth::user();
        return view('users.formulir-panitia', compact('kegiatan', 'user'));
    })->name('users.formulir-panitia');

    // Sertifikat
    Route::get('/sertifikat', [SertifikatController::class, 'indexUser'])->name('users.sertifikat');
    Route::post('/sertifikat', [SertifikatController::class, 'store'])->name('users.sertifikat.store');

    // Dokumentasi
    Route::get('/dokumentasi', [DokumentasiController::class, 'indexUser'])->name('users.dokumentasi');

    // Pelaporan
    Route::get('/pelaporan', [PelaporanController::class, 'indexUser'])->name('users.pelaporan');
    Route::post('/pelaporan', [PelaporanController::class, 'store'])->name('users.pelaporan.store');
});
