@extends('layouts.app')
@section('title', 'Detail ' . $room['name'])
@section('content')
<a class="back-link" href="{{ route('rooms.index') }}">← Kembali ke daftar ruangan</a>
<div class="detail-layout">
    <section class="detail-main">
        <p class="eyebrow">{{ $room['category'] }}</p>
        <h1>{{ $room['name'] }}</h1>
        <p class="lead">Informasi kapasitas, fasilitas, dan jadwal penggunaan ruangan.</p>
        <div class="detail-stat"><span>Kapasitas maksimal</span><strong>{{ $room['capacity'] }} <small>orang</small></strong></div>
        <h2>Fasilitas tersedia</h2>
        <div class="chips large">@foreach ($room['facilities'] as $facility)<span>✓ {{ $facility }}</span>@endforeach</div>
        <h2>Jadwal penggunaan</h2>
        @if (count($schedules))
        <div class="table-card"><table><thead><tr><th>Mata Kuliah</th><th>Hari</th><th>Waktu</th></tr></thead><tbody>
        @foreach ($schedules as $schedule)<tr><td>{{ $schedule['course'] }}</td><td>{{ $schedule['day'] }}</td><td>{{ $schedule['start'] }}–{{ $schedule['end'] }}</td></tr>@endforeach
        </tbody></table></div>
        @else
        <div class="empty-state">Belum ada jadwal penggunaan yang tercatat untuk ruangan ini.</div>
        @endif
    </section>
    <aside class="side-card"><h3>Gunakan ruangan ini?</h3><p>Periksa kesesuaian kapasitas, fasilitas, dan jadwal sebelum menentukan ruangan.</p><a class="button button-primary full" href="{{ route('recommendations.form') }}">Cek rekomendasi</a></aside>
</div>
@endsection
