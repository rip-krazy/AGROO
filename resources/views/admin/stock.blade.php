<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
    <!-- Sidebar Manual -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-indigo-800">
            <div class="flex items-center justify-center h-16 bg-indigo-900">
                <span class="text-white font-bold text-xl">Grand Luxury Hotel</span>
            </div>
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                <div class="flex flex-col flex-1 px-4 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" class="bg-indigo-900 flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.stock') }}" class="flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-boxes w-5 h-5 mr-3"></i>
                        Stock
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-door-open w-5 h-5 mr-3"></i>
                        Unit
                    </a>
                    <a href="#" class="flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <i class="fas fa-user w-5 h-5 mr-3"></i>
                        User
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Header -->
        <header class="bg-blue-800 text-white py-6 px-4 md:px-8">
            <div class="max-w-6xl mx-auto">
                <h1 class="text-3xl font-bold">Manajemen Stok Barang</h1>
                <p class="opacity-90 text-lg">Lihat dan kelola semua stok barang hotel.</p>
            </div>
        </header>

        <!-- Konten Utama -->
        <main class="max-w-6xl mx-auto py-8 px-4 md:px-8">
            <div class="mb-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Daftar Stok</h2>
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i> Tambah Barang
                </a>
            </div>

            <div class="overflow-x-auto bg-white rounded-xl shadow">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-100 text-left text-xs uppercase font-semibold text-gray-600">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Nama Barang</th>
                            <th class="px-6 py-3">Kategori</th>
                            <th class="px-6 py-3">Jumlah</th>
                            <th class="px-6 py-3">Satuan</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">1</td>
                            <td class="px-6 py-4">Handuk Hotel</td>
                            <td class="px-6 py-4">Linen</td>
                            <td class="px-6 py-4">120</td>
                            <td class="px-6 py-4">pcs</td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="#" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="#" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lainnya secara dinamis -->
                    </tbody>
                </table>
            </div>
        </main>

       
</div>
</body>
</html>
