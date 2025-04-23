<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Pertandingan extends Model
{
    use HasFactory;
    protected $fillable = [
            'tanggal',
            'waktu',
            'lokasi',
    ];
}
