@extends('home')

@section('content')
    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Professional Header -->
        <header class="bg-gradient-to-r from-blue-800 to-blue-500 text-white py-6 px-4 md:px-8 shadow-lg">
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
                    <form action="{{ route('admin.unit') }}" method="GET" class="flex items-center">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Cari unit..." 
                                   class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                                   value="{{ request('search') }}">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                        </div>
                        <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition-all duration-200 flex items-center">
                            <i class="fas fa-search mr-2 text-xs"></i>
                            <span class="text-sm">Cari</span>
                        </button>
                        @if(request('search'))
                            <a href="{{ route('admin.unit') }}" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md transition-all duration-200 flex items-center">
                                <i class="fas fa-times mr-2 text-xs"></i>
                                <span class="text-sm">Reset</span>
                            </a>
                        @endif
                    </form>
                    <a href="{{ route('admin.unit.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md flex items-center font-medium shadow-sm transition-all duration-200 hover:translate-y-[-1px] hover:shadow-md">
                        <i class="fas fa-plus mr-2 text-sm"></i>
                        <span class="text-sm">Tambah Unit</span>
                    </a>
                </div>
            </div>

            <!-- Professional Table Card -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transition-all duration-300 ease-in-out hover:translate-y-[-2px] hover:shadow-md border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-hashtag mr-2"></i>
                                        No
                                    </div>
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-door-open mr-2"></i>
                                        Nama Unit
                                    </div>
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-star mr-2"></i>
                                        Tipe
                                    </div>
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        Status
                                    </div>
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-users mr-2"></i>
                                        Kapasitas
                                    </div>
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-money-bill-wave mr-2"></i>
                                        Harga
                                    </div>
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        Lokasi
                                    </div>
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="fas fa-cogs mr-2"></i>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($units as $unit)
                                <tr class="hover:bg-blue-50 transition-colors duration-200 even:bg-gray-50">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full text-blue-700 text-xs font-medium">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $unit->nama }}</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $unit->tipe }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex justify-center items-center">
                                            @php
                                                $statusClasses = [
                                                    'Tersedia' => 'bg-green-100 text-green-800',
                                                    'Dipesan' => 'bg-yellow-100 text-yellow-800', 
                                                    'Dalam Perawatan' => 'bg-blue-100 text-blue-800',
                                                    'Tidak Tersedia' => 'bg-red-100 text-red-800'
                                                ];
                                                $statusClass = $statusClasses[$unit->status] ?? 'bg-gray-100 text-gray-800';
                                            @endphp
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                                <span class="w-2 h-2 rounded-full mr-1 
                                                    @if($unit->status === 'Tersedia') bg-green-500
                                                    @elseif($unit->status === 'Dipesan') bg-yellow-500
                                                    @elseif($unit->status === 'Dalam Perawatan') bg-blue-500
                                                    @elseif($unit->status === 'Tidak Tersedia') bg-red-500
                                                    @endif"></span>
                                                {{ $unit->status }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="bg-green-50 text-green-800 px-2 py-0.5 rounded-full text-xs font-medium">
                                            <i class="fas fa-user-friends mr-1"></i>
                                            {{ $unit->kapasitas }} orang
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="bg-blue-50 text-blue-800 px-2 py-0.5 rounded-full text-xs font-medium">
                                            <i class="fas fa-tag mr-1"></i>
                                            Rp {{ number_format($unit->harga, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            {{ $unit->lokasi }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <a href="{{ route('admin.unit.edit', $unit->id) }}" 
                                               class="w-7 h-7 flex items-center justify-center rounded-md bg-yellow-500 hover:bg-yellow-600 text-white transition-all duration-200 hover:scale-110"
                                               title="Edit">
                                                <i class="fas fa-edit text-xs"></i>
                                            </a>
                                            <form action="{{ route('admin.unit.destroy', $unit->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="w-7 h-7 flex items-center justify-center rounded-md bg-red-600 hover:bg-red-700 text-white transition-all duration-200 hover:scale-110"
                                                        title="Delete"
                                                        onclick="return confirm('Yakin ingin menghapus unit ini?')">
                                                    <i class="fas fa-trash-alt text-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <!-- Empty State -->
                                <tr>
                                    <td colspan="8" class="text-center py-12">
                                        <div class="mx-auto w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-building text-2xl text-gray-400"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada data unit</h3>
                                        <p class="text-gray-600 mb-6 text-sm">Mulai tambahkan unit untuk mengelola hotel</p>
                                        <a href="{{ route('admin.unit.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md inline-flex items-center font-medium shadow-sm transition-all duration-200 hover:translate-y-[-1px] hover:shadow-md">
                                            <i class="fas fa-plus mr-2 text-sm"></i>
                                            <span class="text-sm">Tambah Unit Pertama</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($units->hasPages())
                <div class="bg-gray-50 px-4 py-3 border-t border-gray-200 sm:px-6">
                    {{ $units->withQueryString()->links() }}
                </div>
                @endif
            </div>
        </main>
    </div>

    <script>
        // Professional interactive functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation for delete buttons
            const deleteForms = document.querySelectorAll('form[method="POST"]');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    button.disabled = true;
                    button.classList.add('opacity-75');
                });
            });

            // Add subtle hover effects to table rows
            const tableRows = document.querySelectorAll('tbody tr');
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