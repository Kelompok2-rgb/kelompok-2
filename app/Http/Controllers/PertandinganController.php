<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;
use App\Models\PenyelenggaraEvent;
use App\Models\Juri; // tambahkan ini

class PertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,penyelenggara');
    }

    // Menampilkan daftar pertandingan
    public function index()
    {
        $pertandingans = Pertandingan::with(['penyelenggaraEvent', 'juri'])->latest()->get(); // tambahkan relasi juri
        return view('backend.pertandingan.index', compact('pertandingans'));
    }

    // Menampilkan form tambah pertandingan
    public function create()
    {
        $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        $juris = Juri::orderBy('nama_juri')->get(); // ambil data juri
        return view('backend.pertandingan.create', compact('penyelenggaras', 'juris'));
    }

    // Menyimpan data pertandingan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pertandingan'       => 'required|string|min:2|max:255',
            'penyelenggara_event_id'  => 'required|exists:penyelenggara_events,id',
            'juri_id'                 => 'required|exists:juris,id',
        ]);

        Pertandingan::create($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil ditambahkan.');
    }

    // Menampilkan form edit pertandingan
    public function edit(Pertandingan $pertandingan)
    {
        $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        $juris = Juri::orderBy('nama_juri')->get(); // ambil data juri
        return view('backend.pertandingan.edit', compact('pertandingan', 'penyelenggaras', 'juris'));
    }

    // Menyimpan perubahan data pertandingan
    public function update(Request $request, Pertandingan $pertandingan)
    {
        $validated = $request->validate([
            'nama_pertandingan'       => 'required|string|min:2|max:255',
            'penyelenggara_event_id'  => 'required|exists:penyelenggara_events,id',
            'juri_id'                 => 'required|exists:juris,id',
        ]);

        $pertandingan->update($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil diperbarui.');
    }

    // Menghapus pertandingan
    public function destroy(Pertandingan $pertandingan)
    {
        $pertandingan->delete();

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil dihapus.');
    }
}
