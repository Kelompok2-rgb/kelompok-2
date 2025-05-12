<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('authentikasi.login'); // Menyesuaikan dengan folder autentikasi dan nama file login.blade.php
    }

    // Proses autentikasi (login)
    public function authenticate(Request $request)
    {
        // Validasi input email dan password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek apakah kredensial cocok
        if (Auth::attempt($credentials)) {
            // Regenerasi sesi setelah login berhasil
            $request->session()->regenerate();

            // Redirect ke route dashboard.backend setelah login
            return redirect()->route('backend.dashboard'); // Sesuaikan dengan nama route 'backend.dashboard'
        }

        // Jika gagal login, kembali dengan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Proses logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate sesi dan regenerasi token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect('/');
    }
}
