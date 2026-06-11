<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Serene Stay</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar Kiri -->
        <div class="w-64 bg-blue-800 text-white p-5 flex flex-col">
            <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
            <ul class="space-y-2 flex-1">
                <li><a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 hover:bg-blue-700 p-2 rounded-lg transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}"><span class="material-symbols-outlined">dashboard</span> Dashboard</a></li>
                <li><a href="{{ route('admin.rooms.index') }}" class="flex items-center gap-3 hover:bg-blue-700 p-2 rounded-lg transition {{ request()->routeIs('admin.rooms.*') ? 'bg-blue-700' : '' }}"><span class="material-symbols-outlined">hotel</span> Kelola Kamar</a></li>
                <li><a href="{{ route('admin.bookings') }}" class="flex items-center gap-3 hover:bg-blue-700 p-2 rounded-lg transition {{ request()->routeIs('admin.bookings') ? 'bg-blue-700' : '' }}"><span class="material-symbols-outlined">receipt_long</span> Semua Booking</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 hover:bg-blue-700 p-2 rounded-lg transition {{ request()->routeIs('admin.users.*') ? 'bg-blue-700' : '' }}"><span class="material-symbols-outlined">group</span> Kelola User</a></li>
                <li><a href="{{ route('home') }}" class="flex items-center gap-3 hover:bg-blue-700 p-2 rounded-lg transition"><span class="material-symbols-outlined">arrow_back</span> Kembali ke Website</a></li>
            </ul>
            <div class="border-t border-blue-600 pt-4 mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full text-left hover:bg-blue-700 p-2 rounded-lg transition"><span class="material-symbols-outlined">logout</span> Logout</button>
                </form>
            </div>
        </div>
        <!-- Konten Utama -->
        <div class="flex-1 p-6 overflow-y-auto">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>