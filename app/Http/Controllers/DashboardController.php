<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Tugas;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Total tugas
        $totalTugas = Tugas::where('user_id', $userId)->count();

        // Tugas selesai
        $tugasSelesai = Tugas::where('user_id', $userId)
            ->where('status', 'selesai')
            ->count();

        // Deadline terdekat
        $deadlineTerdekat = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->whereDate('deadline', '>=', today())
            ->orderBy('deadline', 'asc')
            ->first();

        // Aktivitas hari ini
        $aktivitasHariIni = Jadwal::where('user_id', $userId)
            ->whereDate('tanggal', today())
            ->count();

        // Prioritas tugas
        $prioritas = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->orderBy('deadline', 'asc')
            ->take(5)
            ->get();

        // Deadline mendatang
        $deadlineMendatang = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->whereDate('deadline', '>=', today())
            ->orderBy('deadline', 'asc')
            ->take(3)
            ->get();

        // Persentase produktivitas
        $persentaseProduktivitas = $totalTugas > 0
            ? round(($tugasSelesai / $totalTugas) * 100)
            : 0;

        // Tanggal tugas untuk kalender
        $tanggalTugas = Tugas::where('user_id', $userId)
            ->pluck('deadline')
            ->map(function ($deadline) {
                return Carbon::parse($deadline)->day;
            })
            ->toArray();

        return view('dashboard', compact(
            'totalTugas',
            'tugasSelesai',
            'deadlineTerdekat',
            'aktivitasHariIni',
            'prioritas',
            'deadlineMendatang',
            'persentaseProduktivitas',
            'tanggalTugas'
        ));
    }
}
