<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan Orbit</title>

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
        /* PENGATURAN WARNA FORMAT KONTRAST TINGGI (DARK MODE FORCE) */
        html.dark body {
            background-color: #121212 !important;
            color: #FFFFFF !important;
        }
        html.dark aside {
            background-color: #1A1A1A !important;
            border-color: #2D2D2D !important;
        }
        html.dark main {
            background-color: #121212 !important;
        }
        html.dark .bg-white {
            background-color: #1A1A1A !important;
            border-color: #2D2D2D !important;
        }
        html.dark input {
            background-color: #262626 !important;
            color: #FFFFFF !important;
            border-color: #404040 !important;
        }
        
        /* Selektor spesifik untuk memaksa teks pembungkus judul tetap putih di mode gelap */
        html.dark h1,
        html.dark h1.text-5xl,
        html.dark h1.text-2xl,
        html.dark h2,
        html.dark p,
        html.dark label,
        html.dark span,
        html.dark .text-gray-500,
        html.dark .text-gray-900,
        html.dark .text-gray-700,
        html.dark .text-gray-800 {
            color: #FFFFFF !important;
        }

        /* Selektor khusus agar class teks bawaan tailwind yang mengunci warna gelap ikut hancur */
        html.dark .text-\[\#1E1E1E\] {
            color: #FFFFFF !important;
        }

        /* Warna khusus penanda utama sistem Orbit */
        html.dark .text-\[\#AC2471\] {
            color: #FF69B4 !important;
        }

        /* Mengatur hover baris preferensi di mode gelap */
        html.dark .preference-row {
            background-color: #262626 !important;
            border-color: #374151 !important;
        }
        html.dark .preference-row:hover {
            background-color: #323232 !important;
        }
        html.dark .border-gray-100 {
            border-color: #2D2D2D !important;
        }
    </style>
</head>

<body class="font-[Poppins] bg-[#F6F7FB] text-[#1E1E1E] dark:bg-[#121212] dark:text-white transition-colors duration-200">

<div class="flex min-h-screen">

    <aside class="w-[280px] bg-white border-r border-gray-100 flex flex-col transition-colors duration-200">

        <div class="px-8 pt-8">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#FF69B4] to-[#AC2471] flex items-center justify-center text-white">
                    ✨
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-[#AC2471]">Orbit</h2>
                    <p class="text-sm font-bold text-gray-500">Manajer Akademik</p>
                </div>
            </div>
        </div>

        <nav class="mt-10 px-5 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold text-gray-800 hover:bg-pink-50">
                <i class="fa-solid fa-table-columns"></i> Dashboard
            </a>
            <a href="{{ route('tugas.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold text-gray-800 hover:bg-pink-50">
                <i class="fa-regular fa-clipboard"></i> Tugas
            </a>
            <a href="{{ route('prioritas.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold text-gray-800 hover:bg-pink-50">
                <i class="fa-solid fa-bolt"></i> Prioritas Pintar
            </a>
            <a href="{{ route('kalender.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold text-gray-800 hover:bg-pink-50">
                <i class="fa-regular fa-calendar"></i> Kalender
            </a>
            <a href="{{ route('rekomendasibelajar.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold text-gray-800 hover:bg-pink-50">
                <i class="fa-solid fa-graduation-cap"></i> Rekomendasi Belajar
            </a>
            <a href="{{ route('notifikasi.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold text-gray-800 hover:bg-pink-50">
                <i class="fa-regular fa-bell"></i> Notifikasi
            </a>
            <a href="{{ route('progres.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold text-gray-800 hover:bg-pink-50">
                <i class="fa-solid fa-chart-column"></i> Progres
            </a>
            <a href="{{ route('pengaturan.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-xl font-bold bg-[#FF69B4] text-white shadow-sm">
                <i class="fa-solid fa-gear"></i> Pengaturan
            </a>
        </nav>

        <div class="mt-auto p-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] text-white py-4 rounded-xl font-bold shadow-md">
                    <i class="fa-solid fa-right-from-bracket mr-2"></i> Keluar
                </button>
            </form>
        </div>

    </aside>

    <main class="flex-1 bg-[#F6F7FB] transition-colors duration-200">

        <div class="h-20 bg-white border-b border-gray-100 px-10 flex items-center justify-between transition-colors duration-200">
            <h1 class="text-2xl font-bold text-[#AC2471]">Pengaturan</h1>
            <div class="flex items-center gap-6">
                <button class="text-[#AC2471] text-xl">
                    <i class="fa-regular fa-bell"></i>
                </button>
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </div>

        <div class="p-10">

            <div>
                <h1 class="text-5xl font-extrabold text-[#1E1E1E]">Pengaturan Akun</h1>
                <p class="text-gray-500 font-bold mt-3 text-xl">Kelola profil, keamanan, dan preferensi aplikasi Orbit.</p>
            </div>

            @if(session('success'))
                <div class="mt-6 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center gap-3 shadow-md">
                    <i class="fa-solid fa-circle-check text-2xl text-emerald-600"></i>
                    <span class="text-lg font-bold text-emerald-800" style="color: #065f46 !important;">{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('pengaturan.update') }}" class="mt-10">
                @csrf

                <div class="bg-white rounded-[24px] p-8 shadow-md transition-colors duration-200">

                    <div class="mb-8">
                        <div class="flex items-center gap-3 mb-6">
                            <i class="fa-solid fa-user text-2xl text-[#AC2471]"></i>
                            <h2 class="text-2xl font-extrabold text-[#AC2471]">Profil</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-gray-900 font-extrabold text-base">Nama</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full mt-2 h-14 px-4 rounded-xl border-2 border-gray-200 font-bold focus:ring-2 focus:ring-[#FF69B4] outline-none">
                            </div>

                            <div>
                                <label class="text-gray-900 font-extrabold text-base">Email</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full mt-2 h-14 px-4 rounded-xl border-2 border-gray-200 font-bold focus:ring-2 focus:ring-[#FF69B4] outline-none">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100 my-8">

                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <i class="fa-solid fa-sliders text-2xl text-[#AC2471]"></i>
                            <h2 class="text-2xl font-extrabold text-[#AC2471]">Preferensi</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-5 rounded-xl bg-gray-50/50 hover:bg-gray-100 cursor-pointer select-none preference-row border border-gray-100 transition-all">
                                <span class="text-gray-900 font-extrabold text-lg">Notifikasi Email</span>
                                <div class="relative flex items-center">
                                    <input type="checkbox" name="notif_email" class="sr-only peer" {{ auth()->user()->notif_email ? 'checked' : '' }}>
                                    <div class="w-7 h-7 border-2 border-gray-400 rounded-lg flex items-center justify-center peer-checked:bg-gradient-to-r peer-checked:from-[#FF69B4] peer-checked:to-[#AC2471] peer-checked:border-transparent transition-all shadow-sm">
                                        <i class="fa-solid fa-check text-white text-sm hidden peer-checked:block"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-5 rounded-xl bg-gray-50/50 hover:bg-gray-100 cursor-pointer select-none preference-row border border-gray-100 transition-all">
                                <span class="text-gray-900 font-extrabold text-lg">Mode Gelap</span>
                                <div class="relative flex items-center">
                                    <input type="checkbox" name="dark_mode" class="sr-only peer" {{ auth()->user()->dark_mode ? 'checked' : '' }}>
                                    <div class="w-7 h-7 border-2 border-gray-400 rounded-lg flex items-center justify-center peer-checked:bg-gradient-to-r peer-checked:from-[#FF69B4] peer-checked:to-[#AC2471] peer-checked:border-transparent transition-all shadow-sm">
                                        <i class="fa-solid fa-check text-white text-sm hidden peer-checked:block"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-5 rounded-xl bg-gray-50/50 hover:bg-gray-100 cursor-pointer select-none preference-row border border-gray-100 transition-all">
                                <span class="text-gray-900 font-extrabold text-lg">Reminder Tugas</span>
                                <div class="relative flex items-center">
                                    <input type="checkbox" name="reminder_tugas" class="sr-only peer" {{ auth()->user()->reminder_tugas ? 'checked' : '' }}>
                                    <div class="w-7 h-7 border-2 border-gray-400 rounded-lg flex items-center justify-center peer-checked:bg-gradient-to-r peer-checked:from-[#FF69B4] peer-checked:to-[#AC2471] peer-checked:border-transparent transition-all shadow-sm">
                                        <i class="fa-solid fa-check text-white text-sm hidden peer-checked:block"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-10">
                        <button type="submit" class="bg-gradient-to-r from-[#FF69B4] to-[#AC2471] hover:from-[#AC2471] hover:to-[#FF69B4] text-white px-10 py-4 rounded-xl font-bold text-lg transition shadow-md hover:shadow-lg">
                            Simpan Perubahan
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </main>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.preference-row');
        const darkModeCheckbox = document.querySelector('input[name="dark_mode"]');
        const htmlElement = document.documentElement;

        function pemicuDarkMode(isChecked) {
            if (isChecked) {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        }

        if (darkModeCheckbox) {
            pemicuDarkMode(darkModeCheckbox.checked);

            darkModeCheckbox.addEventListener('change', function () {
                pemicuDarkMode(this.checked);
            });
        }

        rows.forEach(row => {
            row.addEventListener('click', function (e) {
                const checkbox = this.querySelector('input[type="checkbox"]');
                
                if (e.target !== checkbox) {
                    checkbox.checked = !checkbox.checked;
                    
                    const event = new Event('change', { bubbles: true });
                    checkbox.dispatchEvent(event);
                }
            });
        });
    });
</script>

</body>
</html>