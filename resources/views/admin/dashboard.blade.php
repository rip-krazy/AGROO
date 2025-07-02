<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-indigo-800">
                <div class="flex items-center justify-center h-16 bg-indigo-900">
                    <span class="text-white font-bold text-xl">Grand Luxury Hotel</span>
                </div>
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                    <div class="flex flex-col flex-1 px-4 space-y-1">
                        <!-- Navigation Items -->
                        <a href="{{ route('admin.dashboard') }}" class="bg-indigo-900 flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Dashboard
                        </a>
                        
                         <a href="{{ route('admin.stock') }}" class="flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Stock
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            Unit
                        </a>
                        
                        <a href="#" class="flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Surat Pengajuan
                        </a>

                        <a href="#" class="flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            User
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            <!-- Header -->
            <header class="bg-blue-800 text-white py-8 px-4 md:px-8">
                <div class="max-w-6xl mx-auto">
                    <h1 class="text-3xl md:text-4xl font-bold mb-2">Selamat Datang di Sistem Inventaris Hotel Grand Luxury</h1>
                    <p class="text-lg md:text-xl opacity-90">
                        Kelola stok barang, unit kamar, dan pengguna dengan mudah. Sistem terintegrasi untuk manajemen inventaris hotel yang efisien.
                    </p>
                    <div class="mt-6 space-x-4">
                        <a href="#" class="inline-block bg-white text-blue-800 px-6 py-2 rounded-lg font-medium hover:bg-blue-100 transition duration-300">
                            Lihat Dashboard
                        </a>
                        <a href="#" class="inline-block border border-white text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition duration-300">
                            Panduan Sistem
                        </a>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="max-w-6xl mx-auto py-8 px-4 md:px-8">
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelola Stok Barang</h3>
                            <p class="text-gray-600 mb-4">Pantau dan kelola stok barang hotel seperti linen, perlengkapan kamar mandi, dan kebutuhan lainnya.</p>
                            <a href="#" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
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
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800 text-white py-6 px-4 md:px-8">
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
        </div>
    </div>
</body>
</html>