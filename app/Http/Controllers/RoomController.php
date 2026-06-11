<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function indexRooms(Request $request)
{
    $check_in = $request->query('check_in');
    $check_out = $request->query('check_out');

    // Validasi tanggal: check-out tidak boleh <= check-in
    if ($check_in && $check_out && $check_out <= $check_in) {
        return redirect()->route('rooms.index')
            ->with('error', 'Tanggal check-out harus setelah check-in.');
    }

    // Lanjutkan dengan logika ketersediaan...
    $rooms = Room::where('status', 'available')->get();
    $availabilities = [];
    if ($check_in && $check_out) {
        foreach ($rooms as $room) {
            $conflict = Booking::where('room_id', $room->id)
                ->where('check_in', '<', $check_out)
                ->where('check_out', '>', $check_in)
                ->exists();
            $availabilities[$room->id] = !$conflict;
        }
    }

    return view('customer.rooms', compact('rooms', 'availabilities', 'check_in', 'check_out'));
}

    public function show($id, Request $request)
    {
        $room = Room::findOrFail($id);
        
        $check_in = $request->query('check_in', date('Y-m-d', strtotime('+1 day')));
        $check_out = $request->query('check_out', date('Y-m-d', strtotime('+3 days')));
        
        if ($check_in >= $check_out) {
            $check_out = date('Y-m-d', strtotime($check_in . ' +1 day'));
        }
        
        $days = (strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24);
        $total = $room->price_per_night * $days;
        
        return view('customer.detail', compact('room', 'check_in', 'check_out', 'days', 'total'));
    }
}