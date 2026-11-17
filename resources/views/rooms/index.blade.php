@extends('layouts.app')
@section('title', 'Daftar Ruangan')
@section('content')
<div class="page-heading"><p class="eyebrow">DATA FASILITAS</p><h1>Daftar Ruangan</h1><p>Informasi kapasitas dan fasilitas ruangan yang tersedia.</p></div>
<div class="filter-row">
    <a class="filter {{ !$category ? 'active' : '' }}" href="{{ route('rooms.index') }}">Semua</a>
    @foreach (['Kelas', 'Laboratorium', 'Seminar'] as $item)
        <a class="filter {{ $category === $item ? 'active' : '' }}" href="{{ route('rooms.index', ['kategori' => $item]) }}">{{ $item }}</a>
    @endforeach
</div>
<div class="room-grid">
@forelse ($rooms as $room)
    <article class="room-card">
        <div class="room-icon">{{ $room['category'] === 'Laboratorium' ? '⌘' : ($room['category'] === 'Seminar' ? '▤' : '▣') }}</div>
        <div class="room-meta">{{ $room['category'] }}</div>
        <h3>{{ $room['name'] }}</h3>
        <p class="capacity">♙ Kapasitas {{ $room['capacity'] }} orang</p>
        <div class="chips">@foreach ($room['facilities'] as $facility)<span>{{ $facility }}</span>@endforeach</div>
        <a class="text-link" href="{{ route('rooms.show', $room['id']) }}">Lihat detail →</a>
    </article>
@empty
    <p>Tidak ada ruangan pada kategori tersebut.</p>
@endforelse
</div>
@endsection
