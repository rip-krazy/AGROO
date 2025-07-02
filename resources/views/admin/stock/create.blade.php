<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .form-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }
        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .floating-label {
            transition: all 0.3s ease;
        }
        .input-group:focus-within .floating-label {
            transform: translateY(-24px) scale(0.9);
            color: #667eea;
        }
        .input-group input:not(:placeholder-shown) + .floating-label {
            transform: translateY(-24px) scale(0.9);
            color: #667eea;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen py-8">
    <!-- Navigation Breadcrumb -->
    <div class="max-w-4xl mx-auto px-6 mb-6">
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="{{ route('admin.stock') }}" class="hover:text-blue-600 transition-colors">Stock</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-800 font-medium">Tambah Barang</span>
        </nav>
    </div>

    <!-- Main Form Container -->
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-slide-up">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 px-8 py-8">
                <div class="flex items-center">
                    <div class="bg-white bg-opacity-20 p-4 rounded-2xl mr-6">
                        <i class="fas fa-plus-circle text-3xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white mb-2">Tambah Barang Baru</h1>
                        <p class="text-blue-100 text-lg">Lengkapi informasi barang untuk menambahkan ke inventaris</p>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form action="{{ route('admin.stock.store') }}" method="POST" id="stockForm">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Nama Barang -->
                        <div class="md:col-span-2">
                            <div class="input-group relative">
                                <input type="text" 
                                       name="nama_barang" 
                                       id="nama_barang"
                                       placeholder=" "
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white"
                                       required>
                                <label for="nama_barang" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2">
                                    <i class="fas fa-box mr-2"></i>Nama Barang
                                </label>
                            </div>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <div class="input-group relative">
                                <select name="kategori" 
                                        id="kategori"
                                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white appearance-none"
                                        required>
                                    <option value="" disabled selected></option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Linens">Linens</option>
                                    <option value="Amenities">Amenities</option>
                                    <option value="Cleaning">Cleaning</option>
                                    <option value="Kitchen">Kitchen</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Other">Other</option>
                                </select>
                                <label for="kategori" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2">
                                    <i class="fas fa-tags mr-2"></i>Kategori
                                </label>
                                <i class="fas fa-chevron-down absolute right-4 top-5 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <!-- Jumlah -->
                        <div>
                            <div class="input-group relative">
                                <input type="number" 
                                       name="jumlah" 
                                       id="jumlah"
                                       min="0"
                                       step="1"
                                       placeholder=" "
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white"
                                       required>
                                <label for="jumlah" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2">
                                    <i class="fas fa-sort-numeric-up mr-2"></i>Jumlah
                                </label>
                            </div>
                        </div>

                        <!-- Satuan -->
                        <div>
                            <div class="input-group relative">
                                <select name="satuan" 
                                        id="satuan"
                                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white appearance-none"
                                        required>
                                    <option value="" disabled selected></option>
                                    <option value="pcs">Pieces (pcs)</option>
                                    <option value="set">Set</option>
                                    <option value="box">Box</option>
                                    <option value="kg">Kilogram (kg)</option>
                                    <option value="liter">Liter</option>
                                    <option value="unit">Unit</option>
                                    <option value="pack">Pack</option>
                                    <option value="roll">Roll</option>
                                </select>
                                <label for="satuan" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2">
                                    <i class="fas fa-balance-scale mr-2"></i>Satuan
                                </label>
                                <i class="fas fa-chevron-down absolute right-4 top-5 text-gray-400 pointer-events-none"></i>
                            </div>
                        </div>

                        <!-- Custom Satuan Input (hidden by default) -->
                        <div id="custom-satuan" class="hidden">
                            <div class="input-group relative">
                                <input type="text" 
                                       name="custom_satuan" 
                                       id="custom_satuan"
                                       placeholder=" "
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white">
                                <label for="custom_satuan" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2">
                                    <i class="fas fa-edit mr-2"></i>Satuan Kustom
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-between items-center pt-8 mt-8 border-t border-gray-200 gap-4">
                        <a href="{{ route('admin.stock') }}" 
                           class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="reset" 
                                    class="flex-1 sm:flex-none bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-undo mr-2"></i>
                                Reset
                            </button>
                            <button type="submit" 
                                    class="flex-1 sm:flex-none btn-gradient text-white px-8 py-3 rounded-xl font-semibold shadow-lg flex items-center justify-center">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Barang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Quick Tips Card -->
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
            <h3 class="font-bold text-gray-800 mb-3 flex items-center">
                <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                Tips Pengisian
            </h3>
            <div class="grid md:grid-cols-2 gap-4 text-sm text-gray-600">
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                    <span>Gunakan nama yang deskriptif dan mudah dicari</span>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                    <span>Pilih kategori yang sesuai untuk kemudahan filtering</span>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                    <span>Pastikan jumlah dan satuan sudah benar</span>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                    <span>Double-check semua informasi sebelum menyimpan</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle custom satuan input
            const satuanSelect = document.getElementById('satuan');
            const customSatuanDiv = document.getElementById('custom-satuan');
            const customSatuanInput = document.getElementById('custom_satuan');

            satuanSelect.addEventListener('change', function() {
                if (this.value === 'custom') {
                    customSatuanDiv.classList.remove('hidden');
                    customSatuanInput.required = true;
                } else {
                    customSatuanDiv.classList.add('hidden');
                    customSatuanInput.required = false;
                    customSatuanInput.value = '';
                }
            });

            // Add option for custom satuan
            const customOption = document.createElement('option');
            customOption.value = 'custom';
            customOption.textContent = 'Lainnya (Custom)';
            satuanSelect.appendChild(customOption);

            // Form validation and submission
            const form = document.getElementById('stockForm');
            const submitBtn = form.querySelector('button[type="submit"]');

            form.addEventListener('submit', function(e) {
                // Show loading state
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                submitBtn.disabled = true;

                // If using custom satuan, set the main satuan value
                if (satuanSelect.value === 'custom' && customSatuanInput.value) {
                    satuanSelect.value = customSatuanInput.value;
                }
            });

            // Auto-focus first input
            document.getElementById('nama_barang').focus();

            // Input animations
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });
        });
    </script>
</body>
</html>