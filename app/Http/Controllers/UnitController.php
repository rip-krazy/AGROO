<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $units = Unit::orderBy('created_at', 'desc')->get();
    return view('admin.unit.index', compact('units')); // sesuai path
}



    public function create()
    {
        return view('admin.unit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        Unit::create($request->all());

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil ditambahkan.');
    }

    public function edit(Unit $unit)
    {
        return view('admin.unit.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'tanggal' => 'nullable|date',
        ]);

        $unit->update($request->all());

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil diperbarui.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil dihapus.');
    }
}
