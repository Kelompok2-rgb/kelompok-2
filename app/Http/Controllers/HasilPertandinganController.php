<?php

namespace App\Http\Controllers;

use App\Models\HasilPertandingan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class HasilPertandinganController extends Controller
{
    public function index()
    {
        $hasil_pertandingans = HasilPertandingan::all();
        return view('hasil_pertandingan.index', compact('hasil_pertandingans'));
    }

    public function create()
    {
        return view('hasil_pertandingan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'skor' => 'required|numeric',
            'rangking' => 'nullable|integer',
            'catatan_juri' => 'nullable|string',
        ]);

        HasilPertandingan::create($validated);

        return redirect()->route('hasil_pertandingan.index')->with('success', 'Hasil pertandingan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $hasil_pertandingan = HasilPertandingan::findOrFail($id);
        return view('hasil_pertandingan.edit', compact('hasil_pertandingan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $hasil_pertandingan = HasilPertandingan::findOrFail($id);

        $validated = $request->validate([
            'skor' => 'required|numeric',
            'rangking' => 'nullable|integer',
            'catatan_juri' => 'nullable|string',
        ]);

        $hasil_pertandingan->update($validated);

        return redirect()->route('hasil_pertandingan.index')->with('success', 'Hasil pertandingan berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $hasil_pertandingan = HasilPertandingan::findOrFail($id);
        $hasil_pertandingan->delete();

        return redirect()->route('hasil_pertandingan.index')->with('success', 'Hasil pertandingan berhasil dihapus');
    }
}
