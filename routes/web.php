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
    PertandinganController,
    PenyelenggaraEventController,
    FrontendController,
    KonfirmasiController,
    UserController,
    PesertaPertandinganController,
    RekapLatihanController,
    DetailHasilPertandinganController
};

// Halaman Utama
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

// Login & Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('authentikasi.register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('authentikasi.register.post');

// Password Reset
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'handleForgot'])->name('password.handle');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'handleReset'])->name('password.update');

// Halaman Frontend Lainnya
Route::name('frontend.')->group(function () {
    Route::get('/jadwalpertandingan', [FrontendController::class, 'jadwalpertandingan'])->name('indexjadwalpertandingan');
    Route::get('/kategoripertandingan', [FrontendController::class, 'kategoripertandingan'])->name('indexkategoripertandingan');
    Route::get('/galeri', [FrontendController::class, 'galeri'])->name('indexgaleri');
    Route::get('/pengumuman', [FrontendController::class, 'pengumuman'])->name('indexpengumuman');
});

// Backend Routes
Route::middleware(['auth'])->prefix('backend')->name('backend.')->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('backend.dashboard.dashboard'))->name('dashboard');

    // Konfirmasi User
    Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi.index');
    Route::post('/konfirmasi/{id}/approve', [KonfirmasiController::class, 'approve'])->name('konfirmasi.approve');

    // Resource Controllers
    Route::resources([
        'atlet' => AtletController::class,
        'juri' => JuriController::class,
        'galeri' => GaleriController::class,
        'club' => ClubController::class,
        'pengumuman' => PengumumanController::class,
        'anggota' => AnggotaController::class,
        'pertandingan' => PertandinganController::class,
        'penyelenggara_event' => PenyelenggaraEventController::class,
        'users' => UserController::class,
        'kategori_pertandingan' => KategoriPertandinganController::class,
        'jadwal_pertandingan' => JadwalPertandinganController::class,
    ]);

    // Hasil Pertandingan
    Route::get('hasil_pertandingan/create', [HasilPertandinganController::class, 'create'])->name('hasil_pertandingan.create');
    Route::resource('hasil_pertandingan', HasilPertandinganController::class)->except(['create']);

    // Peserta Pertandingan
    Route::prefix('pertandingan/{id}/peserta')->group(function () {
        Route::get('/', [PesertaPertandinganController::class, 'index'])->name('peserta.index');
        Route::post('/', [PesertaPertandinganController::class, 'store'])->name('peserta.store');
        Route::delete('/{atlet_id}', [PesertaPertandinganController::class, 'destroy'])->name('peserta.destroy');
    });

    // Rekap Latihan
    Route::get('rekap-latihan/{anggota}', [RekapLatihanController::class, 'index'])->name('rekap_latihan.index');
    Route::post('rekap-latihan/{anggota}', [RekapLatihanController::class, 'store'])->name('rekap_latihan.store');
    Route::delete('rekap-latihan/{id}', [RekapLatihanController::class, 'destroy'])->name('rekap_latihan.destroy');


    // Detail Hasil Pertandingan
    Route::prefix('hasil-pertandingan/{hasil_pertandingan_id}/detail')->name('detail_hasil_pertandingan.')->group(function () {
        Route::get('/', [DetailHasilPertandinganController::class, 'index'])->name('index');
        Route::get('/create', [DetailHasilPertandinganController::class, 'create'])->name('create');
        Route::post('/', [DetailHasilPertandinganController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DetailHasilPertandinganController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DetailHasilPertandinganController::class, 'update'])->name('update');
        Route::delete('/{id}', [DetailHasilPertandinganController::class, 'destroy'])->name('destroy');
    });
});
