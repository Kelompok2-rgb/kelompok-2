<?php

namespace App\Exports;

use App\Models\Pertandingan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class HasilPertandinganExport implements
    FromCollection,
    WithStyles,
    WithColumnWidths,
    ShouldAutoSize,
    WithEvents
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

    public function collection()
    {
        // Kosong karena kita isi manual via AfterSheet
        return collect([]);
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,   // No
            'B' => 25,  // Nama Peserta
            'C' => 15,  // Lemparan 1
            'D' => 15,  // Lemparan 2
            'E' => 15,  // Lemparan 3
            'F' => 15,  // Lemparan 4
            'G' => 15,  // Lemparan 5
            'H' => 15,  // Skor
            'I' => 15,  // Rangking
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // ============================
                // Judul Utama
                // ============================
                $sheet->mergeCells('A1:I1');
                $sheet->setCellValue('A1', 'HASIL PERTANDINGAN');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => 'center'],
                ]);

                $sheet->mergeCells('A2:I2');
                $sheet->setCellValue('A2', strtoupper($this->pertandingan->nama_pertandingan));
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => 'center'],
                ]);

                // ============================
                // Info Pertandingan
                // ============================
                $sheet->fromArray([
                    ['Nama Pertandingan', $this->pertandingan->nama_pertandingan],
                    ['Tanggal', optional($this->pertandingan->jadwalPertandingan)?->tanggal
                        ? Carbon::parse($this->pertandingan->jadwalPertandingan->tanggal)->format('d-m-Y') : '-'],
                    ['Waktu', optional($this->pertandingan->jadwalPertandingan)?->waktu
                        ? Carbon::parse($this->pertandingan->jadwalPertandingan->waktu)->format('H:i') : '-'],
                    ['Lokasi', optional($this->pertandingan->jadwalPertandingan)?->lokasi ?? '-'],
                    ['Penyelenggara', optional($this->pertandingan->penyelenggaraEvent)?->nama_penyelenggara_event ?? '-'],
                    ['Juri', optional($this->pertandingan->juri)?->nama_juri ?? '-'],
                ], null, 'A4', false);

                // ============================
                // Header Data Peserta
                // ============================
                $startRow = 11;

                $sheet->fromArray([
                    ['No', 'Nama Peserta', 'Lemparan 1', 'Lemparan 2', 'Lemparan 3', 'Lemparan 4', 'Lemparan 5', 'Skor', 'Rangking']
                ], null, "A{$startRow}");

                // ============================
                // Data Peserta
                // ============================
                $row = $startRow + 1;
                $no = 1;

                foreach ($this->pertandingan->hasilPertandingan as $hasil) {
                    $sheet->fromArray([
                        [
                            $no++,
                            optional($hasil->atlet)->nama ?? '-',
                            $hasil->lemparan1,
                            $hasil->lemparan2,
                            $hasil->lemparan3,
                            $hasil->lemparan4,
                            $hasil->lemparan5,
                            $hasil->skor,
                            $hasil->rangking
                        ]
                    ], null, "A{$row}");
                    $row++;
                }

                // ============================
                // Styling
                // ============================

                // Bold header
                $sheet->getStyle("A{$startRow}:I{$startRow}")->applyFromArray([
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => 'center'],
                ]);

                // Border seluruh data
                $lastRow = $row - 1;
                $sheet->getStyle("A{$startRow}:I{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                    ],
                ]);
            },
        ];
    }
}
