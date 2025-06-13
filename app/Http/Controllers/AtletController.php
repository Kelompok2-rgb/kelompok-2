<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,klub,atlet');
    }

    public function index()
    {
        $atlets = Atlet::with('club')->get();
        return view('backend.atlet.index', compact('atlets'));
    }

    public function create()
    {
        $clubs = Club::all();
        return view('backend.atlet.create', compact('clubs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'prestasi' => 'nullable|string',
            'club_id' => 'nullable',
            
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
        $clubs = Club::all();
        return view('backend.atlet.edit', compact('atlet', 'clubs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $atlet = Atlet::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'prestasi' => 'nullable|string',
            'club_id' => 'nullable',
            
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
