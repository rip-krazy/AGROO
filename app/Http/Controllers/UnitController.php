<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $search = $request->input('search');
    
    $units = Unit::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%")
                     ->orWhere('tipe', 'like', "%{$search}%")
                     ->orWhere('status', 'like', "%{$search}%")
                     ->orWhere('lokasi', 'like', "%{$search}%")
                     ->orWhere('kapasitas', 'like', "%{$search}%")
                     ->orWhere('harga', 'like', "%{$search}%");
    })->latest()->paginate(10); // Adjust pagination as needed

    return view('admin.unit.index', compact('units'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipeOptions = Unit::getTipeOptions();
        $statusOptions = Unit::getStatusOptions();
        $lokasiOptions = Unit::getLokasiOptions();

        return view('admin.unit.create', compact(
            'tipeOptions',
            'statusOptions',
            'lokasiOptions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|max:50',
            'lokasi' => 'required|string|max:100',
            'status' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1|max:10',
            'harga' => 'required|numeric|min:100000',
            'deskripsi' => 'nullable|string|max:500',
            'tanggal' => 'nullable|date',
        ]);

        // Format harga to decimal
        $validated['harga'] = number_format($validated['harga'], 2, '.', '');

        Unit::create($validated);

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        $tipeOptions = Unit::getTipeOptions();
        $statusOptions = Unit::getStatusOptions();
        $lokasiOptions = Unit::getLokasiOptions();

        return view('admin.unit.edit', compact(
            'unit',
            'tipeOptions',
            'statusOptions',
            'lokasiOptions'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|max:50',
            'lokasi' => 'required|string|max:100',
            'status' => 'required|string|max:50',
            'kapasitas' => 'required|integer|min:1|max:10',
            'harga' => 'required|numeric|min:100000',
            'deskripsi' => 'nullable|string|max:500',
            'tanggal' => 'nullable|date',
        ]);

        // Format harga to decimal
        $validated['harga'] = number_format($validated['harga'], 2, '.', '');

        $unit->update($validated);

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('admin.unit')->with('success', 'Unit berhasil dihapus.');
    }
}
