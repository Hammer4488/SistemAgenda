<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarah ke file resources/views/auth/login.blade.php
    }

    /**
     * Menangani proses autentikasi.
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Coba lakukan autentikasi
        if (Auth::attempt($credentials)) {
            // Jika berhasil, regenerate session & redirect ke halaman tujuan
            $request->session()->regenerate();
            return redirect()->intended('/dashboard'); // Ganti '/dashboard' dengan halaman tujuan Anda
        }

        // 3. Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau Password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    /**
     * Menangani proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}