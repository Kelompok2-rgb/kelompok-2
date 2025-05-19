<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AtletfrontController extends Controller
{
    public function index()
    {
       $atlets = Atlet::where('status', 'active')->get();
        return view('frontend.indexatlet', compact('atlets'));
    } 
}


