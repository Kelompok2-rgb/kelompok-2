<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertandingan;

class PertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,penyelenggara');
    }

    public function index()
    {
        $pertandingans = Pertandingan::latest()->get(); // urut berdasarkan created_at terbaru
        return view('backend.pertandingan.index', compact('pertandingans'));
    }

    public function create()
    {
        return view('backend.pertandingan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pertandingan'   => 'required|string|min:2|max:255',
            'nama_penyelenggara'  => 'required|string|min:2|max:255',
        ]);

        Pertandingan::create($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil ditambahkan.');
    }

    public function edit(Pertandingan $pertandingan)
    {
        return view('backend.pertandingan.edit', compact('pertandingan'));
    }

    public function update(Request $request, Pertandingan $pertandingan)
    {
        $validated = $request->validate([
            'nama_pertandingan'   => 'required|string|min:2|max:255',
            'nama_penyelenggara'  => 'required|string|min:2|max:255',
        ]);

        $pertandingan->update($validated);

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil diperbarui.');
    }

    public function destroy(Pertandingan $pertandingan)
    {
        $pertandingan->delete();

        return redirect()->route('backend.pertandingan.index')
                         ->with('success', 'Pertandingan berhasil dihapus.');
    }
}
