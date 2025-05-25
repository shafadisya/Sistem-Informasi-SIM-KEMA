<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data kegiatan dari database
        $kegiatan = \App\Models\Kegiatan::all();

        return view('admin.dashboard', compact('kegiatan'));
    }
}
