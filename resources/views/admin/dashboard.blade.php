@extends('home')

@section('content')

<!-- Header - Smaller and Not Fixed -->
<header class="bg-blue-800 text-white py-4 px-4 md:px-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-xl md:text-2xl font-bold mb-1">Sistem Inventaris Hotel Grand Luxury</h1>
        <p class="text-sm md:text-base opacity-90">
            Manajemen inventaris hotel yang efisien
        </p>
        <div class="mt-4 space-x-3">
            <a href="{{ route('admin.dashboard') }}" class="inline-block bg-white text-blue-800 px-4 py-1 text-sm rounded-md font-medium hover:bg-blue-100 transition duration-300">
                Dashboard
            </a>
            <a href="#" class="inline-block border border-white text-white px-4 py-1 text-sm rounded-md font-medium hover:bg-blue-700 transition duration-300">
                Panduan
            </a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="flex-1">
    <div class="max-w-6xl mx-auto py-6 px-4 md:px-8">
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <!-- Users Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                            <i class="fas fa-users text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-800">Pengguna</h3>
                            <p class="text-2xl font-bold text-blue-600">24</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                            <i class="fas fa-boxes text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-800">Stok Barang</h3>
                            <p class="text-2xl font-bold text-green-600">156</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Units Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-purple-100 text-purple-600 mr-3">
                            <i class="fas fa-door-open text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-gray-800">Kamar</h3>
                            <p class="text-2xl font-bold text-purple-600">85</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
            <div class="p-4">
                <h2 class="text-lg font-bold text-gray-800 mb-3">Aktivitas Terkini</h2>
                <div class="space-y-3">
                    <div class="flex items-start pb-3 border-b border-gray-100">
                        <div class="p-1 rounded-full bg-blue-100 text-blue-600 mr-3">
                            <i class="fas fa-user-plus text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Admin menambahkan pengguna baru</p>
                            <p class="text-xs text-gray-500">10 menit lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start pb-3 border-b border-gray-100">
                        <div class="p-1 rounded-full bg-green-100 text-green-600 mr-3">
                            <i class="fas fa-box text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Stok handuk diperbarui (120 → 95)</p>
                            <p class="text-xs text-gray-500">1 jam lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-1 rounded-full bg-yellow-100 text-yellow-600 mr-3">
                            <i class="fas fa-bell text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Peringatan: Stok sabun hampir habis</p>
                            <p class="text-xs text-gray-500">3 jam lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300">
                <div class="p-4">
                    <h3 class="text-base font-semibold text-gray-800 mb-2">Kelola Stok Barang</h3>
                    <p class="text-xs text-gray-600 mb-3">Pantau dan kelola stok barang hotel</p>
                    <a href="{{ route('admin.stock') }}" class="inline-block bg-blue-600 text-white px-3 py-1 text-xs rounded-md hover:bg-blue-700 transition duration-300">
                        Lihat Stok <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-300">
                <div class="p-4">
                    <h3 class="text-base font-semibold text-gray-800 mb-2">Kelola Unit Kamar</h3>
                    <p class="text-xs text-gray-600 mb-3">Kelola status dan inventaris kamar</p>
                    <a href="#" class="inline-block bg-green-600 text-white px-3 py-1 text-xs rounded-md hover:bg-green-700 transition duration-300">
                        Lihat Kamar <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer - Smaller and Not Fixed -->
<footer class="bg-gray-800 text-white py-3 px-4 md:px-8">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="mb-2 md:mb-0">
            <p class="text-sm font-bold">Hotel Inventory System</p>
            <p class="text-xs opacity-80">v2.1.0 © 2023 Grand Luxury Hotel</p>
        </div>
        <div class="flex space-x-3">
            <a href="#" class="hover:text-blue-300 transition duration-300 text-sm"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-blue-400 transition duration-300 text-sm"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-pink-500 transition duration-300 text-sm"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>
@endsection