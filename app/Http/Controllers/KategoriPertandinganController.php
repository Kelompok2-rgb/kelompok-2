<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Pertandingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class KategoriPertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $kategoripertandingans = $user->role === 'admin'
            ? Kategori_Pertandingan::latest()->get()
            : Kategori_Pertandingan::where('user_id', $user->id)->latest()->get();

        return view('backend.kategori_pertandingan.index', compact('kategoripertandingans', 'user'));
    }

    public function create()
    {
        return view('backend.kategori_pertandingan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateKategori($request);
        $validated['user_id'] = Auth::id();

        Kategori_Pertandingan::create($validated);

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori_Pertandingan::findOrFail($id);
        $this->authorizeKategori($kategori);

        return view('backend.kategori_pertandingan.edit', compact('kategori'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $kategori = Kategori_Pertandingan::findOrFail($id);
        $this->authorizeKategori($kategori);

        $validated = $this->validateKategori($request);

        $kategori->update($validated);

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $kategori = Kategori_Pertandingan::findOrFail($id);
        $this->authorizeKategori($kategori);

        $kategori->delete();

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil dihapus');
    }

    // ===== Helper Methods =====

    private function validateKategori(Request $request): array
    {
        return $request->validate([
            'nama'    => 'required|string|max:255',
            'aturan'  => 'required|string|max:255',
            'batasan' => 'required|string|max:255',
        ]);
    }

    private function authorizeKategori(Kategori_Pertandingan $kategori): void
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return;
        }

        if ($kategori->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}
