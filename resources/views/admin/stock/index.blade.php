<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        .table-row:nth-child(even) {
            background-color: rgba(249, 250, 251, 0.5);
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
<div class="flex h-screen">
    <!-- Enhanced Sidebar -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-gradient-to-b from-indigo-900 to-purple-900 shadow-2xl">
            <div class="flex items-center justify-center h-16 bg-black bg-opacity-20 backdrop-blur-sm">
                <span class="text-white font-bold text-xl flex items-center">
                    <i class="fas fa-hotel mr-2 text-yellow-400"></i>
                    Grand Luxury Hotel
                </span>
            </div>
            <div class="flex flex-col flex-grow pt-8 overflow-y-auto">
                <div class="flex flex-col flex-1 px-4 space-y-3">
                    <a href="{{ route('admin.dashboard') }}" class="bg-white bg-opacity-10 backdrop-blur-sm flex items-center px-4 py-3 text-white rounded-xl hover:bg-opacity-20 transition-all duration-300 group">
                        <i class="fas fa-home w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.stock') }}" class="bg-indigo-600 bg-opacity-80 flex items-center px-4 py-3 text-white rounded-xl shadow-lg border-l-4 border-yellow-400">
                        <i class="fas fa-boxes w-5 h-5 mr-3"></i>
                        Stock
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-white rounded-xl hover:bg-white hover:bg-opacity-10 transition-all duration-300 group">
                        <i class="fas fa-door-open w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                        Unit
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-white rounded-xl hover:bg-white hover:bg-opacity-10 transition-all duration-300 group">
                        <i class="fas fa-user w-5 h-5 mr-3 group-hover:scale-110 transition-transform"></i>
                        User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Enhanced Header -->
        <header class="gradient-bg text-white py-8 px-4 md:px-8 shadow-xl">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="animate-fade-in">
                        <h1 class="text-4xl font-bold mb-2 flex items-center">
                            <i class="fas fa-warehouse mr-4 text-yellow-300"></i>
                            Manajemen Stok Barang
                        </h1>
                        <p class="opacity-90 text-lg">Kelola inventaris hotel dengan mudah dan efisien</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-4">
                            <div class="text-sm opacity-80">Total Items</div>
                            <div class="text-2xl font-bold">{{ count($stocks ?? []) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Enhanced Main Content -->
        <main class="max-w-6xl mx-auto py-8 px-4 md:px-8 animate-fade-in">
            <!-- Action Bar -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Daftar Inventaris</h2>
                    <p class="text-gray-600">Manage your hotel inventory efficiently</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg flex items-center transition-all duration-300">
                        <i class="fas fa-filter mr-2"></i>
                        Filter
                    </button>
                    <a href="{{ route('admin.stock.create') }}" class="btn-gradient text-white px-6 py-3 rounded-lg flex items-center font-semibold shadow-lg">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Barang
                    </a>
                </div>
            </div>

            <!-- Enhanced Table Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider border-b">
                                    <div class="flex items-center">
                                        <i class="fas fa-hashtag mr-2"></i>
                                        No
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider border-b">
                                    <div class="flex items-center">
                                        <i class="fas fa-box mr-2"></i>
                                        Nama Barang
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider border-b">
                                    <div class="flex items-center">
                                        <i class="fas fa-tags mr-2"></i>
                                        Kategori
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider border-b">
                                    <div class="flex items-center">
                                        <i class="fas fa-sort-numeric-up mr-2"></i>
                                        Jumlah
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider border-b">
                                    <div class="flex items-center">
                                        <i class="fas fa-balance-scale mr-2"></i>
                                        Satuan
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-600 uppercase tracking-wider border-b">
                                    <div class="flex items-center justify-center">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($stocks as $stock)
                            <tr class="table-row hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full text-white text-sm font-bold">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-gray-900">{{ $stock->nama_barang }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $stock->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-bold text-gray-900">{{ $stock->jumlah }}</div>
                                        <div class="ml-2 w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $stock->satuan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('admin.stock.edit', $stock->id) }}" 
                                           class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-2 rounded-lg hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 flex items-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.stock.destroy', $stock->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-gradient-to-r from-red-500 to-pink-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-pink-700 transition-all duration-300 flex items-center shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                                <i class="fas fa-trash-alt mr-1"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty State (if no data) -->
            @if(empty($stocks) || count($stocks) == 0)
            <div class="text-center py-12">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-boxes text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada data stok</h3>
                <p class="text-gray-600 mb-6">Mulai tambahkan barang untuk mengelola inventaris hotel</p>
                <a href="{{ route('admin.stock.create') }}" class="btn-gradient text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold shadow-lg">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Barang Pertama
                </a>
            </div>
            @endif
        </main>
    </div>
</div>

<script>
    // Add some interactive functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Add loading animation for delete buttons
        const deleteButtons = document.querySelectorAll('form[method="POST"] button[type="submit"]');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (confirm('Yakin ingin menghapus barang ini?')) {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Menghapus...';
                    this.disabled = true;
                }
            });
        });
    });
</script>
</body>
</html>