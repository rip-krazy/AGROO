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
        .btn-danger {
            background: #dc2626;
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
            background: #b91c1c;
            transform: translateY(-1px);
        }
        .table-row:nth-child(even) {
            background-color: #f8fafc;
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .status-indicator {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
        }
    </style>

    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Professional Header -->
        <header class="gradient-bg text-white py-6 px-4 md:px-8 shadow-lg">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="animate-fade-in">
                        <h1 class="text-3xl font-semibold mb-2 flex items-center">
                            <i class="fas fa-building mr-3 text-blue-200"></i>
                            Manajemen Unit Hotel
                        </h1>
                        <p class="opacity-90 text-base">Kelola data unit yang tersedia di hotel dengan mudah dan efisien</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 border border-white border-opacity-20">
                            <div class="text-sm opacity-80">Total Units</div>
                            <div class="text-xl font-semibold">{{ count($units ?? []) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="max-w-6xl mx-auto py-6 px-4 md:px-8 animate-fade-in">
            <!-- Action Bar -->
            <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">Daftar Unit</h2>
                    <p class="text-gray-600 text-sm">Manage your hotel units efficiently</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-md flex items-center transition-all duration-200 border border-gray-300">
                        <i class="fas fa-filter mr-2 text-sm"></i>
                        <span class="text-sm">Filter</span>
                    </button>
                    <a href="{{ route('admin.unit.create') }}" class="btn-primary text-white px-5 py-2 rounded-md flex items-center font-medium shadow-sm">
                        <i class="fas fa-plus mr-2 text-sm"></i>
                        <span class="text-sm">Tambah Unit</span>
                    </a>
                </div>
            </div>

            <!-- Professional Table Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden card-hover border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-hashtag mr-2"></i>
                                        No
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-door-open mr-2"></i>
                                        Nama Unit
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-align-left mr-2"></i>
                                        Deskripsi
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Lokasi
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2"></i>
                                        Tanggal
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($units as $unit)
                                <tr class="table-row hover:bg-blue-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center w-7 h-7 bg-blue-100 rounded-full text-blue-700 text-sm font-medium">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $unit->nama }}</div>
                                            <div class="ml-2 status-indicator"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button onclick="showDescription('{{ addslashes($unit->deskripsi) }}', '{{ addslashes($unit->nama) }}')" 
                                                class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1.5 rounded-md text-xs font-medium transition-all duration-200 flex items-center">
                                            <i class="fas fa-eye mr-1"></i>
                                            Lihat Deskripsi
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $unit->lokasi }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $unit->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('admin.unit.edit', $unit->id) }}" 
                                               class="btn-warning text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm flex items-center">
                                                <i class="fas fa-edit mr-1"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.unit.destroy', $unit->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus unit ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn-danger text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm flex items-center">
                                                    <i class="fas fa-trash-alt mr-1"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <!-- Empty State -->
                                <tr>
                                    <td colspan="6" class="text-center py-12">
                                        <div class="mx-auto w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-building text-2xl text-gray-400"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data unit</h3>
                                        <p class="text-gray-600 mb-6 text-sm">Mulai tambahkan unit untuk mengelola hotel</p>
                                        <a href="{{ route('admin.unit.create') }}" class="btn-primary text-white px-5 py-2 rounded-md inline-flex items-center font-medium shadow-sm">
                                            <i class="fas fa-plus mr-2 text-sm"></i>
                                            <span class="text-sm">Tambah Unit Pertama</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Pop-up untuk Deskripsi -->
    <div id="descriptionModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
            <div class="p-6">
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                        <span id="modalTitle">Deskripsi Unit</span>
                    </h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Modal Body -->
                <div class="mb-6">
                    <p id="modalDescription" class="text-gray-700 leading-relaxed text-sm"></p>
                </div>
                
                <!-- Modal Footer -->
                <div class="flex justify-end">
                    <button onclick="closeModal()" class="btn-secondary text-white px-4 py-2 rounded-md text-sm font-medium flex items-center">
                        <i class="fas fa-check mr-2"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        function showDescription(description, unitName) {
            const modal = document.getElementById('descriptionModal');
            const modalContent = document.getElementById('modalContent');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');
            
            // Set modal content
            modalTitle.textContent = `Deskripsi - ${unitName}`;
            modalDescription.textContent = description || 'Tidak ada deskripsi tersedia.';
            
            // Show modal with animation
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
            
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal() {
            const modal = document.getElementById('descriptionModal');
            const modalContent = document.getElementById('modalContent');
            
            // Hide modal with animation
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
        
        // Close modal when clicking outside
        document.getElementById('descriptionModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Professional interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation for delete buttons
            const deleteForms = document.querySelectorAll('form[method="POST"]');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission
                    
                    if (confirm('Yakin ingin menghapus unit ini?')) {
                        const button = this.querySelector('button[type="submit"]');
                        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> <span class="text-xs">Menghapus...</span>';
                        button.disabled = true;
                        button.classList.add('opacity-75');
                        
                        // Submit form after showing loading state
                        setTimeout(() => {
                            this.submit();
                        }, 100);
                    }
                });
            });

            // Add subtle hover effects to table rows
            const tableRows = document.querySelectorAll('.table-row');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#eff6ff';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '';
                });
            });
        });
    </script>
@endsection