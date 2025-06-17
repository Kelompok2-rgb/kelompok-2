<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Atlet;
use App\Models\HasilPertandingan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggotaExport;

class OutputController extends Controller
{
    // Halaman cetak grid anggota
    public function output_anggota()
    {
        $anggotas = Anggota::all(); // 'klub' langsung dari kolom
        return view('backend.output.anggota.index', compact('anggotas'));
    }

    // Halaman data atlet
    public function output_atlet()
    {
        $atlets = Atlet::all();
        return view('backend.output.atlet.index', compact('atlets'));
    }

    // Halaman hasil pertandingan
    public function output_hasilpertandingan()
    {
        $hasil_pertandingans = HasilPertandingan::with('atlet', 'pertandingan')->get();
        return view('backend.output.hasilpertandingan.index', compact('hasil_pertandingans'));
    }

    // Cetak kartu anggota per orang
    public function cetak_kartu($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('backend.output.anggota.cetak', compact('anggota'));
    }

    // Export ke Excel tanpa kolom foto
    public function exportExcel()
    {
        return Excel::download(new AnggotaExport, 'data_anggota.xlsx');
    }

    // Export ke PDF tanpa kolom foto
    public function exportPDF()
    {
        $anggotas = Anggota::all();
        $pdf = Pdf::loadView('backend.output.anggota.pdf', compact('anggotas'))->setPaper('A4', 'landscape');
        return $pdf->download('data_anggota.pdf');
    }
}
