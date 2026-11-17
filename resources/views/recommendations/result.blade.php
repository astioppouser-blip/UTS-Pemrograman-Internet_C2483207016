@extends('layouts.app')
@section('title', 'Hasil Rekomendasi')
@section('content')
<div class="page-heading"><p class="eyebrow">HASIL ANALISIS</p><h1>Rekomendasi Ruangan</h1><p>Hasil pencarian berdasarkan kebutuhan perkuliahan yang dimasukkan.</p></div>
<div class="request-summary">
    <div><small>Peserta</small><strong>{{ $studentCount }} orang</strong></div>
    <div><small>Hari</small><strong>{{ $day }}</strong></div>
    <div><small>Waktu</small><strong>{{ $start }}–{{ $end }}</strong></div>
    <div><small>Fasilitas</small><strong>{{ $neededFacilities ? implode(', ', $neededFacilities) : 'Tidak ditentukan' }}</strong></div>
</div>

<section class="section-head"><div><p class="eyebrow">RUANGAN YANG MEMENUHI SYARAT</p><h2>Hasil rekomendasi <span class="count-pill">{{ count($recommendations) }}</span></h2></div></section>
@if (count($recommendations))
<div class="table-card"><table><thead><tr><th>Urutan</th><th>Ruangan</th><th>Kapasitas</th><th>Sisa kapasitas</th><th>Fasilitas</th><th>Detail</th></tr></thead><tbody>
@foreach ($recommendations as $index => $item)
<tr><td><span class="rank">{{ $index + 1 }}</span></td><td><strong>{{ $item['room']['name'] }}</strong><br><small>{{ $item['room']['category'] }}</small></td><td>{{ $item['room']['capacity'] }} orang</td><td><strong>{{ $item['difference'] }} orang</strong></td><td>{{ implode(', ', $item['room']['facilities']) }}</td><td><a class="text-link" href="{{ route('rooms.show', $item['room']['id']) }}">Detail</a></td></tr>
@endforeach
</tbody></table></div>
<p class="success-note">Ruangan diurutkan berdasarkan sisa kapasitas terkecil agar pemanfaatan ruang lebih sesuai.</p>
@else
<div class="empty-state"><strong>Belum ada ruangan yang memenuhi seluruh kebutuhan.</strong><p>Coba kurangi fasilitas yang dipilih, ubah waktu, atau sesuaikan jumlah peserta.</p></div>
@endif

<section class="section-head space-top"><div><p class="eyebrow">EVALUASI RUANGAN</p><h2>Alasan ruangan tidak direkomendasikan</h2></div></section>
<div class="rejected-list">
@foreach ($rejected as $item)
    <div class="rejected-item"><strong>{{ $item['room']['name'] }}</strong><ul>@foreach ($item['reasons'] as $reason)<li>{{ $reason }}</li>@endforeach</ul></div>
@endforeach
</div>
<a class="button button-outline" href="{{ route('recommendations.form') }}">Ubah kebutuhan</a>
@endsection
