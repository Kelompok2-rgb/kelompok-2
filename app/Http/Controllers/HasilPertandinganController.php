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

    /**
     * Menampilkan daftar hasil pertandingan.
     */
    public function index()
    {
        $hasilPertandingans = HasilPertandingan::with('pertandingan')->get();
        return view('backend.hasil_pertandingan.index', compact('hasilPertandingans'));
    }

    /**
     * Menampilkan form untuk menambahkan hasil pertandingan.
     */
    public function create()
    {
        // Hanya tampilkan pertandingan yang belum ada di hasil_pertandingans
        $pertandingans = Pertandingan::doesntHave('hasilPertandingan')->get();
        return view('backend.hasil_pertandingan.create', compact('pertandingans'));
    }

    /**
     * Menyimpan hasil pertandingan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertandingan_id' => 'required|exists:pertandingans,id',
        ]);

        HasilPertandingan::create([
            'pertandingan_id' => $request->pertandingan_id,
        ]);

        return redirect()->route('backend.hasil_pertandingan.index')
                         ->with('success', 'Pertandingan berhasil ditambahkan ke daftar hasil.');
    }

    public function destroy($id)
{
    $hasil = HasilPertandingan::findOrFail($id);
    $hasil->delete();

    return redirect()->route('backend.hasil_pertandingan.index')->with('success', 'Hasil pertandingan berhasil dihapus');
}

}
