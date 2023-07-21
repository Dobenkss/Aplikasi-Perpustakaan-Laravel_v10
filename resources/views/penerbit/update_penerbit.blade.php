@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/penerbit') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Penerbit</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h4>Edit Penerbit</h4>
        </div>
        <div class="card-body col">
            <form action="/savepenerbit/{{ $update->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Penerbit</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ $update->nm_penerbit }}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    </div>
@endsection
