<?php

namespace App\Http\Controllers;

use App\Models\Pertandingan;
use App\Models\Atlet;
use App\Models\PesertaPertandingan;
use Illuminate\Http\Request;

class PesertaPertandinganController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,penyelenggara');
    }
    // Menampilkan daftar peserta untuk suatu pertandingan
    public function index($pertandingan_id)
    {
        $pertandingan = Pertandingan::with('atlets')->findOrFail($pertandingan_id);
        $semuaAtlet = Atlet::all();

        return view('backend.pertandingan.peserta.index', compact('pertandingan', 'semuaAtlet'));
    }

    // Menyimpan peserta baru
    public function store(Request $request, $pertandingan_id)
    {
        $request->validate([
            'atlet_id' => 'required|exists:atlets,id',
        ]);

        $pertandingan = Pertandingan::findOrFail($pertandingan_id);

        // Cegah duplikat peserta
        if ($pertandingan->atlets()->where('atlet_id', $request->atlet_id)->exists()) {
            return redirect()->back()->with('error', 'Atlet ini sudah terdaftar sebagai peserta.');
        }

        // Simpan peserta menggunakan relasi
        $pertandingan->atlets()->attach($request->atlet_id);

        return redirect()->back()->with('success', 'Peserta berhasil ditambahkan.');
    }

    // Menghapus peserta dari pertandingan
    public function destroy($pertandingan_id, $atlet_id)
    {
        $pertandingan = Pertandingan::findOrFail($pertandingan_id);
        $pertandingan->atlets()->detach($atlet_id);

        return redirect()->back()->with('success', 'Peserta berhasil dihapus.');
    }
}
