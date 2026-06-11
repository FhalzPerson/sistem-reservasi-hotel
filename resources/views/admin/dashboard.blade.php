@extends('admin.layouts.admin')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500">Selamat datang, {{ Auth::user()->name }}. Kelola operasional hotel Anda dengan satu sentuhan.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Kamar -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Total Kamar</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalRooms ?? 0 }}</p>
                </div>
                <div class="bg-blue-100 p-2 rounded-lg">
                    <span class="material-symbols-outlined text-blue-600">hotel</span>
                </div>
            </div>
            <div class="mt-3 flex items-center text-sm">
                <span class="text-green-600">↑ 8%</span>
                <span class="text-gray-400 ml-2">peningkatan</span>
            </div>
        </div>

        <!-- Total Booking -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Total Booking</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBookings ?? 0 }}</p>
                </div>
                <div class="bg-green-100 p-2 rounded-lg">
                    <span class="material-symbols-outlined text-green-600">receipt_long</span>
                </div>
            </div>
            <div class="mt-3 flex items-center text-sm">
                <span class="text-green-600">↑ 12%</span>
                <span class="text-gray-400 ml-2">dari bulan lalu</span>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-lg transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Total Pendapatan</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="bg-yellow-100 p-2 rounded-lg">
                    <span class="material-symbols-outlined text-yellow-600">payments</span>
                </div>
            </div>
            <div class="mt-3 flex items-center text-sm">
                <span class="text-red-600">↓ 3%</span>
                <span class="text-gray-400 ml-2">penurunan</span>
            </div>
        </div>

        <!-- Total User -->
        <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Total User</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalUsers ?? 0 }}</p>
                </div>
                <div class="bg-purple-100 p-2 rounded-lg">
                    <span class="material-symbols-outlined text-purple-600">group</span>
                </div>
            </div>
            <div class="mt-3 flex items-center text-sm">
                <span class="text-green-600">✨ New users today</span>
            </div>
        </div>
    </div>
</div>
@endsection