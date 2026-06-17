@extends('layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div>

        <h1 class="text-5xl lg:text-6xl font-extrabold text-[#AC2471] tracking-tight">
            Prioritas Pintar
        </h1>

        <p class="text-xl text-gray-500 mt-4 max-w-4xl leading-relaxed">
            Ranking prioritas tugas berdasarkan AI. Kami menganalisis
            deadline, status pengerjaan, dan aktivitas belajar Anda.
        </p>

    </div>

    {{-- GRID --}}
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">

        {{-- LIST PRIORITAS --}}
        <div class="xl:col-span-8 space-y-6">

            @forelse($prioritas as $item)

                <div
                    class="bg-white rounded-[32px] shadow-sm hover:shadow-xl
                           transition-all duration-300 overflow-hidden
                           hover:-translate-y-1">

                    <div
                        class="relative p-8 border-l-[6px]
                        {{ $item->skor >= 80 ? 'border-[#C0267A]' : ($item->skor >= 50 ? 'border-orange-400' : 'border-blue-400') }}">

                        {{-- BACKGROUND GLOW --}}
                        <div
                            class="absolute top-0 right-0 w-40 h-40 rounded-full blur-3xl opacity-10
                            {{ $item->skor >= 80 ? 'bg-[#C0267A]' : ($item->skor >= 50 ? 'bg-orange-400' : 'bg-blue-400') }}">
                        </div>

                        <div class="relative flex flex-col lg:flex-row justify-between gap-8">

                            {{-- KONTEN --}}
                            <div class="flex-1 min-w-0">

                                <div class="flex items-center gap-3 mb-5">

                                    <div class="w-12 h-12 rounded-2xl bg-[#F9F1F5] flex items-center justify-center">

                                        <i class="fa-solid fa-bolt text-[#C0267A]"></i>

                                    </div>

                                    <p class="text-sm uppercase tracking-[0.2em] text-gray-400">
                                        Analisis AI
                                    </p>

                                </div>

                                <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight">

                                    {{ $item->judul }}

                                </h3>

                                <div class="flex flex-wrap gap-3 mt-6">

                                    <span class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 text-sm">

                                        <i class="fa-regular fa-clock mr-2"></i>

                                        Deadline
                                        {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d M Y') }}

                                    </span>

                                    <span
                                        class="px-4 py-2 rounded-full text-sm font-medium
                                        {{ $item->skor >= 80
                                            ? 'bg-pink-100 text-[#C0267A]'
                                            : ($item->skor >= 50
                                                ? 'bg-orange-100 text-orange-600'
                                                : 'bg-blue-100 text-blue-600') }}">

                                        {{ $item->skor >= 80
                                            ? 'Prioritas Tinggi'
                                            : ($item->skor >= 50
                                                ? 'Prioritas Sedang'
                                                : 'Prioritas Rendah') }}

                                    </span>

                                </div>

                            </div>

                            {{-- SKOR --}}
                            <div class="text-right shrink-0">

                                <h2 class="text-[64px] lg:text-[72px] font-extrabold text-[#C0267A] leading-none">

                                    {{ round($item->skor) }}

                                </h2>

                                <p class="text-sm uppercase tracking-wide text-gray-400 mt-2">
                                    Skor Prioritas
                                </p>

                                <div class="w-32 h-2 rounded-full bg-pink-100 mt-4 ml-auto overflow-hidden">

                                    <div
                                        class="h-full bg-gradient-to-r from-[#FF69B4] to-[#C0267A]"
                                        style="width: {{ min($item->skor, 100) }}%">
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-[32px] p-12 text-center shadow-sm">

                    <div class="w-20 h-20 mx-auto rounded-full bg-pink-100 flex items-center justify-center">

                        <i class="fa-regular fa-folder-open text-3xl text-[#AC2471]"></i>

                    </div>

                    <h3 class="mt-5 text-2xl font-bold text-gray-900">
                        Belum ada tugas
                    </h3>

                    <p class="mt-3 text-gray-500">
                        Tambahkan tugas terlebih dahulu untuk mendapatkan analisis prioritas.
                    </p>

                </div>

            @endforelse

        </div>

        {{-- SIDEBAR --}}
        <div class="xl:col-span-4 space-y-6">

            {{-- TINGKAT URGENSI --}}
            <div class="bg-white rounded-[32px] p-8 shadow-sm">

                <div class="flex items-center justify-between mb-6">

                    <h3 class="text-2xl font-bold text-gray-900">
                        Tingkat Urgensi
                    </h3>

                    <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center">

                        <i class="fa-solid fa-chart-line text-[#C0267A]"></i>

                    </div>

                </div>

                <div class="h-64 rounded-3xl bg-[#F9F1F5] relative overflow-hidden">

                    <div class="absolute inset-0 grid grid-cols-2 grid-rows-2">

                        <div class="border-r border-b border-pink-100"></div>
                        <div class="border-b border-pink-100"></div>
                        <div class="border-r border-pink-100"></div>
                        <div></div>

                    </div>

                    <div class="absolute inset-x-0 bottom-4 flex justify-between px-5 text-xs text-gray-400">

                        <span>Rendah</span>
                        <span>Tinggi</span>

                    </div>

                    <div class="absolute left-[-20px] top-1/2 -rotate-90 text-xs text-gray-400">

                        Penting

                    </div>

                    <div class="absolute top-[38%] left-[62%]">

                        <div class="relative flex items-center justify-center">

                            <div class="absolute w-10 h-10 rounded-full bg-[#C0267A]/20 animate-ping"></div>

                            <div class="w-5 h-5 rounded-full bg-[#C0267A]"></div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- KESEHATAN --}}
            <div class="bg-white rounded-[32px] p-8 shadow-sm text-center">

                <div class="relative w-44 h-44 mx-auto">

                    <svg class="w-full h-full -rotate-90">

                        <circle
                            cx="88"
                            cy="88"
                            r="70"
                            stroke="#FCE7F3"
                            stroke-width="14"
                            fill="none" />

                        <circle
                            cx="88"
                            cy="88"
                            r="70"
                            stroke="#C0267A"
                            stroke-width="14"
                            fill="none"
                            stroke-linecap="round"
                            stroke-dasharray="440"
                            stroke-dashoffset="66" />

                    </svg>

                    <div class="absolute inset-0 flex flex-col items-center justify-center">

                        <h2 class="text-5xl font-extrabold text-[#C0267A]">
                            85%
                        </h2>

                        <p class="text-gray-500">
                            Kesehatan
                        </p>

                    </div>

                </div>

                <div class="inline-flex items-center gap-2 mt-6 px-4 py-2 rounded-full bg-emerald-50 text-emerald-600 text-sm font-medium">

                    <i class="fa-solid fa-heart-pulse"></i>

                    Stabil

                </div>

                <p class="mt-5 text-gray-500 leading-relaxed">

                    Jadwal Anda masih seimbang dan terkendali.
                    Pertahankan ritme belajar saat ini.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection