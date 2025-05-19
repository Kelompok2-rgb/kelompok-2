<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    public function index()
    {
        $atlets = Atlet::all();
        return view('backend.atlet.index', compact('atlets'));

    }

    public function create()
    {
        return view('backend.atlet.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'prestasi' => 'nullable|string',
            'statistik_pertandingan' => 'nullable|string',
            'training_record' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Atlet::create($validated);

        return redirect()->route('backend.atlet.index')->with('success', 'Atlet berhasil ditambahkan');
    }

    public function edit($id)
    {
        $atlet = Atlet::findOrFail($id);
        return view('backend.atlet.edit', compact('atlet'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $atlet = Atlet::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'prestasi' => 'nullable|string',
            'statistik_pertandingan' => 'nullable|string',
            'training_record' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($atlet->foto && Storage::disk('public')->exists($atlet->foto)) {
                Storage::disk('public')->delete($atlet->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $atlet->update($validated);

        return redirect()->route('backend.atlet.index')->with('success', 'Atlet berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $atlet = Atlet::findOrFail($id);

        if ($atlet->foto && Storage::disk('public')->exists($atlet->foto)) {
            Storage::disk('public')->delete($atlet->foto);
        }

        $atlet->delete();

        return redirect()->route('backend.atlet.index')->with('success', 'Atlet berhasil dihapus');
    }
    
}

