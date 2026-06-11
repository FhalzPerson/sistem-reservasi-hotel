@extends('admin.layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Kamar</h1>
    <form method="POST" action="{{ route('admin.rooms.update', $room) }}" class="bg-white rounded-xl shadow-md p-6 space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700">Nomor Kamar</label>
            <input type="text" name="room_number" value="{{ old('room_number', $room->room_number) }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Tipe Kamar</label>
            <input type="text" name="room_type" value="{{ old('room_type', $room->room_type) }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Harga per malam</label>
            <input type="number" name="price_per_night" value="{{ old('price_per_night', $room->price_per_night) }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="3" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $room->description) }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">URL Gambar</label>
            <input type="url" name="image_url" value="{{ old('image_url', $room->image_url) }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.rooms.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection