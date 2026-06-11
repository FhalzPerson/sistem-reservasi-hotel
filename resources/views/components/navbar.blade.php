<header class="sticky top-0 z-50 bg-white shadow-sm h-20 flex items-center">
    <nav class="flex justify-between items-center px-6 w-full max-w-7xl mx-auto">
        <div class="font-bold text-2xl text-blue-700">Serene Stay</div>
        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('home') }}" 
               class="{{ request()->routeIs('home') ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-600 hover:text-blue-700' }} pb-1 transition-colors">
                Home
            </a>
            <a href="{{ route('rooms.index') }}" 
               class="{{ request()->routeIs('rooms.*') ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-600 hover:text-blue-700' }} pb-1 transition-colors">
                Kamar
            </a>
            @if(!auth()->user() || !auth()->user()->is_admin)
                @php
                    $isBookingActive = request()->routeIs('booking.create') || 
                                       request()->routeIs('booking.store') || 
                                       request()->routeIs('payment.*') || 
                                       request()->routeIs('booking.success');
                @endphp
                <a href="{{ route('rooms.index') }}" 
                   class="{{ $isBookingActive ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-600 hover:text-blue-700' }} pb-1 transition-colors">
                    Booking
                </a>
            @endif
            <a href="{{ route('booking.history') }}" 
               class="{{ request()->routeIs('booking.history') ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-600 hover:text-blue-700' }} pb-1 transition-colors">
                Riwayat
            </a>
        </div>
        @auth
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded-full hover:bg-gray-200 transition">
                    <span class="material-symbols-outlined text-blue-700">account_circle</span>
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <span class="material-symbols-outlined text-gray-500 text-sm">expand_more</span>
                </button>
                <div x-show="open" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg overflow-hidden z-50" style="display: none;">
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-3 text-gray-700 hover:bg-gray-100 transition">
                            <span class="material-symbols-outlined text-blue-500">dashboard</span> Dashboard Admin
                        </a>
                    @endif
                    <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-3 text-gray-700 hover:bg-gray-100 transition">
                        <span class="material-symbols-outlined text-blue-500">person</span> Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2 px-4 py-3 text-gray-700 hover:bg-gray-100 transition">
                            <span class="material-symbols-outlined text-red-500">logout</span> Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="flex gap-3">
                <a href="{{ route('login') }}" class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">Login</a>
                <a href="{{ route('register') }}" class="border border-blue-700 text-blue-700 px-5 py-2 rounded-lg hover:bg-blue-50 transition">Daftar</a>
            </div>
        @endauth
    </nav>
</header>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    [x-cloak] { display: none !important; }
</style>