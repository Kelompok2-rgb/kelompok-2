<?php

namespace App\Http\Controllers;

use App\Models\Juri;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JuriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $juris = Juri::all();
        } else {
            $juris = Juri::where('user_id', $user->id)->get();
        }

        return view('backend.juri.index', compact('juris'));
    }

    public function create()
    {
        return view('backend.juri.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_juri' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'sertifikat' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('sertifikat')) {
            $validated['sertifikat'] = $request->file('sertifikat')->store('sertifikat', 'public');
        }

        $validated['user_id'] = Auth::id();

        Juri::create($validated);

        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $juri = Juri::findOrFail($id);

        $this->authorizeJuri($juri);

        return view('backend.juri.edit', compact('juri'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $juri = Juri::findOrFail($id);

        $this->authorizeJuri($juri);

        $validated = $request->validate([
            'nama_juri' => 'required|string|max:255',
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

        $this->authorizeJuri($juri);

        if ($juri->sertifikat && Storage::disk('public')->exists($juri->sertifikat)) {
            Storage::disk('public')->delete($juri->sertifikat);
        }

        $juri->delete();

        return redirect()->route('backend.juri.index')->with('success', 'Juri berhasil dihapus');
    }

    // ===== Helper Methods =====

    private function authorizeJuri(Juri $juri): void
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return;
        }

        if ($juri->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}
