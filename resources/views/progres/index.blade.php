@extends('layouts.app')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div>
        <h1 class="text-3xl font-extrabold text-[#1F2937]">
            Progres Belajar
        </h1>

        <p class="text-[#6B7280] mt-2">
            Pantau perkembangan akademik dan produktivitas Anda.
        </p>
    </div>

    {{-- BARIS 1 --}}
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">

        {{-- SKOR PRODUKTIVITAS --}}
        <div class="xl:col-span-4 bg-white rounded-[24px] border border-gray-200 p-8 shadow-sm">

            <h3 class="text-sm font-bold tracking-widest text-gray-500 uppercase text-center">
                Skor Produktivitas
            </h3>

            <div class="flex justify-center mt-8">

                <div class="relative w-44 h-44">

                    <div class="absolute inset-0 rounded-full border-[12px] border-pink-100"></div>

                    <div class="absolute inset-0 rounded-full border-[12px] border-[#AC2471]"
                        style="clip-path: inset(0 0 25% 0);"></div>

                    <div class="absolute inset-0 flex flex-col items-center justify-center">

                        <span class="text-5xl font-bold text-[#AC2471]">
                            {{ $produktivitas }}%
                        </span>

                        <span class="text-gray-500 text-sm">
                            Produktivitas
                        </span>

                    </div>

                </div>

            </div>

            <p class="text-center text-gray-500 mt-6">
                Anda telah menyelesaikan
                <span class="text-[#AC2471] font-semibold">
                    {{ $tugasSelesai }}
                </span>
                dari
                <span class="font-semibold">
                    {{ $tugasSelesai + $tugasAktif }}
                </span>
                tugas.
            </p>

        </div>

        {{-- RINGKASAN --}}
        <div class="xl:col-span-8 bg-white rounded-[24px] border border-gray-200 p-8 shadow-sm">

            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                <div>
                    <h2 class="text-3xl font-bold text-[#AC2471]">
                        Ringkasan Tugas
                    </h2>

                    <p class="text-gray-500">
                        Aktivitas bulan ini
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-8">

                <div class="bg-pink-50 rounded-2xl p-5">
                    <p class="text-xs font-bold text-gray-500 uppercase">
                        Tugas Selesai
                    </p>

                    <h3 class="text-4xl font-bold text-[#AC2471] mt-2">
                        {{ $tugasSelesai }}
                    </h3>
                </div>

                <div class="bg-pink-50 rounded-2xl p-5">
                    <p class="text-xs font-bold text-gray-500 uppercase">
                        Belum Selesai
                    </p>

                    <h3 class="text-4xl font-bold text-gray-900 mt-2">
                        {{ $tugasAktif }}
                    </h3>
                </div>

                <div class="bg-gray-50 rounded-2xl p-5">
                    <p class="text-xs font-bold text-gray-500 uppercase">
                        Progress
                    </p>

                    <h3 class="text-4xl font-bold text-gray-900 mt-2">
                        {{ $progressSemester }}%
                    </h3>
                </div>

                <div class="bg-pink-50 rounded-2xl p-5">
                    <p class="text-xs font-bold text-gray-500 uppercase">
                        Efisiensi
                    </p>

                    <h3 class="text-4xl font-bold text-[#10B981] mt-2">
                        {{ $produktivitas }}%
                    </h3>
                </div>

            </div>

        </div>

    </div>

    {{-- BARIS 2 --}}
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">

        {{-- PROGRES SEMESTER --}}
        <div class="xl:col-span-6 bg-white rounded-[24px] border border-gray-200 p-8 shadow-sm">

            <div class="flex justify-between items-center mb-4">

                <h3 class="text-2xl font-bold text-gray-900">
                    Progress Semester
                </h3>

                <span class="text-[#AC2471] font-bold">
                    {{ $progressSemester }}%
                </span>

            </div>

            <div class="w-full bg-gray-100 rounded-full h-4 overflow-hidden">

                <div class="h-full rounded-full bg-gradient-to-r from-[#EC4899] to-[#AC2471] transition-all duration-500"
                    style="width: {{ $progressSemester }}%">
                </div>

            </div>

            <p class="text-sm text-gray-500 mt-4">
                {{ $tugasSelesai }} dari {{ $tugasSelesai + $tugasAktif }}
                tugas telah diselesaikan.
            </p>

        </div>

        {{-- PRODUKTIVITAS BULANAN --}}
        <div class="xl:col-span-6 bg-white rounded-[24px] border border-gray-200 p-8 shadow-sm">

            <h3 class="text-2xl font-bold text-gray-900 mb-6">
                Produktivitas Bulanan
            </h3>

            <div class="space-y-5">

                @foreach([
                    ['label' => 'Januari', 'value' => 70],
                    ['label' => 'Februari', 'value' => 82],
                    ['label' => 'Maret', 'value' => 65],
                    ['label' => 'April', 'value' => $produktivitas],
                ] as $bulan)

                    <div>

                        <div class="flex justify-between text-sm mb-2">

                            <span class="font-medium text-gray-700">
                                {{ $bulan['label'] }}
                            </span>

                            <span class="font-bold text-gray-700">
                                {{ $bulan['value'] }}%
                            </span>

                        </div>

                        <div class="h-3 bg-gray-100 rounded-full overflow-hidden">

                            <div class="h-full bg-gradient-to-r from-pink-300 to-[#AC2471] rounded-full"
                                style="width: {{ $bulan['value'] }}%">
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    {{-- GALERI PENCAPAIAN --}}
    <div class="bg-white rounded-[24px] border border-gray-200 p-8 shadow-sm">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h3 class="text-2xl font-bold text-[#AC2471]">
                    Galeri Pencapaian
                </h3>

                <p class="text-gray-500 mt-1">
                    Badge yang berhasil Anda buka.
                </p>

            </div>

        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 text-center">

            <div>
                <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                    ⭐
                </div>

                <p class="font-semibold text-sm mt-3">
                    Rajin
                </p>
            </div>

            <div>
                <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                    🔥
                </div>

                <p class="font-semibold text-sm mt-3">
                    Konsisten
                </p>
            </div>

            <div>
                <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                    📚
                </div>

                <p class="font-semibold text-sm mt-3">
                    Pembelajar
                </p>
            </div>

            <div>
                <div class="w-16 h-16 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-2xl opacity-50">
                    🏆
                </div>

                <p class="font-semibold text-sm mt-3 text-gray-400">
                    Master
                </p>
            </div>

            <div>
                <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center text-2xl">
                    🎯
                </div>

                <p class="font-semibold text-sm mt-3">
                    Fokus
                </p>
            </div>

            <div>
                <div class="w-16 h-16 mx-auto rounded-full bg-gray-100 flex items-center justify-center text-2xl opacity-50">
                    👑
                </div>

                <p class="font-semibold text-sm mt-3 text-gray-400">
                    Sarjana
                </p>
            </div>

        </div>

    </div>

</div>

@endsection