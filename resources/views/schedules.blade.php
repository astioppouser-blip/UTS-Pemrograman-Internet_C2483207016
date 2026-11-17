@extends('layouts.app')
@section('title', 'Jadwal Penggunaan')
@section('content')
<div class="page-heading"><p class="eyebrow">DATA AKTIVITAS</p><h1>Jadwal Penggunaan Ruangan</h1><p>Daftar jadwal yang digunakan sistem untuk memeriksa bentrok ruangan.</p></div>
<div class="table-card"><table><thead><tr><th>Mata Kuliah</th><th>Kelas</th><th>Ruangan</th><th>Hari</th><th>Mulai</th><th>Selesai</th></tr></thead><tbody>
@foreach ($schedules as $schedule)
<tr><td><strong>{{ $schedule['course'] }}</strong></td><td>{{ $schedule['class'] }}</td><td><a class="text-link" href="{{ route('rooms.show', $schedule['room_id']) }}">{{ $rooms[$schedule['room_id']]['name'] }}</a></td><td>{{ $schedule['day'] }}</td><td>{{ $schedule['start'] }}</td><td>{{ $schedule['end'] }}</td></tr>
@endforeach
</tbody></table></div>
@endsection
