@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/list-anggota') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Anggota</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h4>Edit Anggota</h4>
        </div>
        <div class="card-body col">
            <form action="/update-anggota/{{ $anggota->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $anggota->name }}">
                </div>
                <div class="mb-3">
                    <label for="no_tlpn" class="form-label">No Telepon</label>
                    <input type="number" class="form-control" id="no_tlpn" name="no_tlpn"
                        value="{{ $anggota->no_tlpn }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $anggota->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    </div>
@endsection
