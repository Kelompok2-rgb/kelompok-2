<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Pertandingan;
use App\Models\Pertandingan;

class JadwalPertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,penyelenggara');
    }

    public function index()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::with('pertandingan')->latest()->get();
        return view('backend.jadwal_pertandingan.index', compact('jadwalpertandingans'));
    }

    public function create()
    {
        $pertandingans = Pertandingan::select('id', 'nama_pertandingan')->latest()->get();
        return view('backend.jadwal_pertandingan.create', compact('pertandingans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertandingan_id' => 'required|exists:pertandingans,id',
            'tanggal'         => 'required|date',
            'waktu'           => 'required|date_format:H:i',
            'lokasi'          => 'required|string|max:255',
            'deskripsi'       => 'nullable|string|max:1000',
        ]);

        Jadwal_Pertandingan::create($validated);

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $pertandingans = Pertandingan::select('id', 'nama_pertandingan')->get();

        return view('backend.jadwal_pertandingan.edit', compact('jadwalpertandingan', 'pertandingans'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pertandingan_id' => 'required|exists:pertandingans,id',
            'tanggal'         => 'required|date',
            'waktu'           => 'required|date_format:H:i',
            'lokasi'          => 'required|string|max:255',
            'deskripsi'       => 'nullable|string|max:1000',
        ]);

        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $jadwalpertandingan->update($validated);

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $jadwalpertandingan->delete();

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil dihapus.');
    }
}
