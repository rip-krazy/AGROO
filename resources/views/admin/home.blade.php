<!-- resources/views/components/sidebar.blade.php -->
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-indigo-800">
            <div class="flex items-center justify-center h-16 bg-indigo-900">
                <span class="text-white font-bold text-xl">Your Logo</span>
            </div>
            <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
                <div class="flex flex-col flex-1 px-4 space-y-1">
                    <!-- Navigation Items -->
                    <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Home
                    </a>
                    
                    <a href="{{ route('stock.index') }}" class="@if(request()->routeIs('stock.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Stock
                    </a>
                    
                    <a href="{{ route('unit.index') }}" class="@if(request()->routeIs('unit.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        Unit
                    </a>
                    
                    <a href="{{ route('user.index') }}" class="@if(request()->routeIs('user.*')) bg-indigo-900 @endif flex items-center px-4 py-2 text-white rounded-lg hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        User
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="flex flex-col flex-1 overflow-hidden">
        @yield('content')
    </div>
</div>