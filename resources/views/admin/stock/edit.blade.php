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
                            <i class="fas fa-edit mr-3 text-blue-200"></i>
                            Edit Barang - {{ $stock->nama_barang }}
                        </h1>
                        <p class="opacity-90 text-base">Perbarui informasi barang di inventaris stock hotel</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-3 border border-white border-opacity-20">
                            <div class="text-white text-center">
                                <div class="text-sm opacity-80">Item ID</div>
                                <div class="text-xl font-bold">#{{ $stock->id }}</div>
                            </div>
                        </div>
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
                    <span class="text-gray-800 font-medium">Edit Barang</span>
                </div>
            </nav>

            <!-- Current Item Info Card -->
            <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-lg p-4 mb-6 border border-blue-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-box text-white text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">{{ $stock->nama_barang }}</h3>
                            <p class="text-gray-600 text-sm">{{ $stock->kategori }} • {{ $stock->jumlah }} {{ $stock->satuan }}</p>
                        </div>
                    </div>
                    <div class="text-sm text-gray-500">
                        <i class="fas fa-clock mr-1"></i>
                        Last updated: {{ $stock->updated_at ? $stock->updated_at->format('d M Y H:i') : 'Never' }}
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden card-hover border border-gray-200">
                <!-- Card Header -->
                <div class="bg-gray-50 border-b border-gray-200 px-6 py-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-edit text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">Edit Informasi Barang</h2>
                            <p class="text-gray-600 text-sm">Update data barang sesuai kebutuhan inventaris</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form id="editStockForm" action="{{ route('admin.stock.update', $stock->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Row 1: Nama Barang (Full Width) -->
                        <div class="mb-6">
                            <div class="space-y-2 relative">
                                <label for="nama_barang" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-box mr-2 text-gray-400"></i>
                                    Nama Barang
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" 
                                       id="nama_barang"
                                       name="nama_barang" 
                                       value="{{ $stock->nama_barang }}"
                                       data-original="{{ $stock->nama_barang }}"
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Masukkan nama barang"
                                       required>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Berikan nama yang deskriptif dan mudah diidentifikasi</p>
                            </div>
                        </div>

                        <!-- Row 2: Kategori & Jumlah -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Kategori -->
                            <div class="space-y-2 relative">
                                <label for="kategori" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-tags mr-2 text-gray-400"></i>
                                    Kategori Barang
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="kategori"
                                        name="kategori" 
                                        data-original="{{ $stock->kategori }}"
                                        class="form-input form-select w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    <option value="Furniture" {{ $stock->kategori == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                                    <option value="Electronics" {{ $stock->kategori == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="Linens" {{ $stock->kategori == 'Linens' ? 'selected' : '' }}>Linens</option>
                                    <option value="Amenities" {{ $stock->kategori == 'Amenities' ? 'selected' : '' }}>Amenities</option>
                                    <option value="Cleaning" {{ $stock->kategori == 'Cleaning' ? 'selected' : '' }}>Cleaning</option>
                                    <option value="Kitchen" {{ $stock->kategori == 'Kitchen' ? 'selected' : '' }}>Kitchen</option>
                                    <option value="Maintenance" {{ $stock->kategori == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    <option value="Other" {{ $stock->kategori == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Pilih kategori yang sesuai untuk kemudahan filtering</p>
                            </div>

                            <!-- Jumlah -->
                            <div class="space-y-2 relative">
                                <label for="jumlah" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-sort-numeric-up mr-2 text-gray-400"></i>
                                    Jumlah
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="number" 
                                       id="jumlah"
                                       name="jumlah" 
                                       value="{{ $stock->jumlah }}"
                                       data-original="{{ $stock->jumlah }}"
                                       min="0"
                                       step="1"
                                       class="form-input w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                       placeholder="Masukkan jumlah barang"
                                       required>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Jumlah saat ini: <span class="font-semibold">{{ $stock->jumlah }}</span></p>
                            </div>
                        </div>

                        <!-- Row 3: Satuan -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                            <!-- Satuan -->
                            <div class="space-y-2 relative">
                                <label for="satuan" class="form-label block text-sm font-medium text-gray-700 flex items-center">
                                    <i class="fas fa-balance-scale mr-2 text-gray-400"></i>
                                    Satuan
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select id="satuan"
                                        name="satuan" 
                                        data-original="{{ $stock->satuan }}"
                                        class="form-input form-select w-full px-4 py-3 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required>
                                    <option value="pcs" {{ $stock->satuan == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                                    <option value="set" {{ $stock->satuan == 'set' ? 'selected' : '' }}>Set</option>
                                    <option value="box" {{ $stock->satuan == 'box' ? 'selected' : '' }}>Box</option>
                                    <option value="kg" {{ $stock->satuan == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                    <option value="liter" {{ $stock->satuan == 'liter' ? 'selected' : '' }}>Liter</option>
                                    <option value="unit" {{ $stock->satuan == 'unit' ? 'selected' : '' }}>Unit</option>
                                    <option value="pack" {{ $stock->satuan == 'pack' ? 'selected' : '' }}>Pack</option>
                                    <option value="roll" {{ $stock->satuan == 'roll' ? 'selected' : '' }}>Roll</option>
                                </select>
                                <div class="change-indicator"></div>
                                <p class="text-xs text-gray-500">Tentukan satuan yang sesuai untuk barang ini</p>
                            </div>

                            <!-- Custom Satuan Input (if needed) -->
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

                        <!-- Changes Summary -->
                        <div id="changes-summary" class="hidden mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <h4 class="font-semibold text-yellow-800 mb-2 flex items-center">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Perubahan yang akan disimpan:
                            </h4>
                            <div id="changes-list" class="text-sm text-yellow-700"></div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    id="updateBtn"
                                    class="btn-primary text-white px-6 py-3 rounded-md font-medium shadow-sm flex items-center justify-center order-2 sm:order-1">
                                <i class="fas fa-save mr-2 text-sm"></i>
                                <span id="updateText">Update Barang</span>
                            </button>
                            <button type="button" 
                                    id="resetBtn"
                                    class="btn-warning text-white px-6 py-3 rounded-md font-medium flex items-center justify-center order-3 sm:order-2">
                                <i class="fas fa-undo mr-2 text-sm"></i>
                                Reset Changes
                            </button>
                            <a href="{{ route('admin.stock') }}" 
                               class="btn-secondary text-white px-6 py-3 rounded-md font-medium text-center flex items-center justify-center order-1 sm:order-3">
                                <i class="fas fa-arrow-left mr-2 text-sm"></i>
                                Kembali ke Daftar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="mt-6 bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-6 border border-blue-100">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-magic text-purple-500 mr-2"></i>
                    Quick Actions
                </h3>
                <div class="grid md:grid-cols-3 gap-4">
                    <button type="button" onclick="adjustQuantity(-1)" class="bg-white hover:bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-minus mr-2"></i>
                        Kurangi 1
                    </button>
                    <button type="button" onclick="adjustQuantity(1)" class="bg-white hover:bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah 1
                    </button>
                    <button type="button" onclick="setLowStock()" class="bg-white hover:bg-yellow-50 border border-yellow-200 text-yellow-600 px-4 py-3 rounded-lg transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Set Low Stock
                    </button>
                </div>
            </div>

            <!-- Help Card -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                        <i class="fas fa-lightbulb text-blue-600 text-sm"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-blue-800 mb-1">Tips Edit Barang</h3>
                        <ul class="text-xs text-blue-700 space-y-1">
                            <li>• Field yang berubah akan ditandai dengan indikator hijau</li>
                            <li>• Gunakan Quick Actions untuk adjustment jumlah cepat</li>
                            <li>• Reset Changes akan mengembalikan ke nilai asli</li>
                            <li>• Pastikan semua perubahan sudah benar sebelum update</li>
                            <li>• Perubahan akan tercatat dalam history sistem</li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editStockForm');
            const updateBtn = document.getElementById('updateBtn');
            const updateText = document.getElementById('updateText');
            const resetBtn = document.getElementById('resetBtn');
            const changesSummary = document.getElementById('changes-summary');
            const changesList = document.getElementById('changes-list');

            // Store original values
            const originalValues = {};
            const inputs = form.querySelectorAll('input, select');
            inputs.forEach(input => {
                originalValues[input.name] = input.dataset.original || input.value;
            });

            // Track changes
            function trackChanges() {
                const changes = [];
                inputs.forEach(input => {
                    const original = originalValues[input.name];
                    const current = input.value;
                    const container = input.closest('.space-y-2');
                    
                    if (original !== current) {
                        container.classList.add('changed');
                        const fieldLabel = container.querySelector('label').textContent.replace('*', '').trim();
                        changes.push({
                            field: input.name,
                            label: fieldLabel,
                            from: original,
                            to: current
                        });
                    } else {
                        container.classList.remove('changed');
                    }
                });

                // Update changes summary
                if (changes.length > 0) {
                    changesSummary.classList.remove('hidden');
                    changesList.innerHTML = changes.map(change => 
                        `<div class="flex justify-between items-center py-1">
                            <span class="font-medium">${change.label}:</span>
                            <span><span class="line-through text-red-600">${change.from}</span> → <span class="text-green-600">${change.to}</span></span>
                        </div>`
                    ).join('');
                    updateBtn.classList.remove('btn-primary');
                    updateBtn.classList.add('btn-success');
                } else {
                    changesSummary.classList.add('hidden');
                    updateBtn.classList.add('btn-primary');
                    updateBtn.classList.remove('btn-success');
                }
            }

            // Add event listeners
            inputs.forEach(input => {
                input.addEventListener('input', trackChanges);
                input.addEventListener('change', trackChanges);
            });

            // Reset functionality
            resetBtn.addEventListener('click', function() {
                if (confirm('Yakin ingin mereset semua perubahan?')) {
                    inputs.forEach(input => {
                        const original = originalValues[input.name];
                        input.value = original;
                        input.closest('.space-y-2').classList.remove('changed');
                    });
                    changesSummary.classList.add('hidden');
                    trackChanges();
                }
            });

            // Handle custom satuan
            const satuanSelect = document.getElementById('satuan');
            const customSatuanDiv = document.getElementById('custom-satuan');
            const customSatuanInput = document.getElementById('custom_satuan');

            // Add custom option if current satuan is not in the list
            const currentSatuan = '{{ $stock->satuan }}';
            const standardSatuans = ['pcs', 'set', 'box', 'kg', 'liter', 'unit', 'pack', 'roll'];
            
            if (!standardSatuans.includes(currentSatuan)) {
                const customOption = document.createElement('option');
                customOption.value = currentSatuan;
                customOption.textContent = currentSatuan;
                customOption.selected = true;
                satuanSelect.appendChild(customOption);
            }

            // Add custom option
            const addCustomOption = document.createElement('option');
            addCustomOption.value = 'custom';
            addCustomOption.textContent = 'Lainnya (Custom)';
            satuanSelect.appendChild(addCustomOption);

            satuanSelect.addEventListener('change', function() {
                if (this.value === 'custom') {
                    customSatuanDiv.classList.remove('hidden');
                    customSatuanInput.required = true;
                } else {
                    customSatuanDiv.classList.add('hidden');
                    customSatuanInput.required = false;
                    customSatuanInput.value = '';
                }
                trackChanges();
            });

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                // Show loading state
                updateBtn.disabled = true;
                updateBtn.classList.add('loading-state');
                updateText.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengupdate...';

                // If using custom satuan, set the main satuan value
                if (satuanSelect.value === 'custom' && customSatuanInput.value) {
                    satuanSelect.value = customSatuanInput.value;
                }
            });

            // Initial change check
            trackChanges();
        });

        // Quick action functions
        function adjustQuantity(amount) {
            const jumlahInput = document.getElementById('jumlah');
            const currentValue = parseInt(jumlahInput.value) || 0;
            const newValue = Math.max(0, currentValue + amount);
            jumlahInput.value = newValue;
            jumlahInput.dispatchEvent(new Event('input'));
        }

        function setLowStock() {
            const jumlahInput = document.getElementById('jumlah');
            jumlahInput.value = 5; // Set to low stock threshold
            jumlahInput.dispatchEvent(new Event('input'));
        }
    </script>
@endsection