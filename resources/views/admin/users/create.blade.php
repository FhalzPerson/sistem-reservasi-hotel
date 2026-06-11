@extends('admin.layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah User</h1>
    <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white rounded-xl shadow-md p-6 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="is_admin" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="0">Customer</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection