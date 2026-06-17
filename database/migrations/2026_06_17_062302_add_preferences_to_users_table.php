<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'bio' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;

        $user->notif_email = $request->has('notif_email');
        $user->dark_mode = $request->has('dark_mode');
        $user->reminder_tugas = $request->has('reminder_tugas');

        $user->save();

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}