@extends('layouts.app')
@section('title', 'Kebutuhan Perkuliahan')
@section('content')
<div class="page-heading"><p class="eyebrow">PENCARIAN RUANGAN</p><h1>Masukkan Kebutuhan Perkuliahan</h1><p>Lengkapi informasi berikut untuk mendapatkan rekomendasi ruangan.</p></div>
<form class="form-card" method="GET" action="{{ route('recommendations.result') }}">
    <div class="form-grid">
        <div class="field"><label for="jumlah">Jumlah mahasiswa</label><input id="jumlah" type="number" name="jumlah" min="1" max="500" value="{{ request('jumlah', 30) }}" required><small>Masukkan jumlah peserta perkuliahan.</small></div>
        <div class="field"><label for="hari">Hari</label><select id="hari" name="hari" required>@foreach ($days as $day)<option value="{{ $day }}" @selected(request('hari', 'Senin') === $day)>{{ $day }}</option>@endforeach</select></div>
        <div class="field"><label for="mulai">Waktu mulai</label><input id="mulai" type="time" name="mulai" value="{{ request('mulai', '08:00') }}" required></div>
        <div class="field"><label for="selesai">Waktu selesai</label><input id="selesai" type="time" name="selesai" value="{{ request('selesai', '10:00') }}" required></div>
    </div>
    <div class="field facilities-field"><label>Fasilitas yang dibutuhkan</label><p class="muted">Pilih satu atau lebih fasilitas. Kosongkan jika tidak ada kebutuhan khusus.</p>
        <div class="check-grid">@foreach ($facilities as $facility)<label class="check-item"><input type="checkbox" name="fasilitas[]" value="{{ $facility }}" @checked(in_array($facility, request('fasilitas', [])))><span>{{ $facility }}</span></label>@endforeach</div>
    </div>
    <button class="button button-primary" type="submit">Tampilkan rekomendasi <span>→</span></button>
</form>
@endsection
