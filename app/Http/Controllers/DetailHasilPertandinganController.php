<?php

namespace App\Http\Controllers;

use App\Models\DetailHasilPertandingan;
use App\Models\HasilPertandingan;
use Illuminate\Http\Request;

class DetailHasilPertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,juri');
    }

    /**
     * Menampilkan form input hasil atlet untuk pertandingan tertentu.
     */
    public function create($hasilPertandinganId)
    {
        $hasilPertandingan = HasilPertandingan::findOrFail($hasilPertandinganId);
        return view('backend.detail_hasil_pertandingan.create', compact('hasilPertandingan'));
    }

    /**
     * Menyimpan data hasil atlet.
     */
    public function store(Request $request, $hasilPertandinganId)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'skor'          => 'required|numeric',
            'rangking'      => 'required|integer',
            'catatan_juri'  => 'nullable|string',
        ]);

        DetailHasilPertandingan::create([
            'hasil_pertandingan_id' => $hasilPertandinganId,
            'nama'                  => $request->nama,
            'skor'                  => $request->skor,
            'rangking'              => $request->rangking,
            'catatan_juri'          => $request->catatan_juri,
        ]);

        return redirect()->route('backend.hasil_pertandingan.index')->with('success', 'Detail hasil pertandingan berhasil disimpan.');
    }
}
