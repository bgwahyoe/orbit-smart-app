@extends('layouts.app')

@section('content')
   
        <div class="flex min-h-screen">

            <!-- CONTENT -->
            <main class="flex-1">



                <!-- BODY -->
                <div class="p-10">

                    <!-- WELCOME -->
                    <div>

                        <h1 class="text-[48px] font-bold text-[#191C1D]">

                            Selamat Datang,
                            {{ explode(' ', auth()->user()->name)[0] }}

                        </h1>

                        <p class="text-[#7A4A54] text-xl mt-2">

                            Siap untuk sesi belajar produktif hari ini?

                        </p>

                    </div>

                    <!-- STAT -->
                    <div class="grid grid-cols-4 gap-6 mt-8">

                        <div class="bg-white rounded-[24px] p-6 shadow-sm">
                            <p class="text-gray-500 text-sm">TOTAL TUGAS</p>
                            <h2 class="text-4xl font-bold mt-2">{{ $totalTugas }}</h2>
                        </div>

                        <div class="bg-white rounded-[24px] p-6 shadow-sm">
                            <p class="text-gray-500 text-sm">TUGAS SELESAI</p>
                            <h2 class="text-4xl font-bold mt-2">{{ $tugasSelesai }}</h2>
                        </div>

                        <div class="bg-white rounded-[24px] p-6 shadow-sm">

    <p class="text-gray-500 text-sm">
        DEADLINE TERDEKAT
    </p>

    @if($deadlineTerdekat)

        <h2 class="text-2xl font-bold mt-2">
            {{ \Carbon\Carbon::parse($deadlineTerdekat->deadline)->translatedFormat('d M') }}
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            {{ $deadlineTerdekat->judul }}
        </p>

    @else

        <h2 class="text-2xl font-bold mt-2">
            -
        </h2>

    @endif

</div>

                        <div class="bg-white rounded-[24px] p-6 shadow-sm">
                            <p class="text-gray-500 text-sm">AKTIVITAS HARI INI</p>
                            <h2 class="text-4xl font-bold mt-2">{{ $aktivitasHariIni }}</h2>
                        </div>

                    </div>

                    <!-- GRID -->
                    <div class="grid grid-cols-3 gap-6 mt-8">

                        <!-- PRIORITAS -->
                        <div class="col-span-2 bg-white rounded-[28px] p-8 shadow-sm">

                            <div class="flex justify-between items-center mb-6">

                                <h3 class="text-2xl font-bold">
                                    Prioritas Tugas
                                </h3>

                                <a href="#" class="text-[#AC2471] font-medium">
                                    Lihat Semua
                                </a>

                            </div>

                            @if($prioritas->count())

                                <div class="space-y-5">

                                    @foreach($prioritas as $tugas)

                                        <div class="border-b border-gray-100 pb-4">

                                            <h4 class="font-semibold text-lg">
                                                {{ $tugas->judul }}
                                            </h4>

                                            <p class="text-gray-500 text-sm mt-1">

                                                Deadline:
                                                {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') }}

                                            </p>

                                            <span
                                                class="inline-block mt-2 px-3 py-1 rounded-full bg-pink-100 text-[#AC2471] text-xs">

                                                {{ ucfirst($tugas->status) }}

                                            </span>

                                        </div>

                                    @endforeach

                                </div>

                            @else

                                <div class="text-center py-12">

                                    <i class="fa-regular fa-folder-open text-4xl text-gray-300"></i>

                                    <p class="mt-4 text-gray-400">
                                        Belum ada tugas yang ditambahkan
                                    </p>

                                </div>

                            @endif

                        </div>



                        <!-- KALENDER -->
                        <div class="bg-white rounded-[28px] p-8 shadow-sm">

                            <h3 class="text-2xl font-bold">
                                Kalender Aktivitas
                            </h3>

                            <div class="grid grid-cols-7 gap-2 mt-8 text-center">

                                @for($i = 1; $i <= now()->daysInMonth; $i++)

    <div
        class="h-10 flex items-center justify-center rounded-lg
        {{ in_array($i, $tanggalTugas)
            ? 'bg-[#AC2471] text-white'
            : 'text-gray-600' }}">

        {{ $i }}

    </div>

@endfor

                            </div>

                        </div>

                    </div>

                    <!-- BOTTOM -->
                    <div class="grid grid-cols-2 gap-6 mt-8">

                        <div class="bg-white rounded-[28px] p-8 shadow-sm">

                            <h3 class="text-3xl font-bold">
                                Ringkasan Produktivitas
                            </h3>

                            <div class="mt-10">

                                <div class="h-3 bg-gray-200 rounded-full">

                                    <div class="h-3 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471]"
                                        style="width: {{ $persentaseProduktivitas }}%">
                                    </div>

                                </div>

                                <p class="mt-4 text-[#AC2471] font-bold text-2xl">
                                    {{ $persentaseProduktivitas }}%
                                </p>
                            </div>

                        </div>

                        <div class="bg-white rounded-[28px] p-8 shadow-sm">

                            <h3 class="text-3xl font-bold">
                                Deadline Mendatang
                            </h3>

                           <div class="space-y-5 mt-8">

    @forelse($deadlineMendatang as $tugas)

        @php
            $sisaHari = now()->startOfDay()->diffInDays(
                \Carbon\Carbon::parse($tugas->deadline)->startOfDay(),
                false
            );
        @endphp

        <div class="border-b border-gray-100 pb-4 last:border-0">

            <h4 class="font-semibold text-gray-900">
                {{ $tugas->judul }}
            </h4>

            <p class="text-gray-500 text-sm mt-1">
                Deadline:
                {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y') }}
            </p>

            <p class="text-[#AC2471] font-medium mt-2">
                @if($sisaHari < 0)
                    Terlambat {{ abs($sisaHari) }} hari
                @elseif($sisaHari == 0)
                    Hari ini
                @elseif($sisaHari == 1)
                    Besok
                @else
                    Dalam {{ $sisaHari }} hari
                @endif
            </p>

        </div>

    @empty

        <p class="text-gray-400">
            Tidak ada deadline mendatang.
        </p>

    @endforelse

</div>

                        </div>

                    </div>

                </div>

            </main>

        </div>
@endsection