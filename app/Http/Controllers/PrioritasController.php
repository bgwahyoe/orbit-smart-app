<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Carbon\Carbon;

class PrioritasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::where(
            'user_id',
            auth()->id()
        )
        ->where('status', '!=', 'selesai')
        ->get();

        $prioritas = $tugas->map(function ($item) {

            $hari =
                Carbon::now()
                ->diffInDays(
                    Carbon::parse($item->deadline),
                    false
                );

            $skor = max(0, 100 - $hari);

            $item->skor = $skor;

            return $item;
        })
        ->sortByDesc('skor');

        return view(
            'prioritas.index',
            compact('prioritas')
        );
    }
}