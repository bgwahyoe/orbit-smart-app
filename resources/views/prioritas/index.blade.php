<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Prioritas Pintar</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
rel="stylesheet">

</head>

<body class="font-[Poppins] bg-[#F6F7FB]">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
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

    <main class="flex-1">

        {{-- TOPBAR --}}
        <div class="h-20 bg-white border-b px-10 flex items-center justify-between">

            <input
                placeholder="Cari tugas..."
                class="w-[320px] h-12 rounded-2xl border border-pink-200 px-5">

            <div class="flex items-center gap-5">

                <i class="fa-regular fa-bell text-[#AC2471] text-xl"></i>

                <div
                    class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471]
                    flex items-center justify-center text-white font-bold">

                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}

                </div>

            </div>

        </div>

        <div class="p-10">

            <h1
                class="text-5xl font-bold text-[#AC2471]">

                Prioritas Pintar

            </h1>

            <p
                class="text-gray-500 text-xl mt-3 max-w-4xl">

                Ranking prioritas tugas berdasarkan AI.
                Kami menganalisis deadline dan aktivitas Anda.

            </p>

            {{-- LIST PRIORITAS --}}
            <div class="grid grid-cols-3 gap-6 mt-10">

                <div class="col-span-2 space-y-5">

                    @foreach($prioritas as $item)

                    <div
                        class="bg-white rounded-[28px] p-8 shadow-sm border-l-4
                        {{ $item->skor >= 80 ? 'border-pink-600' : ($item->skor >= 50 ? 'border-orange-400' : 'border-blue-400') }}">

                        <div
                            class="flex justify-between items-center">

                            <div>

                                <h3
                                    class="text-3xl font-bold">

                                    {{ $item->judul }}

                                </h3>

                                <p
                                    class="text-gray-500 mt-2">

                                    Deadline

                                    {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}

                                </p>

                            </div>

                            <div
                                class="text-right">

                                <h2
                                    class="text-5xl font-bold text-[#AC2471]">

                                    {{ $item->skor }}

                                </h2>

                                <span
                                    class="text-sm text-gray-500">

                                    SKOR

                                </span>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

                {{-- SIDEBAR KANAN --}}
                <div class="space-y-6">

                    <div
                        class="bg-white rounded-[28px] p-8 shadow-sm">

                        <h3
                            class="font-bold text-xl">

                            Tingkat Urgensi

                        </h3>

                        <div
                            class="h-56 mt-6 rounded-2xl bg-[#F7F2F5]
                            flex items-center justify-center">

                            <div
                                class="w-6 h-6 bg-[#AC2471]
                                rounded-full">

                            </div>

                        </div>

                    </div>

                    <div
                        class="bg-white rounded-[28px] p-8 shadow-sm">

                        <div
                            class="w-40 h-40 rounded-full border-[10px]
                            border-[#AC2471] mx-auto flex items-center
                            justify-center">

                            <div class="text-center">

                                <h2
                                    class="text-4xl font-bold text-[#AC2471]">

                                    85%

                                </h2>

                                <p
                                    class="text-sm">

                                    Kesehatan

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>