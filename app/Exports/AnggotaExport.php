<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnggotaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Sesuaikan dengan kolom yang ingin diekspor
        return Anggota::select('nama', 'jenis_kelamin', 'alamat', 'kontak', 'klub')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'Jenis Kelamin', 'Alamat', 'Kontak', 'Klub'];
    }
}
