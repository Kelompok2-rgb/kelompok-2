<?php

namespace App\Http\Controllers;

use App\Models\Juri;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class JuriController extends Controller
{
    public function index()
    {
        $juris = Juri::all();
        return view('juri.index', compact('juris'));
    }

    public function create()
    {
        return view('juri.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'pengalaman' => 'required|string',
        ]);

        Juri::create($validated);

        return redirect()->route('juri.index')->with('success', 'Juri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $juri = Juri::findOrFail($id);
        return view('juri.edit', compact('juri'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'pengalaman' => 'required|string',
        ]);

        $juri->update($validated);

        return redirect()->route('juri.index')->with('success', 'Juri berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);
        $juri->delete();

        return redirect()->route('juri.index')->with('success', 'Juri berhasil dihapus');
    }
}