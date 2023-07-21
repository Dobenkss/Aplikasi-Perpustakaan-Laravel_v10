<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $data =
            [
                'email' => $request->email,
                'password' => $request->password,
            ];

        if (Auth::attempt($data)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } elseif (Auth::user()->role == 'anggota') {
                return redirect('/anggota');
            }
        } else {
            return redirect('/')->withErrors('Email atau Password Salah!')->withInput();
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_tlpn' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Nama wajib diisi',
            'no_tlpn.required' => 'Nomor Telepon wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $user = User::create([
            'name' => $request->name,
            'no_tlpn' => $request->no_tlpn,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'anggota',
        ]);

        if ($user) {
            Auth::login($user);
            return redirect('/')->with('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
        } else {
            return redirect()->back()->withErrors('Registrasi gagal')->withInput();
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
