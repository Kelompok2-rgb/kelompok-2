<?php

namespace App\Http\Controllers;

use App\Models\Juri;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class JuriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,juri');
    }

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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'sertifikat' => 'required|mimes:pdf|max:2048',
        ]);

        // Simpan file sertifikat ke storage
        if ($request->hasFile('sertifikat')) {
            $validated['sertifikat'] = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        Juri::create($validated);

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

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'sertifikat' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Cek jika ada sertifikat baru, simpan dan timpa
        if ($request->hasFile('sertifikat')) {
            if ($juri->sertifikat && Storage::disk('public')->exists($juri->sertifikat)) {
                Storage::disk('public')->delete($juri->sertifikat);
            }
            $validated['sertifikat'] = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        $juri->update($validated);

        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil diperbarui');
    }

    /**
     * Menghapus data juri.
     */
    public function destroy($id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);

        // Hapus file sertifikat dari storage jika ada
        if ($juri->sertifikat && Storage::disk('public')->exists($juri->sertifikat)) {
            Storage::disk('public')->delete($juri->sertifikat);
        }

        $juri->delete();

        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil dihapus');
    }
}
