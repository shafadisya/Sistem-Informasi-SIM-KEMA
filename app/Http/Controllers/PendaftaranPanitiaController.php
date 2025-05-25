<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranPanitia;
use Illuminate\Support\Facades\Auth;

class PendaftaranPanitiaController extends Controller
{
    public function konfirmasi(Request $request, $id)
    {
        $pendaftar = \App\Models\PendaftaranPanitia::findOrFail($id);
        $pendaftar->status = $request->status; // 'diterima' atau 'ditolak'
        $pendaftar->save();

        // Kirim notifikasi ke user (flash message)
        $pesan = $request->status == 'diterima'
            ? 'Selamat, Anda diterima sebagai panitia!'
            : 'Maaf, Anda tidak diterima sebagai panitia.';
        // Redirect ke dashboard user (atau halaman admin, sesuai kebutuhan)
        return redirect()->back()->with('status_panitia', $pesan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            // ...validasi field lain...
        ]);

        PendaftaranPanitia::create([
            'user_id' => Auth::id(),
            'kegiatan_id' => $request->kegiatan_id,
            'nama' => $request->nama,
            'npm' => $request->npm,
            'no_wa' => $request->no_wa,
            'divisi' => $request->divisi,
            'role' => $request->role,
            'panitia' => $request->panitia,
            // ...field lain...
        ]);

        // Redirect ke halaman user, bukan admin!
        return redirect()->route('users.daftar-panitia')->with('success', 'Pendaftaran berhasil!');
    }

    public function indexUser()
    {
        $kegiatan = \App\Models\Kegiatan::all(); // Pastikan model dan variabel sesuai
        return view('users.daftar-panitia', compact('kegiatan'));
    }
}
