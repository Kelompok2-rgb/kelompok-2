<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    // Tambahkan 'foto' ke fillable
    protected $fillable = ['judul', 'isi', 'tanggal', 'foto'];
}
