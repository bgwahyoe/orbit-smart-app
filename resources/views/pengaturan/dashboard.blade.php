@extends('layouts.app')

@section('content')
<div>
    <!-- Judul Selamat Datang -->
    <div>
        <h1 class="text-5xl font-extrabold text-[#1E1E1E]">Selamat Datang, Dava</h1>
        <p class="text-gray-500 font-bold mt-3 text-xl">Siap untuk sesi belajar produktif hari ini?</p>
    </div>

    <!-- Grid Kotak Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-10">
        <div class="bg-white rounded-[24px] p-6 shadow-sm">
            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Total Tugas</p>
            <h2 class="text-4xl font-black mt-2">0</h2>
        </div>
        <div class="bg-white rounded-[24px] p-6 shadow-sm">
            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Tugas Selesai</p>
            <h2 class="text-4xl font-black mt-2">0</h2>
        </div>
        <div class="bg-white rounded-[24px] p-6 shadow-sm">
            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Deadline Terdekat</p>
            <h2 class="text-4xl font-black mt-2">0</h2>
        </div>
        <div class="bg-white rounded-[24px] p-6 shadow-sm">
            <p class="text-gray-500 text-xs font-bold uppercase tracking-wider">Aktivitas Hari Ini</p>
            <h2 class="text-4xl font-black mt-2">0</h2>
        </div>
    </div>

    <!-- Area Detail Bawah -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
        <div class="lg:col-span-2 bg-white rounded-[24px] p-8 shadow-sm min-h-[300px] flex flex-col justify-between">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-extrabold">Prioritas Tugas</h3>
                <a href="#" class="text-[#AC2471] font-bold">Lihat Semua</a>
            </div>
            <div class="flex flex-col items-center justify-center my-auto opacity-60">
                <i class="fa-regular fa-folder-open text-5xl text-gray-400 mb-3"></i>
                <p class="text-gray-500 font-bold">Belum ada tugas yang ditambahkan</p>
            </div>
        </div>

        <div class="bg-white rounded-[24px] p-8 shadow-sm">
            <h3 class="text-2xl font-extrabold mb-4">Kalender Aktivitas</h3>
            <div class="text-center text-gray-400 py-10 font-bold">
                <!-- Taruh kode atau widget kalender lama Anda di sini -->
                [ Konten Kalender ]
            </div>
        </div>
    </div>
</div>
@endsection