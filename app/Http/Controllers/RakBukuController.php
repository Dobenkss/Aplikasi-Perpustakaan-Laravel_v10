<?php

namespace App\Http\Controllers;

use App\Models\Bukus;
use App\Models\RakBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RakBukuController extends Controller
{
    public function index()
    {
        $rakBuku = RakBuku::get();
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Rak Buku';
        return view('rakbuku.rak_buku', data: compact('rakBuku', 'namaUser', 'title'));
    }

    public function create()
    {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Add Rak Buku';
        return view('rakbuku.add_rak', data: compact('namaUser', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rak_buku' => 'required|max:255',
        ]);

        $rakBuku = new RakBuku();
        $rakBuku->rak_buku = $request->input('rak_buku');
        $rakBuku->save();

        return redirect()->to('/rak_buku')->with('success', 'Data Rak Buku Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $rakBuku =  RakBuku::find($id);
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Edit Rak Buku';
        return view('rakbuku.edit_rak', data: compact('rakBuku', 'namaUser', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rak_buku' => 'required|max:255',
        ]);

        $rakBuku = RakBuku::find($id);

        $rakBuku->rak_buku = $request->input('rak_buku');
        $rakBuku->save();

        return redirect()->to('rak_buku')->with('success', 'Data Rak Buku Berhasil Diperbarui');
    }

    public function delete(RakBuku $delete) {
        $delete->delete();
        return redirect()->to('rak_buku')->with('delete', 'Data Rak Buku Berhasil Dihapus');
    } 

    public function rak()
    {
        $rakBukus = RakBuku::get();
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Rak Buku Anggota';
        return view('anggota.rak_buku', compact('rakBukus', 'namaUser', 'title'));
    }

    public function listBook($id)
    {
        $rakBuku = RakBuku::findOrFail($id);
        $bukus = Bukus::where('rak_id', $rakBuku->id)->get();
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'List Buku';
        return view('anggota.list_buku', compact('rakBuku', 'bukus', 'namaUser', 'title'));
    }
}
