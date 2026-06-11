@extends('admin.layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kamar</h1>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.rooms.store') }}" class="bg-white rounded-xl shadow-md p-6 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Nomor Kamar</label>
            <input type="text" name="room_number" value="{{ old('room_number') }}" class="mt-1 w-full border rounded-lg px-3 py-2 @error('room_number') border-red-500 @enderror" required>
            @error('room_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Tipe Kamar</label>
            <input type="text" name="room_type" value="{{ old('room_type') }}" class="mt-1 w-full border rounded-lg px-3 py-2 @error('room_type') border-red-500 @enderror" required>
            @error('room_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Harga per malam</label>
            <input type="number" name="price_per_night" value="{{ old('price_per_night') }}" step="1000" class="mt-1 w-full border rounded-lg px-3 py-2 @error('price_per_night') border-red-500 @enderror" required>
            @error('price_per_night') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="3" class="mt-1 w-full border rounded-lg px-3 py-2">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">URL Gambar</label>
            <input type="url" name="image_url" value="{{ old('image_url') }}" class="mt-1 w-full border rounded-lg px-3 py-2">
            @error('image_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="mt-1 w-full border rounded-lg px-3 py-2">
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.rooms.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection