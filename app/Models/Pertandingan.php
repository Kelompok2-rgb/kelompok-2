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
}
