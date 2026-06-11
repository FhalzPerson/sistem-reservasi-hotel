<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    // Menampilkan form booking
    public function create($id, Request $request)
    {
        // Blokir admin
        if (auth()->user()->is_admin) {
            abort(403, 'Admin tidak diperbolehkan melakukan booking.');
        }

        $room = Room::findOrFail($id);
        $check_in = $request->query('check_in', date('Y-m-d', strtotime('+1 day')));
        $check_out = $request->query('check_out', date('Y-m-d', strtotime('+3 days')));

        // Validasi tanggal: check-out harus setelah check-in
        if ($check_in >= $check_out) {
            return redirect()->route('rooms.show', $room->id)
                ->with('error', 'Tanggal check-out harus setelah check-in.');
        }

        // Cek ketersediaan kamar
        $conflict = Booking::where('room_id', $room->id)
            ->where('check_in', '<', $check_out)
            ->where('check_out', '>', $check_in)
            ->exists();

        if ($conflict) {
            return redirect()->route('rooms.show', $room->id)
                ->with('error', 'Kamar tidak tersedia untuk tanggal yang dipilih. Silakan pilih tanggal lain.');
        }

        // Hitung total harga
        $days = (strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24);
        $subtotal = $room->price_per_night * $days;
        $tax = $subtotal * 0.1;
        $total = $subtotal + $tax;

        return view('customer.booking', compact('room', 'check_in', 'check_out', 'days', 'subtotal', 'tax', 'total'));
    }

    // Menyimpan booking baru
    public function store(Request $request)
    {
        // Blokir admin
        if (auth()->user()->is_admin) {
            return back()->with('error', 'Admin tidak diperbolehkan melakukan booking.');
        }

        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'total_price' => 'required|numeric',
        ]);

        // Cek konflik (double booking)
        $conflict = Booking::where('room_id', $validated['room_id'])
            ->where('check_in', '<', $validated['check_out'])
            ->where('check_out', '>', $validated['check_in'])
            ->exists();

        if ($conflict) {
            return back()->withErrors(['msg' => 'Kamar sudah dipesan untuk tanggal tersebut. Silakan pilih tanggal lain.'])->withInput();
        }

        // Hubungkan booking dengan user yang login
        $validated['user_id'] = auth()->id();
        $booking = Booking::create($validated);

        return redirect()->route('payment.show', $booking->id);
    }

    // Halaman pembayaran
    public function showPayment($id)
    {
        $booking = Booking::with('room')->findOrFail($id);
        // Cegah admin mengakses pembayaran (tambahan opsional)
        if (auth()->user()->is_admin) {
            abort(403, 'Admin tidak dapat mengakses halaman pembayaran.');
        }
        return view('customer.payment', compact('booking'));
    }

    // Proses pembayaran (update status menjadi paid)
    public function processPayment($id)
    {
        if (auth()->user()->is_admin) {
            return redirect()->route('home')->with('error', 'Admin tidak dapat melakukan pembayaran.');
        }

        Log::info('processPayment dipanggil untuk booking ID: ' . $id);
        $booking = Booking::findOrFail($id);
        $booking->payment_status = 'paid';
        $booking->save();
        Log::info('Status setelah update: ' . $booking->payment_status);
        return redirect()->route('booking.success', $booking->id);
    }

    // Halaman sukses setelah pembayaran
    public function success($id)
    {
        $booking = Booking::with('room')->findOrFail($id);
        // Biarkan admin bisa melihat halaman sukses? Tidak perlu, tapi juga tidak masalah.
        // Tapi lebih aman dicegah:
        if (auth()->user()->is_admin) {
            abort(403);
        }
        return view('customer.success', compact('booking'));
    }

    // Halaman riwayat booking (hanya untuk user yang login)
    public function history()
    {
        $bookings = Booking::with('room')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('customer.history', compact('bookings'));
    }
}