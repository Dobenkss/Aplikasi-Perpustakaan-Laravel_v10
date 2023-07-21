@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Admin</h1>
        </div>
        <div class="section-body">
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Welcome Back, {{ $nama }}!</h2>
                        <p class="lead">Ini halaman admin pengelolaan perpustakaan. Di sini Anda dapat mengelola berbagai
                            aspek dari
                            sistem perpustakaan, termasuk pengelolaan buku, peminjaman, pengguna, dan banyak lagi. Anda
                            memiliki akses
                            penuh untuk menambahkan, mengedit, dan menghapus data, serta melacak riwayat peminjaman dan
                            aktivitas
                            pengguna.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
