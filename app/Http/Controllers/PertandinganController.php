<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;

class PertandinganController extends Controller
{
    public function index()
    {
        $pertandingans = Pertandingan::orderBy('tanggal', 'desc')->get();
        return view('backend.pertandingan.index', compact('pertandingans'));
    }

    public function create()
    {
        return view('backend.pertandingan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'lokasi'  => 'required|string|min:2|max:255',
        ]);

        Pertandingan::create($validated);
        return redirect()->route('backend.pertandingan.index')->with('success', 'Pertandingan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        return view('backend.pertandingan.edit', compact('pertandingan'));
    }

    public function update(Request $request, $id)
    {
        $pertandingan = Pertandingan::findOrFail($id);

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'lokasi'  => 'required|string|min:2|max:255',
        ]);

        $pertandingan->update($validated);
        return redirect()->route('backend.pertandingan.index')->with('success', 'Pertandingan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        $pertandingan->delete();
        return redirect()->route('backend.pertandingan.index')->with('success', 'Pertandingan berhasil dihapus.');
    }
}
