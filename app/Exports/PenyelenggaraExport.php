<?php

namespace App\Exports;

use App\Models\PenyelenggaraEvent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenyelenggaraExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return PenyelenggaraEvent::select('nama_penyelenggara_event', 'kontak')->get();
    }

    public function headings(): array
    {
        return ['Nama Penyelenggara', 'Kontak'];
    }

    public function styles(Worksheet $sheet)
    {
        // Gaya tebal untuk header
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
