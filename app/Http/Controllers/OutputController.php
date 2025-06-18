<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Atlet;
use App\Models\Jadwal_Pertandingan;
use App\Models\HasilPertandingan;
use App\Models\Pertandingan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggotaExport;
use App\Exports\HasilPertandinganExport;
use Illuminate\Support\Str;

class OutputController extends Controller
{
    // =============== OUTPUT ANGGOTA =============== //

    public function output_anggota()
    {
        $anggotas = Anggota::all();
        return view('backend.output.anggota.index', compact('anggotas'));
    }

    public function cetak_kartu($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('backend.output.anggota.cetak', compact('anggota'));
    }

    public function exportExcel()
    {
        return Excel::download(new AnggotaExport, 'data_anggota.xlsx');
    }

    public function exportPDF()
    {
        $anggotas = Anggota::all();
        $pdf = Pdf::loadView('backend.output.anggota.pdf', compact('anggotas'))
                  ->setPaper('A4', 'landscape');

        return $pdf->download('data_anggota.pdf');
    }

    // =============== OUTPUT ATLET =============== //

    public function output_atlet()
    {
        $atlets = Atlet::with('club')->get();
        return view('backend.output.atlet.index', compact('atlets'));
    }

    public function cetak_nomor_peserta($id)
    {
        $atlet = Atlet::with('club')->findOrFail($id);
        $nomorPeserta = 'PES-' . str_pad(mt_rand(1, 999), 3, '0', STR_PAD_LEFT);

        return view('backend.output.atlet.nomor_peserta', compact('atlet', 'nomorPeserta'));
    }

    // =============== OUTPUT HASIL PERTANDINGAN =============== //

    public function output_hasilpertandingan()
    {
        $pertandingans = Pertandingan::with([
            'penyelenggaraEvent',
            'juri',
            'jadwalPertandingan'
        ])->get();

        return view('backend.output.hasilpertandingan.index', compact('pertandingans'));
    }

    public function cetakHasilPDF($id)
    {
        $pertandingan = Pertandingan::with([
            'penyelenggaraEvent',
            'juri',
            'jadwalPertandingan',
            'hasilPertandingan.atlet'
        ])->findOrFail($id);

        $pdf = Pdf::loadView('backend.output.hasilpertandingan.pdf', compact('pertandingan'))
                  ->setPaper('A4', 'landscape');

        return $pdf->download('hasil_pertandingan_' . Str::slug($pertandingan->nama_pertandingan) . '.pdf');
    }

    public function exportHasilExcel($id)
    {
        $pertandingan = Pertandingan::findOrFail($id);
        return Excel::download(
            new HasilPertandinganExport($id),
            'hasil_pertandingan_' . Str::slug($pertandingan->nama_pertandingan) . '.xlsx'
        );
    }
}
