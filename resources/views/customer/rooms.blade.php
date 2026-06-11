<!DOCTYPE html>
<html class="light" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Daftar Kamar | Serene Stay</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
    .room-card:hover { transform: translateY(-4px); transition: all 0.3s ease; }
</style>
</head>
<body class="bg-gray-50 font-sans">

<!-- Navbar Component -->
<x-navbar />

<main>
    <!-- Hero Biru -->
    <section class="pt-16 pb-8 bg-blue-50 border-b-4 border-blue-700">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Daftar Kamar</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan ketenangan dan kenyamanan sejati di setiap sudut kamar kami.</p>
        </div>
    </section>

    <!-- Tampilkan Pesan Error dari Session -->
    @if(session('error'))
        <div class="max-w-7xl mx-auto px-6 mt-4">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Form Pencarian Tanggal (selalu tampil) -->
    <div class="max-w-7xl mx-auto px-6 mt-6">
        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
            <form method="GET" action="{{ url('/kamar') }}" id="searchForm" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700">Check-in</label>
                    <input type="date" name="check_in" id="check_in" value="{{ $check_in ?? '' }}" class="mt-1 w-full border rounded-lg px-3 py-2" required>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700">Check-out</label>
                    <input type="date" name="check_out" id="check_out" value="{{ $check_out ?? '' }}" class="mt-1 w-full border rounded-lg px-3 py-2" required>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded-lg">Cari Ketersediaan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Grid Kamar -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($rooms as $room)
                @php
                    $isAvailable = true;
                    if (isset($availabilities[$room->id])) {
                        $isAvailable = $availabilities[$room->id];
                    }
                @endphp
                <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition flex flex-col h-full relative">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $room->image_url ?? 'https://via.placeholder.com/400x300?text=Kamar+Hotel' }}" alt="{{ $room->room_type }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                        <!-- Badge Ketersediaan -->
                        @if(isset($check_in) && isset($check_out))
                        <div class="absolute top-4 right-4">
                            @if($isAvailable)
                                <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Tersedia</span>
                            @else
                                <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">Tidak Tersedia</span>
                            @endif
                        </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">{{ $room->room_type }}</span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-2">{{ $room->room_type }} - {{ $room->room_number }}</h3>
                        <div class="flex items-center gap-2 text-gray-500 text-sm mb-4">
                            <span class="material-symbols-outlined text-sm">square_foot</span> {{ rand(25,90) }} m² •
                            <span class="material-symbols-outlined text-sm">person</span> {{ rand(2,5) }} Tamu
                        </div>
                        <div class="flex gap-2 mb-6">
                            <span class="bg-gray-100 px-3 py-1 rounded-full text-xs">Free WiFi</span>
                            <span class="bg-gray-100 px-3 py-1 rounded-full text-xs">Sarapan</span>
                        </div>
                        <div class="mt-auto">
                            <div class="mb-4">
                                <span class="text-2xl font-bold text-blue-700">Rp {{ number_format($room->price_per_night, 0, ',', '.') }}</span>
                                <span class="text-gray-500 text-sm">/ malam</span>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <a href="{{ route('rooms.show', $room->id) }}" class="border border-blue-700 text-blue-700 py-2 rounded-lg text-center hover:bg-blue-50">Detail</a>
                                @if(auth()->user() && auth()->user()->is_admin)
                                    <button class="bg-gray-400 text-white py-2 rounded-lg text-center cursor-not-allowed" disabled>Admin tidak bisa booking</button>
                                @elseif(isset($check_in) && isset($check_out) && !$isAvailable)
                                    <button class="bg-gray-400 text-white py-2 rounded-lg text-center cursor-not-allowed" disabled>Tidak Tersedia</button>
                                @else
                                    <a href="{{ route('booking.create', $room->id) }}?check_in={{ $check_in ?? date('Y-m-d') }}&check_out={{ $check_out ?? date('Y-m-d', strtotime('+2 days')) }}" class="bg-blue-700 text-white py-2 rounded-lg text-center hover:bg-blue-800">Booking</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12 text-gray-500">Belum ada kamar yang tersedia.</div>
                @endforelse
            </div>
        </div>
    </section>
</main>

<footer class="bg-gray-100 mt-12 py-8">
    <div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-sm">© 2024 Serene Stay. All rights reserved.</div>
</footer>

<script>
    // Validasi Client-side: cek check-out tidak boleh <= check-in
    document.getElementById('searchForm').addEventListener('submit', function(e) {
        const checkIn = document.getElementById('check_in').value;
        const checkOut = document.getElementById('check_out').value;
        if (checkIn && checkOut && checkOut <= checkIn) {
            e.preventDefault();
            alert('Tanggal check-out harus setelah check-in.');
        }
    });
</script>
</body>
</html>