<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
    public function index()
    {
        $club = Club::all();
        return view('club.index', compact('clubs'));
    }

    public function create()
    {
        return view('club.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama'           => 'required|string|min:2',
            'lokasi'  => 'required|string|min:2',
            'deskripsi'  => 'required|string|max:255',
        ]);

        Club::create($validated);
        return redirect()->route('club.index')->with('success', 'Club berhasil ditambahkan');
    }

    public function edit($id)
    {
        $club = Club::findOrFail($id);
        return view('club.edit', compact('club'));
    }

    public function update(Request $request, $id)
    {
        $club = Club::findOrFail($id);

        // Validasi input (dengan pengecualian untuk data yang sedang diedit)
        $validated = $request->validate([
            'nama'           => 'required|string|min:2',
            'lokasi'  => 'required|string|min:2',
            'deskripsi'  => 'required|string|max:255',
        ]);

        $club->update($validated);
        return redirect()->route('club.index')->with('success', 'Club berhasil diperbarui');
    }

    public function destroy($id)
    {
        $club = Club::findOrFail($id);
        $club->delete();
        return redirect()->route('club.index')->with('success', 'Club berhasil dihapus');
    }
}

