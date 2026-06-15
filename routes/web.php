<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\MataKuliahController;

Route::view('/', 'landing')->name('home');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::resource('tugas', TugasController::class);
    Route::resource('matakuliah', MataKuliahController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/tugas', [TugasController::class, 'index'])
        ->name('tugas.index');

    Route::view('/prioritas', 'coming-soon')
        ->name('prioritas.index');

    Route::view('/kalender', 'coming-soon')
        ->name('kalender.index');

    Route::view('/rekomendasibelajar', 'coming-soon')
        ->name('rekomendasibelajar.index');

    Route::view('/notifikasi', 'coming-soon')
        ->name('notifikasi.index');

    Route::view('/progres', 'coming-soon')
        ->name('progres.index');

    Route::view('/pengaturan', 'coming-soon')
        ->name('pengaturan.index');
});