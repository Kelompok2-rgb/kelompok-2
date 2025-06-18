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
    DetailHasilPertandinganController,
    OutputController
};

// ==============================
// FRONTEND
// ==============================

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

// Halaman Lain
Route::name('frontend.')->group(function () {
    Route::get('/jadwalpertandingan', [FrontendController::class, 'jadwalpertandingan'])->name('indexjadwalpertandingan');
    Route::get('/kategoripertandingan', [FrontendController::class, 'kategoripertandingan'])->name('indexkategoripertandingan');
    Route::get('/galeri', [FrontendController::class, 'galeri'])->name('indexgaleri');
    Route::get('/pengumuman', [FrontendController::class, 'pengumuman'])->name('indexpengumuman');
});


// ==============================
// BACKEND
// ==============================

Route::middleware(['auth'])->prefix('backend')->name('backend.')->group(function () {
    // Dashboard
    Route::view('/dashboard', 'backend.dashboard.dashboard')->name('dashboard');

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
    Route::prefix('pertandingan/{id}/peserta')->name('peserta.')->group(function () {
        Route::get('/', [PesertaPertandinganController::class, 'index'])->name('index');
        Route::post('/', [PesertaPertandinganController::class, 'store'])->name('store');
        Route::delete('/{atlet_id}', [PesertaPertandinganController::class, 'destroy'])->name('destroy');
    });

    // Rekap Latihan
    Route::prefix('rekap-latihan')->name('rekap_latihan.')->group(function () {
        Route::get('/{anggota}', [RekapLatihanController::class, 'index'])->name('index');
        Route::post('/{anggota}', [RekapLatihanController::class, 'store'])->name('store');
        Route::delete('/{id}', [RekapLatihanController::class, 'destroy'])->name('destroy');
    });

    // Detail Hasil Pertandingan
    Route::prefix('hasil-pertandingan/{hasil_pertandingan_id}/detail')->name('detail_hasil_pertandingan.')->group(function () {
        Route::get('/', [DetailHasilPertandinganController::class, 'index'])->name('index');
        Route::get('/create', [DetailHasilPertandinganController::class, 'create'])->name('create');
        Route::post('/', [DetailHasilPertandinganController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DetailHasilPertandinganController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DetailHasilPertandinganController::class, 'update'])->name('update');
        Route::delete('/{id}', [DetailHasilPertandinganController::class, 'destroy'])->name('destroy');
    });

    // ==============================
    // OUTPUT (CETAK / EXPORT)
    // ==============================

    Route::prefix('output')->name('output.')->group(function () {

        // Output Anggota
        Route::get('/anggota', [OutputController::class, 'output_anggota'])->name('anggota');
        Route::get('/anggota/cetak/{id}', [OutputController::class, 'cetak_kartu'])->name('anggota.cetak');
        Route::get('/anggota/export/excel', [OutputController::class, 'exportExcel'])->name('anggota.excel');
        Route::get('/anggota/export/pdf', [OutputController::class, 'exportPDF'])->name('anggota.pdf');

        // Output Atlet
        Route::get('/atlet', [OutputController::class, 'output_atlet'])->name('atlet');
        Route::get('/atlet/{id}/cetak-nomor', [OutputController::class, 'cetak_nomor_peserta'])->name('nomorpeserta');

        // Output Hasil Pertandingan
        Route::get('/hasil-pertandingan', [OutputController::class, 'output_hasilpertandingan'])->name('hasilpertandingan');
        Route::get('/hasil-pertandingan/{id}/cetak-pdf', [OutputController::class, 'cetakHasilPDF'])->name('hasilpertandingan.pdf');
        Route::get('/hasil-pertandingan/{id}/export-excel', [OutputController::class, 'exportHasilExcel'])->name('hasilpertandingan.excel');
    });
});
