@extends('admin.layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header & Tombol Tambah -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Kelola User</h1>
            <p class="text-gray-500 mt-1">Atur data pengguna hotel (admin & customer).</p>
        </div>
        <div class="flex gap-3">
            <div class="relative">
                <input type="text" id="searchUser" placeholder="Cari nama atau email..." class="pl-10 pr-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full sm:w-64">
                <span class="absolute left-3 top-2.5 text-gray-400">
                    <span class="material-symbols-outlined text-sm">search</span>
                </span>
            </div>
            <a href="{{ route('admin.users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                <span class="material-symbols-outlined text-sm">add</span>
                Tambah User
            </a>
        </div>
    </div>

    <!-- Tabel User -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="usersTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bergabung</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100" id="usersTableBody">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition user-row">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($user->is_admin)
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Admin</span>
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Customer</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-900 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">edit</span> Edit
                                </a>
                                @if($user->id !== Auth::id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">delete</span> Hapus
                                    </button>
                                </form>
                                @else
                                <span class="text-gray-400 text-sm cursor-not-allowed" title="Tidak dapat menghapus diri sendiri">Hapus</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">Belum ada user terdaftar.--
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Pencarian live
    document.getElementById('searchUser').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#usersTableBody .user-row');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection