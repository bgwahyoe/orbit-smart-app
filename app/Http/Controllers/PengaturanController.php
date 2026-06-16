<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Sesuaikan dengan model User Anda
use Illuminate\Support\Facades\Auth;

class PengaturanController extends Controller
{
    public function update(Request $request)
    {
        // 1. Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // 2. Ambil data user yang sedang login
        $user = Auth::user(); 
        
        // 3. Update data profil
        $user->name = $request->name;
        $user->email = $request->email;

        // 4. Update data preferensi (Checkbox)
        // Jika checkbox tidak dicentang, nilainya tidak akan terkirim, jadi kita beri default 0
        $user->notif_email = $request->has('notif_email');
        $user->dark_mode = $request->has('dark_mode');
        $user->reminder_tugas = $request->has('reminder_tugas');

        // 5. Simpan ke Database
        $user->save();

        // 6. Kembali ke halaman pengaturan dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}