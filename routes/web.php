<?php

use Illuminate\Support\Facades\Route;

Route::get('/anggota', function () {
    return view('anggota.index');
});
