<?php

namespace App\Http\Controllers;

use App\Models\Kategoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index() {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $kategori = Kategoris::get();
        $title = 'Kategori';
        return view(view: '/kategori/kategori', data: compact('kategori', 'title', 'namaUser'));
    }

    public function create() {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Add Kategori';
        return view(view: '/kategori/tambah_kategori', data: compact('title', 'namaUser'));
    }

    public function store(Request $request) {
        Kategoris::create([
            'nm_kategori' =>$request->nama
        ]);
        return redirect()->to('kategori')->with('success', 'Data Kategori Berhasil Ditambahkan');  
    }

    public function update(Kategoris $update) {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Edit Kategori';
        return view(view: '/kategori/update_kategori', data: compact('update', 'title', 'namaUser'));
    }

    public function save(Request $request, Kategoris $update) {
        $update->update([
            'nm_kategori' => $request->nama
        ]);
        return redirect()->to('kategori')->with('success', 'Data Kategori Berhasil Diperbarui');
    }

    public function delete(Kategoris $delete) {
        $delete->delete();
        return redirect()->to('kategori')->with('delete', 'Data Kategori Berhasil Dihapus');
    }
}