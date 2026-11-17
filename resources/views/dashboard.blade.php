@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<section class="hero">
    <div>
        <p class="eyebrow">SISTEM INFORMASI PERKULIAHAN</p>
        <h1>Temukan ruangan yang tepat untuk kegiatan kuliah.</h1>
        <p class="hero-desc">Pilih ruangan berdasarkan kapasitas, fasilitas, dan ketersediaan jadwal dengan lebih mudah.</p>
        <a class="button button-light" href="{{ route('recommendations.form') }}">Mulai rekomendasi <span>→</span></a>
    </div>
    <div class="hero-art"><div class="art-card"><span>RUANG KULIAH</span><strong>15</strong><small>ruangan terdata</small><div class="art-line"></div><div class="art-dots">● ● ●</div></div></div>
</section>

<div class="stats-grid">
    <div class="stat-card"><span>Total Ruangan</span><strong>{{ $roomCount }}</strong><small>Seluruh ruangan</small></div>
    <div class="stat-card"><span>Jadwal Penggunaan</span><strong>{{ $scheduleCount }}</strong><small>Jadwal terdata</small></div>
    <div class="stat-card"><span>Ruang Kelas</span><strong>{{ $classroomCount }}</strong><small>Untuk perkuliahan</small></div>
    <div class="stat-card"><span>Laboratorium</span><strong>{{ $labCount }}</strong><small>Untuk praktikum</small></div>
</div>

<section class="section-head"><div><p class="eyebrow">INFORMASI TERBARU</p><h2>Jadwal penggunaan ruangan</h2></div><a class="text-link" href="{{ route('schedules') }}">Lihat semua →</a></section>
<div class="table-card">
<table>
    <thead><tr><th>Mata Kuliah</th><th>Kelas</th><th>Ruangan</th><th>Hari</th><th>Waktu</th></tr></thead>
    <tbody>
    @foreach ($recentSchedules as $schedule)
        <tr><td><strong>{{ $schedule['course'] }}</strong></td><td>{{ $schedule['class'] }}</td><td>Ruang ID {{ $schedule['room_id'] }}</td><td>{{ $schedule['day'] }}</td><td>{{ $schedule['start'] }}–{{ $schedule['end'] }}</td></tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
