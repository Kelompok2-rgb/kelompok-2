<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pertandingan',
        'penyelenggara_event_id',
        'juri_id', // tambahkan ini
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

    public function penyelenggaraEvent()
    {
        return $this->belongsTo(PenyelenggaraEvent::class);
    }

    public function juri()
    {
        return $this->belongsTo(Juri::class);
    }
}
