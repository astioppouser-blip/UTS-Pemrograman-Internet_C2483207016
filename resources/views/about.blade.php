@extends('layouts.app')
@section('title', 'Tentang Aplikasi')
@section('content')
<div class="page-heading"><p class="eyebrow">TENTANG SISTEM</p><h1>Sistem Rekomendasi Ruangan Perkuliahan</h1><p>Aplikasi sederhana untuk membantu menentukan ruangan perkuliahan yang sesuai.</p></div>
<div class="content-card">
    <h2>Tujuan</h2><p>Membantu pengelola memilih ruangan berdasarkan kapasitas, fasilitas, dan jadwal penggunaan sehingga pemilihan ruang lebih terarah.</p>
    <h2>Teknologi</h2><p>Laravel, PHP, Routing, Controller, Blade Template, HTML, dan CSS. Data disimpan dalam array PHP tanpa database.</p>
    <h2>Identitas pengembang</h2><p><strong>[Nama Mahasiswa]</strong><br>NIM [NIM Mahasiswa]<br>Program Studi Pendidikan Teknologi Informasi – UMTAS<br>Kelas [Kelas]</p>
</div>
@endsection
