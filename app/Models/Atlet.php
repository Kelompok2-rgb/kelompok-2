<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'foto',
        'prestasi',
        'rekap_latihan',
    ];
}

