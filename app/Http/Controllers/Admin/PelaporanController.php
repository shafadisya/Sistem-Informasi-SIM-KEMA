<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelaporan;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        $pelaporan = Pelaporan::all();  // Get all 'Pelaporan' data
        return view('admin.pelaporan.index', compact('pelaporan'));
    }

    public function create(Request $request)
    {
        Pelaporan::create($request->all());  // Store 'Pelaporan' data
        return redirect()->route('admin.pelaporan.index');
    }
}
