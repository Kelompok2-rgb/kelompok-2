<?php

namespace App\Http\Controllers;

use App\Models\HasilPertandingan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HasilPertandinganController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,juri');
    }
    public function index()
    {
        $hasilPertandingans = HasilPertandingan::all();
        return view('backend.hasil_pertandingan.index', compact('hasilPertandingans'));
    }

    public function create()
    {
        return view('backend.hasil_pertandingan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'skor' => 'required|numeric',
            'rangking' => 'nullable|integer',
            'catatan_juri' => 'nullable|string',
        ]);

        HasilPertandingan::create($validated);

        return redirect()->route('backend.hasil_pertandingan.index')
            ->with('success', 'Hasil pertandingan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $hasil_pertandingan = HasilPertandingan::findOrFail($id);
        return view('backend.hasil_pertandingan.edit', compact('hasil_pertandingan'));
    }


    public function update(Request $request, $id): RedirectResponse
    {
        $hasilPertandingan = HasilPertandingan::findOrFail($id);

        $validated = $request->validate([
            'skor' => 'required|numeric',
            'rangking' => 'nullable|integer',
            'catatan_juri' => 'nullable|string',
        ]);

        $hasilPertandingan->update($validated);

        return redirect()->route('backend.hasil_pertandingan.index')
            ->with('success', 'Hasil pertandingan berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $hasilPertandingan = HasilPertandingan::findOrFail($id);
        $hasilPertandingan->delete();

        return redirect()->route('backend.hasil_pertandingan.index')
            ->with('success', 'Hasil pertandingan berhasil dihapus');
    }
}
