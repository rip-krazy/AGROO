<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotel Inventory System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .dropdown-content {
            display: none;
            transition: all 0.3s ease;
        }
        .dropdown.active .dropdown-content {
            display: block;
        }
        .dropdown.active .dropdown-chevron {
            transform: rotate(180deg);
        }
        .sidebar {
            transition: width 0.3s ease;
        }
        .sidebar.collapsed {
            width: 4rem;
        }
        .sidebar.collapsed .sidebar-text {
            opacity: 0;
            pointer-events: none;
        }
        .sidebar.collapsed .dropdown-content {
            display: none !important;
        }
        .sidebar.collapsed .dropdown-chevron {
            opacity: 0;
        }
        .sidebar-text {
            transition: opacity 0.3s ease;
        }
        .toggle-btn {
            transition: transform 0.3s ease;
        }
        .sidebar.collapsed .toggle-btn {
            transform: rotate(180deg);
        }
        .sidebar.collapsed .nav-item {
            justify-content: center;
        }
        .sidebar.collapsed .nav-item svg {
            margin-right: 0;
        }
        .tooltip {
            position: relative;
        }
        .tooltip .tooltip-text {
            visibility: hidden;
            width: 120px;
            background-color: #374151;
            color: white;
            text-align: center;
            border-radius: 6px;
            padding: 5px 8px;
            position: fixed;
            z-index: 9999;
            left: 4.5rem;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 12px;
            pointer-events: none;
            white-space: nowrap;
        }
        .tooltip .tooltip-text::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 100%;
            margin-top: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: transparent #374151 transparent transparent;
        }
        .sidebar.collapsed .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="sidebar flex flex-col w-64 bg-indigo-800 relative">
                <!-- Toggle Button -->
                <button class="toggle-btn absolute -right-3 top-6 bg-indigo-600 text-white p-1 rounded-full shadow-lg hover:bg-indigo-700 z-10 transition-colors duration-200" onclick="toggleSidebar()">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <div class="flex items-center justify-center h-16 bg-indigo-900">
                    <span class="sidebar-text text-white font-bold text-xl">Grand Luxury Hotel</span>
                    <span class="sidebar-icon hidden text-white font-bold text-xl">GLH</span>
                </div>
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                    <div class="flex flex-col flex-1 px-4 space-y-1">
                        <!-- Navigation Items -->
                        <div class="tooltip">
                            <a href="{{ route('admin.dashboard') }}" class="nav-item @if(request()->routeIs('home')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <span class="sidebar-text">Dashboard</span>
                            </a>
                            <span class="tooltip-text">Dashboard</span>
                        </div>
                        
                        <div class="tooltip">
                            <a href="{{ route('admin.stock') }}" class="nav-item @if(request()->routeIs('stock.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <span class="sidebar-text">Stock</span>
                            </a>
                            <span class="tooltip-text">Stock</span>
                        </div>
                        
                        <div class="tooltip">
                            <a href="{{ route('admin.unit') }}" class="nav-item @if(request()->routeIs('unit.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                                <span class="sidebar-text">Unit</span>
                            </a>
                            <span class="tooltip-text">Unit</span>
                        </div>

                        <!-- Surat Dropdown -->
                        <div class="dropdown tooltip mb-2 @if(request()->routeIs('memo.*') || request()->routeIs('arsip.*')) active @endif">
                            <button class="dropdown-toggle nav-item flex items-center justify-between w-full px-4 py-2 text-left text-white rounded-lg hover:bg-indigo-700">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span class="sidebar-text">Surat</span>
                                </div>
                                <svg class="dropdown-chevron sidebar-text w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div class="dropdown-content ml-8 mt-1 space-y-1">
                                <a href="{{ route('admin.memo.index') }}" class="@if(request()->routeIs('memo.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-sm text-white rounded-lg hover:bg-indigo-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                    Memo
                                </a>
                                
                                <a href="{{ route('admin.arsip.index') }}" class="@if(request()->routeIs('arsip.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-sm text-white rounded-lg hover:bg-indigo-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                    </svg>
                                    Arsip
                                </a>
                            </div>
                            <span class="tooltip-text">Surat</span>
                        </div>
                        
                        <div class="tooltip">
                            <a href="#" class="nav-item @if(request()->routeIs('user.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="sidebar-text">User</span>
                            </a>
                            <span class="tooltip-text">User</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
            
            // Update icon visibility
            const sidebarTexts = document.querySelectorAll('.sidebar-text');
            const sidebarIcon = document.querySelector('.sidebar-icon');
            
            if (sidebar.classList.contains('collapsed')) {
                sidebarIcon.classList.remove('hidden');
                sidebarTexts.forEach(text => text.style.display = 'none');
            } else {
                sidebarIcon.classList.add('hidden');
                sidebarTexts.forEach(text => text.style.display = 'inline');
            }
            
            // Update tooltip positions
            updateTooltipPositions();
        }

        function updateTooltipPositions() {
            const tooltips = document.querySelectorAll('.tooltip-text');
            tooltips.forEach(tooltip => {
                const rect = tooltip.closest('.tooltip').getBoundingClientRect();
                tooltip.style.top = (rect.top + rect.height / 2) + 'px';
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const dropdown = this.closest('.dropdown');
                    const sidebar = document.querySelector('.sidebar');
                    
                    // Don't allow dropdown to open if sidebar is collapsed
                    if (!sidebar.classList.contains('collapsed')) {
                        dropdown.classList.toggle('active');
                    }
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown')) {
                    document.querySelectorAll('.dropdown').forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            });
        });
    </script>
</body>
</html>