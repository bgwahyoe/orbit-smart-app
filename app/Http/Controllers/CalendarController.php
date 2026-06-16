<?php

namespace App\Http\Controllers;
use App\Models\CalendarEvent;

class CalendarController extends Controller
{
    public function index() {
    $events = \App\Models\CalendarEvent::all(); // Mengambil semua data dari database
    return view('kalender', compact('events')); // Mengirim $events ke view
}
}