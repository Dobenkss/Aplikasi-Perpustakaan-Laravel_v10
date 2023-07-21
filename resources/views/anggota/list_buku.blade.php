@extends('layout_anggota.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('rak') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>List Buku</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            @foreach ($bukus as $book)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $book->judul }}</h4>
                            <div class="card-header-action">
                                <a href="{{ url('peminjaman/' . $book->id) }}" class="btn btn-primary">Pinjam</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-2 text-muted">Penulis: {{ $book->penulis }}</div>
                            <div class="mb-2 text-muted">Kategori: {{ $book->kategori['nm_kategori'] }}</div>
                            <div class="chocolat-parent">
                                <a href="{{ $book->image }}" class="chocolat-image" title="Just an example">
                                    <div data-crop-image="285">
                                        <img alt="image" src="{{ asset($book->image) }}" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
