<?php

namespace App\Http\Controllers;

use App\Models\HasilPertandingan;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilPertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $hasilPertandingans = HasilPertandingan::with('pertandingan')->get();
        } else {
            $hasilPertandingans = HasilPertandingan::with('pertandingan')
                                    ->where('user_id', $user->id)
                                    ->get();
        }

        return view('backend.hasil_pertandingan.index', compact('hasilPertandingans'));
    }

    public function create()
    {
        $user = Auth::user();

        // admin bisa input semua pertandingan
        if ($user->role === 'admin') {
            $pertandingans = Pertandingan::doesntHave('hasilPertandingan')->get();
        } else {
            // jika juri, bisa input pertandingan yang belum ada hasil & sesuai otorisasi (misalnya di sini contoh semua pertandingan)
            $pertandingans = Pertandingan::doesntHave('hasilPertandingan')->get();
        }

        return view('backend.hasil_pertandingan.create', compact('pertandingans'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateHasil($request);

        HasilPertandingan::create([
            'pertandingan_id' => $validated['pertandingan_id'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('backend.hasil_pertandingan.index')
                         ->with('success', 'Pertandingan berhasil ditambahkan ke daftar hasil.');
    }

    public function destroy($id)
    {
        $hasil = HasilPertandingan::findOrFail($id);

        $this->authorizeHasil($hasil);

        $hasil->delete();

        return redirect()->route('backend.hasil_pertandingan.index')
                         ->with('success', 'Hasil pertandingan berhasil dihapus');
    }

    // ===== Helper Method =====

    private function validateHasil(Request $request): array
    {
        return $request->validate([
            'pertandingan_id' => 'required|exists:pertandingans,id',
        ]);
    }

    private function authorizeHasil(HasilPertandingan $hasil): void
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return;
        }

        if ($hasil->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}
