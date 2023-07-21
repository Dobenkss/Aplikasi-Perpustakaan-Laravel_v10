<?php

namespace App\Http\Controllers;

use App\Models\Bukus;
use App\Models\Peminjaman;
use App\Models\RakBuku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])
            ->orderBy('id', 'desc')
            ->get();
        $title = 'Peminjaman';
        $namaUser = explode(' ', Auth::user()->name)[0];
        return view('peminjaman.admin_peminjaman', compact('peminjaman', 'title', 'namaUser'));
    }

    public function updateStatus(Request $request, Peminjaman $id)
    {
        // dd($id);
        $newStatus = $request->input('status');
        $peminjaman = Peminjaman::all();

        if (!$id) {
            return redirect()->back()->with('error', 'Data peminjaman tidak ditemukan.');
        }

        $id->status = $newStatus;
        $id->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diperbarui.');
    }

    public function formPeminjaman($id)
    {
        $title = 'Form Peminjaman';
        $namaUser = explode(' ', Auth::user()->name)[0];
        $book = Bukus::findOrFail($id);
        $rakBuku = RakBuku::findOrFail($book->rak_id);
        return view('anggota.peminjaman', data: compact('title', 'namaUser', 'book', 'rakBuku'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $peminjaman = new Peminjaman();
        $peminjaman->buku_id = $request->input('buku_id');
        $peminjaman->users_id = Auth::id();
        $peminjaman->tanggal_pinjam = $request->input('tanggal_pinjam');
        $peminjaman->tanggal_selesai = $request->input('tanggal_selesai');
        $peminjaman->status = 'Dipinjam';

        $peminjaman->save();

        return redirect()->to('rak')->with('success', 'Peminjaman Berhasil Terdaftar');
    }

    public function riwayat()
    {
        $userId = Auth::id();
        $riwayatPeminjaman = Peminjaman::where('users_id', $userId)
            ->orderBy('id', 'desc')
            ->get();
        $title = 'Peminjaman User';
        $namaUser = explode(' ', Auth::user()->name)[0];

        return view('anggota.riwayat', data: compact('riwayatPeminjaman', 'title', 'namaUser'));
    }
}
