<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'room_number' => 'required|string|max:10|unique:rooms,room_number',
        'room_type' => 'required|string|max:50',
        'price_per_night' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'image_url' => 'nullable|url',
        'status' => 'required|in:available,maintenance',
    ]);

    try {
        $room = Room::create($validated);
        return redirect()->route('admin.rooms.index')
            ->with('success', 'Kamar berhasil ditambahkan.');
    } catch (\Exception $e) {
        return back()->withInput()->withErrors(['error' => 'Gagal menyimpan: ' . $e->getMessage()]);
    }
}

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number' => 'required|string|max:10|unique:rooms,room_number,' . $room->id,
            'room_type' => 'required|string|max:50',
            'price_per_night' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'status' => 'required|in:available,maintenance',
        ]);

        $room->update($validated);
        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil dihapus.');
    }
}