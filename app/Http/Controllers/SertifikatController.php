<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');
        // Ambil data sertifikat sesuai filter (contoh sederhana)
        if ($filter === 'all') {
            $sertifikat = Sertifikat::all();
        } else {
            $sertifikat = Sertifikat::where('nama_kegiatan', $filter)->get();
        }
        return view('users.sertifikat', [
            'sertifikat' => $sertifikat,
            'filter' => $filter
        ]);
    }

    public function indexUser(Request $request)
    {
        $userId = Auth::id();

        // Ambil daftar kegiatan yang sudah diterima oleh user
        $pendaftaran = \App\Models\PendaftaranPanitia::where('user_id', $userId)
            ->where('status', 'diterima')
            ->pluck('kegiatan_id')
            ->toArray();

        // Ambil nama kegiatan untuk dropdown
        $kegiatanDiterima = \App\Models\Kegiatan::whereIn('id', $pendaftaran)->pluck('judul', 'id');

        // Filter sertifikat hanya untuk kegiatan yang sudah diterima
        $filter = $request->get('filter', 'all');
        $sertifikat = \App\Models\Sertifikat::whereIn('kegiatan_id', $pendaftaran)
            ->when($filter !== 'all', function ($query) use ($filter) {
                $query->where('kegiatan_id', $filter);
            })
            ->get();

        return view('users.sertifikat', [
            'sertifikat' => $sertifikat,
            'filter' => $filter,
            'kegiatanDiterima' => $kegiatanDiterima,
        ]);
    }

    public function indexAdmin(Request $request)
    {
        $filter = $request->get('filter', 'all');
        // Ambil data sertifikat sesuai filter (contoh sederhana)
        if ($filter === 'all') {
            $sertifikat = Sertifikat::all();
        } else {
            $sertifikat = Sertifikat::where('nama_kegiatan', $filter)->get();
        }
        return view('admin.sertifikat', [
            'sertifikat' => $sertifikat,
            'filter' => $filter
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'file' => 'required|url',
            'tanggal_terbit' => 'required|date',
        ]);

        $kegiatan = \App\Models\Kegiatan::find($request->kegiatan_id);

        \App\Models\Sertifikat::create([
            'kegiatan_id' => $request->kegiatan_id,
            'nama_kegiatan' => $kegiatan->judul, // <-- ini yang penting!
            'file' => $request->file,
            'tanggal_terbit' => $request->tanggal_terbit,
        ]);

        return redirect()->route('admin.sertifikat')->with('success', 'Sertifikat berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'file' => 'required|url',
            'tanggal_terbit' => 'required|date',
        ]);

        $sertifikat = Sertifikat::findOrFail($id);
        $sertifikat->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'file' => $request->file,
            'tanggal_terbit' => $request->tanggal_terbit,
        ]);

        return redirect()->route('admin.sertifikat')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        $sertifikat->delete();
        return redirect()->back()->with('success', 'Sertifikat berhasil dihapus!');
    }
}
