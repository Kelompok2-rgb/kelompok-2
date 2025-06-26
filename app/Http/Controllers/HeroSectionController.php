<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    // Tampilkan semua data hero section
    public function index()
    {
        $heros = HeroSection::all();
        return view('backend.page_setting.hero.index', compact('heros'));
    }

    // Tampilkan form tambah hero section
    public function create()
    {
        return view('backend.page_setting.hero.create');
    }

    // Simpan hero section (dengan logika: hapus data lama)
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Hapus data lama
        $oldData = HeroSection::first();
        if ($oldData) {
            // Hapus file gambar dari storage jika ada
            if ($oldData->image && Storage::disk('public')->exists(str_replace('storage/', '', $oldData->image))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $oldData->image));
            }

            HeroSection::truncate(); // kosongkan tabel
        }

        // Upload gambar baru
        $path = $request->file('image')->store('uploads', 'public');

        // Simpan ke database
        HeroSection::create([
            'image' => 'storage/' . $path,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('backend.hero.index')->with('success', 'Hero Section berhasil ditambahkan!');
    }

    // Hapus hero section secara manual
    public function destroy($id)
    {
        $hero = HeroSection::findOrFail($id);

        // Hapus file gambar
        if ($hero->image && Storage::disk('public')->exists(str_replace('storage/', '', $hero->image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $hero->image));
        }

        $hero->delete();

        return redirect()->route('backend.hero.index')->with('success', 'Hero Section berhasil dihapus!');
    }
}
