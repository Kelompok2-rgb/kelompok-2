<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriController;

Route::resource('galeri', GaleriController::class);

Route::get('/anggota', function () {
    return view('anggota.index');
});
