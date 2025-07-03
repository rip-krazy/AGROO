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
                            Tambah Unit Hotel
                        </h1>
                        <p class="opacity-90 text-base">Tambahkan unit baru untuk memperluas kapasitas hotel Anda</p>
                    </div>
                    <div class="hidden md:block">
                        <a href="{{ route('admin.unit') }}" class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-3 border border-white border-opacity-20 hover:bg-opacity-20 transition-all duration-200 flex items-center">
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
                    <a href="{{ route('admin.unit') }}" class="hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-building mr-1"></i>
                        Unit Management
                    </a>
                    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
                    <span class="text-gray-800 font-medium">Tambah Unit</span>
                </div>
            </nav>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden card-hover border border-gray-200">
                <!-- Card Header -->
                <div class="bg-gray-50 border-b border-gray-200 px-6 py-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-door-open text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">Informasi Unit Baru</h2>
                            <p class="text-gray-600 text-sm">Lengkapi form di bawah untuk menambah unit hotel</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form id="unitForm" action="{{ route('admin.unit.store') }}" method="POST">
                        @csrf
                        
                        <!-- Row 1: Nama Unit & Lokasi -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Nama Unit -->
                            <div class="space-y-2">
                                <label for="nama" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-tag mr-2 text-gray-400"></i>
                                    Nama Unit
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" 
                                       id="nama"
                                       name="nama" 
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Masukkan nama unit (contoh: Deluxe Room 101)"
                                       required>
                                <p class="text-xs text-gray-500">Berikan nama yang unik dan mudah diidentifikasi</p>
                            </div>

                            <!-- Lokasi -->
                            <div class="space-y-2">
                                <label for="lokasi" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                                    Lokasi Unit
                                </label>
                                <input type="text" 
                                       id="lokasi"
                                       name="lokasi" 
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Contoh: Lantai 2, Sayap Timur">
                                <p class="text-xs text-gray-500">Tentukan lokasi atau posisi unit dalam hotel</p>
                            </div>
                        </div>

                        <!-- Row 2: Tanggal -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Tanggal -->
                            <div class="space-y-2">
                                <label for="tanggal" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-calendar mr-2 text-gray-400"></i>
                                    Tanggal Registrasi
                                </label>
                                <input type="date" 
                                       id="tanggal"
                                       name="tanggal" 
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <p class="text-xs text-gray-500">Tanggal unit didaftarkan dalam sistem</p>
                            </div>
                            <!-- Empty column for alignment -->
                            <div></div>
                        </div>

                        <!-- Row 3: Deskripsi (Full Width) -->
                        <div class="mb-6">
                            <div class="space-y-2">
                                <label for="deskripsi" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-align-left mr-2 text-gray-400"></i>
                                    Deskripsi Unit
                                </label>
                                <textarea id="deskripsi"
                                          name="deskripsi" 
                                          rows="4"
                                          class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" 
                                          placeholder="Deskripsikan fasilitas dan detail unit ini..."></textarea>
                                <p class="text-xs text-gray-500">Opsional - Jelaskan fasilitas dan keunggulan unit ini</p>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    id="submitBtn"
                                    class="btn-primary text-white px-6 py-3 rounded-md font-medium shadow-sm flex items-center justify-center order-2 sm:order-1">
                                <i class="fas fa-save mr-2 text-sm"></i>
                                <span id="submitText">Simpan Unit</span>
                            </button>
                            <a href="{{ route('admin.unit') }}" 
                               class="btn-secondary text-white px-6 py-3 rounded-md font-medium text-center flex items-center justify-center order-1 sm:order-2">
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
                        <i class="fas fa-info-circle text-blue-600 text-sm"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-blue-800 mb-1">Tips Pengisian Form</h3>
                        <ul class="text-xs text-blue-700 space-y-1">
                            <li>• Pastikan nama unit unik dan mudah diingat</li>
                            <li>• Deskripsi yang detail membantu dalam pengelolaan</li>
                            <li>• Lokasi yang jelas memudahkan identifikasi unit</li>
                            <li>• Semua field dengan tanda (*) wajib diisi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('unitForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            
            // Set default date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal').value = today;
            
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
                        field.focus();
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
                    submitText.innerHTML = '<i class="fas fa-save mr-2 text-sm"></i>Simpan Unit';
                    return;
                }
            });
            
            // Real-time validation feedback
            const inputs = form.querySelectorAll('input, textarea');
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
            
            // Character counter for description
            const deskripsiField = document.getElementById('deskripsi');
            const maxLength = 500;
            
            // Create character counter
            const counterDiv = document.createElement('div');
            counterDiv.className = 'text-xs text-gray-400 text-right mt-1';
            counterDiv.innerHTML = `<span id="charCount">0</span>/${maxLength} karakter`;
            deskripsiField.parentNode.appendChild(counterDiv);
            
            deskripsiField.addEventListener('input', function() {
                const charCount = this.value.length;
                document.getElementById('charCount').textContent = charCount;
                
                if (charCount > maxLength * 0.9) {
                    counterDiv.classList.remove('text-gray-400');
                    counterDiv.classList.add('text-orange-500');
                } else {
                    counterDiv.classList.remove('text-orange-500');
                    counterDiv.classList.add('text-gray-400');
                }
                
                if (charCount > maxLength) {
                    this.value = this.value.substring(0, maxLength);
                    document.getElementById('charCount').textContent = maxLength;
                    counterDiv.classList.remove('text-orange-500');
                    counterDiv.classList.add('text-red-500');
                } else {
                    counterDiv.classList.remove('text-red-500');
                }
            });
            
            // Auto-resize textarea
            deskripsiField.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        });
    </script>
@endsection