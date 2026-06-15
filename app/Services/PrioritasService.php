<?php

namespace App\Services;

use Carbon\Carbon;

class PrioritasService
{
    public function hitung($tugas)
    {
        return $tugas->map(function ($item) {

            $hariTersisa = max(
                0,
                Carbon::today()->diffInDays($item->deadline, false)
            );

            $deadlineScore = max(0, 50 - ($hariTersisa * 5));

            $kesulitanScore = match ($item->kesulitan) {
                'tinggi' => 30,
                'sedang' => 20,
                default => 10,
            };

            $statusScore = match ($item->status) {
                'belum' => 20,
                'proses' => 10,
                default => 0,
            };

            $item->skor_prioritas =
                min(
                    100,
                    $deadlineScore +
                    $kesulitanScore +
                    $statusScore
                );

            return $item;
        })->sortByDesc('skor_prioritas');
    }
}