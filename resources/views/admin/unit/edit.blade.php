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
        .btn-success {
            background: #10b981;
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
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
        .change-indicator {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 16px;
            height: 16px;
            background: #10b981;
            border-radius: 50%;
            display: none;
        }
        .changed .change-indicator {
            display: block;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .changed .form-input {
            border-color: #10b981;
            background-color: #ecfdf5;
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
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-home mr-1"></i>
                        Dashboard
                    </a>
                    <i class="fas fa-chevron-right mx-2 text-gray-400"></i>
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
                        
                        <!-- Row 1: Nama Unit & Tipe Unit -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Nama Unit -->
                            <div class="space-y-2 relative">
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
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Berikan nama yang unik dan mudah diidentifikasi</p>
                            </div>

                            <!-- Tipe Unit -->
                            <div class="space-y-2 relative">
                                <label for="tipe" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-star mr-2 text-gray-400"></i>
                                    Tipe Unit
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="tipe"
                                        name="tipe" 
                                        class="form-input form-select w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    <option value="">Pilih Tipe Unit</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Deluxe">Deluxe</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Executive">Executive</option>
                                    <option value="Presidential">Presidential</option>
                                </select>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Pilih tipe unit yang sesuai</p>
                            </div>
                        </div>

                        <!-- Row 2: Lokasi & Status -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Lokasi -->
                            <div class="space-y-2 relative">
                                <label for="lokasi" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                                    Lokasi Unit
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="lokasi"
                                        name="lokasi" 
                                        class="form-input form-select w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    <option value="">Pilih Lokasi Unit</option>
                                    <option value="Lantai 1 - Sayap Barat">Lantai 1 - Sayap Barat</option>
                                    <option value="Lantai 1 - Sayap Timur">Lantai 1 - Sayap Timur</option>
                                    <option value="Lantai 2 - Sayap Barat">Lantai 2 - Sayap Barat</option>
                                    <option value="Lantai 2 - Sayap Timur">Lantai 2 - Sayap Timur</option>
                                    <option value="Lantai 3 - Sayap Barat">Lantai 3 - Sayap Barat</option>
                                    <option value="Lantai 3 - Sayap Timur">Lantai 3 - Sayap Timur</option>
                                </select>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Tentukan lokasi unit dalam hotel</p>
                            </div>

                            <!-- Status -->
                            <div class="space-y-2 relative">
                                <label for="status" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-check-circle mr-2 text-gray-400"></i>
                                    Status Unit
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="status"
                                        name="status" 
                                        class="form-input form-select w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Dalam Perawatan">Dalam Perawatan</option>
                                    <option value="Dipesan">Dipesan</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Tentukan status awal unit</p>
                            </div>
                        </div>

                        <!-- Row 3: Kapasitas & Harga -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Kapasitas -->
                            <div class="space-y-2 relative">
                                <label for="kapasitas" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-users mr-2 text-gray-400"></i>
                                    Kapasitas
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="number" 
                                       id="kapasitas"
                                       name="kapasitas" 
                                       min="1"
                                       max="10"
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Masukkan kapasitas unit"
                                       required>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Jumlah maksimal tamu yang dapat menginap</p>
                            </div>

                            <!-- Harga per Malam -->
                            <div class="space-y-2 relative">
                                <label for="harga" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-money-bill-wave mr-2 text-gray-400"></i>
                                    Harga per Malam
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">Rp</span>
                                    <input type="number" 
                                           id="harga"
                                           name="harga" 
                                           min="100000"
                                           step="50000"
                                           class="form-input w-full pl-10 px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                           placeholder="Masukkan harga per malam"
                                           required>
                                </div>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Harga dasar untuk satu malam menginap</p>
                            </div>
                        </div>

                        <!-- Row 4: Deskripsi (Full Width) -->
                        <div class="mb-6">
                            <div class="space-y-2 relative">
                                <label for="deskripsi" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-align-left mr-2 text-gray-400"></i>
                                    Deskripsi Unit
                                </label>
                                <textarea id="deskripsi"
                                          name="deskripsi" 
                                          rows="4"
                                          class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" 
                                          placeholder="Deskripsikan fasilitas dan detail unit ini..."></textarea>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Opsional - Jelaskan fasilitas dan keunggulan unit ini</p>
                            </div>
                        </div>

                        <!-- Changes Summary -->
                        <div id="changes-summary" class="hidden mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <h4 class="font-semibold text-yellow-800 mb-2 flex items-center">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Data yang akan disimpan:
                            </h4>
                            <div id="changes-list" class="text-sm text-yellow-700"></div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    id="submitBtn"
                                    class="btn-primary text-white px-6 py-3 rounded-md font-medium shadow-sm flex items-center justify-center order-2 sm:order-1">
                                <i class="fas fa-save mr-2 text-sm"></i>
                                <span id="submitText">Simpan Unit</span>
                            </button>
                            <button type="reset" 
                                    id="resetBtn"
                                    class="btn-secondary text-white px-6 py-3 rounded-md font-medium flex items-center justify-center order-3 sm:order-2">
                                <i class="fas fa-undo mr-2 text-sm"></i>
                                Reset Form
                            </button>
                            <a href="{{ route('admin.unit') }}" 
                               class="btn-secondary text-white px-6 py-3 rounded-md font-medium text-center flex items-center justify-center order-1 sm:order-3">
                                <i class="fas fa-arrow-left mr-2 text-sm"></i>
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="mt-6 bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-6 border border-blue-100">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-magic text-purple-500 mr-2"></i>
                    Template Cepat
                </h3>
                <div class="grid md:grid-cols-3 gap-4">
                    <button type="button" onclick="fillStandardRoom()" class="bg-white hover:bg-blue-50 border border-blue-200 text-blue-600 px-4 py-3 rounded-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-bed mr-2"></i>
                        Standard Room
                    </button>
                    <button type="button" onclick="fillDeluxeRoom()" class="bg-white hover:bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-bed mr-2"></i>
                        Deluxe Room
                    </button>
                    <button type="button" onclick="fillSuiteRoom()" class="bg-white hover:bg-purple-50 border border-purple-200 text-purple-600 px-4 py-3 rounded-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-bed mr-2"></i>
                        Suite Room
                    </button>
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
                            <li>• Gunakan nama yang jelas dan deskriptif untuk unit</li>
                            <li>• Pilih tipe unit yang sesuai dengan fasilitas</li>
                            <li>• Tentukan lokasi yang tepat untuk memudahkan identifikasi</li>
                            <li>• Gunakan template cepat untuk mengisi form dengan cepat</li>
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
            const resetBtn = document.getElementById('resetBtn');
            const changesSummary = document.getElementById('changes-summary');
            const changesList = document.getElementById('changes-list');
            
            // Set default values
            document.getElementById('status').value = 'Tersedia';
            document.getElementById('kapasitas').value = '2';
            document.getElementById('harga').value = '500000';
            
            // Track changes
            function trackChanges() {
                const inputs = form.querySelectorAll('input, select, textarea');
                const changes = [];
                
                inputs.forEach(input => {
                    const container = input.closest('.space-y-2');
                    if (container) {
                        if (input.value && input.value !== '') {
                            container.classList.add('changed');
                            const fieldLabel = container.querySelector('label').textContent.replace('*', '').trim();
                            changes.push({
                                field: input.name,
                                label: fieldLabel,
                                value: input.value
                            });
                        } else {
                            container.classList.remove('changed');
                        }
                    }
                });
                
                // Update changes summary
                if (changes.length > 0) {
                    changesSummary.classList.remove('hidden');
                    changesList.innerHTML = changes.map(change => 
                        `<div class="flex justify-between items-center py-1">
                            <span class="font-medium">${change.label}:</span>
                            <span class="text-green-600">${change.value}</span>
                        </div>`
                    ).join('');
                    submitBtn.classList.remove('btn-primary');
                    submitBtn.classList.add('btn-success');
                } else {
                    changesSummary.classList.add('hidden');
                    submitBtn.classList.add('btn-primary');
                    submitBtn.classList.remove('btn-success');
                }
            }
            
            // Add event listeners
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.addEventListener('input', trackChanges);
                input.addEventListener('change', trackChanges);
            });
            
            // Reset functionality
            resetBtn.addEventListener('click', function() {
                if (confirm('Yakin ingin mereset semua data yang telah diisi?')) {
                    form.reset();
                    document.getElementById('status').value = 'Tersedia';
                    document.getElementById('kapasitas').value = '2';
                    document.getElementById('harga').value = '500000';
                    trackChanges();
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
                    submitText.innerHTML = '<i class="fas fa-save mr-2 text-sm"></i>Simpan Unit';
                    return;
                }
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
                
                trackChanges();
            });
            
            // Auto-resize textarea
            deskripsiField.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
            
            // Initial change check
            trackChanges();
        });
        
        // Quick action functions
        function fillStandardRoom() {
            document.getElementById('nama').value = 'Standard Room 101';
            document.getElementById('tipe').value = 'Standard';
            document.getElementById('lokasi').value = 'Lantai 1 - Sayap Barat';
            document.getElementById('kapasitas').value = '2';
            document.getElementById('harga').value = '500000';
            document.getElementById('deskripsi').value = 'Kamar standar dengan fasilitas dasar: tempat tidur double, AC, TV, kamar mandi dengan shower. Cocok untuk tamu tunggal atau pasangan.';
            
            // Trigger change events
            const inputs = document.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.dispatchEvent(new Event('input'));
            });
        }
        
        function fillDeluxeRoom() {
            document.getElementById('nama').value = 'Deluxe Room 201';
            document.getElementById('tipe').value = 'Deluxe';
            document.getElementById('lokasi').value = 'Lantai 2 - Sayap Timur';
            document.getElementById('kapasitas').value = '3';
            document.getElementById('harga').value = '750000';
            document.getElementById('deskripsi').value = 'Kamar deluxe lebih luas dengan tempat tidur king size, AC, TV LED, minibar, dan kamar mandi dengan bathtub. Dilengkapi dengan coffee maker.';
            
            // Trigger change events
            const inputs = document.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.dispatchEvent(new Event('input'));
            });
        }
        
        function fillSuiteRoom() {
            document.getElementById('nama').value = 'Suite Room 301';
            document.getElementById('tipe').value = 'Suite';
            document.getElementById('lokasi').value = 'Lantai 3 - Sayap Barat';
            document.getElementById('kapasitas').value = '4';
            document.getElementById('harga').value = '1200000';
            document.getElementById('deskripsi').value = 'Suite mewah dengan ruang tamu terpisah, tempat tidur king size premium, AC, TV LED 55", minibar lengkap, kamar mandi mewah dengan bathtub dan shower. Dilengkapi dengan coffee maker dan akses lounge.';
            
            // Trigger change events
            const inputs = document.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.dispatchEvent(new Event('input'));
            });
        }
    </script>
@endsection