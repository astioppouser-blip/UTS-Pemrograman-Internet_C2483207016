<?php

namespace App\Http\Controllers;

use App\Support\RoomData;

class DashboardController extends Controller
{
    public function index()
    {
        $rooms = RoomData::rooms();
        $schedules = RoomData::schedules();

        return view('dashboard', [
            'roomCount' => count($rooms),
            'scheduleCount' => count($schedules),
            'classroomCount' => count(array_filter($rooms, fn ($room) => $room['category'] === 'Kelas')),
            'labCount' => count(array_filter($rooms, fn ($room) => $room['category'] === 'Laboratorium')),
            'recentSchedules' => array_slice($schedules, 0, 5),
        ]);
    }

    public function analysis()
    {
        $rooms = RoomData::rooms();
        $schedules = RoomData::schedules();
        $usedRoomIds = array_unique(array_column($schedules, 'room_id'));
        $availableCount = count($rooms) - count($usedRoomIds);

        $roomUsage = [];
        foreach ($rooms as $room) {
            $usage = count(array_filter($schedules, fn ($schedule) => $schedule['room_id'] === $room['id']));
            $roomUsage[] = ['room' => $room, 'usage' => $usage];
        }

        return view('analysis', compact('rooms', 'schedules', 'availableCount', 'roomUsage'));
    }

    public function about()
    {
        return view('about');
    }
}
