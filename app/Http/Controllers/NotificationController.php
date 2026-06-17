<?php


namespace App\Http\Controllers;
use App\Models\Tugas;
use Carbon\Carbon;


class NotificationController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalTugas = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->count();

        $deadlineHariIni = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->whereDate('deadline', Carbon::today())
            ->count();

        $terlambat = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->whereDate('deadline', '<', Carbon::today())
            ->count();

        $deadlineDekat = Tugas::where('user_id', $userId)
            ->where('status', '!=', 'selesai')
            ->whereBetween('deadline', [
                Carbon::today(),
                Carbon::today()->addDays(3)
            ])
            ->count();

        $notifications = collect();

        if ($totalTugas > 0) {
            $notifications->push((object) [
                'judul' => 'Tugas Aktif',
                'pesan' => "Anda memiliki {$totalTugas} tugas yang belum selesai.",
                'created_at' => now(),
            ]);
        }

        if ($deadlineHariIni > 0) {
            $notifications->push((object) [
                'judul' => 'Deadline Hari Ini',
                'pesan' => "{$deadlineHariIni} tugas harus diselesaikan hari ini.",
                'created_at' => now(),
            ]);
        }

        if ($deadlineDekat > 0) {
            $notifications->push((object) [
                'judul' => 'Deadline Mendekat',
                'pesan' => "{$deadlineDekat} tugas memiliki tenggat waktu kurang dari 3 hari.",
                'created_at' => now(),
            ]);
        }

        if ($terlambat > 0) {
            $notifications->push((object) [
                'judul' => 'Tugas Terlambat',
                'pesan' => "Ada {$terlambat} tugas yang telah melewati deadline.",
                'created_at' => now(),
            ]);
        }

        return view('notifications.index', compact('notifications'));
    }
}