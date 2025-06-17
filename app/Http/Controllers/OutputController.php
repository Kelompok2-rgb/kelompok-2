<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Atlet;
use App\Models\HasilPertandingan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggotaExport;
use Illuminate\Support\Str;

class OutputController extends Controller
{
    /**
     * Tampilkan halaman daftar anggota.
     */
    public function output_anggota()
    {
        $anggotas = Anggota::all();
        return view('backend.output.anggota.index', compact('anggotas'));
    }

    /**
     * Tampilkan halaman daftar atlet.
     */
    public function output_atlet()
    {
        $atlets = Atlet::with('club')->get(); // Eager load relasi klub
        return view('backend.output.atlet.index', compact('atlets'));
    }

    /**
     * Tampilkan halaman hasil pertandingan.
     */
    public function output_hasilpertandingan()
    {
        $hasil_pertandingans = HasilPertandingan::with(['atlet', 'pertandingan'])->get();
        return view('backend.output.hasilpertandingan.index', compact('hasil_pertandingans'));
    }

    /**
     * Tampilkan tampilan cetak kartu anggota.
     *
     * @param int $id
     */
    public function cetak_kartu($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('backend.output.anggota.cetak', compact('anggota'));
    }

    /**
     * Cetak atau tampilkan nomor peserta untuk atlet tertentu.
     * (Fitur tambahan jika kamu ingin mencetak nomor peserta)
     *
     * @param int $id
     */
    public function cetak_nomor_peserta($id)
    {
        $atlet = Atlet::with('club')->findOrFail($id);
        $nomorPeserta = 'PES-' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);
        return view('backend.output.atlet.nomor_peserta', compact('atlet', 'nomorPeserta'));
    }

    /**
     * Export data anggota ke Excel.
     * Kolom foto tidak disertakan dalam ekspor.
     */
    public function exportExcel()
    {
        return Excel::download(new AnggotaExport, 'data_anggota.xlsx');
    }

    /**
     * Export data anggota ke PDF.
     * Tanpa menyertakan kolom foto.
     */
    public function exportPDF()
    {
        $anggotas = Anggota::all();
        $pdf = Pdf::loadView('backend.output.anggota.pdf', compact('anggotas'))
            ->setPaper('A4', 'landscape');

        return $pdf->download('data_anggota.pdf');
    }
}
