<?php

namespace App\Http\Controllers;

use App\Models\Tugas;

class ProgresController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalTugas = Tugas::where('user_id', $userId)->count();

        $tugasSelesai = Tugas::where('user_id', $userId)
            ->where('status', 'selesai')
            ->count();

        $tugasAktif = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->count();

        $progressSemester = $totalTugas > 0
            ? round(($tugasSelesai / $totalTugas) * 100)
            : 0;

        $targetMingguan = min($progressSemester, 100);

        $produktivitas = $totalTugas > 0
            ? round((($tugasSelesai * 100) / $totalTugas))
            : 0;

        return view('progres.index', compact(
            'tugasSelesai',
            'tugasAktif',
            'progressSemester',
            'targetMingguan',
            'produktivitas'
        ));
    }
}