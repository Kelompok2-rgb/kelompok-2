<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KategoriPertandinganController extends Controller
{
    public function index()
    {
        $kategoripertandingans = Kategori_Pertandingan::all();
        return view('backend.kategori_pertandingan.index', compact('kategoripertandingans'));
    }

    public function create()
    {
        return view('backend.kategori_pertandingan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'aturan'  => 'required|string|max:255',
            'batasan' => 'required|string|max:255',
        ]);

        Kategori_Pertandingan::create($validated);

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategoripertandingan = Kategori_Pertandingan::findOrFail($id);
        return view('backend.kategori_pertandingan.edit', compact('kategoripertandingan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $kategoripertandingan = Kategori_Pertandingan::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'aturan'  => 'required|string|max:255',
            'batasan' => 'required|string|max:255',
        ]);

        $kategoripertandingan->update($validated);

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $kategoripertandingan = Kategori_Pertandingan::findOrFail($id);
        $kategoripertandingan->delete();

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil dihapus');
    }
}
