<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,klub,anggota');
    }

    public function index()
    {
        $anggotas = Anggota::all();
        return view('backend.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('backend.anggota.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateAnggota($request);

        $validated['foto'] = $this->handleFotoUpload($request);

        Anggota::create($validated);

        return redirect()->route('backend.anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('backend.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);

        $validated = $this->validateAnggota($request);

        if ($request->hasFile('foto')) {
            $this->deleteOldFoto($anggota->foto);
            $validated['foto'] = $this->handleFotoUpload($request);
        }

        $anggota->update($validated);

        return redirect()->route('backend.anggota.index')->with('success', 'Anggota berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $anggota = Anggota::findOrFail($id);

        $this->deleteOldFoto($anggota->foto);

        $anggota->delete();

        return redirect()->route('backend.anggota.index')->with('success', 'Anggota berhasil dihapus');
    }

    // ===== Helper Methods =====

    private function validateAnggota(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'klub' => 'nullable|string|max:255',
            'tgl_lahir' => 'required|date',
            'peran' => 'required|in:Atlet,Pengurus,Atlet & Pengurus',
            'kontak' => 'required|digits_between:8,15',
        ]);
    }

    private function handleFotoUpload(Request $request): ?string
    {
        return $request->hasFile('foto')
            ? $request->file('foto')->store('foto', 'public')
            : null;
    }

    private function deleteOldFoto(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
