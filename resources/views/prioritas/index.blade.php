@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prioritas Pintar - Orbit</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="font-[Poppins] bg-[#F6F7FB]">

    <div class="flex min-h-screen">

        <!-- CONTENT -->
        <main class="flex-1">

            <!-- BODY -->
            <div class="p-10">

                <h1 class="text-6xl font-extrabold text-[#AC2471]">
                    Prioritas Pintar
                </h1>

                <p class="text-xl text-gray-500 mt-4 max-w-4xl">
                    Ranking prioritas tugas berdasarkan AI. Kami menganalisis
                    deadline, status pengerjaan, dan aktivitas belajar Anda.
                </p>

                <div class="grid grid-cols-12 gap-8 mt-10">

                    <!-- LIST PRIORITAS -->
                    <div class="col-span-8 space-y-6">

                        @forelse($prioritas as $item)

                            <div class="bg-white rounded-[32px] shadow-sm overflow-hidden">

                                <div class="flex justify-between items-center gap-8 p-8 border-l-[6px]
                                    {{ $item->skor >= 80 ? 'border-[#C0267A]' : ($item->skor >= 50 ? 'border-orange-400' : 'border-blue-400') }}">

                                    <div class="flex-1 min-w-0">

                                        <h3 class="text-4xl font-bold leading-tight">
                                            {{ $item->judul }}
                                        </h3>

                                        <div class="flex gap-3 mt-5">

                                            <span class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 text-sm">

                                                <i class="fa-regular fa-clock mr-1"></i>

                                                Deadline
                                                {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}

                                            </span>

                                            <span class="px-4 py-2 rounded-full text-sm font-medium
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

                                    <div class="text-right shrink-0">

                                        <h2 class="text-[72px] font-extrabold text-[#C0267A] leading-none">

                                            {{ round($item->skor) }}

                                        </h2>

                                        <p class="text-sm uppercase tracking-wide text-gray-400 mt-2">
                                            Skor Prioritas
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @empty

                            <div class="bg-white rounded-[32px] p-12 text-center shadow-sm">

                                <i class="fa-regular fa-folder-open text-6xl text-gray-300"></i>

                                <p class="mt-5 text-gray-400 text-lg">
                                    Belum ada tugas untuk dianalisis.
                                </p>

                            </div>

                        @endforelse

                    </div>

                    <!-- SIDEBAR KANAN -->
                    <div class="col-span-4 space-y-6">

                        <!-- URGENSI -->
                        <div class="bg-white rounded-[32px] p-8 shadow-sm">

                            <h3 class="text-3xl font-bold mb-6">
                                Tingkat Urgensi
                            </h3>

                            <div class="h-64 rounded-3xl bg-[#F9F1F5] relative">

                                <div class="absolute inset-0 grid grid-cols-2 grid-rows-2">

                                    <div class="border-r border-b border-pink-100"></div>
                                    <div class="border-b border-pink-100"></div>
                                    <div class="border-r border-pink-100"></div>
                                    <div></div>

                                </div>

                                <div class="absolute top-[38%] left-[62%]">

                                    <div class="w-5 h-5 rounded-full bg-[#C0267A]"></div>

                                </div>

                            </div>

                        </div>

                        <!-- KESEHATAN -->
                        <div class="bg-white rounded-[32px] p-8 shadow-sm text-center">

                            <div class="w-44 h-44 mx-auto rounded-full border-[12px]
                                border-[#C0267A] flex items-center justify-center">

                                <div>

                                    <h2 class="text-5xl font-extrabold text-[#C0267A]">
                                        85%
                                    </h2>

                                    <p class="text-gray-500">
                                        Kesehatan
                                    </p>

                                </div>

                            </div>

                            <p class="mt-6 text-gray-500">
                                Jadwal Anda masih seimbang dan terkendali.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>
@endsection