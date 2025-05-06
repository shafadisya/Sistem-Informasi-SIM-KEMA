<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $sertifikat = Sertifikat::where('user_id', Auth::id())->get();
        return view('sertifikat', compact('sertifikat'));
    }
    
    public function download($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
        
        // Logic untuk mengunduh sertifikat
        
        return back()->with('success', 'Sertifikat berhasil diunduh.');
    }
}