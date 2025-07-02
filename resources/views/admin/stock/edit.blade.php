<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - {{ $stock->nama_barang }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .edit-gradient {
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
        .btn-update {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(79, 172, 254, 0.4);
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
        .input-group input:not(:placeholder-shown) + .floating-label,
        .input-group select:not([value=""]) + .floating-label {
            transform: translateY(-24px) scale(0.9);
            color: #667eea;
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
            <span class="text-gray-800 font-medium">Edit Barang</span>
        </nav>
    </div>

    <!-- Main Form Container -->
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-slide-up">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 px-8 py-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="bg-white bg-opacity-20 p-4 rounded-2xl mr-6">
                            <i class="fas fa-edit text-3xl text-white"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">Edit Barang</h1>
                            <p class="text-blue-100 text-lg">Perbarui informasi barang di inventaris</p>
                        </div>
                    </div>
                    <div class="hidden md:block bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-4">
                        <div class="text-white text-center">
                            <div class="text-sm opacity-80">Item ID</div>
                            <div class="text-xl font-bold">#{{ $stock->id }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Current Item Info -->
            <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-8 py-4 border-b">
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
                        Last updated: {{ $stock->updated_at ?? 'Never' }}
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form action="{{ route('admin.stock.update', $stock->id) }}" method="POST" id="editStockForm">
                    @csrf
                    @method('PUT')
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Nama Barang -->
                        <div class="md:col-span-2">
                            <div class="input-group relative">
                                <input type="text" 
                                       name="nama_barang" 
                                       id="nama_barang"
                                       value="{{ $stock->nama_barang }}"
                                       placeholder=" "
                                       data-original="{{ $stock->nama_barang }}"
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white"
                                       required>
                                <label for="nama_barang" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2 transform -translate-y-6 scale-90 text-blue-600">
                                    <i class="fas fa-box mr-2"></i>Nama Barang
                                </label>
                                <div class="change-indicator"></div>
                            </div>
                        </div>

                        <!-- Kategori -->
                        <div>
                            <div class="input-group relative">
                                <select name="kategori" 
                                        id="kategori"
                                        data-original="{{ $stock->kategori }}"
                                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white appearance-none"
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
                                <label for="kategori" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2 transform -translate-y-6 scale-90 text-blue-600">
                                    <i class="fas fa-tags mr-2"></i>Kategori
                                </label>
                                <i class="fas fa-chevron-down absolute right-4 top-5 text-gray-400 pointer-events-none"></i>
                                <div class="change-indicator"></div>
                            </div>
                        </div>

                        <!-- Jumlah -->
                        <div>
                            <div class="input-group relative">
                                <input type="number" 
                                       name="jumlah" 
                                       id="jumlah"
                                       value="{{ $stock->jumlah }}"
                                       min="0"
                                       step="1"
                                       placeholder=" "
                                       data-original="{{ $stock->jumlah }}"
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white"
                                       required>
                                <label for="jumlah" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2 transform -translate-y-6 scale-90 text-blue-600">
                                    <i class="fas fa-sort-numeric-up mr-2"></i>Jumlah
                                </label>
                                <div class="change-indicator"></div>
                            </div>
                            <div class="mt-2 text-sm text-gray-500 flex items-center">
                                <i class="fas fa-info-circle mr-1"></i>
                                Jumlah saat ini: <span class="font-semibold ml-1">{{ $stock->jumlah }}</span>
                            </div>
                        </div>

                        <!-- Satuan -->
                        <div>
                            <div class="input-group relative">
                                <select name="satuan" 
                                        id="satuan"
                                        data-original="{{ $stock->satuan }}"
                                        class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-blue-500 focus:outline-none input-focus transition-all duration-300 text-gray-800 bg-gray-50 focus:bg-white appearance-none"
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
                                <label for="satuan" class="floating-label absolute left-4 top-4 text-gray-500 pointer-events-none bg-white px-2 transform -translate-y-6 scale-90 text-blue-600">
                                    <i class="fas fa-balance-scale mr-2"></i>Satuan
                                </label>
                                <i class="fas fa-chevron-down absolute right-4 top-5 text-gray-400 pointer-events-none"></i>
                                <div class="change-indicator"></div>
                            </div>
                        </div>

                        <!-- Custom Satuan Input (if needed) -->
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

                    <!-- Changes Summary -->
                    <div id="changes-summary" class="hidden mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                        <h4 class="font-semibold text-yellow-800 mb-2 flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Perubahan yang akan disimpan:
                        </h4>
                        <div id="changes-list" class="text-sm text-yellow-700"></div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flux-row justify-between items-center pt-8 mt-8 border-t border-gray-200 gap-4">
                        <a href="{{ route('admin.stock') }}" 
                           class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Daftar
                        </a>
                        <div class="flex gap-3 w-full sm:w-auto">
                            <button type="button" 
                                    id="resetBtn"
                                    class="flex-1 sm:flex-none bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-undo mr-2"></i>
                                Reset
                            </button>
                            <button type="submit" 
                                    id="updateBtn"
                                    class="flex-1 sm:flex-none btn-update text-white px-8 py-3 rounded-xl font-semibold shadow-lg flex items-center justify-center transition-all duration-300">
                                <i class="fas fa-save mr-2"></i>
                                Update Barang
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Quick Actions Card -->
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
            <h3 class="font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-magic text-purple-500 mr-2"></i>
                Quick Actions
            </h3>
            <div class="grid md:grid-cols-3 gap-4">
                <button type="button" onclick="adjustQuantity(-1)" class="bg-white hover:bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-minus mr-2"></i>
                    Kurangi 1
                </button>
                <button type="button" onclick="adjustQuantity(1)" class="bg-white hover:bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-xl transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah 1
                </button>
                <button type="button" onclick="setLowStock()" class="bg-white hover:bg-yellow-50 border border-yellow-200 text-yellow-600 px-4 py-3 rounded-xl transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    Set Low Stock
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editStockForm');
            const updateBtn = document.getElementById('updateBtn');
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
                    const container = input.closest('.input-group');
                    
                    if (original !== current) {
                        container.classList.add('changed');
                        changes.push({
                            field: input.name,
                            label: input.previousElementSibling?.textContent || input.name,
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
                            <span class="font-medium">${change.label.replace(/[^\w\s]/gi, '')}:</span>
                            <span><span class="line-through text-red-600">${change.from}</span> → <span class="text-green-600">${change.to}</span></span>
                        </div>`
                    ).join('');
                    updateBtn.classList.remove('btn-update');
                    updateBtn.classList.add('bg-green-500', 'hover:bg-green-600');
                } else {
                    changesSummary.classList.add('hidden');
                    updateBtn.classList.add('btn-update');
                    updateBtn.classList.remove('bg-green-500', 'hover:bg-green-600');
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
                        input.closest('.input-group').classList.remove('changed');
                    });
                    changesSummary.classList.add('hidden');
                }
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                updateBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengupdate...';
                updateBtn.disabled = true;
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
</body>
</html>