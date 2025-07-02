<?php

namespace App\Http\Controllers;
use App\Models\Stock;

use Illuminate\Http\Request;

class StockController extends Controller
{
   public function index() 
{
    $stocks = \App\Models\Stock::all(); // Ambil semua data dari tabel stocks
    return view('admin.stock.index', compact('stocks'));
}


    public function create() 
    {
        return view('admin.stock.create');
    
    }

    public function store(Request $request) 
    {
        // Validate and store the stock data
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
        ]);

        // Assuming you have a Stock model to handle the database interaction
        \App\Models\Stock::create($validatedData);

        return redirect()->route('admin.stock')->with('success', 'Stock item created successfully.');
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
        'jumlah' => 'required|integer|min:1',
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

    
}
