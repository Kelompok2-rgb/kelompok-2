<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPertandingan extends Model
{
    use HasFactory;

    protected $table = 'hasil__pertandingans'; 

    protected $fillable = [
        'skor',
        'rangking',
        'catatan_juri',
    ];
}

