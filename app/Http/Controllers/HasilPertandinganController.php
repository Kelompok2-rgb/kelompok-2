<?php

namespace App\Http\Controllers;

use App\Models\HasilPertandingan;
use App\Models\Pertandingan;
use Illuminate\Http\Request;

class HasilPertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,juri');
    }

    public function index()
    {
        $hasilPertandingans = HasilPertandingan::with('pertandingan')->get();
        return view('backend.hasil_pertandingan.index', compact('hasilPertandingans'));
    }

    public function create()
    {
        $pertandingans = Pertandingan::doesntHave('hasilPertandingan')->get();
        return view('backend.hasil_pertandingan.create', compact('pertandingans'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateHasil($request);

        HasilPertandingan::create([
            'pertandingan_id' => $validated['pertandingan_id'],
        ]);

        return redirect()->route('backend.hasil_pertandingan.index')
                         ->with('success', 'Pertandingan berhasil ditambahkan ke daftar hasil.');
    }

    public function destroy($id)
    {
        $hasil = HasilPertandingan::findOrFail($id);
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
}
