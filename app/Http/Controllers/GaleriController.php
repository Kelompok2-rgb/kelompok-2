<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,penyelenggara');
    }

    public function index()
    {
        $galeris = Galeri::paginate(10);
        return view('backend.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('backend.galeri.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fileName = time() . '.' . $request->file('gambar')->extension();
        $request->file('gambar')->move(public_path('uploads'), $fileName);

        Galeri::create([
            'judul'     => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'gambar'    => $fileName,
        ]);

        return redirect()->route('backend.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('backend.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $galeri->judul = $validated['judul'];
        $galeri->deskripsi = $validated['deskripsi'] ?? $galeri->deskripsi;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            $oldPath = public_path('uploads/' . $galeri->gambar);
            if ($galeri->gambar && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // Simpan gambar baru
            $fileName = time() . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('uploads'), $fileName);
            $galeri->gambar = $fileName;
        }

        $galeri->save();

        return redirect()->route('backend.galeri.index')->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file gambar dari storage
        $path = public_path('uploads/' . $galeri->gambar);
        if ($galeri->gambar && File::exists($path)) {
            File::delete($path);
        }

        $galeri->delete();

        return redirect()->route('backend.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('backend.galeri.show', compact('galeri'));
    }
}
