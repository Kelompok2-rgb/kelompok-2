<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailHasilPertandingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'hasil_pertandingan_id',
        'nama',
        'skor',
        'rangking',
        'catatan_juri',
    ];

    // Relasi ke tabel hasil_pertandingans
    public function hasilPertandingan()
    {
        return $this->belongsTo(HasilPertandingan::class);
    }
}
