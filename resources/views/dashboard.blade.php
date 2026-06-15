<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Orbit</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="font-[Poppins] bg-[#F6F7FB]">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[280px] bg-white border-r border-gray-100 flex flex-col">

            <!-- LOGO -->
            <div class="px-8 pt-8">

                <div class="flex items-center gap-3">

                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#FF69B4] to-[#AC2471] flex items-center justify-center text-white">
                        ✨
                    </div>

                    <div>
                        <h2 class="font-bold text-2xl text-[#AC2471]">
                            Orbit
                        </h2>

                        <p class="text-sm text-gray-500">
                            Manajer Akademik
                        </p>
                    </div>

                </div>

            </div>

            <!-- MENU -->
            <nav class="mt-10 px-5 space-y-2">

                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('dashboard') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-solid fa-table-columns"></i>
                    Dashboard

                </a>

                <!-- Tugas -->
                <a href="{{ route('tugas.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('tugas.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-regular fa-clipboard"></i>
                    Tugas

                </a>

                <!-- Prioritas -->
                <a href="{{ route('prioritas.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('prioritas.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-solid fa-bolt"></i>
                    Prioritas Pintar

                </a>

                <!-- Kalender -->
                <a href="{{ route('kalender.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('kalender.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-regular fa-calendar"></i>
                    Kalender

                </a>

                <!-- Rekomendasi Belajar -->
                <a href="{{ route('rekomendasibelajar.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('rekomendasibelajar.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-solid fa-graduation-cap"></i>
                    Rekomendasi Belajar

                </a>

                <!-- Notifikasi -->
                <a href="{{ route('notifikasi.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('notifikasi.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-regular fa-bell"></i>
                    Notifikasi

                </a>

                <!-- Progres -->
                <a href="{{ route('progres.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('progres.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-solid fa-chart-column"></i>
                    Progres

                </a>

                <!-- Pengaturan -->
                <a href="{{ route('pengaturan.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
        {{ request()->routeIs('pengaturan.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                    <i class="fa-solid fa-gear"></i>
                    Pengaturan

                </a>

            </nav>

            <!-- LOGOUT -->
            <div class="mt-auto p-6">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="w-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] text-white py-4 rounded-xl font-semibold">

                        <i class="fa-solid fa-right-from-bracket mr-2"></i>
                        Keluar

                    </button>

                </form>

            </div>

        </aside>

        <!-- CONTENT -->
        <main class="flex-1">

            <!-- TOPBAR -->
            <div class="h-20 bg-white border-b border-gray-100 px-10 flex items-center justify-between">

                <div class="relative">

                    <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    </i>

                    <input type="text" placeholder="Cari tugas..."
                        class="w-[320px] h-12 rounded-2xl border border-pink-200 bg-white pl-12">

                </div>

                <div class="flex items-center gap-6">

                    <button class="text-[#AC2471] text-xl">
                        <i class="fa-regular fa-bell"></i>
                    </button>

                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] flex items-center justify-center text-white font-bold">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                </div>

            </div>

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
                        <p class="text-gray-500 text-sm">DEADLINE TERDEKAT</p>
                        <h2 class="text-4xl font-bold mt-2">{{ $deadlineTerdekat }}</h2>
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

                            @for($i = 1; $i <= 30; $i++)
                                <div
                                    class="h-10 flex items-center justify-center rounded-lg {{ $i == 9 ? 'bg-[#AC2471] text-white' : '' }}">
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

                                <div class="w-[82%] h-3 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471]">
                                </div>

                            </div>

                            <p class="mt-4 text-[#AC2471] font-bold text-2xl">
                                82%
                            </p>

                        </div>

                    </div>

                    <div class="bg-white rounded-[28px] p-8 shadow-sm">

                        <h3 class="text-3xl font-bold">
                            Deadline Mendatang
                        </h3>

                        <div class="space-y-5 mt-8">

                            <div>
                                <h4 class="font-semibold">
                                    Proposal Penelitian Fisika
                                </h4>

                                <p class="text-gray-500">
                                    Dalam 3 hari
                                </p>
                            </div>

                            <div>
                                <h4 class="font-semibold">
                                    Kuis Etika Sejarah
                                </h4>

                                <p class="text-gray-500">
                                    Dalam 6 hari
                                </p>
                            </div>

                            <div>
                                <h4 class="font-semibold">
                                    UTS Makroekonomi
                                </h4>

                                <p class="text-gray-500">
                                    Dalam 11 hari
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>