<?php

namespace App\Http\Controllers;

use App\Support\RoomData;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function form()
    {
        $facilities = RoomData::facilities();
        $days = RoomData::days();

        return view('recommendations.form', compact('facilities', 'days'));
    }

    public function result(Request $request)
    {
        $validated = $request->validate([
            'jumlah' => ['required', 'integer', 'min:1', 'max:500'],
            'hari' => ['required', 'in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu'],
            'mulai' => ['required', 'date_format:H:i'],
            'selesai' => ['required', 'date_format:H:i', 'after:mulai'],
            'fasilitas' => ['sometimes', 'array'],
            'fasilitas.*' => ['string', 'in:Proyektor,Papan Tulis,AC,Audio,Komputer,Internet'],
        ]);

        $studentCount = (int) $validated['jumlah'];
        $day = $validated['hari'];
        $start = $validated['mulai'];
        $end = $validated['selesai'];
        $neededFacilities = $validated['fasilitas'] ?? [];

        $recommendations = [];
        $rejected = [];

        foreach (RoomData::rooms() as $room) {
            $reasons = [];
            $capacityOk = $room['capacity'] >= $studentCount;
            if (!$capacityOk) {
                $reasons[] = 'Kapasitas kurang ' . ($studentCount - $room['capacity']) . ' orang';
            }

            $missingFacilities = array_values(array_diff($neededFacilities, $room['facilities']));
            if ($missingFacilities) {
                $reasons[] = 'Fasilitas belum tersedia: ' . implode(', ', $missingFacilities);
            }

            $conflicts = [];
            foreach (RoomData::schedules() as $schedule) {
                if (
                    $schedule['room_id'] === $room['id']
                    && $schedule['day'] === $day
                    && RoomData::isTimeConflict($start, $end, $schedule['start'], $schedule['end'])
                ) {
                    $conflicts[] = $schedule;
                }
            }

            if ($conflicts) {
                foreach ($conflicts as $conflict) {
                    $reasons[] = 'Bentrok dengan ' . $conflict['course'] . ' (' . $conflict['start'] . '–' . $conflict['end'] . ')';
                }
            }

            if (!$reasons) {
                $recommendations[] = [
                    'room' => $room,
                    'difference' => $room['capacity'] - $studentCount,
                ];
            } else {
                $rejected[] = ['room' => $room, 'reasons' => $reasons];
            }
        }

        usort($recommendations, fn ($a, $b) => $a['difference'] <=> $b['difference']);

        return view('recommendations.result', compact(
            'recommendations', 'rejected', 'studentCount', 'day', 'start', 'end', 'neededFacilities'
        ));
    }
}
