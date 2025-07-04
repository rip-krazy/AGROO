<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->input('search');
        
        // Build query with search functionality
        $query = Stock::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }
        
        $stocks = $query->latest()->paginate(10);
        
        // PERBAIKAN: Hitung jumlah JENIS barang, bukan total quantity
        $totalItems = $query->count(); // Jumlah jenis barang
        
        // Jika ingin menampilkan total quantity semua barang:
        // $totalQuantity = $query->sum('jumlah');
        
        // Atau jika ingin menampilkan keduanya:
        // $totalItems = $query->count(); // Jumlah jenis barang
        // $totalQuantity = $query->sum('jumlah'); // Total quantity
        
        return view('admin.stock.index', [
            'stocks' => $stocks,
            'totalItems' => $totalItems, // Jumlah jenis barang
            // 'totalQuantity' => $totalQuantity, // Total quantity semua barang
        ]);
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

        Stock::create($validatedData);

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