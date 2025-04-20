<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtletController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\HasilPertandinganController;



Route::get('/anggota', function () {
    return view('anggota.index');
});




Route::resource('atlet', AtletController::class);
Route::put('/atlet/{id}', [AtletController::class, 'update'])->name('atlet.update');

Route::resource('juri', JuriController::class);
Route::put('/juri/{id}', [JuriController::class, 'update'])->name('juri.update');

Route::resource('hasil_pertandingan', HasilPertandinganController::class);
Route::put('/hasil_pertandingan/{id}', [HasilPertandinganController::class, 'update'])->name('hasil_pertandingan.update');
