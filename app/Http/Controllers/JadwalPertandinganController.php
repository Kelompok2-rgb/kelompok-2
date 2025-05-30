<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Pertandingan;

class JadwalPertandinganController extends Controller
{
    /**
     * Menampilkan semua jadwal pertandingan.
     */
    public function index()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::all();
        return view('backend.jadwal_pertandingan.index', compact('jadwalpertandingans'));
    }

    /**
     * Menampilkan form untuk membuat jadwal pertandingan.
     */
    public function create()
    {
        return view('backend.jadwal_pertandingan.create');
    }

    /**
     * Menyimpan data jadwal pertandingan.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal' => 'required|string|max:255',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
        ]);

        // Membuat jadwal pertandingan baru
        Jadwal_Pertandingan::create($validated);

        // Redirect setelah berhasil menambah data
        return redirect()->route('backend.jadwal_pertandingan.index')->with('success', 'Jadwal pertandingan berhasil ditambahkan');
    }

    /**
     * Menampilkan form untuk mengedit jadwal pertandingan.
     */
    public function edit($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        return view('backend.jadwal_pertandingan.edit', compact('jadwalpertandingan'));
    }

    /**
     * Memperbarui data jadwal pertandingan.
     */
    public function update(Request $request, $id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'tanggal' => 'required|string|max:255',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
        ]);

        // Memperbarui data jadwal pertandingan
        $jadwalpertandingan->update($validated);

        // Redirect setelah berhasil memperbarui data
        return redirect()->route('backend.jadwal_pertandingan.index')->with('success', 'Jadwal pertandingan berhasil diperbarui');
    }

    /**
     * Menghapus data jadwal pertandingan.
     */
    public function destroy($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);

        // Menghapus jadwal pertandingan
        $jadwalpertandingan->delete();

        // Redirect setelah berhasil menghapus data
        return redirect()->route('backend.jadwal_pertandingan.index')->with('success', 'Jadwal pertandingan berhasil dihapus');
    }
}
