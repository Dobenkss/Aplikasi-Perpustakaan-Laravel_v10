<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function admin()
    {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $nama = Auth::user()->name;
        $title = 'Dashboard Admin';
        return view('users.admin', data: compact('title', 'namaUser', 'nama'));
    }

    public function anggota()
    {
        $namaUser = explode(' ', Auth::user()->name)[0];
        $nama = Auth::user()->name;
        $title = 'Dashboard Anggota';
        return view('users.anggota', data: compact('title', 'namaUser', 'nama'));
    }

    public function listAdmin()
    {
        $title = 'List Admin';
        $namaUser = explode(' ', Auth::user()->name)[0];
        $admin = User::where('role', 'admin')->get();
        return view('users.list-admin', data: compact('admin', 'title', 'namaUser'));
    }

    public function createAdmin()
    {
        $title = 'Add Admin';
        $namaUser = explode(' ', Auth::user()->name)[0];   
        return view('users.create-admin', data: compact('title', 'namaUser'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'no_tlpn' => 'required|string|max:15',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_tlpn' => $request->no_tlpn,
            'role' => 'admin',
        ]);

        return redirect()->to('list-admin')->with('success', 'Admin berhasil ditambahkan');
    }

    public function editAdmin($id)
    {
        $admin = User::findOrFail($id);
        $title = 'Edit Admin';
        $namaUser = explode(' ', Auth::user()->name)[0];   
        return view('users.edit-admin', data: compact('admin', 'title', 'namaUser'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'no_tlpn' => 'required|string|max:15',
        ]);

        $admin = User::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->no_tlpn = $request->no_tlpn;
        $admin->save();

        return redirect()->to('list-admin')->with('success', 'Admin berhasil diperbarui');
    }

    public function deleteAdmin($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->to('list-admin')->with('delete', 'Admin berhasil dihapus');
    }

    public function listAnggota()
    {
        $title = 'List Member';
        $namaUser = explode(' ', Auth::user()->name)[0];
        $anggota = User::where('role', 'anggota')->get();
        return view('users.list-anggota', data: compact('anggota', 'title', 'namaUser'));
    }

    public function createAnggota()
    {
        $title = 'Add Anggota';
        $namaUser = explode(' ', Auth::user()->name)[0]; 
        return view('users.create-anggota',data: compact('title', 'namaUser'));
    }

    public function storeAnggota(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'no_tlpn' => 'required|string|max:15',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_tlpn' => $request->no_tlpn,
            'role' => 'anggota',
        ]);

        return redirect()->to('list-anggota')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function editAnggota($id)
    {
        $anggota = User::findOrFail($id);
        $title = 'Edit Anggota';
        $namaUser = explode(' ', Auth::user()->name)[0]; 
        return view('users.edit-anggota', data: compact('anggota', 'title', 'namaUser'));
    }

    public function updateAnggota(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'no_tlpn' => 'required|string|max:15',
        ]);

        $anggota = User::findOrFail($id);
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        if ($request->password) {
            $anggota->password = Hash::make($request->password);
        }
        $anggota->no_tlpn = $request->no_tlpn;
        $anggota->save();

        return redirect()->to('list-anggota')->with('success', 'Anggota berhasil diperbarui');
    }

    public function deleteAnggota($id)
    {
        $anggota = User::findOrFail($id);
        $anggota->delete();

        return redirect()->to('list-anggota')->with('delete', 'Anggota berhasil dihapus');
    }
}
