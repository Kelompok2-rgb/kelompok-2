<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ClubController,
    JuriController,
    AtletController,
    GaleriController,
    AnggotaController,
    PengumumanController,
    HasilPertandinganController,
    JadwalPertandinganController,
    KategoriPertandinganController,
    PertandinganController
};

Route::get('/', function () {
    return view('backend.index');
});

Route::prefix('backend')->name('backend.')->group(function () {
    Route::resource('atlet', AtletController::class);
    Route::resource('juri', JuriController::class);
    Route::resource('hasil_pertandingan', HasilPertandinganController::class);
    Route::resource('kategori_pertandingan', KategoriPertandinganController::class);
    Route::resource('jadwal_pertandingan', JadwalPertandinganController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('club', ClubController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pertandingan', PertandinganController::class);
});
