<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        // Ambil semua data kegiatan dari database
        $kegiatan = Kegiatan::all();

        // Kirim data ke view
        return view('admin.dashboard', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Kegiatan::create($request->all());
        return redirect()->back()->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Kegiatan berhasil diperbarui!');
    }
    public function listForUser()
    {
        // Ambil semua data kegiatan (atau filter jika perlu)
        $kegiatan = Kegiatan::all();
        return view('user.dashboard', compact('kegiatan'));
    }

    public function daftarPanitia()
    {
        $kegiatan = Kegiatan::all();
        return view('user.daftar-panitia', compact('kegiatan'));
    }
}
