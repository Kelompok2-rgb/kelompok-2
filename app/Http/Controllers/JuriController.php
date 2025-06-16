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

    public function index()
    {
        $juris = Juri::all();
        return view('backend.juri.index', compact('juris'));
    }

    public function create()
    {
        return view('backend.juri.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_juri' => 'required|string|max:255', // DIGANTI
            'tanggal_lahir' => 'required|date',
            'sertifikat' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('sertifikat')) {
            $validated['sertifikat'] = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        Juri::create($validated);

        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $juri = Juri::findOrFail($id);
        return view('backend.juri.edit', compact('juri'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);

        $validated = $request->validate([
            'nama_juri' => 'required|string|max:255', // DIGANTI
            'tanggal_lahir' => 'required|date',
            'sertifikat' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('sertifikat')) {
            if ($juri->sertifikat && Storage::disk('public')->exists($juri->sertifikat)) {
                Storage::disk('public')->delete($juri->sertifikat);
            }
            $validated['sertifikat'] = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        $juri->update($validated);

        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);

        if ($juri->sertifikat && Storage::disk('public')->exists($juri->sertifikat)) {
            Storage::disk('public')->delete($juri->sertifikat);
        }

        $juri->delete();

        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil dihapus');
    }
}
