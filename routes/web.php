<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;

Route::resource('pengumuman', PengumumanController::class);
