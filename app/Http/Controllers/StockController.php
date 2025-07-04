<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StockController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->input('search');
        
        $query = Stock::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('kode_barang', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }
        
        $stocks = $query->latest()->paginate(10);
        
        return view('admin.stock.index', [
            'stocks' => $stocks,
            'totalItems' => $query->count(),
        ]);
    }

    public function create() 
    {
        return view('admin.stock.create');
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
        ]);

        // Generate kode barang berdasarkan nama dan timestamp
        $prefix = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $request->nama_barang), 0, 3));
        $validatedData['kode_barang'] = $prefix . '-' . time();

        Stock::create($validatedData);

        return redirect()->route('admin.stock')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return view('admin.stock.edit', compact('stock'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update($validatedData);

        return redirect()->route('admin.stock')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('admin.stock')->with('success', 'Data berhasil dihapus.');
    }

    // Detail barang
    public function show($id)
    {
        $stock = Stock::findOrFail($id);
        return view('admin.stock.show', compact('stock'));
    }
}