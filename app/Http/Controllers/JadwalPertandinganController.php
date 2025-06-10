<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Pertandingan;
use App\Models\Pertandingan;

class JadwalPertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,penyelenggara');
    }

    public function index()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::all();
        return view('backend.jadwal_pertandingan.index', compact('jadwalpertandingans'));
    }

    public function create()
    {
        $pertandingans = Pertandingan::select('id', 'nama_pertandingan', 'lokasi', 'tanggal')->latest()->get();
        return view('backend.jadwal_pertandingan.create', compact('pertandingans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertandingan_id' => 'required|exists:pertandingans,id',
            'tanggal' => 'required|date',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        // Ambil data pertandingan berdasarkan ID dari request
        $pertandingan = Pertandingan::findOrFail($validated['pertandingan_id']);

        $dataToSave = [
            'pertandingan_id' => $pertandingan->id,
            'nama_pertandingan' => $pertandingan->nama_pertandingan,
            'tanggal' => $validated['tanggal'],
            'waktu' => $validated['waktu'],
            'lokasi' => $validated['lokasi'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ];

        Jadwal_Pertandingan::create($dataToSave);

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil ditambahkan');
    }

   public function edit($id)
{
    $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
    $pertandingans = Pertandingan::all(); // Atau sesuai model kamu

    return view('backend.jadwal_pertandingan.edit', compact('jadwalpertandingan', 'pertandingans'));
}

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pertandingan_id' => 'required|exists:pertandingans,id',
            'tanggal' => 'required|date',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $pertandingan = Pertandingan::findOrFail($validated['pertandingan_id']);

        $dataToUpdate = [
            'pertandingan_id' => $pertandingan->id,
            'nama_pertandingan' => $pertandingan->nama_pertandingan,
            'tanggal' => $validated['tanggal'],
            'waktu' => $validated['waktu'],
            'lokasi' => $validated['lokasi'],
            'deskripsi' => $validated['deskripsi'] ?? null,
        ];

        $jadwalpertandingan->update($dataToUpdate);

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $jadwalpertandingan->delete();

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil dihapus');
    }
}
