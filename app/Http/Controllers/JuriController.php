<?php

namespace App\Http\Controllers;

use App\Models\Juri;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class JuriController extends Controller
{
    /**
     * Menampilkan semua data juri.
     */
    public function index()
    {
        $juris = Juri::all();
        return view('backend.juri.index', compact('juris'));
    }

    /**
     * Menampilkan form untuk membuat juri baru.
     */
    public function create()
    {
        return view('backend.juri.create');
    }

    /**
     * Menyimpan data juri yang baru.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'sertifikat' => 'required|mimes:pdf|max:2048',
        ]);

        // Menambahkan juri baru
        Juri::create($validated);

        // Redirect setelah data berhasil ditambahkan
        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil ditambahkan');
    }

    /**
     * Menampilkan form untuk mengedit data juri.
     */
    public function edit($id)
    {
        $juri = Juri::findOrFail($id);
        return view('backend.juri.edit', compact('juri'));
    }

    /**
     * Memperbarui data juri.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'sertifikat' => 'required|mimes:pdf|max:2048',
        ]);

        // Memperbarui data juri
        $juri->update($validated);

        // Redirect setelah data berhasil diperbarui
        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil diperbarui');
    }

    /**
     * Menghapus data juri.
     */
    public function destroy($id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);
        $juri->delete();

        // Redirect setelah data berhasil dihapus
        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil dihapus');
    }
}
