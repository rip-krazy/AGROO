@extends('home')

@section('content')
    <div class="flex flex-col flex-1 overflow-y-auto">
        <header class="bg-gradient-to-r from-blue-800 to-blue-500 text-white py-6 px-4 md:px-8 shadow-lg">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="animate-[fadeIn_0.6s_ease-in-out]">
                        <h1 class="text-3xl font-semibold mb-2 flex items-center">
                            <i class="fas fa-info-circle mr-3 text-blue-200"></i>
                            Detail Barang - {{ $stock->nama_barang }}
                        </h1>
                        <p class="opacity-90 text-base">Informasi lengkap tentang barang ini</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 border border-white border-opacity-20">
                            <div class="text-sm opacity-80">ID Barang</div>
                            <div class="text-xl font-semibold">{{ $stock->kode_barang }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-6xl mx-auto py-6 px-4 md:px-8 animate-[fadeIn_0.6s_ease-in-out]">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Informasi Barang</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-500">Nama Barang</p>
                                    <p class="font-medium">{{ $stock->nama_barang }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Kategori</p>
                                    <p class="font-medium">{{ $stock->kategori }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">ID Barang</p>
                                    <p class="font-medium">{{ $stock->kode_barang }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Stok</h3>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-sm text-gray-500">Jumlah</p>
                                    <p class="font-medium">{{ $stock->jumlah }} {{ $stock->satuan }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Dibuat</p>
                                    <p class="font-medium">{{ $stock->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Terakhir Diupdate</p>
                                    <p class="font-medium">{{ $stock->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.stock.edit', $stock->id) }}" 
                           class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-md font-medium shadow-sm flex items-center transition-all duration-200">
                            <i class="fas fa-edit mr-2"></i>
                            Edit
                        </a>
                        <form action="{{ route('admin.stock.destroy', $stock->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-medium shadow-sm flex items-center transition-all duration-200"
                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                <i class="fas fa-trash-alt mr-2"></i>
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('admin.stock') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md font-medium shadow-sm flex items-center transition-all duration-200">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection