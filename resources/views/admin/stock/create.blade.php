@extends('home')

@section('content')
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .btn-primary {
            background: #3b82f6;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }
        .btn-secondary {
            background: #6b7280;
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: #4b5563;
            transform: translateY(-1px);
        }
        .btn-warning {
            background: #f59e0b;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            background: #d97706;
            transform: translateY(-1px);
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-input {
            transition: all 0.3s ease;
            border: 1px solid #d1d5db;
        }
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }
        .form-input:hover {
            border-color: #9ca3af;
        }
        .form-label {
            transition: color 0.3s ease;
        }
        .loading-state {
            opacity: 0.75;
            pointer-events: none;
        }
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            appearance: none;
        }
    </style>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Professional Header -->
        <header class="gradient-bg text-white py-6 px-4 md:px-8 shadow-lg">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="animate-fade-in">
                        <h1 class="text-3xl font-semibold mb-2 flex items-center">
                            <i class="fas fa-plus-circle mr-3 text-blue-200"></i>
                            Tambah Barang Baru
                        </h1>
                        <p class="opacity-90 text-base">Tambahkan item baru untuk memperluas inventaris stock hotel</p>
                    </div>
                    <div class="hidden md:block">
                        <a href="{{ route('admin.stock') }}" class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-3 border border-white border-opacity-20 hover:bg-opacity-20 transition-all duration-200 flex items-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            <span class="text-sm">Kembali ke Daftar</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-6xl mx-auto py-6 px-4 md:px-8 animate-fade-in">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <div class="flex items-center text-sm text-gray-600">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-home mr-1"></i>
                        Dashboard
                    </a>
                    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                    <a href="{{ route('admin.stock') }}" class="hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-boxes mr-1"></i>
                        Stock Management
                    </a>
                    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Tambah Barang</span>
                </div>
            </nav>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden card-hover border border-gray-200">
                <!-- Card Header -->
                <div class="bg-gray-50 border-b border-gray-200 px-6 py-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-box text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">Informasi Barang Baru</h2>
                            <p class="text-gray-600 text-sm">Lengkapi form di bawah untuk menambah barang ke inventaris</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form id="stockForm" action="{{ route('admin.stock.store') }}" method="POST">
                        @csrf
                        
                        <!-- Row 1: Nama Barang (Full Width) -->
                        <div class="mb-6">
                            <div class="space-y-2">
                                <label for="nama_barang" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-box mr-2 text-gray-400"></i>
                                    Nama Barang
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" 
                                       id="nama_barang"
                                       name="nama_barang" 
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Masukkan nama barang (contoh: Handuk Mandi Premium)"
                                       required>
                                <p class="text-xs text-gray-500">Berikan nama yang deskriptif dan mudah diidentifikasi</p>
                            </div>
                        </div>

                        <!-- Row 2: Kategori & Jumlah -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Kategori -->
                            <div class="space-y-2">
                                <label for="kategori" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-tags mr-2 text-gray-400"></i>
                                    Kategori Barang
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="kategori"
                                        name="kategori" 
                                        class="form-input form-select w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    <option value="" disabled selected>Pilih kategori barang</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Electronics">Electronics</option>
                                    <option value="Linens">Linens</option>
                                    <option value="Amenities">Amenities</option>
                                    <option value="Cleaning">Cleaning</option>
                                    <option value="Kitchen">Kitchen</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Other">Other</option>
                                </select>
                                <p class="text-xs text-gray-500">Pilih kategori yang sesuai untuk kemudahan filtering</p>
                            </div>

                            <!-- Jumlah -->
                            <div class="space-y-2">
                                <label for="jumlah" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-sort-numeric-up mr-2 text-gray-400"></i>
                                    Jumlah
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="number" 
                                       id="jumlah"
                                       name="jumlah" 
                                       min="0"
                                       step="1"
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Masukkan jumlah barang"
                                       required>
                                <p class="text-xs text-gray-500">Masukkan jumlah barang yang akan ditambahkan</p>
                            </div>
                        </div>

                        <!-- Row 3: Satuan -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Satuan -->
                            <div class="space-y-2">
                                <label for="satuan" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-balance-scale mr-2 text-gray-400"></i>
                                    Satuan
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="satuan"
                                        name="satuan" 
                                        class="form-input form-select w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    <option value="" disabled selected>Pilih satuan barang</option>
                                    <option value="pcs">Pieces (pcs)</option>
                                    <option value="set">Set</option>
                                    <option value="box">Box</option>
                                    <option value="kg">Kilogram (kg)</option>
                                    <option value="liter">Liter</option>
                                    <option value="unit">Unit</option>
                                    <option value="pack">Pack</option>
                                    <option value="roll">Roll</option>
                                </select>
                                <p class="text-xs text-gray-500">Tentukan satuan yang sesuai untuk barang ini</p>
                            </div>

                            <!-- Custom Satuan (Hidden by default) -->
                            <div id="custom-satuan" class="space-y-2 hidden">
                                <label for="custom_satuan" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-edit mr-2 text-gray-400"></i>
                                    Satuan Kustom
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" 
                                       id="custom_satuan"
                                       name="custom_satuan" 
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Masukkan satuan kustom">
                                <p class="text-xs text-gray-500">Masukkan satuan khusus sesuai kebutuhan</p>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    id="submitBtn"
                                    class="btn-primary text-white px-6 py-3 rounded-md font-medium shadow-sm flex items-center justify-center order-2 sm:order-1">
                                <i class="fas fa-save mr-2 text-sm"></i>
                                <span id="submitText">Simpan Barang</span>
                            </button>
                            <button type="reset" 
                                    id="resetBtn"
                                    class="btn-warning text-white px-6 py-3 rounded-md font-medium flex items-center justify-center order-3 sm:order-2">
                                <i class="fas fa-undo mr-2 text-sm"></i>
                                Reset Form
                            </button>
                            <a href="{{ route('admin.stock') }}" 
                               class="btn-secondary text-white px-6 py-3 rounded-md font-medium text-center flex items-center justify-center order-1 sm:order-3">
                                <i class="fas fa-times mr-2 text-sm"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Card -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                        <i class="fas fa-lightbulb text-blue-600 text-sm"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-blue-800 mb-1">Tips Pengisian Form</h3>
                        <ul class="text-xs text-blue-700 space-y-1">
                            <li>• Gunakan nama yang deskriptif dan mudah dicari</li>
                            <li>• Pilih kategori yang sesuai untuk kemudahan filtering</li>
                            <li>• Pastikan jumlah dan satuan sudah benar</li>
                            <li>• Double-check semua informasi sebelum menyimpan</li>
                            <li>• Semua field dengan tanda (*) wajib diisi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('stockForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const resetBtn = document.getElementById('resetBtn');
            
            // Handle custom satuan input
            const satuanSelect = document.getElementById('satuan');
            const customSatuanDiv = document.getElementById('custom-satuan');
            const customSatuanInput = document.getElementById('custom_satuan');

            // Add option for custom satuan
            const customOption = document.createElement('option');
            customOption.value = 'custom';
            customOption.textContent = 'Lainnya (Custom)';
            satuanSelect.appendChild(customOption);

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
            
            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.classList.add('loading-state');
                submitText.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                
                // Add subtle form validation feedback
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('border-red-300');
                        if (isValid) field.focus();
                        isValid = false;
                    } else {
                        field.classList.remove('border-red-300');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    // Reset button state
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('loading-state');
                    submitText.innerHTML = '<i class="fas fa-save mr-2 text-sm"></i>Simpan Barang';
                    return;
                }

                // If using custom satuan, set the main satuan value
                if (satuanSelect.value === 'custom' && customSatuanInput.value) {
                    satuanSelect.value = customSatuanInput.value;
                }
            });

            // Reset button functionality
            resetBtn.addEventListener('click', function() {
                // Reset custom satuan visibility
                customSatuanDiv.classList.add('hidden');
                customSatuanInput.required = false;
                
                // Remove validation classes
                const inputs = form.querySelectorAll('input, select');
                inputs.forEach(input => {
                    input.classList.remove('border-red-300');
                });
                
                // Focus first input after reset
                setTimeout(() => {
                    document.getElementById('nama_barang').focus();
                }, 100);
            });
            
            // Real-time validation feedback
            const inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.hasAttribute('required') && !this.value.trim()) {
                        this.classList.add('border-red-300');
                    } else {
                        this.classList.remove('border-red-300');
                    }
                });
                
                input.addEventListener('input', function() {
                    if (this.classList.contains('border-red-300') && this.value.trim()) {
                        this.classList.remove('border-red-300');
                    }
                });
            });
            
            // Auto-focus first input
            document.getElementById('nama_barang').focus();
        });
    </script>
@endsection