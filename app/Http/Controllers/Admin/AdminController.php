<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
{
    $totalRooms = Room::count();
    $totalBookings = Booking::count();
    $totalRevenue = Booking::sum('total_price');
    $totalUsers = User::count();
    $recentBookings = Booking::with('room', 'user')->latest()->limit(5)->get(); // Tambahkan ini

    return view('admin.dashboard', compact('totalRooms', 'totalBookings', 'totalRevenue', 'totalUsers', 'recentBookings'));
}

    public function bookings()
{
    $bookings = Booking::with('room', 'user')->latest()->get();
    return view('admin.bookings', compact('bookings'));
}
  public function showBooking($id)
{
    $booking = Booking::with('room', 'user')->findOrFail($id);
    return response()->json($booking);
}
}