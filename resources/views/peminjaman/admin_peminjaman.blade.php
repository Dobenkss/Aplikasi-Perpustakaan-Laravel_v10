@extends('layout_admin.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman</h1>
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
    <div class="card">
        <div class="card-header">
            <h4>List Peminjaman</h4>
        </div>
        <div class="card-body col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($peminjaman as $pinjam)
                            <tr>
                                <th scope="row">{{ $loop->iteration}}</th>
                                <td>{{ $pinjam->user->name }}</td>
                                <td>{{ $pinjam->buku->judul }}</td>
                                <td>{{ $pinjam->tanggal_pinjam }}</td>
                                <td>{{ $pinjam->tanggal_selesai }}</td>
                                <td>{{ $pinjam->user->no_tlpn }}</td>
                                <td>
                                    @if ($pinjam['status'] === 'Dipinjam')
                                        <div class="badge badge-danger">{{ $pinjam['status'] }}</div>
                                    @elseif ($pinjam['status'] === 'Dikembalikan')
                                        <div class="badge badge-success">{{ $pinjam['status'] }}</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($pinjam->status == 'Dipinjam')
                                        <form action="/peminjaman/update-status/{{ $pinjam->id }}" method="POST" onclick="return confirmAction('Apakah Anda yakin ingin approve peminjaman ini?', this)">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="Dikembalikan">
                                            <button type="submit" class="btn btn-primary">
                                                <i>Dikembalikan</i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="btn btn-sm btn-secondary disabled">Dikembalikan</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="7">Belum Ada Peminjaman Buku</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
