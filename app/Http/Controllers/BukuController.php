<?php

namespace App\Http\Controllers;

use App\Models\Bukus;
use App\Models\Kategoris;
use App\Models\Penerbits;
use App\Models\RakBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function index()
    {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = "Buku";
        $buku = Bukus::get();
        return view(view: '/buku/buku', data: compact('buku', 'title', 'namaUser'));
    }

    public function create()
    {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = "Add Buku";
        $kategori = Kategoris::get();
        $penerbit = Penerbits::get();
        $rakBuku = RakBuku::get();

        return view('/buku/tambahbuku', compact('title', 'kategori', 'penerbit', 'rakBuku', 'namaUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'rak_buku' => 'required',
            'nm_kategori' => 'required',
            'nm_penerbit' => 'required',
            'penulis' => 'required',
            'thnTerbit' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        Bukus::create([
            'judul' => $request->judul,
            'rak_id' => $request->rak_buku,
            'kategori_id' => $request->nm_kategori,
            'penerbit_id' => $request->nm_penerbit,
            'penulis' => $request->penulis,
            'thn_terbit' => $request->thnTerbit,
            'image' => $imagePath,
        ]);

        return redirect()->to('buku')->with('success', 'Data Buku Berhasil Ditambahkan');
    }

    public function edit(Bukus $editBuku)
    {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = "Edit Buku";
        $kategori = Kategoris::get();
        $penerbit = Penerbits::get();
        $rakBuku = RakBuku::get();
        return view('buku/editBuku', compact('title', 'editBuku', 'kategori', 'penerbit', 'rakBuku', 'namaUser'));
    }

    public function update(Request $request, Bukus $updateBuku)
    {
        $request->validate([
            'judul' => 'required',
            'rak_buku' => 'required',
            'nm_kategori' => 'required',
            'nm_penerbit' => 'required',
            'penulis' => 'required',
            'thnTerbit' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;

            $updateBuku->update([
                'judul' => $request->judul,
                'rak_id' => $request->rak_buku,
                'kategori_id' => $request->nm_kategori,
                'penerbit_id' => $request->nm_penerbit,
                'penulis' => $request->penulis,
                'thn_terbit' => $request->thnTerbit,
                'image' => $imagePath,
            ]);
        } else {
            $updateBuku->update([
                'judul' => $request->judul,
                'rak_id' => $request->rak_buku,
                'kategori_id' => $request->nm_kategori,
                'penerbit_id' => $request->nm_penerbit,
                'penulis' => $request->penulis,
                'thn_terbit' => $request->thnTerbit,
            ]);
        }

        return redirect()->to('buku')->with('success', 'Data Buku Berhasil Diperbarui');
    }
    public function delete(Bukus $deleteBuku)
    {
        $deleteBuku->delete();
        return redirect()->to('buku')->with('delete', 'Data Buku Berhasil Dihapus');
    }
}
