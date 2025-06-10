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
    
    /**
     * Menampilkan semua jadwal pertandingan.
     */
    public function index()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::all();
        
        // Debug - uncomment untuk melihat data
        // dd($jadwalpertandingans->toArray());
        
        return view('backend.jadwal_pertandingan.index', compact('jadwalpertandingans'));
    }

    /**
     * Menampilkan form untuk membuat jadwal pertandingan.
     */
    public function create()
    {
        $pertandingans = Pertandingan::select('id', 'nama_pertandingan', 'lokasi', 'tanggal')
                                    ->latest()
                                    ->get();
        
        return view('backend.jadwal_pertandingan.create', compact('pertandingans'));
    }
    
    /**
     * Menyimpan data jadwal pertandingan.
     */
    public function store(Request $request)
    {
        // Debug input yang diterima
        // dd($request->all());
        
        // Validasi input
        $validated = $request->validate([

            'tanggal' => 'required|date|max:255',
            'pertandingan_id' => 'required|exists:pertandingans,id',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        // Ambil data pertandingan berdasarkan ID
        $pertandingan = Pertandingan::findOrFail($validated['pertandingan_id']);

        // Siapkan data untuk disimpan
        $dataToSave = [
            'pertandingan_id' => $validated['pertandingan_id'],
            'nama_pertandingan' => $pertandingan->nama_pertandingan,
            'tanggal' => $validated['tanggal'],
            'waktu' => $validated['waktu'],
            'lokasi' => $validated['lokasi'],
            'deskripsi' => $validated['deskripsi'],
        ];

        // Debug data yang akan disimpan
        // dd($dataToSave);

        // Membuat jadwal pertandingan baru
        $jadwal = Jadwal_Pertandingan::create($dataToSave);

        // Debug data yang tersimpan
        // dd($jadwal->toArray());

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil ditambahkan');
    }

    /**
     * Menampilkan form untuk mengedit jadwal pertandingan.
     */
    public function edit($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $pertandingans = Pertandingan::all();
        
        return view('backend.jadwal_pertandingan.edit', compact('jadwalpertandingan', 'pertandingans'));
    }

    /**
     * Memperbarui data jadwal pertandingan.
     */
    public function update(Request $request, $id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'pertandingan_id' => 'required|exists:pertandingans,id',
            'tanggal' => 'required|string|max:255',
            'waktu'   => 'required|string|max:255',
            'lokasi'  => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        // Ambil data pertandingan berdasarkan ID
        $pertandingan = Pertandingan::findOrFail($validated['pertandingan_id']);
        
        // Siapkan data untuk update
        $dataToUpdate = [
            'pertandingan_id' => $validated['pertandingan_id'],
            'nama_pertandingan' => $pertandingan->nama_pertandingan,
            'tanggal' => $validated['tanggal'],
            'waktu' => $validated['waktu'],
            'lokasi' => $validated['lokasi'],
            'deskripsi' => $validated['deskripsi'],
        ];

        // Update data jadwal pertandingan
        $jadwalpertandingan->update($dataToUpdate);

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil diperbarui');
    }

    /**
     * Menghapus data jadwal pertandingan.
     */
    public function destroy($id)
    {
        $jadwalpertandingan = Jadwal_Pertandingan::findOrFail($id);
        $jadwalpertandingan->delete();

        return redirect()->route('backend.jadwal_pertandingan.index')
            ->with('success', 'Jadwal pertandingan berhasil dihapus');
    }
}