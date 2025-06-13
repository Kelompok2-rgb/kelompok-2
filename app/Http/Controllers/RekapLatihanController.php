<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\RekapLatihan;
use Illuminate\Http\Request;

class RekapLatihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,klub,anggota');
    }

    // Menampilkan halaman input & daftar rekap dalam satu halaman
    public function index($anggota_id)
    {
        $anggota = Anggota::findOrFail($anggota_id);
        $rekap = RekapLatihan::where('anggota_id', $anggota_id)
                             ->orderBy('tanggal', 'desc')
                             ->get();

        return view('backend.anggota.rekap_latihan.index', compact('anggota', 'rekap'));
    }

    // Menyimpan data rekap baru
    public function store(Request $request, $anggota_id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jarak' => 'required|string|max:255',
            'lemparan1' => 'required|numeric',
            'lemparan2' => 'nullable|numeric',
            'lemparan3' => 'nullable|numeric',
            'lemparan4' => 'nullable|numeric',
            'lemparan5' => 'nullable|numeric',
        ]);

        RekapLatihan::create([
            'anggota_id' => $anggota_id,
            'tanggal' => $request->tanggal,
            'jarak' => $request->jarak,
            'lemparan1' => $request->lemparan1,
            'lemparan2' => $request->lemparan2,
            'lemparan3' => $request->lemparan3,
            'lemparan4' => $request->lemparan4,
            'lemparan5' => $request->lemparan5,
        ]);

        return redirect()
            ->route('backend.rekap_latihan.index', $anggota_id)
            ->with('success', 'Data rekap latihan berhasil ditambahkan.');
    }
}
