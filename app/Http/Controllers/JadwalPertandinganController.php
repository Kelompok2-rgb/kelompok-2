<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Pertandingan;

class JadwalPertandinganController extends Controller
{
    public function index()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::all();
        return view('jadwal_pertandingan.index', compact('jadwalpertandingans'));
    }

    public function create()
    {
        return view('jadwal_pertandingan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal' => 'required|string|max:255',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
        ]);

        Jadwal_Pertandingan::create($validated);
        return redirect()->route('jadwal_pertandingan.index')->with('success', 'Jadwal pertandingan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        return view('jadwal_pertandingan.edit', compact('jadwalpertandingan'));
    }

    public function update(Request $request, $id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'tanggal' => 'required|string|max:255',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
        ]);

        $jadwalpertandingan->update($validated);
        return redirect()->route('jadwal_pertandingan.index')->with('success', 'Jadwal pertandingan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $jadwalpertandingan->delete();
        return redirect()->route('jadwal_pertandingan.index')->with('success', 'Jadwal pertandingan berhasil dihapus');
    }
}
