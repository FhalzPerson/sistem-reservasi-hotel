<!DOCTYPE html>
<html class="light" lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Booking - Serene Stay</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9ff; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
        .btn-success { background-color: #198754; color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; transition: all 0.2s; }
        .btn-success:hover { background-color: #157347; transform: translateY(-1px); }
    </style>
</head>
<body class="bg-gray-50">

<!-- Navbar Component -->
<x-navbar />

<main class="pt-8 pb-12 px-6 max-w-7xl mx-auto">
    <!-- Alert Error / Sukses -->
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow" role="alert">
            <div class="flex items-center">
                <span class="material-symbols-outlined mr-2 text-red-500">error</span>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow" role="alert">
            <div class="flex items-center">
                <span class="material-symbols-outlined mr-2 text-red-500">error</span>
                <span>{{ $errors->first() }}</span>
            </div>
        </div>
    @endif

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Konfirmasi Pemesanan</h1>
        <p class="text-gray-600 mt-1">Lengkapi detail perjalanan Anda untuk mengamankan kamar.</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Form Ubah Tanggal (GET) -->
        <div class="lg:col-span-8 space-y-6">
            <form method="GET" action="{{ route('booking.create', $room->id) }}" class="bg-white p-6 rounded-xl shadow-sm">
                @csrf
                <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">calendar_month</span> Detail Waktu
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Check-in</label>
                        <input type="date" name="check_in" value="{{ old('check_in', $check_in) }}" class="mt-1 w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Check-out</label>
                        <input type="date" name="check_out" value="{{ old('check_out', $check_out) }}" class="mt-1 w-full border rounded-lg px-3 py-2">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Perbarui Tanggal</button>
                </div>
            </form>

            <!-- Form Data Tamu (POST) -->
            <form method="POST" action="{{ route('booking.store') }}" id="bookingForm" class="bg-white p-6 rounded-xl shadow-sm">
                @csrf
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <input type="hidden" name="check_in" value="{{ $check_in }}">
                <input type="hidden" name="check_out" value="{{ $check_out }}">
                <input type="hidden" name="total_price" value="{{ $total }}">
                
                <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">person</span> Informasi Tamu
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap (sesuai KTP)</label>
                        <input type="text" name="customer_name" required class="mt-1 w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="customer_email" required class="mt-1 w-full border rounded-lg px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" name="customer_phone" required class="mt-1 w-full border rounded-lg px-3 py-2">
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Summary -->
        <div class="lg:col-span-4">
            <div class="bg-white rounded-xl overflow-hidden shadow-sm lg:sticky lg:top-24">
                <div class="relative h-48">
                    <img src="{{ $room->image_url ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $room->room_type }}" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 bg-primary text-white px-2 py-1 rounded-full text-xs">Paling Populer</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold">{{ $room->room_type }} - {{ $room->room_number }}</h3>
                    <div class="flex items-center gap-2 text-gray-500 text-sm mt-1">
                        <span class="material-symbols-outlined text-sm">square_foot</span> 45 m² •
                        <span class="material-symbols-outlined text-sm">wifi</span> Free Wi-Fi
                    </div>
                    <hr class="my-4">
                    <div class="space-y-2">
                        <div class="flex justify-between"><span>Harga / malam</span><span class="font-bold">Rp {{ number_format($room->price_per_night, 0, ',', '.') }}</span></div>
                        <div class="flex justify-between"><span>Durasi ({{ $days }} malam)</span><span class="font-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span></div>
                        <div class="flex justify-between text-red-600"><span>Pajak & Layanan (10%)</span><span class="font-bold">Rp {{ number_format($tax, 0, ',', '.') }}</span></div>
                        <div class="pt-4 border-t-2 border-dashed">
                            <div class="flex justify-between items-end">
                                <span class="font-bold uppercase tracking-wider">Total Harga</span>
                                <span class="text-2xl font-bold text-primary">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" form="bookingForm" class="w-full btn-success mt-6 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">verified_user</span> Konfirmasi Pemesanan
                    </button>
                    <p class="text-center text-xs text-gray-500 mt-3">Dengan mengklik tombol, Anda menyetujui <a href="#" class="text-primary">Syarat & Ketentuan</a>.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="bg-gray-100 py-8 mt-12">
    <div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-sm">© 2024 Serene Stay. All rights reserved.</div>
</footer>

</body>
</html>