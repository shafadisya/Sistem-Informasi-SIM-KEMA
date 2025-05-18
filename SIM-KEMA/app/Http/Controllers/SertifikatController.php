<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');
        $sertifikat = Sertifikat::when($filter !== 'all', function ($query) use ($filter) {
            return $query->where('nama_kegiatan', $filter);
        })->get();

        return view('admin.sertifikat', compact('sertifikat', 'filter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'file' => 'required|url',
            'tanggal_terbit' => 'required|date',
        ]);

        Sertifikat::create($request->all());
        return redirect()->back()->with('success', 'Sertifikat berhasil ditambahkan!');
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
