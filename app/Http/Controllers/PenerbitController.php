<?php

namespace App\Http\Controllers;

use App\Models\Penerbits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerbitController extends Controller
{
    public function index() {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $penerbit = Penerbits::get();
        $title = 'Penerbit';
        return view(view: '/penerbit/penerbit', data: compact('penerbit', 'title', 'namaUser'));
    }

    public function create() {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Add Penerbit';
        return view(view: '/penerbit/tambah_penerbit', data: compact('title', 'namaUser'));
    }

    public function store(Request $request) {
        Penerbits::create([
            'nm_penerbit' => $request->nama,
        ]);
        return redirect()->to('penerbit')->with('success', 'Data Penerbit Berhasil Ditambahkan');
    }

    public function update(Penerbits $update) {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $title = 'Edit Penerbit';
        return view(view: '/penerbit/update_penerbit', data: compact('update', 'title', 'namaUser'));
    }

    public function save(Request $request, Penerbits $update) {
        $update->update([
            'nm_penerbit' => $request->nama,
        ]);
        return redirect()->to('penerbit')->with('success', 'Data Penerbit Berhasil Diperbarui');
    }

    public function delete(Penerbits $delete) {
        $delete->delete();
        return redirect()->to('penerbit')->with('delete', 'Data Penerbit Berhasil Dihapus');
    } 
}
