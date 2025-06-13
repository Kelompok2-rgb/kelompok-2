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
    PesertaPertandinganController
};

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

// Route untuk halaman login (halaman awal)
Route::get('/login', [AuthController::class, 'login'])->name('login');

// Proses login & logout
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua route di bawah ini hanya dapat diakses jika sudah login (auth middleware)
Route::middleware(['auth'])->prefix('backend')->name('backend.')->group(function () {

    // Dashboard setelah login
    Route::get('/dashboard', function () {
        return view('backend.dashboard.dashboard'); // Satukan ke halaman admin-dashboard yang kamu punya
    })->name('dashboard');

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
    Route::resource('penyelenggara_event', PenyelenggaraEventController::class);
    Route::resource('users', UserController::class);
    // Route peserta pertandingan (tambahkan di sini)
    Route::get('pertandingan/{id}/peserta', [PesertaPertandinganController::class, 'index'])->name('peserta.index');
    Route::post('pertandingan/{id}/peserta', [PesertaPertandinganController::class, 'store'])->name('peserta.store');
    Route::delete('pertandingan/{pertandingan_id}/peserta/{atlet_id}', [PesertaPertandinganController::class, 'destroy'])->name('peserta.destroy');
});

Route::get('/register', [AuthController::class, 'register'])->name('authentikasi.register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('authentikasi.register.post');
Route::middleware(['auth'])->prefix('backend')->name('backend.')->group(function () {
    Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi.index');
    Route::post('/konfirmasi/{id}/approve', [KonfirmasiController::class, 'approve'])->name('konfirmasi.approve');
});


Route::name('frontend.')->group(function () {

    Route::get('/jadwalpertandingan', [FrontendController::class, 'jadwalpertandingan'])->name('indexjadwalpertandingan');
    Route::get('/kategoripertandingan', [FrontendController::class, 'kategoripertandingan'])->name('indexkategoripertandingan');
    Route::get('/galeri', [FrontendController::class, 'galeri'])->name('indexgaleri');
    Route::get('/pengumuman', [FrontendController::class, 'pengumuman'])->name('indexpengumuman');
});

// Form lupa password
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');

// Proses form lupa password
Route::post('/forgot-password', [AuthController::class, 'handleForgot'])->name('password.handle');

// Form reset password
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');

// Proses reset password
Route::post('/reset-password', [AuthController::class, 'handleReset'])->name('password.update');
