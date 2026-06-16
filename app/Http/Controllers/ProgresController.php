<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProgresController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Mengambil total tugas & tugas selesai dari database
        $totalTugas = DB::table('tugas')->where('user_id', $userId)->count();
        $tugasSelesai = DB::table('tugas')->where('user_id', $userId)->where('status', 'selesai')->count();

        // Hitung persentase progres
        $persentase = $totalTugas > 0 ? round(($tugasSelesai / $totalTugas) * 100) : 0;

        return view('progres.index', compact('persentase', 'totalTugas', 'tugasSelesai'));
    }
}