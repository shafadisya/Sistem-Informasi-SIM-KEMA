<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Panitia;
use Illuminate\Support\Facades\Auth;

class PanitiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('daftar_kepanitiaan', compact('kegiatan'));
    }
    
    public function daftarKepanitiaan()
    {
        $kegiatan = Kegiatan::all();
        return view('daftar_kegiatan', compact('kegiatan'));
    }
    
    public function formulirPendaftaran(Kegiatan $kegiatan)
    {
        return view('formulir_pendaftaran', compact('kegiatan'));
    }
    
    public function daftar(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'kegiatan_id' => 'required',
            'divisi_id' => 'required',
        ]);
        
        $panitia = new Panitia();
        $panitia->user_id = Auth::id();
        $panitia->nama = $request->nama;
        $panitia->npm = $request->npm;
        $panitia->email = $request->email;
        $panitia->kegiatan_id = $request->kegiatan_id;
        $panitia->divisi_id = $request->divisi_id;
        $panitia->status = 'pending';
        $panitia->save();
        
        return redirect()->route('daftar.panitia')->with('success', 'Pendaftaran berhasil. Silakan tunggu konfirmasi.');
    }
}