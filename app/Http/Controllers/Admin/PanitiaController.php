<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Panitia;
use Illuminate\Http\Request;

class PanitiaController extends Controller
{
    public function index()
    {
        $panitia = Panitia::all();  // Get all 'Panitia' data
        return view('admin.panitia.index', compact('panitia'));
    }

    public function create()
    {
        return view('admin.panitia.create');
    }

    public function store(Request $request)
    {
        Panitia::create($request->all());  // Store 'Panitia' data
        return redirect()->route('admin.panitia.index');
    }

    public function edit($id)
    {
        $panitia = Panitia::findOrFail($id);  // Find 'Panitia' by ID
        return view('admin.panitia.edit', compact('panitia'));
    }

    public function update(Request $request, $id)
    {
        $panitia = Panitia::findOrFail($id);
        $panitia->update($request->all());  // Update 'Panitia' data
        return redirect()->route('admin.panitia.index');
    }

    public function destroy($id)
    {
        $panitia = Panitia::findOrFail($id);
        $panitia->delete();  // Delete 'Panitia'
        return redirect()->route('admin.panitia.index');
    }
}
