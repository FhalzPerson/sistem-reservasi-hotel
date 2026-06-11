<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\User;

class ProfileController extends Controller
{
    // Tampilan profil (berbeda untuk admin dan customer)
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            $totalRooms = Room::count();
            $totalBookings = Booking::count();
            $totalRevenue = Booking::sum('total_price');
            $totalUsers = User::count();
            $recentBookings = Booking::with('room', 'user')->latest()->limit(5)->get();
            return view('customer.profile', compact('user', 'totalRooms', 'totalBookings', 'totalRevenue', 'totalUsers', 'recentBookings'));
        } else {
            $bookings = $user->bookings;
            $totalBookings = $bookings->count();
            $activeBookings = $bookings->where('payment_status', 'pending')->count();
            $lastStatus = $bookings->isNotEmpty() ? $bookings->last()->payment_status : '-';
            return view('customer.profile', compact('user', 'totalBookings', 'activeBookings', 'lastStatus'));
        }
    }

    // Update data profil (nama, email, telepon, tanggal lahir, alamat)
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'birthdate' => 'nullable|date',
            'address' => 'nullable|string|max:500',
        ]);

        $user->update($validated);
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    // Upload foto profil
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo && file_exists(storage_path('app/public/' . $user->profile_photo))) {
                unlink(storage_path('app/public/' . $user->profile_photo));
            }
            $file = $request->file('profile_photo');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_photos', $filename, 'public');
            $user->profile_photo = $path;
            $user->save();
        }

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}