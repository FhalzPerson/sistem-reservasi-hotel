<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Serene Stay</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9ff; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .card-elevation { box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: all 200ms; }
        .card-elevation:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.08); }
    </style>
</head>
<body class="bg-gray-50">

<x-navbar />

<main class="max-w-7xl mx-auto px-6 py-12">
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow">{{ $errors->first() }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
        <!-- Sidebar Kiri (sama untuk semua role) -->
        <aside class="md:col-span-4 lg:col-span-3">
            <div class="bg-white rounded-xl p-6 card-elevation text-center flex flex-col items-center">
                <div class="relative mb-4">
                    @php
                        $avatarUrl = $user->profile_photo ? Storage::url($user->profile_photo) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDR03RCpZu5_hFHvbo3oF5nXmIc9oUm_lqJLFxCaLV1oXKJ1WjNv7MBvtLS6txg0OT4ACAoecM5f0i047sT_8q5OYw4Vasu2MhA8H3z_EpBDaJrLLhQUjyunsWOQKGWU8bc5gI67g0xWfM9VrHEGsasofkixFFVSLM7Bd2U6qXoQFjnZOO-yxnE2iPdNaxQJYGSTJUF31MZvOSKFajybtjZc_jvDo-Sd_GR3_g1eq7R_BVrBxS0neye6-8c5YYAMvuq4AMYd9Jz7cE';
                    @endphp
                    <img src="{{ $avatarUrl }}" alt="Avatar" class="w-32 h-32 rounded-full object-cover border-4 border-gray-100" id="avatarPreview">
                    <form method="POST" action="{{ route('profile.photo') }}" enctype="multipart/form-data" class="absolute bottom-0 right-0">
                        @csrf
                        <label for="profile_photo_input" class="bg-blue-700 text-white p-1 rounded-full shadow-lg cursor-pointer flex items-center justify-center w-8 h-8">
                            <span class="material-symbols-outlined text-sm">edit</span>
                            <input type="file" name="profile_photo" id="profile_photo_input" class="hidden" accept="image/jpeg,image/png,image/jpg" onchange="previewAndSubmit(this)">
                        </label>
                    </form>
                </div>
                <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                <p class="text-gray-500 text-sm mb-4">{{ $user->is_admin ? 'Administrator' : 'Member Silver' }}</p>
                <div class="w-full text-left space-y-3 border-t pt-4">
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-blue-700">mail</span><span>{{ $user->email }}</span></div>
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-blue-700">phone</span><span>{{ $user->phone ?? 'Belum diisi' }}</span></div>
                </div>
            </div>
        </aside>

        <!-- Konten Kanan (berdasarkan role) -->
        <div class="md:col-span-8 lg:col-span-9 space-y-6">
            @if($user->is_admin)
                {{-- TAMPILAN ADMIN: Statistik sistem (tanpa tabel booking terbaru) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white p-4 rounded-xl card-elevation flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg"><span class="material-symbols-outlined text-blue-700">hotel</span></div>
                        <div><p class="text-xs text-gray-500 uppercase">Total Kamar</p><p class="text-2xl font-bold">{{ $totalRooms ?? 0 }}</p></div>
                    </div>
                    <div class="bg-white p-4 rounded-xl card-elevation flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg"><span class="material-symbols-outlined text-blue-700">receipt_long</span></div>
                        <div><p class="text-xs text-gray-500 uppercase">Total Booking</p><p class="text-2xl font-bold">{{ $totalBookings ?? 0 }}</p></div>
                    </div>
                    <div class="bg-white p-4 rounded-xl card-elevation flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg"><span class="material-symbols-outlined text-blue-700">payments</span></div>
                        <div><p class="text-xs text-gray-500 uppercase">Total Pendapatan</p><p class="text-2xl font-bold">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p></div>
                    </div>
                    <div class="bg-white p-4 rounded-xl card-elevation flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg"><span class="material-symbols-outlined text-blue-700">group</span></div>
                        <div><p class="text-xs text-gray-500 uppercase">Total User</p><p class="text-2xl font-bold">{{ $totalUsers ?? 0 }}</p></div>
                    </div>
                </div>

                {{-- Form edit profil untuk admin (tanpa tabel booking terbaru) --}}
                <div class="bg-white rounded-xl p-6 card-elevation">
                    <h2 class="text-xl font-semibold mb-4">Edit Profil</h2>
                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                        @csrf @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium">Nama Lengkap</label><input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded-lg px-3 py-2" required></div>
                            <div><label class="block text-sm font-medium">Email</label><input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded-lg px-3 py-2" required></div>
                            <div><label class="block text-sm font-medium">Nomor Telepon</label><input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full border rounded-lg px-3 py-2"></div>
                            <div><label class="block text-sm font-medium">Tanggal Lahir</label><input type="date" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" class="w-full border rounded-lg px-3 py-2"></div>
                        </div>
                        <div><label class="block text-sm font-medium">Alamat</label><textarea name="address" rows="2" class="w-full border rounded-lg px-3 py-2">{{ old('address', $user->address) }}</textarea></div>
                        <div class="flex justify-end gap-3"><a href="{{ url('/') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Batal</a><button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Simpan Perubahan</button></div>
                    </form>
                </div>
            @else
                {{-- TAMPILAN CUSTOMER --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-xl card-elevation flex items-center gap-3"><div class="bg-blue-100 p-2 rounded-lg"><span class="material-symbols-outlined text-blue-700">calendar_month</span></div><div><p class="text-xs text-gray-500 uppercase">Total Booking</p><p class="text-2xl font-bold">{{ $totalBookings ?? 0 }}</p></div></div>
                    <div class="bg-white p-4 rounded-xl card-elevation flex items-center gap-3"><div class="bg-blue-100 p-2 rounded-lg"><span class="material-symbols-outlined text-blue-700">pending_actions</span></div><div><p class="text-xs text-gray-500 uppercase">Booking Aktif</p><p class="text-2xl font-bold">{{ $activeBookings ?? 0 }}</p></div></div>
                    <div class="bg-white p-4 rounded-xl card-elevation flex items-center gap-3"><div class="bg-blue-100 p-2 rounded-lg"><span class="material-symbols-outlined text-blue-700">verified</span></div><div><p class="text-xs text-gray-500 uppercase">Status Terakhir</p><p class="text-md font-semibold">{{ $lastStatus ?? '-' }}</p></div></div>
                </div>
                <div class="bg-white rounded-xl p-6 card-elevation">
                    <h2 class="text-xl font-semibold mb-4">Edit Profil</h2>
                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
                        @csrf @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div><label class="block text-sm font-medium">Nama Lengkap</label><input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded-lg px-3 py-2" required></div>
                            <div><label class="block text-sm font-medium">Email</label><input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded-lg px-3 py-2" required></div>
                            <div><label class="block text-sm font-medium">Nomor Telepon</label><input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full border rounded-lg px-3 py-2"></div>
                            <div><label class="block text-sm font-medium">Tanggal Lahir</label><input type="date" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" class="w-full border rounded-lg px-3 py-2"></div>
                        </div>
                        <div><label class="block text-sm font-medium">Alamat</label><textarea name="address" rows="2" class="w-full border rounded-lg px-3 py-2">{{ old('address', $user->address) }}</textarea></div>
                        <div class="flex justify-end gap-3"><a href="{{ url('/') }}" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">Batal</a><button type="submit" class="px-6 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800">Simpan Perubahan</button></div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</main>

<footer class="bg-gray-100 mt-12 py-8 text-center text-gray-500 text-sm">© 2024 Serene Stay. All rights reserved.</footer>

<script>
    function previewAndSubmit(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            input.form.submit();
        }
    }
</script>
</body>
</html>