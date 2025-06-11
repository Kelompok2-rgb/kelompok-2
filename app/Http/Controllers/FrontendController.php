<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Atlet;
use App\Models\Club;
use App\Models\Jadwal_Pertandingan;
use App\Models\HasilPertandingan;
use App\Models\Juri;
use App\Models\Pertandingan;
use App\Models\Kategori_pertandingan;
use App\Models\Galeri;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        // Share data ke semua view yang dipanggil oleh controller ini
        View::share([
            'jumlahAnggota' => Anggota::count(),
            'jumlahKlub' => Club::count(),
            'jumlahAtlet' => Atlet::count(),
            'jumlahJuri' => Juri::count(),
        ]);
    }

   
    public function jadwalpertandingan()
    {
        $jadwalpertandingans = Jadwal_Pertandingan::all();
        return view('frontend.indexjadwalpertandingan', compact('jadwalpertandingans'));
    }

    public function juri()
    {
        $juris = Juri::all();
        return view('frontend.indexjuri', compact('juris'));
    }

    public function kategoripertandingan()
    {
        $kategoripertandingans = Kategori_pertandingan::all();
        return view('frontend.indexkategoripertandingan', compact('kategoripertandingans'));
    }

    public function galeri()
    {
        $galeris = Galeri::all();
        return view('frontend.indexgaleri', compact('galeris'));
    }

    public function pengumuman()
    {
        $pengumumans = Pengumuman::all();
        return view('frontend.indexpengumuman', compact('pengumumans'));
    }

    public function index()
    {
        // Tidak perlu kirim variabel karena sudah dibagikan via constructor
        return view('frontend.index');
    }
}

