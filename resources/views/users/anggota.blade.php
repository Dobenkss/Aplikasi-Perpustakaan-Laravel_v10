@extends('layout_anggota.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Anggota</h1>
        </div>
        <div class="section-body">
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Welcome Back, {{ $nama }}!</h2>
                        <p class="lead">Selamat datang di halaman anggota perpustakaan. Di sini Anda dapat menikmati
                            berbagai layanan perpustakaan
                            yang kami sediakan. Anda dapat menjelajahi koleksi buku kami, melakukan peminjaman, dan melacak riwayat peminjaman.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
