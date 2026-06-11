@extends('admin.layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h1>
    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="bg-white rounded-xl shadow-md p-6 space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="is_admin" class="mt-1 w-full border rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Customer</option>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection