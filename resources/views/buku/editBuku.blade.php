@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/buku') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buku</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h4>Edit Buku</h4>
        </div>
        <div class="card-body col">
            <form action="/updateBuku/{{ $editBuku->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $editBuku->judul }}">
                </div>
                <div class="form-group">
                    <label for="rak_buku">Rak Buku</label>
                    <select class="form-control selectric" name="rak_buku" id="rak_buku">
                        @forelse($rakBuku as $rak)
                            <option value="{{ $rak->id }}" @if ($rak->id === $editBuku->rak_id) selected @endif>
                                {{ $rak->rak_buku }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nm_kategori">Kategori</label>
                    <select class="form-control selectric" name="nm_kategori" id="nm_kategori">
                        @forelse($kategori as $kat)
                            <option value="{{ $kat->id }}" @if ($kat->id === $editBuku->kategori_id) selected @endif>
                                {{ $kat->nm_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nm_penerbit">Penerbit</label>
                    <select class="form-control selectric" name="nm_penerbit" id="nm_penerbit">
                        @forelse($penerbit as $pen)
                            <option value="{{ $pen->id }}" @if ($pen->id === $editBuku->penerbit_id) selected @endif>
                                {{ $pen->nm_penerbit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Nama Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis"
                        value="{{ $editBuku->penulis }}">
                </div>
                <div class="mb-3">
                    <label for="thnTerbit" class="form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" id="thnTerbit" name="thnTerbit"
                        value="{{ $editBuku->thn_terbit }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    </div>
@endsection
