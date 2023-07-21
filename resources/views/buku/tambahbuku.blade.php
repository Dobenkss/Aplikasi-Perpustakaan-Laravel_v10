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
            <h4>Add Buku</h4>
        </div>
        <div class="card-body col">
            <form action="storeBuku" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="form-group">
                    <label for="rak_buku">Rak Buku</label>
                    <select class="form-control selectric" name="rak_buku" id="rak_buku">
                        <option value="">Pilih Rak</option>
                        @forelse($rakBuku as $rak)
                            <option value="{{ $rak->id }}">{{ $rak->rak_buku }}</option>
                        @empty
                            <option value="">Tidak ada kategori</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="nm_kategori">Kategori</label>
                    <select class="form-control selectric" name="nm_kategori" id="nm_kategori">
                        <option value="">Pilih Kategori</option>
                        @forelse($kategori as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nm_kategori }}</option>
                        @empty
                            <option value="">Tidak ada kategori</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="nm_penerbit">Penerbit</label>
                    <select class="form-control selectric" name="nm_penerbit" id="nm_penerbit">
                        <option value="">Pilih Penerbit</option>
                        @forelse($penerbit as $pen)
                            <option value="{{ $pen->id }}">{{ $pen->nm_penerbit }}</option>
                        @empty
                            <option value="">Tidak ada kategori</option>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Nama Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis">
                </div>
                <div class="mb-3">
                    <label for="thnTerbit" class="form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" id="thnTerbit" name="thnTerbit">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
