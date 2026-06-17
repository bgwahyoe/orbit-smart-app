<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Carbon\Carbon;

class RekomendasiBelajarController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with('mataKuliah')
            ->where('user_id', auth()->id())
            ->where('status', '!=', 'selesai')
            ->orderBy('deadline')
            ->get();

        $rekomendasi = $tugas->map(function ($item) {

            $hariTersisa = max(
                0,
                now()->startOfDay()->diffInDays(
                    Carbon::parse($item->deadline),
                    false
                )
            );

            $durasi = match (true) {
                $hariTersisa <= 1 => 120,
                $hariTersisa <= 3 => 90,
                default => 45
            };

            $skor = max(
                10,
                min(100, round(100 - ($hariTersisa * 10)))
            );

            return [
                'judul' => $item->judul,
                'mata_kuliah' => $item->mataKuliah->nama ?? '-',
                'deadline' => Carbon::parse($item->deadline)
                    ->translatedFormat('d M Y'),
                'hari_tersisa' => $hariTersisa,
                'durasi' => $durasi,
                'metode' => $hariTersisa <= 3 ? 'Deep Work' : 'Pomodoro',
                'skor' => $skor,
            ];
        });

        // Statistik dihitung setelah $rekomendasi terbentuk
        $pilihanPintar = $rekomendasi->sortByDesc('skor')->first();

        $rataSkor = $rekomendasi->count()
            ? round($rekomendasi->avg('skor'))
            : 0;

        $jamFokus = round($rataSkor / 15, 1);

        $ritmeBelajar = [
            [
                'waktu' => '09:00 - 10:00',
                'judul' => $pilihanPintar['judul'] ?? 'Belajar Mandiri',
                'status' => 'KRITIS',
                'warna' => 'pink',
            ],
            [
                'waktu' => '14:00 - 15:30',
                'judul' => 'Review Materi',
                'status' => 'SEDANG',
                'warna' => 'purple',
            ],
            [
                'waktu' => '19:00 - 20:00',
                'judul' => 'Ringkasan Harian',
                'status' => 'RINGAN',
                'warna' => 'gray',
            ],
        ];

        return view(
            'rekomendasibelajar.index',
            compact(
                'rekomendasi',
                'pilihanPintar',
                'rataSkor',
                'jamFokus',
                'ritmeBelajar'
            )
        );
    }
}