@extends('admin.layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header & Pencarian -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Semua Booking</h1>
            <p class="text-gray-500 mt-1">Kelola dan pantau seluruh reservasi hotel.</p>
        </div>
        <div class="relative">
            <input type="text" id="searchInput" placeholder="Cari nama atau kamar..." class="pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full sm:w-64">
            <span class="absolute left-3 top-2.5 text-gray-400">
                <span class="material-symbols-outlined text-sm">search</span>
            </span>
        </div>
    </div>

    <!-- Tabel Booking -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="bookingsTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Check-in</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Check-out</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100" id="bookingsTableBody">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition booking-row">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $booking->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ optional($booking->user)->name ?? 'Guest' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $booking->room->room_type }} ({{ $booking->room->room_number }})</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($booking->payment_status == 'paid')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Lunas</span>
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <button onclick="showBookingDetail({{ $booking->id }})" class="text-blue-600 hover:text-blue-900 flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">visibility</span> Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center text-gray-500">Belum ada booking.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Detail Booking (sama seperti di dashboard) -->
<div id="bookingModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" onclick="closeModal()"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Detail Booking</h3>
                        <div class="mt-2 text-sm text-gray-600 space-y-2" id="modalContent"></div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Filter pencarian live
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#bookingsTableBody .booking-row');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });

    function showBookingDetail(id) {
        fetch('/admin/bookings/' + id, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error(`HTTP ${response.status}`);
            return response.json();
        })
        .then(data => {
            const content = `
                <p><strong>ID:</strong> #${data.id}</p>
                <p><strong>User:</strong> ${data.user?.name ?? 'Guest'}</p>
                <p><strong>Nama Pemesan:</strong> ${data.customer_name}</p>
                <p><strong>Email:</strong> ${data.customer_email}</p>
                <p><strong>Telepon:</strong> ${data.customer_phone}</p>
                <p><strong>Kamar:</strong> ${data.room?.room_type} (${data.room?.room_number})</p>
                <p><strong>Check-in:</strong> ${data.check_in}</p>
                <p><strong>Check-out:</strong> ${data.check_out}</p>
                <p><strong>Total:</strong> Rp ${new Intl.NumberFormat('id-ID').format(data.total_price)}</p>
                <p><strong>Status:</strong> ${data.payment_status === 'paid' ? 'Lunas' : 'Pending'}</p>
                <p><strong>Permintaan Khusus:</strong> ${data.special_request || '-'}</p>
            `;
            document.getElementById('modalContent').innerHTML = content;
            document.getElementById('bookingModal').classList.remove('hidden');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat detail booking. Pastikan Anda login sebagai admin.');
        });
    }
    function closeModal() {
        document.getElementById('bookingModal').classList.add('hidden');
    }
</script>
@endsection