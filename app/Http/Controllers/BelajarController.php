<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi; 

class BelajarController extends Controller
{
    public function index()
    {
        
        $rekomendasi = Rekomendasi::all();
        return view('belajar.index', compact('rekomendasi'));
    }
}