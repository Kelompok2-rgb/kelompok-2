<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPertandingan extends Model
{
    use HasFactory;

    protected $fillable = ['pertandingan_id'];

    public function pertandingan()
    {
        return $this->belongsTo(Pertandingan::class);
    }

    public function detailHasil()
    {
        return $this->hasMany(DetailHasilPertandingan::class);
    }
}

