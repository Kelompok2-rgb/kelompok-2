<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $galeris = Galeri::paginate(10);
        } else {
            $galeris = Galeri::where('user_id', $user->id)->paginate(10);
        }

        return view('backend.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('backend.galeri.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateGaleri($request);

        $fileName = $this->handleUpload($request);

        Galeri::create([
            'judul'     => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'gambar'    => $fileName,
            'user_id'   => Auth::id(),
        ]);

        return redirect()->route('backend.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $this->authorizeGaleri($galeri);

        return view('backend.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $galeri = Galeri::findOrFail($id);
        $this->authorizeGaleri($galeri);

        $validated = $this->validateGaleri($request, true);

        $galeri->judul = $validated['judul'];
        $galeri->deskripsi = $validated['deskripsi'] ?? $galeri->deskripsi;

        if ($request->hasFile('gambar')) {
            $this->deleteOldImage($galeri->gambar);
            $galeri->gambar = $this->handleUpload($request);
        }

        $galeri->save();

        return redirect()->route('backend.galeri.index')->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy($id): RedirectResponse
    {
        $galeri = Galeri::findOrFail($id);
        $this->authorizeGaleri($galeri);

        $this->deleteOldImage($galeri->gambar);

        $galeri->delete();

        return redirect()->route('backend.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('backend.galeri.show', compact('galeri'));
    }

    // ===== Helper Methods =====

    private function validateGaleri(Request $request, bool $isUpdate = false): array
    {
        return $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => ($isUpdate ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    }

    private function handleUpload(Request $request): string
    {
        $fileName = time() . '.' . $request->file('gambar')->extension();
        $request->file('gambar')->move(public_path('uploads'), $fileName);
        return $fileName;
    }

    private function deleteOldImage(?string $fileName): void
    {
        $path = public_path('uploads/' . $fileName);
        if ($fileName && File::exists($path)) {
            File::delete($path);
        }
    }

    private function authorizeGaleri(Galeri $galeri): void
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return;
        }

        if ($galeri->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
    }
}
