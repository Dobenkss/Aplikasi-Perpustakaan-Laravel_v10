@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Member</h1>
            <div class="section-header-button">
                <a href="/create-anggota" class="btn btn-success">Add New</a>
            </div>
            <div class="section-body">
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
    @if (session('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('delete') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>List Member</h4>
        </div>
        <div class="card-body col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            
                            $no = 1;
                        @endphp
                        @foreach ($anggota as $ang)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $ang->name }}</td>
                                <td>{{ $ang->email }}</td>
                                <td>{{ $ang->no_tlpn }}</td>
                                <td>
                                    <div class="d-flex flex-row">
                                        <div>
                                            <a href="/edit-anggota/{{ $ang->id }}"
                                                class="btn btn-md bg-primary text-light btn-rounded mr-2">
                                                <i class="fa-solid fas fa-pen"></i>
                                            </a>
                                        </div>
                                        <div>
                                            <form action="/delete-anggota/{{ $ang->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-md bg-danger text-light btn-rounded">
                                                    <i class="fa-solid fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
