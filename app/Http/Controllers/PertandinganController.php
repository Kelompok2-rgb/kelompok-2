<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;
use App\Models\PenyelenggaraEvent;

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
        $pertandingans = Pertandingan::with('penyelenggaraEvent')->latest()->get();
        return view('backend.pertandingan.index', compact('pertandingans'));
    }

    // Menampilkan form tambah pertandingan
    public function create()
    {
        $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        return view('backend.pertandingan.create', compact('penyelenggaras'));
    }

    // Menyimpan data pertandingan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pertandingan'       => 'required|string|min:2|max:255',
            'penyelenggara_event_id'  => 'required|exists:penyelenggara_events,id',
        ]);

        Pertandingan::create($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil ditambahkan.');
    }

    // Menampilkan form edit pertandingan
    public function edit(Pertandingan $pertandingan)
    {
        $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        return view('backend.pertandingan.edit', compact('pertandingan', 'penyelenggaras'));
    }

    // Menyimpan perubahan data pertandingan
    public function update(Request $request, Pertandingan $pertandingan)
    {
        $validated = $request->validate([
            'nama_pertandingan'       => 'required|string|min:2|max:255',
            'penyelenggara_event_id'  => 'required|exists:penyelenggara_events,id',
        ]);

        $pertandingan->update($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil diperbarui.');
    }

    // Menghapus pertandingan
    public function destroy(Pertandingan $pertandingan)
    {
        // Opsional: tambahkan pengecekan role jika perlu
        // if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'penyelenggara') {
        //     abort(403, 'Akses ditolak.');
        // }

        $pertandingan->delete();

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil dihapus.');
    }
}
