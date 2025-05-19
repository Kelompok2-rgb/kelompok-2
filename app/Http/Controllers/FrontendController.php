<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function atlet()
    {
       $atlets = Atlet::all();
        return view('frontend.indexatlet', compact('atlets'));
    } 
    
}


