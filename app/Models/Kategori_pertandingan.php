<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Pertandingan extends Model
{
    use HasFactory;
    protected $table = 'kategori_pertandingans';
    protected $fillable = [
        'nama',
        'aturan',
        'batasan',
        'user_id'
    ];
}


