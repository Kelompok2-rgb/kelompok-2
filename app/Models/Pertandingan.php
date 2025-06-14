<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi',
        'tanggal',
        'nama_pertandingan',
        'nama_penyelenggara'
    ];

    /**
     * Relasi many-to-many dengan model Atlet
     */
    public function atlets()
    {
        return $this->belongsToMany(Atlet::class, 'peserta_pertandingan');
    }

    public function hasilPertandingan()
    {
        return $this->hasOne(HasilPertandingan::class);
    }
}
