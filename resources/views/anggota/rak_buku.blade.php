@extends('layout_anggota.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Rak Buku</h1>
        </div>
    </section>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        @foreach ($rakBukus as $rakBuku)
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ $rakBuku->rak_buku }}</h4>
                        <div class="card-header-action">
                            <a href="{{ url('list_buku', $rakBuku->id) }}" class="btn btn-primary">
                                Lihat Buku
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Ini Merupakan Rak Buku</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
