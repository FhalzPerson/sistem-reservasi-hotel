<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking - Serene Stay</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9ff; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .table-striped tbody tr:nth-of-type(odd) { background-color: rgba(0, 0, 0, .02); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

<x-navbar />

<main class="flex-grow py-12 px-6 max-w-7xl mx-auto w-full">
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow">
            <div class="flex items-center gap-2"><span class="material-symbols-outlined">error</span> {{ session('error') }}</div>
        </div>
    @endif
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Riwayat Booking</h1>
        <p class="text-gray-600">Kelola dan pantau seluruh riwayat reservasi Anda dengan mudah.</p>
    </div>

    <!-- Desktop Table -->
    <div class="hidden md:block bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr><th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Nama Kamar</th><th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Tanggal</th><th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Status</th><th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Total Harga</th><th class="px-6 py-4 text-sm font-semibold text-gray-600 uppercase">Aksi</th></tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($bookings as $booking)
                <tr class="hover:bg-blue-50/30 transition">
                    <td class="px-6 py-4"><div class="flex items-center gap-3"><div class="w-12 h-12 rounded-lg bg-gray-100 overflow-hidden"><img src="{{ $booking->room->image_url ?? 'https://via.placeholder.com/100x100' }}" class="w-full h-full object-cover"></div><span class="font-semibold">{{ $booking->room->room_type }} - {{ $booking->room->room_number }}</span></div></td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                    <td class="px-6 py-4">@php $status = $booking->payment_status; $badgeClass = $status === 'paid' ? 'bg-green-600 text-white' : ($status === 'pending' ? 'bg-yellow-500 text-black' : 'bg-red-600 text-white'); $statusText = $status === 'paid' ? 'Lunas' : ($status === 'pending' ? 'Menunggu Bayar' : 'Dibatalkan'); @endphp <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">{{ $statusText }}</span></td>
                    <td class="px-6 py-4 font-bold text-blue-700">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">@if($status === 'pending')<a href="{{ route('payment.show', $booking->id) }}" class="text-blue-700 hover:underline text-sm font-medium">Bayar Sekarang</a>@elseif($status === 'paid')<button onclick="showDetail({{ json_encode($booking) }})" class="text-blue-700 hover:underline text-sm">Detail</button>@else<span class="text-gray-400 text-sm">Dibatalkan</span>@endif</td>
                </tr>
                @empty
                <tr><td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada riwayat booking.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Mobile Cards -->
    <div class="md:hidden space-y-4">
        @forelse($bookings as $booking)
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
            <div class="flex justify-between items-start mb-2"><div><h3 class="font-bold text-lg">{{ $booking->room->room_type }} - {{ $booking->room->room_number }}</h3><p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }} - {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</p></div><span class="px-3 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">{{ $statusText }}</span></div>
            <div class="flex justify-between items-center mt-4 pt-2 border-t border-gray-100"><span class="text-blue-700 font-bold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>@if($status === 'pending')<a href="{{ route('payment.show', $booking->id) }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">Bayar</a>@elseif($status === 'paid')<button onclick="showDetail({{ json_encode($booking) }})" class="text-blue-700 text-sm font-medium">Lihat Detail</button>@else<span class="text-gray-400 text-sm">Dibatalkan</span>@endif</div>
        </div>
        @empty
        <div class="bg-white p-6 text-center text-gray-500 rounded-xl">Belum ada riwayat booking.</div>
        @endforelse
    </div>
</main>

<footer class="bg-gray-100 mt-12 py-8"><div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-sm">© 2024 Serene Stay. All rights reserved.</div></footer>

<!-- Modal Detail -->
<div id="bookingDetailModal" class="hidden fixed inset-0 z-[100] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-900/50 transition-opacity" aria-hidden="true" onclick="closeModal()"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
            <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center"><h3 class="text-xl font-bold text-gray-800">Detail Booking</h3><button onclick="closeModal()" class="text-gray-500 hover:text-gray-800"><span class="material-symbols-outlined">close</span></button></div>
            <div class="px-6 py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4"><div><h4 class="text-sm font-semibold text-blue-700 uppercase flex items-center gap-1"><span class="material-symbols-outlined text-sm">person</span> Data Pemesan</h4><p class="font-bold" id="modal-customer-name">-</p><p class="text-sm text-gray-500" id="modal-customer-email">-</p><p class="text-sm text-gray-500" id="modal-customer-phone">-</p></div><div><h4 class="text-sm font-semibold text-blue-700 uppercase flex items-center gap-1"><span class="material-symbols-outlined text-sm">door_open</span> Detail Kamar</h4><p class="font-bold" id="modal-room-name">-</p><p class="text-sm text-gray-500" id="modal-room-detail">-</p></div></div>
                    <div class="space-y-4"><div><h4 class="text-sm font-semibold text-blue-700 uppercase flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> Tanggal</h4><p class="font-bold" id="modal-dates">-</p><p class="text-sm text-gray-500" id="modal-days">-</p></div><div><h4 class="text-sm font-semibold text-blue-700 uppercase flex items-center gap-1"><span class="material-symbols-outlined text-sm">payments</span> Rincian Harga</h4><div class="flex justify-between text-sm mb-1"><span>Harga Kamar</span><span id="modal-price-base">-</span></div><div class="flex justify-between font-bold pt-2 border-t"><span>Total</span><span class="text-green-600" id="modal-price-total">-</span></div></div></div>
                </div>
                <div class="mt-6 pt-4 border-t flex flex-col items-center gap-2"><div id="modal-status-badge"></div><div id="modal-action-container" class="w-full"></div></div>
            </div>
        </div>
    </div>
</div>

<script>
    function showDetail(booking) {
        const modal = document.getElementById('bookingDetailModal');
        document.getElementById('modal-customer-name').innerText = booking.customer_name;
        document.getElementById('modal-customer-email').innerText = booking.customer_email;
        document.getElementById('modal-customer-phone').innerText = booking.customer_phone;
        document.getElementById('modal-room-name').innerText = booking.room.room_type + ' - ' + booking.room.room_number;
        document.getElementById('modal-room-detail').innerText = '1 Kamar, 2 Tamu';
        const checkIn = new Date(booking.check_in);
        const checkOut = new Date(booking.check_out);
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        const dateStr = checkIn.toLocaleDateString('id-ID', options) + ' - ' + checkOut.toLocaleDateString('id-ID', options);
        document.getElementById('modal-dates').innerText = dateStr;
        const days = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
        document.getElementById('modal-days').innerText = days + ' Malam';
        const price = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(booking.total_price);
        document.getElementById('modal-price-base').innerText = price;
        document.getElementById('modal-price-total').innerText = price;
        const status = booking.payment_status;
        const badgeDiv = document.getElementById('modal-status-badge');
        const actionDiv = document.getElementById('modal-action-container');
        badgeDiv.innerHTML = '';
        actionDiv.innerHTML = '';
        if (status === 'paid') badgeDiv.innerHTML = '<span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-bold bg-green-600 text-white">RESERVASI LUNAS</span>';
        else if (status === 'pending') { badgeDiv.innerHTML = '<span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-bold bg-yellow-500 text-black">MENUNGGU PEMBAYARAN</span>'; actionDiv.innerHTML = '<a href="/payment/' + booking.id + '" class="w-full bg-blue-700 text-white py-2 rounded-lg font-bold text-center block">Bayar Sekarang</a>'; }
        else badgeDiv.innerHTML = '<span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-bold bg-red-600 text-white">DIBATALKAN</span>';
        modal.classList.remove('hidden');
    }
    function closeModal() { document.getElementById('bookingDetailModal').classList.add('hidden'); }
</script>
</body>
</html>