<?php

namespace App\Exports;

use App\Models\Pertandingan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HasilPertandinganExport implements FromArray, WithHeadings
{
    protected $pertandingan;

    public function __construct($pertandingan_id)
    {
        $this->pertandingan = Pertandingan::with([
            'penyelenggaraEvent',
            'juri',
            'jadwalPertandingan',
            'hasilPertandingan.atlet'
        ])->findOrFail($pertandingan_id);
    }

    /**
     * Format isi data Excel.
     */
    public function array(): array
    {
        $data = [];

        // Informasi umum pertandingan
        $data[] = ['Informasi Pertandingan'];
        $data[] = ['Nama Pertandingan', $this->pertandingan->nama_pertandingan];
        $data[] = ['Tanggal', optional($this->pertandingan->jadwalPertandingan)->tanggal];
        $data[] = ['Waktu', optional($this->pertandingan->jadwalPertandingan)->waktu ];
        $data[] = ['Lokasi', optional($this->pertandingan->jadwalPertandingan)->lokasi];
        $data[] = ['Penyelenggara', optional($this->pertandingan->penyelenggaraEvent)->nama_penyelenggara_event];
        $data[] = ['Juri', optional($this->pertandingan->juri)->nama_juri];
        $data[] = []; // Baris kosong

        // Header Hasil Peserta
        $data[] = [
            'Nama Peserta', 'Lemparan 1', 'Lemparan 2', 'Lemparan 3',
            'Lemparan 4', 'Lemparan 5', 'Skor', 'Rangking'
        ];

        // Data hasil pertandingan
        foreach ($this->pertandingan->hasilPertandingan as $hasil) {
            $data[] = [
                optional($hasil->atlet)->nama,
                $hasil->lemparan1,
                $hasil->lemparan2,
                $hasil->lemparan3,
                $hasil->lemparan4,
                $hasil->lemparan5,
                $hasil->skor,
                $hasil->rangking,
            ];
        }

        return $data;
    }

    /**
     * Karena sudah ada heading manual di atas,
     * kita bisa mengosongkan bagian heading bawaan.
     */
    public function headings(): array
    {
        return [];
    }
}
