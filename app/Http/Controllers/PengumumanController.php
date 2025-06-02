<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    public function index()
    {
        $pengumumans = Pengumuman::orderBy('tanggal', 'desc')->get();
        return view('backend.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        return view('backend.pengumuman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
        ]);

        Pengumuman::create($validated);
        return redirect()->route('backend.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('backend.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $validated = $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $pengumuman->update($validated);
        return redirect()->route('backend.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();
        return redirect()->route('backend.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
