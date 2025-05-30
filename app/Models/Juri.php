<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tgl_lahir', 
        'sertifikat',
    ];
}