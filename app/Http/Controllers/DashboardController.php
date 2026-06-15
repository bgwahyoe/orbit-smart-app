<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalTugas = Tugas::where('user_id', $user->id)->count();

        $tugasSelesai = Tugas::where('user_id', $user->id)
            ->where('status', 'selesai')
            ->count();

        $deadlineTerdekat = Tugas::where('user_id', $user->id)
            ->where('status', '!=', 'selesai')
            ->count();

        $aktivitasHariIni = Jadwal::where('user_id', $user->id)
            ->whereDate('tanggal', today())
            ->count();

        // TAMBAHKAN INI
        $prioritas = Tugas::where('user_id', $user->id)
            ->where('status', '!=', 'selesai')
            ->orderBy('deadline', 'asc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalTugas',
            'tugasSelesai',
            'deadlineTerdekat',
            'aktivitasHariIni',
            'prioritas'
        ));
    }
}

$totalTugas = Tugas::where(
    'user_id',
    auth()->id()
)->count();

$tugasSelesai = Tugas::where(
    'user_id',
    auth()->id()
)->where(
        'status',
        'selesai'
    )->count();

$deadlineTerdekat = Tugas::where(
    'user_id',
    auth()->id()
)->where(
        'status',
        '!=',
        'selesai'
    )->count();

$prioritas = Tugas::where(
    'user_id',
    auth()->id()
)
    ->orderBy('deadline')
    ->take(5)
    ->get();

return view(
    'dashboard',
    compact(
        'totalTugas',
        'tugasSelesai',
        'deadlineTerdekat',
        'prioritas'
    )
);