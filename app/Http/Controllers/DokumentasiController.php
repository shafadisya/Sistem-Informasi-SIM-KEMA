<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumentasiController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');

        // Ambil semua nama kegiatan unik
        $namaKegiatanList = Dokumentasi::select('nama_kegiatan')->distinct()->pluck('nama_kegiatan');

        if ($filter == 'all') {
            $dokumentasi = Dokumentasi::all();
        } else {
            $dokumentasi = Dokumentasi::where('nama_kegiatan', $filter)->get();
        }

        return view('admin.dokumentasi', compact('dokumentasi', 'filter', 'namaKegiatanList'));
    }

    public function create()
    {
        return view('admin.dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required|exists:kegiatans,id',
            'deskripsi' => 'required|string',
            'url' => 'required|url',
        ]);

        $kegiatan = \App\Models\Kegiatan::find($request->kegiatan_id);

        \App\Models\Dokumentasi::create([
            'kegiatan_id' => $request->kegiatan_id,
            'nama_kegiatan' => $kegiatan->judul,
            'deskripsi' => $request->deskripsi,
            'url' => $request->url,
        ]);

        return redirect()->route('admin.dokumentasi')->with('success', 'Dokumentasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        $dokumentasi->nama_kegiatan = $request->nama_kegiatan;
        $dokumentasi->deskripsi = $request->deskripsi;
        $dokumentasi->url = $request->url; // Ganti 'file' menjadi 'url'
        $dokumentasi->save();

        return redirect()->route('admin.dokumentasi')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi')->with('success', 'Dokumentasi berhasil dihapus!');
    }

    public function indexUser(Request $request)
    {
        $userId = Auth::id();

        // Ambil kegiatan yang sudah diterima user
        $kegiatanIds = \App\Models\PendaftaranPanitia::where('user_id', $userId)
            ->where('status', 'diterima')
            ->pluck('kegiatan_id')
            ->toArray();

        // Nama kegiatan untuk dropdown
        $namaKegiatanList = \App\Models\Kegiatan::whereIn('id', $kegiatanIds)->pluck('judul', 'id');

        // Filter dokumentasi hanya untuk kegiatan yang diterima
        $filter = $request->get('filter', 'all');
        $dokumentasi = \App\Models\Dokumentasi::whereIn('kegiatan_id', $kegiatanIds)
            ->when($filter !== 'all', function ($query) use ($filter) {
                $query->where('kegiatan_id', $filter);
            })
            ->get();

        return view('users.dokumentasi', [
            'dokumentasi' => $dokumentasi,
            'filter' => $filter,
            'namaKegiatanList' => $namaKegiatanList,
        ]);
    }
}
