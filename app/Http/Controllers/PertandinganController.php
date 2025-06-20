<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;
use App\Models\PenyelenggaraEvent;
use App\Models\Juri;

class PertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,penyelenggara');
    }

    public function index()
    {
        $pertandingans = Pertandingan::with(['penyelenggaraEvent', 'juri'])->latest()->get();
        return view('backend.pertandingan.index', compact('pertandingans'));
    }

    public function create()
    {
        $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        $juris = Juri::orderBy('nama_juri')->get();
        return view('backend.pertandingan.create', compact('penyelenggaras', 'juris'));
    }

    public function store(Request $request)
    {
        $validated = $this->validatePertandingan($request);

        Pertandingan::create($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil ditambahkan.');
    }

    public function edit(Pertandingan $pertandingan)
    {
        $penyelenggaras = PenyelenggaraEvent::orderBy('nama_penyelenggara_event')->get();
        $juris = Juri::orderBy('nama_juri')->get();
        return view('backend.pertandingan.edit', compact('pertandingan', 'penyelenggaras', 'juris'));
    }

    public function update(Request $request, Pertandingan $pertandingan)
    {
        $validated = $this->validatePertandingan($request);

        $pertandingan->update($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil diperbarui.');
    }

    public function destroy(Pertandingan $pertandingan)
    {
        $pertandingan->delete();

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil dihapus.');
    }

    // ===== Helper Methods =====

    private function validatePertandingan(Request $request): array
    {
        return $request->validate([
            'nama_pertandingan'       => 'required|string|min:2|max:255',
            'penyelenggara_event_id'  => 'required|exists:penyelenggara_events,id',
            'juri_id'                 => 'required|exists:juris,id',
        ]);
    }
}
