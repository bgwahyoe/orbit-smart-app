@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-3xl font-extrabold text-[#1F2937]">
            Rekomendasi Belajar
        </h1>

        <p class="text-[#6B7280]">
            Jadwal belajar personal berdasarkan deadline dan progres Anda.
        </p>
    </div>

    {{-- BARIS 1 --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- PERFORMA --}}
        <div class="xl:col-span-2 bg-white rounded-[24px] border border-gray-200 p-6 shadow-sm">

            <div class="flex flex-col md:flex-row items-center gap-8">

                <div class="w-36 h-36 rounded-full border-[10px] border-pink-400 flex items-center justify-center">

                    <div class="text-center">
                        <h2 class="text-5xl font-bold text-[#AC2471]">
                            {{ $jamFokus }}
                        </h2>

                        <p class="text-sm text-gray-500">
                            Jam Fokus
                        </p>
                    </div>

                </div>

                <div class="flex-1">

                    <h3 class="text-2xl font-bold text-gray-900">
                        ⚡ Performa Puncak
                    </h3>

                    <p class="text-gray-500 mt-3">
                        Waktu belajar optimal diperkirakan pada pukul
                        <strong>09:00 - 12:00</strong>.
                    </p>

                    <div class="flex gap-4 mt-6">

                        <div class="bg-pink-50 px-5 py-3 rounded-2xl">
                            <p class="font-bold text-[#AC2471]">
                                {{ $jamFokus }}j
                            </p>

                            <small class="text-gray-500">
                                Deep Work
                            </small>
                        </div>

                        <div class="bg-pink-50 px-5 py-3 rounded-2xl">
                            <p class="font-bold text-[#AC2471]">
                                {{ $rataSkor }}
                            </p>

                            <small class="text-gray-500">
                                Skor Fokus
                            </small>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- PILIHAN PINTAR --}}
        <div class="bg-gradient-to-br from-pink-100 to-pink-50 rounded-[24px] p-6 shadow-sm">

            <span class="bg-[#AC2471] text-white text-xs px-4 py-2 rounded-full">
                PILIHAN PINTAR
            </span>

            @if($pilihanPintar)

                <h3 class="text-2xl font-bold text-gray-900 mt-5">
                    {{ $pilihanPintar['judul'] }}
                </h3>

                <p class="text-gray-600 mt-3">
                    Prioritaskan tugas ini karena memiliki skor fokus tertinggi.
                </p>

            @endif

        </div>

    </div>

    {{-- BARIS 2 --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- KONTEN UTAMA --}}
        <div class="xl:col-span-2 space-y-6">

            {{-- RITME BELAJAR --}}
            <div class="bg-white rounded-[24px] border border-gray-200 p-6 shadow-sm">

                <h2 class="text-2xl font-bold text-[#1F2937]">
                    Ritme Belajar Harian
                </h2>

                <div class="grid md:grid-cols-3 gap-4 mt-6">

                    @foreach($ritmeBelajar as $ritme)

                        <div class="bg-[#F8FAFC] border border-gray-100 rounded-2xl p-5">

                            <p class="text-sm text-gray-500">
                                {{ $ritme['waktu'] }}
                            </p>

                            <h4 class="font-semibold text-gray-900 mt-3">
                                {{ $ritme['judul'] }}
                            </h4>

                            <span class="inline-block mt-4 bg-pink-100 text-[#AC2471] px-3 py-1 rounded-full text-xs">
                                {{ $ritme['status'] }}
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

            {{-- REKOMENDASI --}}
            @forelse($rekomendasi as $item)

                <div class="bg-white rounded-[24px] border border-gray-200 p-6 shadow-sm">

                    <div class="flex flex-col md:flex-row justify-between gap-6">

                        <div>

                            <span class="bg-pink-100 text-[#AC2471] px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $item['metode'] }}
                            </span>

                            <h3 class="text-2xl font-bold text-gray-900 mt-4">
                                {{ $item['judul'] }}
                            </h3>

                            <p class="text-gray-500 mt-2">
                                {{ $item['mata_kuliah'] }}
                            </p>

                            <div class="flex flex-wrap gap-3 mt-5">

                                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm">
                                    ⏰ {{ $item['durasi'] }} menit
                                </span>

                                <span class="bg-red-100 text-red-500 px-4 py-2 rounded-full text-sm">
                                    {{ $item['hari_tersisa'] }} hari lagi
                                </span>

                                <span class="bg-blue-100 text-blue-500 px-4 py-2 rounded-full text-sm">
                                    {{ $item['deadline'] }}
                                </span>

                            </div>

                        </div>

                        <div class="text-right">

                            <div class="text-5xl font-bold text-[#AC2471]">
                                {{ $item['skor'] }}
                            </div>

                            <p class="text-gray-500 mt-2">
                                Skor Fokus
                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-[24px] border border-gray-200 p-8 text-center shadow-sm">

                    <h3 class="text-xl font-bold text-gray-900">
                        Belum ada tugas aktif
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Tambahkan tugas terlebih dahulu.
                    </p>

                </div>

            @endforelse

        </div>

        {{-- SIDEBAR KANAN --}}
        <div>

            <div class="bg-white rounded-[24px] border border-gray-200 p-6 shadow-sm">

                <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center text-xl">
                    ⏰
                </div>

                <h3 class="text-xl font-bold text-gray-900 mt-5">
                    Tips Pomodoro
                </h3>

                <p class="text-gray-500 mt-4 leading-relaxed">
                    Belajar selama <strong>25 menit</strong>, istirahat
                    <strong>5 menit</strong>. Setelah 4 sesi, istirahat selama
                    <strong>15–30 menit</strong>.
                </p>

            </div>

        </div>

    </div>

</div>

@endsection