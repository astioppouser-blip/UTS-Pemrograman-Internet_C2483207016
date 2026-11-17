<?php

namespace App\Support;

class RoomData
{
    public static function rooms(): array
    {
        return [
            ['id' => 1, 'name' => 'Ruang E1', 'category' => 'Kelas', 'capacity' => 30, 'facilities' => ['Proyektor', 'Papan Tulis', 'AC']],
            ['id' => 2, 'name' => 'Ruang E2', 'category' => 'Kelas', 'capacity' => 40, 'facilities' => ['Proyektor', 'Papan Tulis']],
            ['id' => 3, 'name' => 'Ruang E3', 'category' => 'Kelas', 'capacity' => 35, 'facilities' => ['Proyektor', 'Papan Tulis', 'AC']],
            ['id' => 4, 'name' => 'Ruang E4', 'category' => 'Kelas', 'capacity' => 25, 'facilities' => ['Papan Tulis', 'AC']],
            ['id' => 5, 'name' => 'Ruang E5', 'category' => 'Kelas', 'capacity' => 45, 'facilities' => ['Proyektor', 'Papan Tulis', 'AC', 'Audio']],
            ['id' => 6, 'name' => 'Lab Komputer 1', 'category' => 'Laboratorium', 'capacity' => 30, 'facilities' => ['Komputer', 'Proyektor', 'AC', 'Internet']],
            ['id' => 7, 'name' => 'Lab Komputer 2', 'category' => 'Laboratorium', 'capacity' => 25, 'facilities' => ['Komputer', 'Proyektor', 'Internet']],
            ['id' => 8, 'name' => 'Lab Multimedia', 'category' => 'Laboratorium', 'capacity' => 35, 'facilities' => ['Komputer', 'Proyektor', 'AC', 'Audio', 'Internet']],
            ['id' => 9, 'name' => 'Lab Jaringan', 'category' => 'Laboratorium', 'capacity' => 24, 'facilities' => ['Komputer', 'Internet', 'Papan Tulis']],
            ['id' => 10, 'name' => 'Ruang F1', 'category' => 'Kelas', 'capacity' => 50, 'facilities' => ['Proyektor', 'Papan Tulis', 'AC', 'Audio']],
            ['id' => 11, 'name' => 'Ruang F2', 'category' => 'Kelas', 'capacity' => 20, 'facilities' => ['Papan Tulis', 'AC']],
            ['id' => 12, 'name' => 'Ruang Seminar', 'category' => 'Seminar', 'capacity' => 80, 'facilities' => ['Proyektor', 'Papan Tulis', 'AC', 'Audio', 'Internet']],
            ['id' => 13, 'name' => 'Ruang G1', 'category' => 'Kelas', 'capacity' => 32, 'facilities' => ['Proyektor', 'Papan Tulis']],
            ['id' => 14, 'name' => 'Ruang G2', 'category' => 'Kelas', 'capacity' => 28, 'facilities' => ['Proyektor', 'Papan Tulis', 'AC']],
            ['id' => 15, 'name' => 'Lab Praktik', 'category' => 'Laboratorium', 'capacity' => 40, 'facilities' => ['Komputer', 'Proyektor', 'AC', 'Internet']],
        ];
    }

    public static function schedules(): array
    {
        return [
            ['id' => 1, 'room_id' => 1, 'course' => 'Pemrograman Dasar', 'class' => 'PTI 1A', 'day' => 'Senin', 'start' => '08:00', 'end' => '10:00'],
            ['id' => 2, 'room_id' => 2, 'course' => 'Basis Data', 'class' => 'PTI 3A', 'day' => 'Senin', 'start' => '08:00', 'end' => '10:00'],
            ['id' => 3, 'room_id' => 3, 'course' => 'Evaluasi Pendidikan', 'class' => 'PTI 5A', 'day' => 'Senin', 'start' => '10:00', 'end' => '12:00'],
            ['id' => 4, 'room_id' => 6, 'course' => 'Praktikum Web', 'class' => 'PTI 3B', 'day' => 'Selasa', 'start' => '08:00', 'end' => '11:00'],
            ['id' => 5, 'room_id' => 5, 'course' => 'Jaringan Komputer', 'class' => 'PTI 5A', 'day' => 'Selasa', 'start' => '13:00', 'end' => '15:00'],
            ['id' => 6, 'room_id' => 8, 'course' => 'Multimedia', 'class' => 'PTI 3A', 'day' => 'Rabu', 'start' => '08:00', 'end' => '10:00'],
            ['id' => 7, 'room_id' => 10, 'course' => 'Strategi Pembelajaran', 'class' => 'PTI 1B', 'day' => 'Rabu', 'start' => '10:00', 'end' => '12:00'],
            ['id' => 8, 'room_id' => 12, 'course' => 'Seminar Pendidikan', 'class' => 'PTI 5A', 'day' => 'Kamis', 'start' => '09:00', 'end' => '11:00'],
            ['id' => 9, 'room_id' => 13, 'course' => 'Logika Informatika', 'class' => 'PTI 1A', 'day' => 'Jumat', 'start' => '08:00', 'end' => '10:00'],
            ['id' => 10, 'room_id' => 15, 'course' => 'Praktikum Jaringan', 'class' => 'PTI 5B', 'day' => 'Jumat', 'start' => '13:00', 'end' => '15:00'],
        ];
    }

    public static function facilities(): array
    {
        return ['Proyektor', 'Papan Tulis', 'AC', 'Audio', 'Komputer', 'Internet'];
    }

    public static function days(): array
    {
        return ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    }

    public static function isTimeConflict(string $startA, string $endA, string $startB, string $endB): bool
    {
        return $startA < $endB && $endA > $startB;
    }
}
