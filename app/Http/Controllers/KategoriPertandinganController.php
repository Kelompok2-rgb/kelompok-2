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

        if ($user->role === 'admin') {
            $kategoripertandingans = Kategori_Pertandingan::latest()->get();
        } else {
            $kategoripertandingans = Kategori_Pertandingan::where('user_id', $user->id)
                                        ->latest()
                                        ->get();
        }

        return view('backend.kategori_pertandingan.index', compact('kategoripertandingans'));
    }

    public function create()
    {
        return view('backend.kategori_pertandingan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'aturan'  => 'required|string|max:255',
            'batasan' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id(); // simpan siapa yang input

        Kategori_Pertandingan::create($validated);

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategoripertandingan = Kategori_Pertandingan::findOrFail($id);
        $this->authorizeKategori($kategoripertandingan);

        return view('backend.kategori_pertandingan.edit', compact('kategoripertandingan'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $kategoripertandingan = Kategori_Pertandingan::findOrFail($id);
        $this->authorizeKategori($kategoripertandingan);

        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'aturan'  => 'required|string|max:255',
            'batasan' => 'required|string|max:255',
        ]);

        $kategoripertandingan->update($validated);

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $kategoripertandingan = Kategori_Pertandingan::findOrFail($id);
        $this->authorizeKategori($kategoripertandingan);

        $kategoripertandingan->delete();

        return redirect()->route('backend.kategori_pertandingan.index')
                         ->with('success', 'Kategori pertandingan berhasil dihapus');
    }

    // ===== Helper untuk cek izin =====
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
