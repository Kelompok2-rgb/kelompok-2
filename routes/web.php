<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriPertandinganController;
use App\Http\Controllers\JadwalPertandinganController;

Route::resource('jadwal_pertandingan', JadwalPertandinganController::class);


Route::get('/anggota', function () {
    return view('anggota.index');
});

Route::resource('kategoripertandingan', KategoriPertandinganController::class);
Route::put('/kategoripertandingans/{id}', [KategoriPertandinganController::class, 'update'])->name('kategoripertandingans.update');
Route::resource('kategori_pertandingan', KategoriPertandinganController::class);


Route::resource('jadwal_pertandingan', JadwalPertandinganController::class);



