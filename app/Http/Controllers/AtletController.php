<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AtletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->role === 'admin') {
            $atlets = Atlet::with('club')->get();
        } else {
            $atlets = Atlet::with('club')->where('user_id', $user->id)->get();
        }

        return view('backend.atlet.index', compact('atlets'));
    }

    public function create()
    {
        $clubs = Club::all();
        return view('backend.atlet.create', compact('clubs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateAtlet($request);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $this->handleFotoUpload($request);
        }

        $validated['user_id'] = Auth::id();

        Atlet::create($validated);

        return redirect()->route('backend.atlet.index')->with('success', 'Atlet berhasil ditambahkan');
    }

    public function edit($id)
    {
        $atlet = Atlet::findOrFail($id);

        $this->authorizeAtlet($atlet);

        $clubs = Club::all();
        return view('backend.atlet.edit', compact('atlet', 'clubs'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $atlet = Atlet::findOrFail($id);

        $this->authorizeAtlet($atlet);

        $validated = $this->validateAtlet($request);

        if ($request->hasFile('foto')) {
            $this->deleteOldFoto($atlet->foto);
            $validated['foto'] = $this->handleFotoUpload($request);
        }

        $atlet->update($validated);

        return redirect()->route('backend.atlet.index')->with('success', 'Atlet berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $atlet = Atlet::findOrFail($id);

        $this->authorizeAtlet($atlet);

        $this->deleteOldFoto($atlet->foto);

        $atlet->delete();

        return redirect()->route('backend.atlet.index')->with('success', 'Atlet berhasil dihapus');
    }

    // ===== Helper Methods =====

    private function validateAtlet(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'prestasi' => 'nullable|string',
            'club_id' => 'nullable',
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

    private function authorizeAtlet(Atlet $atlet): void
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->role === 'admin') {
            return;
        }

        if ($atlet->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}
