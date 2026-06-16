<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PrioritasController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProgresController;

Route::middleware(['auth'])->group(function () {
    
    Route::get('/progres', [ProgresController::class, 'index'])->name('progres.index');
});

Route::post('/pengaturan', [PengaturanController::class, 'update'])
    ->name('pengaturan.update');

Route::view('/', 'landing')->name('home');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::resource('tugas', TugasController::class);
    Route::resource('matakuliah', MataKuliahController::class);

    Route::get('/prioritas', [PrioritasController::class, 'index'])
        ->name('prioritas.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/tugas', [TugasController::class, 'index'])
        ->name('tugas.index');

    

    Route::view('/kalender', 'coming-soon')
        ->name('kalender.index');

    Route::view('/rekomendasibelajar', 'coming-soon')
        ->name('rekomendasibelajar.index');

    Route::view('/notifikasi', 'coming-soon')
        ->name('notifikasi.index');

    Route::get('/progres', [ProgresController::class, 'index'])->name('progres.index');

    Route::view('/pengaturan', 'pengaturan.index')
    ->name('pengaturan.index');
});