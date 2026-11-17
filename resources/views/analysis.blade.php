@extends('layouts.app')
@section('title', 'Analisis Ketersediaan')
@section('content')
<div class="page-heading"><p class="eyebrow">LAPORAN RUANGAN</p><h1>Analisis Ketersediaan</h1><p>Ringkasan penggunaan ruangan berdasarkan data jadwal yang tersedia.</p></div>
<div class="stats-grid three">
    <div class="stat-card"><span>Total ruangan</span><strong>{{ count($rooms) }}</strong><small>Data ruangan</small></div>
    <div class="stat-card"><span>Ruangan terjadwal</span><strong>{{ count($rooms) - $availableCount }}</strong><small>Memiliki jadwal</small></div>
    <div class="stat-card"><span>Belum terjadwal</span><strong>{{ $availableCount }}</strong><small>Tidak tercatat pada jadwal contoh</small></div>
</div>
<section class="section-head"><div><p class="eyebrow">RINCIAN PEMAKAIAN</p><h2>Penggunaan setiap ruangan</h2></div></section>
<div class="table-card"><table><thead><tr><th>Ruangan</th><th>Kategori</th><th>Kapasitas</th><th>Jumlah jadwal</th><th>Status data</th></tr></thead><tbody>
@foreach ($roomUsage as $item)
<tr><td><strong>{{ $item['room']['name'] }}</strong></td><td>{{ $item['room']['category'] }}</td><td>{{ $item['room']['capacity'] }} orang</td><td>{{ $item['usage'] }}</td><td><span class="status {{ $item['usage'] ? 'status-used' : 'status-free' }}">{{ $item['usage'] ? 'Terjadwal' : 'Belum terjadwal' }}</span></td></tr>
@endforeach
</tbody></table></div>
<p class="muted note">Status “Belum terjadwal” berarti tidak ditemukan jadwal pada data contoh, bukan jaminan ruangan selalu kosong. Pemeriksaan waktu tetap dilakukan melalui form rekomendasi.</p>
@endsection
