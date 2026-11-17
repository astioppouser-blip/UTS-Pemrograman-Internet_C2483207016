<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rekomendasi Ruangan') | UMTAS</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="topbar">
    <div class="container nav-wrap">
        <a class="brand" href="{{ route('home') }}">Ruang<span>Ku</span></a>
        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('rooms.index') }}">Daftar Ruangan</a>
            <a href="{{ route('schedules') }}">Jadwal</a>
            <a href="{{ route('analysis') }}">Analisis</a>
            <a class="nav-cta" href="{{ route('recommendations.form') }}">Cari Ruangan</a>
        </nav>
    </div>
</header>
<main class="container page">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input:</strong>
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    @yield('content')
</main>
<footer><div class="container">Sistem Rekomendasi Ruangan Perkuliahan · Proyek UTS Pemrograman Internet</div></footer>
</body>
</html>
