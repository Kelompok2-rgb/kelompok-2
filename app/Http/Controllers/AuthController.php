<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (!Auth::user()->is_approved) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun Anda belum disetujui oleh admin.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();

            return redirect()->route('backend.dashboard');
        }

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

    public function register()
    {
        return view('authentikasi.register');
    }

    public function registerPost(Request $request)
    {
        
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:atlet,juri,klub,anggota,penyelenggara'],
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_approved' => false,
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat, silakan tunggu persetujuan admin.');
    }
}
