<?php

namespace App\Http\Controllers;

use App\Support\RoomData;

class RoomController extends Controller
{
    public function index()
    {
        $category = request('kategori');
        $rooms = RoomData::rooms();

        if ($category) {
            $rooms = array_values(array_filter($rooms, fn ($room) => $room['category'] === $category));
        }

        return view('rooms.index', compact('rooms', 'category'));
    }

    public function show(int $id)
    {
        $room = collect(RoomData::rooms())->firstWhere('id', $id);

        abort_if(!$room, 404);

        $schedules = array_values(array_filter(
            RoomData::schedules(),
            fn ($schedule) => $schedule['room_id'] === $id
        ));

        return view('rooms.show', compact('room', 'schedules'));
    }

    public function schedules()
    {
        $schedules = RoomData::schedules();
        $rooms = collect(RoomData::rooms())->keyBy('id');

        return view('schedules', compact('schedules', 'rooms'));
    }
}
