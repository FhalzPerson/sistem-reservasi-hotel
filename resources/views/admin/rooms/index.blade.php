@extends('admin.layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header & Tombol Tambah -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Kelola Kamar</h1>
            <p class="text-gray-500 mt-1">Tambah, edit, atau hapus data kamar hotel.</p>
        </div>
        <a href="{{ route('admin.rooms.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
            <span class="material-symbols-outlined text-sm">add</span>
            Tambah Kamar
        </a>
    </div>

    <!-- Tabel Kamar -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Kamar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga/malam</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($rooms as $room)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $room->room_number }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $room->room_type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rp {{ number_format($room->price_per_night, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($room->status == 'available')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Maintenance</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.rooms.edit', $room) }}" class="text-blue-600 hover:text-blue-900 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">delete</span> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada data kamar. Silakan tambah kamar baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection