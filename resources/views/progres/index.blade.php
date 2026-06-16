@extends('layouts.app')

@section('content')
<div>
    <div>
        <h1 class="text-5xl font-bold text-[#1E1E1E] dark:text-white">
            Progress Belajar
        </h1>
        <p class="text-gray-500 dark:text-gray-400 mt-3 text-xl">
            Pantau perkembangan akademik dan produktivitas Anda.
        </p>
    </div>

    <div class="grid grid-cols-3 gap-6 mt-10">

        <div class="bg-white rounded-[24px] p-6 shadow-sm dark:bg-[#1E1E1E] dark:border dark:border-gray-800">
            <p class="text-gray-500 dark:text-gray-400 text-sm">TUGAS SELESAI</p>
            <h2 class="text-4xl font-bold mt-2 text-gray-900 dark:text-white">12</h2>
        </div>

        <div class="bg-white rounded-[24px] p-6 shadow-sm dark:bg-[#1E1E1E] dark:border dark:border-gray-800">
            <p class="text-gray-500 dark:text-gray-400 text-sm">TARGET MINGGUAN</p>
            <h2 class="text-4xl font-bold mt-2 text-gray-900 dark:text-white">80%</h2>
        </div>

        <div class="bg-white rounded-[24px] p-6 shadow-sm dark:bg-[#1E1E1E] dark:border dark:border-gray-800">
            <p class="text-gray-500 dark:text-gray-400 text-sm">PRODUKTIVITAS</p>
            <h2 class="text-4xl font-bold mt-2 text-gray-900 dark:text-white">82%</h2>
        </div>

    </div>

    <div class="bg-white rounded-[24px] p-8 shadow-sm mt-8 dark:bg-[#1E1E1E] dark:border dark:border-gray-800">

        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
            Progress Semester
        </h3>

        <div class="mt-6">
            <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded-full">
                <div class="bg-[#FF69B4] h-4 rounded-full" style="width: {{ $persentase ?? 0 }}%"></div>
            </div>

            <p class="mt-4 text-[#AC2471] dark:text-[#FF69B4] font-bold text-2xl">
                <span class="text-4xl font-extrabold">{{ $persentase ?? 0 }}%</span>
            </p>
        </div>

    </div>

    <div class="bg-white rounded-[24px] p-8 shadow-sm mt-8 dark:bg-[#1E1E1E] dark:border dark:border-gray-800">

        <h3 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
            Aktivitas Terbaru
        </h3>

        <div class="space-y-4">

            <div class="border-b border-gray-100 dark:border-gray-800 pb-3">
                <p class="font-medium text-gray-900 dark:text-gray-200">
                    Menyelesaikan Tugas Basis Data
                </p>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Hari ini
                </p>
            </div>

            <div class="border-b border-gray-100 dark:border-gray-800 pb-3">
                <p class="font-medium text-gray-900 dark:text-gray-200">
                    Menyelesaikan Kuis Statistik
                </p>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Kemarin
                </p>
            </div>

            <div>
                <p class="font-medium text-gray-900 dark:text-gray-200">
                    Mengumpulkan Proposal Penelitian
                </p>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    3 hari lalu
                </p>
            </div>

        </div>

    </div>
</div>
@endsection