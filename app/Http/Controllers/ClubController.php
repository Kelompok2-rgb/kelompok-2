<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Club;

class ClubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,klub');
    }
    public function index()
    {
        $clubs = Club::all();
        return view('backend.club.index', compact('clubs'));
    }

    public function create()
    {
        return view('backend.club.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|min:2|max:255',
            'lokasi' => 'required|string|min:2|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        Club::create($validated);

        return redirect()->route('backend.club.index')->with('success', 'Club berhasil ditambahkan');
    }

    public function edit($id)
    {
        $club = Club::findOrFail($id);
        return view('backend.club.edit', compact('club'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $club = Club::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|min:2|max:255',
            'lokasi' => 'required|string|min:2|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $club->update($validated);

        return redirect()->route('backend.club.index')->with('success', 'Club berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $club = Club::findOrFail($id);
        $club->delete();

        return redirect()->route('backend.club.index')->with('success', 'Club berhasil dihapus');
    }
}
