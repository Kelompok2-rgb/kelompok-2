<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;

class PertandinganController extends Controller
{
    public function index()
    {
        $pertandingans = Pertandingan::all();
        return view('pertandingan.index', compact('pertandingans'));
    }

    public function create()
    {
        return view('pertandingan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tanggal'           => 'required',
            'lokasi'  => 'required|string|min:2',
        ]);

        Pertandingan::create($validated);
        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        return view('pertandingan.edit', compact('pertandingan'));
    }

    public function update(Request $request, $id)
    {
        $pertandingan = Pertandingan::findOrFail($id);

        // Validasi input (dengan pengecualian untuk data yang sedang diedit)
        $validated = $request->validate([
            'tanggal'           => 'required',
            'lokasi'  => 'required|string|min:2',
        ]);

        $pertandingan->update($validated);
        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        $pertandingan->delete();
        return redirect()->route('pertandingan.index')->with('success', 'Pertandingan berhasil dihapus');
    }
}
