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
    FrontendController
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
});

Route::get('/register', [AuthController::class, 'register'])->name('authentikasi.register');


   Route::name('frontend.')->group(function () {
    Route::get('/anggota', [FrontendController::class, 'anggota'])->name('indexanggota');
    Route::get('/club', [FrontendController::class, 'club'])->name('indexclub');
    Route::get('/atlet', [FrontendController::class, 'atlet'])->name('indexatlet');
    Route::get('/jadwalpertandingan', [FrontendController::class, 'jadwalpertandingan'])->name('indexjadwalpertandingan');
    Route::get('/hasilpertandingan', [FrontendController::class, 'hasilpertandingan'])->name('indexhasilpertandingan');
    Route::get('/juri', [FrontendController::class, 'juri'])->name('indexjuri');
    Route::get('/pertandingan', [FrontendController::class, 'pertandingan'])->name('indexpertandingan');
    Route::get('/kategoripertandingan', [FrontendController::class, 'kategoripertandingan'])->name('indexkategoripertandingan');
    Route::get('/galeri', [FrontendController::class, 'galeri'])->name('indexgaleri');
    Route::get('/pengumuman', [FrontendController::class, 'pengumuman'])->name('indexpengumuman');
    
});

    



 
