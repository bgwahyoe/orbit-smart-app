<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Mengambil data dari database
        $notifications = Notification::latest()->get();
        
        // Mengembalikan ke file view yang baru kita buat
        return view('notifications.index', compact('notifications'));
    }
}