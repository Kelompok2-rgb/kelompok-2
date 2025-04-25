<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\AtletController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\HasilPertandinganController;
use App\Http\Controllers\JadwalPertandinganController;
use App\Http\Controllers\KategoriPertandinganController;
use App\Http\Controllers\PertandinganController;

Route::get('/anggota', function () {
    return view('anggota.index');
});

Route::get('/', function () {
    return view('anggota.index');
});

// Route untuk atlet
Route::resource('atlet', AtletController::class);
Route::put('/atlet/{id}', [AtletController::class, 'update'])->name('atlet.update');

// Route untuk juri
Route::resource('juri', JuriController::class);
Route::put('/juri/{id}', [JuriController::class, 'update'])->name('juri.update');

// Route untuk hasil pertandingan
Route::resource('hasil_pertandingan', HasilPertandinganController::class);
Route::put('/hasil_pertandingan/{id}', [HasilPertandinganController::class, 'update'])->name('hasil_pertandingan.update');

// Route untuk kategori pertandingan
Route::resource('kategori_pertandingan', KategoriPertandinganController::class);
Route::put('/kategoripertandingans/{id}', [KategoriPertandinganController::class, 'update'])->name('kategoripertandingans.update');

// Route untuk jadwal pertandingan
Route::resource('jadwal_pertandingan', JadwalPertandinganController::class);

// Route untuk galeri
Route::resource('galeri', GaleriController::class);

// Route untuk club
Route::resource('club', ClubController::class);
Route::put('/clubs/{id}', [ClubController::class, 'update'])->name('Clubs.update');

// Route untuk pengumuman
Route::resource('pengumuman', PengumumanController::class);

// Route untuk anggota
Route::resource('anggota', AnggotaController::class);
Route::put('/anggotas/{id}', [AnggotaController::class, 'update'])->name('Clubs.update');

// Route untuk pertandingan
Route::resource('pertandingan', PertandinganController::class);
Route::put('/pertandingans/{id}', [PertandinganController::class, 'update'])->name('Pertandingans.update');