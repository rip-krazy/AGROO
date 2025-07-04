@extends('home')

@section('content')
    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Professional Header -->
        <header class="bg-gradient-to-r from-blue-800 to-blue-500 text-white py-6 px-4 md:px-8 shadow-lg">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="animate-[fadeIn_0.6s_ease-in-out]">
                        <h1 class="text-3xl font-semibold mb-2 flex items-center">
                            <i class="fas fa-warehouse mr-3 text-blue-200"></i>
                            Manajemen Stok Barang
                        </h1>
                        <p class="opacity-90 text-base">Kelola inventaris hotel dengan mudah dan efisien</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 border border-white border-opacity-20">
                            <div class="text-sm opacity-80">Total Items</div>
                            <div class="text-xl font-semibold">{{ count($stocks ?? []) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-6xl mx-auto py-6 px-4 md:px-8 animate-[fadeIn_0.6s_ease-in-out]">
            <!-- Action Bar -->
            <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">Daftar Inventaris</h2>
                    <p class="text-gray-600 text-sm">Manage your hotel inventory efficiently</p>
                </div>
                <div class="flex gap-3">
                    <form action="{{ route('admin.stock') }}" method="GET" class="flex items-center">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Cari barang..." 
                                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                   value="{{ request('search') }}">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-all duration-200 flex items-center">
                            <i class="fas fa-search mr-2 text-xs"></i>
                            <span class="text-sm">Cari</span>
                        </button>
                        @if(request('search'))
                            <a href="{{ route('admin.stock') }}" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md transition-all duration-200 flex items-center">
                                <i class="fas fa-times mr-2 text-xs"></i>
                                <span class="text-sm">Reset</span>
                            </a>
                        @endif
                    </form>
                    <a href="{{ route('admin.stock.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md flex items-center font-medium shadow-sm transition-all duration-200">
                        <i class="fas fa-plus mr-2 text-sm"></i>
                        <span class="text-sm">Tambah Barang</span>
                    </a>
                </div>
            </div>

            <!-- Professional Table Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transition-all duration-300 hover:translate-y-[-2px] hover:shadow-lg border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-hashtag mr-2"></i>
                                        No
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-barcode mr-2"></i>
                                        ID Barang
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-box mr-2"></i>
                                        Nama Barang
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-tags mr-2"></i>
                                        Kategori
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-sort-numeric-up mr-2"></i>
                                        Jumlah
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-balance-scale mr-2"></i>
                                        Satuan
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($stocks as $stock)
                            <tr class="hover:bg-blue-50 transition-colors duration-200 even:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center w-7 h-7 bg-blue-100 rounded-full text-blue-700 text-sm font-medium">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $stock->kode_barang }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $stock->nama_barang }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $stock->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $stock->jumlah }}</div>
                                        <div class="ml-2 w-2 h-2 bg-green-500 rounded-full"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $stock->satuan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('admin.stock.show', $stock->id) }}" 
                                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm flex items-center transition-all duration-200">
                                            <i class="fas fa-eye mr-1"></i>
                                            Detail
                                        </a>
                                        <a href="{{ route('admin.stock.edit', $stock->id) }}" 
                                           class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm flex items-center transition-all duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.stock.destroy', $stock->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm flex items-center transition-all duration-200"
                                                    onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                                <i class="fas fa-trash-alt mr-1"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-12">
                                    <div class="mx-auto w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-boxes text-2xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data stok</h3>
                                    <p class="text-gray-600 mb-6 text-sm">Mulai tambahkan barang untuk mengelola inventaris hotel</p>
                                    <a href="{{ route('admin.stock.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md inline-flex items-center font-medium shadow-sm transition-all duration-200">
                                        <i class="fas fa-plus mr-2 text-sm"></i>
                                        <span class="text-sm">Tambah Barang Pertama</span>
                                    </a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($stocks->hasPages())
                <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $stocks->withQueryString()->links() }}
                </div>
                @endif
            </div>
        </main>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <script>
        // Professional interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation ONLY for delete buttons
            const deleteForms = document.querySelectorAll('form[method="POST"]');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> <span class="text-xs">Menghapus...</span>';
                    button.disabled = true;
                    button.classList.add('opacity-75');
                });
            });

            // Add subtle hover effects to table rows
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#eff6ff';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '';
                });
            });
        });
    </script>
@endsection