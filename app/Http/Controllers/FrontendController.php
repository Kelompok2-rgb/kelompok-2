<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Atlet;
use App\Models\Club;
use App\Models\Galeri;
use App\Models\Jadwal_Pertandingan;
use App\Models\Juri;
use App\Models\Kategori_pertandingan;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    /**
     * Konstruktor: Bagikan data statistik global ke semua view frontend.
     */
    public function __construct()
    {
        View::share([
            'jumlahAnggota' => Anggota::count(),
            'jumlahKlub'    => Club::count(),
            'jumlahAtlet'   => Atlet::count(),
            'jumlahJuri'    => Juri::count(),
        ]);
    }

    /**
     * Tampilkan halaman utama frontend beserta data langsung tanpa AJAX.
     */
    public function index()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::with('pertandingan')->get();
        $kategoripertandingans = Kategori_pertandingan::all();
        $galeris = Galeri::latest()->get();
        $pengumumans = Pengumuman::latest()->get();

        return view('frontend.index', compact(
            'jadwalpertandingans',
            'kategoripertandingans',
            'galeris',
            'pengumumans'
        ));
    }

    // ============================
    // OPSIONAL: AJAX Tab Content
    // ============================

    public function ajaxJadwal()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::with('pertandingan')->get();
        return view('frontend.ajax.jadwal', compact('jadwalpertandingans'));
    }

    public function ajaxKategori()
    {
        $kategoripertandingans = Kategori_pertandingan::all();
        return view('frontend.ajax.kategori', compact('kategoripertandingans'));
    }

    public function ajaxGaleri()
    {
        $galeris = Galeri::latest()->get();
        return view('frontend.ajax.galeri', compact('galeris'));
    }

    public function ajaxPengumuman()
    {
        $pengumumans = Pengumuman::latest()->get();
        return view('frontend.ajax.pengumuman', compact('pengumumans'));
    }
}
