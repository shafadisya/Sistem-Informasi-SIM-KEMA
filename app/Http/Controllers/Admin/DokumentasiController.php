<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasi = Dokumentasi::all();  // Get all 'Dokumentasi' data
        return view('admin.dokumentasi.index', compact('dokumentasi'));
    }

    public function upload(Request $request)
    {
        // Handle file upload
        $filePath = $request->file('file')->store('dokuments');
        Dokumentasi::create([
            'kegiatan_id' => $request->kegiatan_id,
            'judul' => $request->judul,
            'file_path' => $filePath,
        ]);
        return redirect()->route('admin.dokumentasi.index');
    }
}
