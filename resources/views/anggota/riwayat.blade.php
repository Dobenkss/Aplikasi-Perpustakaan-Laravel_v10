@extends('layout_anggota.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Peminjaman</h1>
            <div class="section-body">
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-header">
            <h4>Riwayat Peminjaman</h4>
        </div>
        <div class="card-body col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            
                            $no = 1;
                        @endphp
                        @forelse ($riwayatPeminjaman as $peminjaman)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $peminjaman->user->name }}</td>
                                <td>{{ $peminjaman->buku->judul }}</td>
                                <td>{{ $peminjaman->tanggal_pinjam }}</td>
                                <td>{{ $peminjaman->tanggal_selesai }}</td>
                                <td>
                                    @if ($peminjaman['status'] === 'Dipinjam')
                                        <div class="badge badge-danger">{{ $peminjaman['status'] }}</div>
                                    @elseif ($peminjaman['status'] === 'Dikembalikan')
                                        <div class="badge badge-success">{{ $peminjaman['status'] }}</div>
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
