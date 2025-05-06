<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sertifikat;
use Illuminate\Http\Request;

class SertifikatController extends Controller
{
    public function index()
    {
        $sertifikat = Sertifikat::all();  // Get all 'Sertifikat' data
        return view('admin.sertifikat.index', compact('sertifikat'));
    }

    public function download($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);  // Find 'Sertifikat' by ID
        return response()->download(storage_path('app/public/' . $sertifikat->file_path));
    }
}

