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
                            <i class="fas fa-warehouse mr-3 text-blue-200"></i>
                            Manajemen Stok Barang
                        </h1>
                        <p class="opacity-90 text-base">Kelola inventaris hotel dengan mudah dan efisien</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 border border-white border-opacity-20">
                            <div class="text-sm opacity-80">Total Items</div>
                            <div class="text-xl font-semibold">{{ count($stocks ?? []) }}</div>
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
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">Daftar Inventaris</h2>
                    <p class="text-gray-600 text-sm">Manage your hotel inventory efficiently</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-md flex items-center transition-all duration-200 border border-gray-300">
                        <i class="fas fa-filter mr-2 text-sm"></i>
                        <span class="text-sm">Filter</span>
                    </button>
                    <a href="{{ route('admin.stock.create') }}" class="btn-primary text-white px-5 py-2 rounded-md flex items-center font-medium shadow-sm">
                        <i class="fas fa-plus mr-2 text-sm"></i>
                        <span class="text-sm">Tambah Barang</span>
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
                                        <i class="fas fa-box mr-2"></i>
                                        Nama Barang
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-tags mr-2"></i>
                                        Kategori
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-sort-numeric-up mr-2"></i>
                                        Jumlah
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-balance-scale mr-2"></i>
                                        Satuan
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
                            @foreach($stocks as $stock)
                            <tr class="table-row hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center w-7 h-7 bg-blue-100 rounded-full text-blue-700 text-sm font-medium">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $stock->nama_barang }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $stock->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $stock->jumlah }}</div>
                                        <div class="ml-2 status-indicator"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ $stock->satuan }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('admin.stock.edit', $stock->id) }}" 
                                           class="btn-warning text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm flex items-center">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.stock.destroy', $stock->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty State (if no data) -->
            @if(empty($stocks) || count($stocks) == 0)
            <div class="text-center py-12">
                <div class="mx-auto w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-boxes text-2xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data stok</h3>
                <p class="text-gray-600 mb-6 text-sm">Mulai tambahkan barang untuk mengelola inventaris hotel</p>
                <a href="{{ route('admin.stock.create') }}" class="btn-primary text-white px-5 py-2 rounded-md inline-flex items-center font-medium shadow-sm">
                    <i class="fas fa-plus mr-2 text-sm"></i>
                    <span class="text-sm">Tambah Barang Pertama</span>
                </a>
            </div>
            @endif
        </main>
    </div>
</div>

<script>
    // Professional interactive functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Add loading animation ONLY for delete buttons
        const deleteForms = document.querySelectorAll('form[method="POST"]');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                
                if (confirm('Yakin ingin menghapus barang ini?')) {
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