<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelaporanController extends Controller
{
    // User: Tampilkan halaman pelaporan & riwayat
    public function indexUser()
    {
        $pelaporans = Pelaporan::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('users.pelaporan', compact('pelaporans'));
    }

    // User: Kirim laporan
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required|string',
        ]);

        Pelaporan::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'isi' => $request->isi,
            'status' => 'waiting',
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }

    // Admin: Tampilkan semua laporan
    public function indexAdmin()
    {
        $pelaporans = Pelaporan::orderBy('created_at', 'desc')->get();
        return view('admin.pelaporan', compact('pelaporans'));
    }

    // Admin: Balas laporan
    public function balas(Request $request, $id)
    {
        $request->validate([
            'balasan' => 'required|string',
            'status' => 'required|string',
        ]);

        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->update([
            'balasan' => $request->balasan,
            'status' => $request->status,
            'admin_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Balasan berhasil dikirim!');
    }
}
