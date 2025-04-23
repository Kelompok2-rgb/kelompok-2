<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    /**
     * Menampilkan semua data galeri untuk admin.
     */
    public function index()
    {
        $galeris = Galeri::paginate(10); // Menggunakan pagination
        return view('galeri.index', compact('galeris'));
    }
    

    /**
     * Menampilkan form tambah galeri untuk admin.
     */
    public function create()
    {
        return view('galeri.create');
    }

    /**
     * Menyimpan data galeri baru untuk admin.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Mengambil nama file dengan timestamp untuk menghindari duplikasi nama file
        $fileName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('uploads'), $fileName);

        // Menyimpan data galeri ke dalam database
        Galeri::create([
            'judul' => $request->judul,
            'gambar' => $fileName,
        ]);

        return redirect()->route('galeri.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit untuk galeri tertentu.
     */
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri'));
    }

    /**
     * Memperbarui data galeri.
     */
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Memperbarui judul galeri
        $galeri->judul = $request->judul;

        // Memeriksa jika ada file gambar baru
        if ($request->hasFile('gambar')) {
            $oldPath = public_path('uploads/' . $galeri->gambar);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // Menyimpan gambar baru
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $fileName);
            $galeri->gambar = $fileName;
        }

        // Menyimpan perubahan
        $galeri->save();

        return redirect()->route('galeri.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus data galeri beserta file gambar-nya.
     */
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Menghapus file gambar
        $path = public_path('uploads/' . $galeri->gambar);
        if (File::exists($path)) {
            File::delete($path);
        }

        // Menghapus data galeri dari database
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Menampilkan semua data galeri untuk publik.
     */

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.show', compact('galeri'));
    }
    
}
