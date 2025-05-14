<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');

        if ($filter == 'all') {
            $dokumentasi = Dokumentasi::all();
        } else {
            $dokumentasi = Dokumentasi::where('nama_kegiatan', $filter)->get();
        }

        return view('admin.dokumentasi', compact('dokumentasi', 'filter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|url',
        ]);

        Dokumentasi::create($request->all());

        return redirect()->route('admin.dokumentasi')->with('success', 'Dokumentasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|url',
        ]);

        $dokumentasi = Dokumentasi::findOrFail($id);
        $dokumentasi->update($request->all());

        return redirect()->route('admin.dokumentasi')->with('success', 'Dokumentasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokumentasi = Dokumentasi::findOrFail($id);
        $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi')->with('success', 'Dokumentasi berhasil dihapus!');
    }
}
