<!DOCTYPE html>
<html lang="id" class="transition-colors duration-200">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orbit App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="icon" type="image/png" href="{{ asset('images/orbit-logo.png') }}">

    <script>
        if (
            localStorage.getItem('theme') === 'dark' ||
            (!('theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        html.dark body,
        html.dark main {
            background-color: #121212 !important;
            color: #ffffff !important;
        }

        html.dark aside,
        html.dark header,
        html.dark .bg-white {
            background-color: #1A1A1A !important;
            border-color: #2D2D2D !important;
        }

        html.dark h1,
        html.dark h2,
        html.dark h3,
        html.dark h4,
        html.dark p,
        html.dark span,
        html.dark label,
        html.dark i,
        html.dark .text-gray-900,
        html.dark .text-gray-800,
        html.dark .text-gray-700 {
            color: #ffffff !important;
        }

        html.dark .border-gray-100,
        html.dark .border-gray-200 {
            border-color: #2D2D2D !important;
        }

        html.dark input {
            background-color: #262626 !important;
            color: #ffffff !important;
            border-color: #404040 !important;
        }
    </style>

    <script>
        const theme = localStorage.getItem('theme');

        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body class="font-[Poppins] bg-[#F6F7FB] text-[#1E1E1E] transition-colors duration-200">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        @auth
            <aside class="w-[280px] bg-white border-r border-gray-100 flex flex-col shrink-0">

                {{-- LOGO --}}
                <div class="px-8 pt-8">

                    <div class="flex items-center gap-3">

                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#FF69B4] to-[#AC2471]
                                    flex items-center justify-center text-white">

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

                {{-- MENU --}}
                <nav class="mt-10 px-5 space-y-2">

                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('dashboard') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-solid fa-table-columns"></i>
                        Dashboard

                    </a>

                    <a href="{{ route('tugas.index') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('tugas.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-regular fa-clipboard"></i>
                        Tugas

                    </a>

                    <a href="{{ route('prioritas.index') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('prioritas.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-solid fa-bolt"></i>
                        Prioritas Pintar

                    </a>

                    <a href="{{ route('kalender.index') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('kalender.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-regular fa-calendar"></i>
                        Kalender

                    </a>

                    <a href="{{ route('rekomendasibelajar.index') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('rekomendasibelajar.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-solid fa-graduation-cap"></i>
                        Rekomendasi Belajar

                    </a>

                    <a href="{{ route('notifikasi.index') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('notifikasi.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-regular fa-bell"></i>

                        @if(isset($totalNotif) && $totalNotif > 0)
                            <span class="ml-2 text-sm font-semibold">
                                {{ $totalNotif }}
                            </span>
                        @endif
                        Notifikasi

                    </a>

                    <a href="{{ route('progres.index') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('progres.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-solid fa-chart-column"></i>
                        Progres

                    </a>

                    <a href="{{ route('pengaturan.index') }}"
                        class="flex items-center gap-4 px-5 py-4 rounded-xl font-medium
                                {{ request()->routeIs('pengaturan.*') ? 'bg-[#FF69B4] text-white' : 'text-gray-700 hover:bg-pink-50' }}">

                        <i class="fa-solid fa-gear"></i>
                        Pengaturan

                    </a>

                </nav>

                {{-- LOGOUT --}}
                <div class="mt-auto p-6">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="w-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471]
                                    text-white py-4 rounded-xl font-semibold">

                            <i class="fa-solid fa-right-from-bracket mr-2"></i>
                            Keluar

                        </button>

                    </form>

                </div>

            </aside>
        @endauth

        {{-- KONTEN --}}
        <div class="flex-1 flex flex-col min-h-screen">

            {{-- TOPBAR --}}
            <header class="h-20 bg-white border-b border-gray-100 px-10 flex items-center justify-between">

                @auth

                    {{-- Sapaan --}}
                    <div>
                        <h2 class="text-xl font-bold text-[#191C1D]">
                            Halo, {{ explode(' ', auth()->user()->name)[0] }} 👋
                        </h2>

                        <p class="text-sm text-gray-500">
                            Semoga harimu produktif.
                        </p>
                    </div>

                    <div class="flex items-center gap-5">

                        {{-- Notifikasi --}}
                        <a href="{{ route('notifikasi.index') }}"
                            class="relative w-12 h-12 rounded-full bg-pink-50 hover:bg-pink-100 transition flex items-center justify-center">

                            <i class="fa-regular fa-bell text-[#AC2471] text-xl"></i>

                            @if(isset($totalNotif) && $totalNotif > 0)
                                <span
                                    class="absolute -top-1 -right-1 min-w-[20px] h-5 px-1 rounded-full bg-red-500 text-white text-[10px] font-bold flex items-center justify-center">
                                    {{ $totalNotif > 99 ? '99+' : $totalNotif }}
                                </span>
                            @endif

                        </a>

                        {{-- Profil --}}
                        <a href="{{ route('pengaturan.index') }}"
                            class="flex items-center gap-3 hover:bg-gray-50 px-3 py-2 rounded-2xl transition">

                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] flex items-center justify-center text-white font-bold text-lg">

                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                            </div>

                            <div class="hidden md:block">

                                <p class="font-semibold text-gray-900">
                                    {{ auth()->user()->name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    Lihat Profil
                                </p>

                            </div>

                        </a>

                    </div>

                @else

                    <div>
                        <h1 class="text-xl font-bold text-[#AC2471]">
                            Orbit Academic
                        </h1>
                    </div>

                    <div class="flex items-center gap-4">

                        <a href="{{ route('login') }}"
                            class="inline-flex items-center gap-2 h-12 px-6 rounded-2xl text-white font-semibold bg-gradient-to-r from-[#FF69B4] to-[#AC2471]">

                            <i class="fa-solid fa-right-to-bracket"></i>
                            Masuk

                        </a>

                        <a href="{{ route('register') }}"
                            class="inline-flex items-center h-12 px-6 rounded-2xl font-semibold border border-pink-200 text-[#AC2471]">

                            Daftar

                        </a>

                    </div>

                @endauth

            </header>

            {{-- HALAMAN --}}
            <main class="flex-1 p-10 bg-[#F6F7FB] overflow-y-auto">
                @yield('content')
            </main>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>