<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
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
    return view('frontend.index');
});

// Route untuk halaman login (halaman awal)
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Proses login & logout
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua route di bawah ini hanya dapat diakses jika sudah login (auth middleware)
Route::middleware(['auth'])->prefix('backend')->name('backend.')->group(function () {
    
    // Dashboard setelah login
    Route::get('/dashboard', function () {
        return view('backend.index'); // Pastikan ada file resources/views/backend/index.blade.php
    })->name('dashboard'); // Nama route untuk dashboard

    // Resource routes untuk controller di backend
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


    Route::name('frontend.')->group(function () {
    Route::get('/atlet', [AtletfrontController::class, 'index'])->name('indexatlet');
});


Route::get('/register', [AuthController::class, 'register'])->name('authentikasi.register');
 
