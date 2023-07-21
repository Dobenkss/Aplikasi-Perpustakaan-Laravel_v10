@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ url('/rak_buku') }}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Rak Buku</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h4>Add Rak Buku</h4>
        </div>
        <div class="card-body col">
            <form action="store" method="post">
                @csrf
                <div class="mb-3">
                    <label for="rak" class="form-label">Nama Rak</label>
                    <input type="text" class="form-control" id="rak" name="rak_buku">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </div>
@endsection
