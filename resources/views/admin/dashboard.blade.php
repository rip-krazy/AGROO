@extends('home')

@section('content')

<!-- Header - Elegant and Clean -->
<header class="bg-blue-800 text-white py-6 px-4 md:px-8 shadow-md">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold mb-1">Sistem Inventaris Hotel Grand Luxury</h1>
                <p class="text-sm md:text-base opacity-90 font-light">
                    Manajemen inventaris hotel yang efisien dan terintegrasi
                </p>
            </div>
            <div class="mt-4 md:mt-0 space-x-3">
                <a href="{{ route('admin.dashboard') }}" class="inline-block bg-white text-blue-800 px-4 py-2 text-sm rounded-md font-medium hover:bg-blue-100 transition duration-300 shadow-sm">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="{{ route('panduan') }}" class="inline-block border border-white text-white px-4 py-2 text-sm rounded-md font-medium hover:bg-blue-700 transition duration-300 shadow-sm">
                    <i class="fas fa-question-circle mr-2"></i>Panduan
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="flex-1 bg-gray-50">
    <div class="max-w-6xl mx-auto py-8 px-4 md:px-8">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-blue-700 to-blue-600 rounded-xl shadow-md p-6 mb-8 text-white">
            <div class="flex items-center">
                <div class="mr-4 bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-hotel text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Selamat Datang, Admin</h2>
                    <p class="text-sm opacity-90 mt-1">Anda login terakhir pada 3 Juli 2025, 14:32 WIB</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats - Enhanced Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Users Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 border-l-4 border-blue-500">
                <div class="p-5">
                    <div class="flex items-start">
                        <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Pengguna</h3>
                            <p class="text-2xl font-bold text-gray-800 mt-1">24</p>
                            <p class="text-xs text-gray-500 mt-1"><span class="text-green-500">+2</span> dari bulan lalu</p>
                        </div>
                    </div>
                </div>
            </div>

        
            <!-- Stock Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 border-l-4 border-green-500">
                <div class="p-5">
                    <div class="flex items-start">
                        <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                            <i class="fas fa-boxes text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Stok Barang</h3>
                            <p class="text-2xl font-bold text-gray-800 mt-1">{{ $totalItems }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Units Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300 border-l-4 border-purple-500">
                <div class="p-5">
                    <div class="flex items-start">
                        <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                            <i class="fas fa-door-open text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Kamar</h3>
                            <p class="text-2xl font-bold text-gray-800 mt-1">85</p>
                            <p class="text-xs text-gray-500 mt-1"><span class="text-blue-500">12</span> sedang dipakai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Recent Activity - Enhanced -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 flex items-center">
                        <i class="fas fa-history text-blue-600 mr-2"></i> Aktivitas Terkini
                    </h2>
                </div>
                <div class="divide-y divide-gray-100">
                    <div class="p-4 hover:bg-gray-50 transition duration-150">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 p-2 rounded-lg text-blue-600 mr-3">
                                <i class="fas fa-user-plus text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800">Admin menambahkan pengguna baru</p>
                                <p class="text-xs text-gray-500 mt-1">10 menit lalu</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                Pengguna
                            </span>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-gray-50 transition duration-150">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-green-100 p-2 rounded-lg text-green-600 mr-3">
                                <i class="fas fa-box text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800">Stok handuk diperbarui (120 → 95)</p>
                                <p class="text-xs text-gray-500 mt-1">1 jam lalu</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                Stok
                            </span>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-gray-50 transition duration-150">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 bg-yellow-100 p-2 rounded-lg text-yellow-600 mr-3">
                                <i class="fas fa-exclamation-triangle text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800">Peringatan: Stok sabun hampir habis</p>
                                <p class="text-xs text-gray-500 mt-1">3 jam lalu</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                Peringatan
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-gray-50 text-center">
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition duration-150">
                        Lihat Semua Aktivitas <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Actions - Enhanced -->
            <div class="space-y-6">
                <!-- Quick Links -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-200">
                        <h2 class="text-lg font-bold text-gray-800 flex items-center">
                            <i class="fas fa-bolt text-purple-600 mr-2"></i> Akses Cepat
                        </h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-5">
                        <a href="{{ route('admin.stock') }}" class="group flex items-start p-4 rounded-lg border border-gray-200 hover:border-blue-300 hover:shadow-md transition duration-300">
                            <div class="bg-blue-100 p-3 rounded-lg text-blue-600 mr-4 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                                <i class="fas fa-box-open text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600 transition duration-300">Kelola Stok</h3>
                                <p class="text-xs text-gray-500 mt-1">Pantau stok barang hotel</p>
                            </div>
                        </a>
                        <a href="{{ route('admin.unit') }}" class="group flex items-start p-4 rounded-lg border border-gray-200 hover:border-green-300 hover:shadow-md transition duration-300">
                            <div class="bg-green-100 p-3 rounded-lg text-green-600 mr-4 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                                <i class="fas fa-door-closed text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 group-hover:text-green-600 transition duration-300">Kelola Kamar</h3>
                                <p class="text-xs text-gray-500 mt-1">Status dan inventaris kamar</p>
                            </div>
                        </a>
                        <a href="#" class="group flex items-start p-4 rounded-lg border border-gray-200 hover:border-yellow-300 hover:shadow-md transition duration-300">
                            <div class="bg-yellow-100 p-3 rounded-lg text-yellow-600 mr-4 group-hover:bg-yellow-600 group-hover:text-white transition duration-300">
                                <i class="fas fa-clipboard-list text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 group-hover:text-yellow-600 transition duration-300">Laporan</h3>
                                <p class="text-xs text-gray-500 mt-1">Buat laporan inventaris</p>
                            </div>
                        </a>
                        <a href="#" class="group flex items-start p-4 rounded-lg border border-gray-200 hover:border-red-300 hover:shadow-md transition duration-300">
                            <div class="bg-red-100 p-3 rounded-lg text-red-600 mr-4 group-hover:bg-red-600 group-hover:text-white transition duration-300">
                                <i class="fas fa-bell text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 group-hover:text-red-600 transition duration-300">Notifikasi</h3>
                                <p class="text-xs text-gray-500 mt-1">Lihat semua pemberitahuan</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- System Status -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-gray-200">
                        <h2 class="text-lg font-bold text-gray-800 flex items-center">
                            <i class="fas fa-server text-gray-600 mr-2"></i> Status Sistem
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="text-sm font-medium text-gray-600">Penyimpanan</div>
                            <div class="text-sm font-semibold text-gray-800">65% digunakan</div>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                        <div class="flex items-center justify-between mt-4 mb-3">
                            <div class="text-sm font-medium text-gray-600">Memori</div>
                            <div class="text-sm font-semibold text-gray-800">42% digunakan</div>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 42%"></div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100 text-center">
                            <p class="text-xs text-gray-500">Terakhir diperiksa: 3 menit lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer - Clean and Professional -->
<footer class="bg-gray-800 text-white py-4 px-4 md:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-3 md:mb-0 text-center md:text-left">
                <p class="text-sm font-bold flex items-center justify-center md:justify-start">
                    <i class="fas fa-hotel mr-2"></i> Hotel Inventory System
                </p>
                <p class="text-xs opacity-80 mt-1">v2.1.0 © 2023 Grand Luxury Hotel</p>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-gray-300 hover:text-white transition duration-300 text-sm">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-white transition duration-300 text-sm">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-white transition duration-300 text-sm">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-white transition duration-300 text-sm">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
@endsection