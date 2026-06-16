<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orbit App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <style>
        /* Mengubah background halaman utama */
        html.dark body,
        html.dark main,
        html.dark .bg-\[\#F6F7FB\] {
            background-color: #121212 !important;
            color: #FFFFFF !important;
        }

        /* Mengubah background sidebar, topbar header, dan semua kotak/card putih di semua menu */
        html.dark aside,
        html.dark header,
        html.dark .bg-white {
            background-color: #1A1A1A !important;
            border-color: #2D2D2D !important;
        }

        /* Menyeragamkan warna semua jenis teks menjadi putih */
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
            color: #FFFFFF !important;
        }

        /* Menyesuaikan warna garis pembatas dan input form */
        html.dark .border-gray-100,
        html.dark .border-gray-200 {
            border-color: #2D2D2D !important;
        }

        html.dark input {
            background-color: #262626 !important;
            color: #FFFFFF !important;
            border-color: #404040 !important;

            /* Mencegah teks di dalam kotak sukses berubah menjadi putih samar */
            html.dark .bg-emerald-50,
            html.dark .bg-emerald-50 * {
                background-color: #ecfdf5 !important;
                color: #065f46 !important;
                border-color: #a7f3d0 !important;
            }
        }
    </style>
</head>

<body
    class="font-[Poppins] bg-[#F6F7FB] text-[#1E1E1E] dark:bg-[#121212] dark:text-white transition-colors duration-200">
    <div class="flex min-h-screen">

        <div class="flex-1 flex flex-col min-h-screen">
            <header
                class="h-20 bg-white border-b border-gray-100 px-10 flex items-center justify-between transition-colors duration-200">
                @auth
                    <div class="relative">

                        <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input type="text" placeholder="Cari tugas..."
                            class="w-[320px] h-12 rounded-2xl border border-pink-200 bg-white pl-12">

                    </div>
                @else
                    <div>
                        <h1 class="text-xl font-bold text-[#AC2471]">
                            Orbit Academic
                        </h1>
                    </div>
                @endauth
                <div class="flex items-center gap-4">

                    @auth

                        <button class="text-[#AC2471] text-xl">
                            <i class="fa-regular fa-bell"></i>
                        </button>

                        <div
                            class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] flex items-center justify-center text-white font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                    @else

                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 h-12 px-6 rounded-2xl text-white font-semibold
                               bg-gradient-to-r from-[#FF69B4] to-[#AC2471]
                               hover:scale-105 transition-all duration-300
                               shadow-lg shadow-pink-200">

                            <i class="fa-solid fa-right-to-bracket"></i>

                            Masuk

                        </a>

                        <a href="{{ route('register') }}" class="inline-flex items-center h-12 px-6 rounded-2xl font-semibold
                               border border-pink-200 text-[#AC2471]
                               hover:bg-pink-50 transition-all duration-300">

                            Daftar

                        </a>

                    @endauth

                </div>
            </header>

            <main class="flex-1 bg-[#F6F7FB] p-10 transition-colors duration-200">
                @yield('content')
            </main>
        </div>

    </div>

</body>

</html>