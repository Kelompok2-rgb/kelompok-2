<?php

use App\Models\Club;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JadwalPertandinganController;
use App\Http\Controllers\KategoriPertandinganController;
use App\Http\Controllers\PengumumanController;


Route::get('/anggota', function () {
    return view('anggota.index');
});

Route::resource('kategoripertandingan', KategoriPertandinganController::class);
Route::put('/kategoripertandingans/{id}', [KategoriPertandinganController::class, 'update'])->name('kategoripertandingans.update');
Route::resource('kategori_pertandingan', KategoriPertandinganController::class);
Route::resource('jadwal_pertandingan', JadwalPertandinganController::class);
Route::resource('club', ClubController::class);
Route::put('/clubs/{id}', [ClubController::class, 'update'])->name('Clubs.update');
Route::resource('pengumuman', PengumumanController::class);

