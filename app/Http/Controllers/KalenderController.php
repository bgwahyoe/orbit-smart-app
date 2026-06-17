<?php

namespace App\Http\Controllers;

use App\Models\Tugas;

class KalenderController extends Controller
{
    public function index()
    {
        $events = Tugas::where('user_id', auth()->id())
            ->get()
            ->map(function ($tugas) {

                return [
                    'title' => $tugas->judul . ' (' . ucfirst($tugas->status) . ')',
                    'start' => $tugas->deadline,

                    'color' => match ($tugas->status) {
                        'selesai' => '#10B981',
                        'proses' => '#F59E0B',
                        default => '#DB2777',
                    },
                ];
            });

        return view('kalender.index', compact('events'));
    }
}