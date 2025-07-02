@extends('home')

@section('content')
<!-- Header - Fixed -->
<header class="bg-blue-800 text-white py-8 px-4 md:px-8 flex-shrink-0">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl md:text-4xl font-bold mb-2">Selamat Datang di Sistem Inventaris Hotel Grand Luxury</h1>
        <p class="text-lg md:text-xl opacity-90">
            Kelola stok barang, unit kamar, dan pengguna dengan mudah. Sistem terintegrasi untuk manajemen inventaris hotel yang efisien.
        </p>
        <div class="mt-6 space-x-4">
            <a href="{{ route('admin.dashboard') }}" class="inline-block bg-white text-blue-800 px-6 py-2 rounded-lg font-medium hover:bg-blue-100 transition duration-300">
                Lihat Dashboard
            </a>
            <a href="#" class="inline-block border border-white text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                Panduan Sistem
            </a>
        </div>
    </div>
</header>

<!-- Dashboard Content - Scrollable -->
<main class="flex-1 overflow-y-auto">
    <div class="max-w-6xl mx-auto py-8 px-4 md:px-8">
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Users Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Total Pengguna</h3>
                            <p class="text-3xl font-bold text-blue-600">24</p>
                            <p class="text-sm text-gray-500 mt-1">5 admin, 19 staff</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stock Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <i class="fas fa-boxes text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Stok Barang</h3>
                            <p class="text-3xl font-bold text-green-600">156</p>
                            <p class="text-sm text-gray-500 mt-1">12 kategori barang</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Units Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                            <i class="fas fa-door-open text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Unit Kamar</h3>
                            <p class="text-3xl font-bold text-purple-600">85</p>
                            <p class="text-sm text-gray-500 mt-1">4 tipe kamar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
            <div class="p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Terkini</h2>
                <div class="space-y-4">
                    <div class="flex items-start pb-4 border-b border-gray-100">
                        <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div>
                            <p class="font-medium">Admin menambahkan pengguna baru</p>
                            <p class="text-sm text-gray-500">10 menit yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start pb-4 border-b border-gray-100">
                        <div class="p-2 rounded-full bg-green-100 text-green-600 mr-4">
                            <i class="fas fa-box"></i>
                        </div>
                        <div>
                            <p class="font-medium">Stok handuk diperbarui (120 → 95)</p>
                            <p class="text-sm text-gray-500">1 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-2 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div>
                            <p class="font-medium">Peringatan: Stok sabun hampir habis</p>
                            <p class="text-sm text-gray-500">3 jam yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelola Stok Barang</h3>
                    <p class="text-gray-600 mb-4">Pantau dan kelola stok barang hotel seperti linen, perlengkapan kamar mandi, dan kebutuhan lainnya.</p>
                    <a href="{{ route('admin.stock') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Lihat Stok <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelola Unit Kamar</h3>
                    <p class="text-gray-600 mb-4">Kelola status kamar, inventaris per kamar, dan lakukan pengecekan kondisi kamar.</p>
                    <a href="#" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                        Lihat Kamar <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer - Fixed -->
<footer class="bg-gray-800 text-white py-6 px-4 md:px-8 flex-shrink-0">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0">
            <p class="text-lg font-bold">Hotel Inventory System</p>
            <p class="text-sm opacity-80">v2.1.0 © 2023 Grand Luxury Hotel</p>
        </div>
        <div class="flex space-x-4">
            <a href="#" class="hover:text-blue-300 transition duration-300"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-blue-400 transition duration-300"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-pink-500 transition duration-300"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>
@endsection