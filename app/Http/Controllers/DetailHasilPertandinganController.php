<?php

namespace App\Http\Controllers;

use App\Models\DetailHasilPertandingan;
use App\Models\HasilPertandingan;
use App\Models\PesertaPertandingan;
use Illuminate\Http\Request;

class DetailHasilPertandinganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,juri');
    }

    public function index($hasilPertandinganId)
    {
        $hasilPertandingan = HasilPertandingan::with('pertandingan')->findOrFail($hasilPertandinganId);
        $detailHasil = DetailHasilPertandingan::where('hasil_pertandingan_id', $hasilPertandinganId)->get();

        return view('backend.hasil_pertandingan.detail.index', compact('hasilPertandingan', 'detailHasil'));
    }

    public function create($hasilPertandinganId)
    {
        $hasilPertandingan = HasilPertandingan::findOrFail($hasilPertandinganId);
        $pesertas = PesertaPertandingan::where('pertandingan_id', $hasilPertandingan->pertandingan_id)->get();

        return view('backend.hasil_pertandingan.detail.create', compact('hasilPertandingan', 'pesertas'));
    }

    public function store(Request $request, $hasilPertandinganId)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'lemparan1'    => 'nullable|numeric',
            'lemparan2'    => 'nullable|numeric',
            'lemparan3'    => 'nullable|numeric',
            'lemparan4'    => 'nullable|numeric',
            'lemparan5'    => 'nullable|numeric',
            'skor'         => 'nullable|numeric',
            'rangking'     => 'required|integer',
            'catatan_juri' => 'nullable|string',
        ]);

        DetailHasilPertandingan::create([
            'hasil_pertandingan_id' => $hasilPertandinganId,
            'nama'         => $request->nama,
            'lemparan1'    => $request->lemparan1,
            'lemparan2'    => $request->lemparan2,
            'lemparan3'    => $request->lemparan3,
            'lemparan4'    => $request->lemparan4,
            'lemparan5'    => $request->lemparan5,
            'skor'         => $request->skor,
            'rangking'     => $request->rangking,
            'catatan_juri' => $request->catatan_juri,
        ]);

        return redirect()->route('backend.detail_hasil_pertandingan.index', $hasilPertandinganId)
            ->with('success', 'Hasil peserta berhasil disimpan.');
    }

    public function edit($pertandingan_id, $id)
    {
        $hasilPertandingan = HasilPertandingan::findOrFail($pertandingan_id);
        $detail = DetailHasilPertandingan::findOrFail($id);

        return view('backend.hasil_pertandingan.detail.edit', compact('detail', 'hasilPertandingan'));
    }

    public function update(Request $request, $pertandingan_id, $id)
    {
        $detail = DetailHasilPertandingan::findOrFail($id);

        $request->validate([
            'nama'         => 'required|string|max:255',
            'lemparan1'    => 'nullable|numeric',
            'lemparan2'    => 'nullable|numeric',
            'lemparan3'    => 'nullable|numeric',
            'lemparan4'    => 'nullable|numeric',
            'lemparan5'    => 'nullable|numeric',
            'skor'         => 'nullable|numeric',
            'rangking'     => 'required|integer',
            'catatan_juri' => 'nullable|string',
        ]);

        $detail->update([
            'nama'         => $request->nama,
            'lemparan1'    => $request->lemparan1,
            'lemparan2'    => $request->lemparan2,
            'lemparan3'    => $request->lemparan3,
            'lemparan4'    => $request->lemparan4,
            'lemparan5'    => $request->lemparan5,
            'skor'         => $request->skor,
            'rangking'     => $request->rangking,
            'catatan_juri' => $request->catatan_juri,
        ]);

        return redirect()->route('backend.detail_hasil_pertandingan.index', $pertandingan_id)
            ->with('success', 'Hasil peserta berhasil diperbarui.');
    }

    public function destroy($pertandingan_id, $id)
    {
        $detail = DetailHasilPertandingan::findOrFail($id);
        $detail->delete();

        return redirect()->route('backend.detail_hasil_pertandingan.index', $pertandingan_id)
            ->with('success', 'Hasil peserta berhasil dihapus.');
    }
}
