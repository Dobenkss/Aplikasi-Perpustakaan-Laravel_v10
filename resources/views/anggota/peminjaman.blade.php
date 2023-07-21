@extends('layout_anggota.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('list_buku', $rakBuku->id) }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buku</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h4>{{ $book->judul }}</h4>
        </div>
        <div class="card-body col">
            <form action="{{ url('peminjaman/register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="text" name="tanggal_pinjam" class="form-control datepicker" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="text" name="tanggal_selesai" class="form-control datepicker" required>
                </div>
                <input type="hidden" name="buku_id" value="{{ $book->id }}">
                <button type="submit" class="btn btn-primary">Pinjam</button>
            </form>
        </div>
    </div>
    </div>
@endsection
