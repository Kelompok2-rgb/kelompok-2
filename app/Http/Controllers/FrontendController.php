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
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    
    public function anggota()
    {
       $anggotas =  Anggota::paginate(4); 
        return view('frontend.indexanggota', compact('anggotas'));
    } 
    public function club()
    {
       $clubs = Club::all();
        return view('frontend.indexclub', compact('clubs'));
    } 
    public function atlet()
    {
       $atlets = Atlet::all();
        return view('frontend.indexatlet', compact('atlets'));
    } 
     public function jadwalpertandingan()
    {
       $jadwalpertandingans = Jadwal_Pertandingan::all();
        return view('frontend.indexjadwalpertandingan', compact('jadwalpertandingans'));
    } 
     public function hasilpertandingan()
    {
       $hasilpertandingans = HasilPertandingan::all();
        return view('frontend.indexhasilpertandingan', compact('hasilpertandingans'));
    } 
     public function juri()
    {
       $juris = Juri::all();
        return view('frontend.indexjuri', compact('juris'));
    } 
     public function pertandingan()
    {
       $pertandingans = Pertandingan::all();
        return view('frontend.indexpertandingan', compact('pertandingans'));
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


    
}


