@extends('layouts.app')

@section('content')
    <!-- Tambahkan Font Awesome CDN di dalam section (tanpa mengubah layout utama) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div x-data="{ mobile:false, dark:false }" :class="{ 'dark': dark }" class="transition-all duration-500">

        <!-- NAVBAR (transparan + modern) -->
        <nav class="sticky top-0 z-50 bg-white/40 dark:bg-black/10 backdrop-blur-xl border-b border-gray-100/20 transition-all duration-300">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="h-20 flex items-center justify-between">
                    <a href="#" class="text-[#AC2471] text-2xl font-bold flex items-center gap-2">
                        <i class="fas fa-satellite-dish"></i> Orbit
                    </a>
                    <ul class="hidden lg:flex items-center gap-10 text-sm font-medium text-[#444749] dark:text-white">
                        <li><a href="#hero" class="text-[#AC2471] hover:opacity-80 transition"><i class="fas fa-home mr-1"></i> Beranda</a></li>
                        <li><a href="#fitur" class="hover:text-[#AC2471] transition"><i class="fas fa-cogs mr-1"></i> Fitur</a></li>
                        <li><a href="#tentang" class="hover:text-[#AC2471] transition"><i class="fas fa-info-circle mr-1"></i> Tentang Kami</a></li>
                        <li><a href="#kontak" class="hover:text-[#AC2471] transition"><i class="fas fa-envelope mr-1"></i> Kontak</a></li>
                    </ul>
                    <div class="flex items-center gap-3">
                        <button @click="dark=!dark" class="w-10 h-10 rounded-full border flex items-center justify-center bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm">
                            <i class="fas" :class="dark ? 'fa-sun' : 'fa-moon'"></i>
                        </button>
                        <a href="#" class="hidden md:flex bg-[#FF69B4] hover:bg-[#AC2471] transition text-white px-5 py-2 rounded-lg text-sm items-center gap-2">
                            <i class="fas fa-sign-in-alt"></i> Masuk Akun
                        </a>
                        <button @click="mobile=!mobile" class="lg:hidden text-2xl">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
                <div x-show="mobile" x-transition class="lg:hidden py-5">
                    <div class="flex flex-col gap-4">
                        <a href="#hero"><i class="fas fa-home mr-2"></i> Beranda</a>
                        <a href="#fitur"><i class="fas fa-cogs mr-2"></i> Fitur</a>
                        <a href="#tentang"><i class="fas fa-info-circle mr-2"></i> Tentang Kami</a>
                        <a href="#kontak"><i class="fas fa-envelope mr-2"></i> Kontak</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- HERO -->
        <section id="hero" class="max-w-[1280px] mx-auto px-6 pt-16 text-center" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 bg-white px-5 py-2 rounded-full border border-[#E1E3E4] text-sm shadow-sm">
                <i class="fas fa-graduation-cap text-[#AC2471]"></i> ✨ Asisten Pembelajaran Cerdas
            </div>
            <h1 class="mt-8 font-bold leading-[95%] text-[54px] md:text-[68px] lg:text-[80px] tracking-[-2px]">
                Manage Your
                <span class="block text-[#AC2471]">
                    Academic Life Smarter
                </span>
            </h1>
            <p class="max-w-[720px] mx-auto mt-8 text-[#7A4A54] leading-relaxed">
                Atur tugas, deadline, organisasi, praktikum, dan aktivitas pribadi
                dalam satu platform yang terintegrasi. Dibangun untuk mahasiswa modern.
            </p>
            <div class="mt-10 flex flex-col md:flex-row gap-4 justify-center">
                <a href="#" class="bg-[#FF69B4] text-white px-8 py-4 rounded-xl hover:scale-105 transition flex items-center gap-2">
                    Mulai Sekarang <i class="fas fa-arrow-right"></i>
                </a>
                <a href="#fitur" class="border border-[#AC2471] text-[#AC2471] px-8 py-4 rounded-xl hover:bg-[#AC2471] hover:text-white transition flex items-center gap-2">
                    Pelajari Lebih Lanjut <i class="fas fa-play"></i>
                </a>
            </div>
        </section>

        <!-- DASHBOARD -->
        <section class="max-w-[1280px] mx-auto px-6 mt-20" data-aos="zoom-in">
            <div class="bg-white rounded-[32px] p-8 shadow-[0_20px_80px_rgba(0,0,0,.08)]">
                <div class="bg-[#FAFAFA] rounded-[24px] p-12">
                    <img src="{{ asset('images/dashboard-preview.png') }}" alt="Dashboard" class="max-w-[650px] mx-auto rounded-2xl shadow-2xl">
                </div>
            </div>
        </section>

        <!-- FEATURES -->
        <section id="fitur" class="max-w-[1280px] mx-auto px-6 py-32">
            <div class="text-center">
                <h2 class="text-4xl lg:text-5xl font-bold">
                    Segalanya yang Anda butuhkan untuk
                    <span class="text-[#AC2471]">
                        berkembang
                    </span>
                </h2>
                <p class="mt-4 text-[#7A4A54]">
                    Dirancang untuk keunggulan akademik dan kesejahteraan mental.
                </p>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-16">
                <!-- PRIORITAS -->
                <div class="col-span-12 lg:col-span-8 bg-white rounded-[28px] p-8 border border-[#F3F3F3] hover:-translate-y-2 transition">
                    <div class="w-12 h-12 rounded-full bg-[#FFD8E6] flex items-center justify-center text-xl">
                        <i class="fas fa-brain text-[#AC2471]"></i>
                    </div>
                    <h3 class="font-bold text-2xl mt-5">
                        Sistem Prioritas Pintar
                    </h3>
                    <p class="mt-3 text-[#7A4A54]">
                        Mesin berbasis AI menganalisis beban kerja, tingkat kesulitan,
                        dan tenggat waktu untuk menyarankan prioritas tugas.
                    </p>
                    <div class="mt-10">
                        <div class="flex justify-between text-xs mb-2">
                            <span>Level Fokus</span>
                            <span>75%</span>
                        </div>
                        <div class="bg-[#E1E3E4] h-3 rounded-full">
                            <div class="w-[75%] h-full bg-[#FF69B4] rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- MANAJEMEN -->
                <div class="col-span-12 lg:col-span-4 bg-white rounded-[28px] p-8 border border-[#F3F3F3] hover:-translate-y-2 transition">
                    <div class="w-12 h-12 rounded-full bg-[#FFD8E6] flex items-center justify-center text-xl">
                        <i class="fas fa-tasks text-[#AC2471]"></i>
                    </div>
                    <h3 class="font-bold text-2xl mt-5">
                        Manajemen Tugas
                    </h3>
                    <p class="mt-3 text-[#7A4A54]">
                        Pantau progres, lampirkan materi, dan kelola deadline.
                    </p>
                </div>

                <!-- KALENDER -->
                <div class="col-span-12 lg:col-span-3 bg-white rounded-[28px] p-8 border border-[#F3F3F3] hover:-translate-y-2 transition">
                    <div class="w-12 h-12 rounded-full bg-[#FFD8E6] flex items-center justify-center text-xl">
                        <i class="fas fa-calendar-alt text-[#AC2471]"></i>
                    </div>
                    <h3 class="font-bold text-xl mt-5">
                        Kalender Aktivitas
                    </h3>
                    <p class="mt-3 text-[#7A4A54]">
                        Sinkronisasi jadwal kuliah dan aktivitas pribadi.
                    </p>
                </div>

                <!-- NOTIFIKASI -->
                <div class="col-span-12 lg:col-span-3 bg-[#FFF4F8] rounded-[28px] p-8 border border-[#F3F3F3] hover:-translate-y-2 transition">
                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-xl">
                        <i class="fas fa-bell text-[#AC2471]"></i>
                    </div>
                    <h3 class="font-bold text-xl mt-5">
                        Notifikasi Pintar
                    </h3>
                    <div class="space-y-3 mt-8">
                        <div class="bg-white rounded-xl p-4">
                            <div class="font-medium">Sesi KRS Mendalam</div>
                            <div class="text-xs text-gray-400">Mulai dalam 1 menit</div>
                        </div>
                        <div class="bg-white rounded-xl p-4">
                            <div class="font-medium">Draft Segera Kumpul</div>
                            <div class="text-xs text-gray-400">Besok, 08.00</div>
                        </div>
                    </div>
                </div>

                <!-- PRODUKTIVITAS -->
                <div class="col-span-12 lg:col-span-3 bg-white rounded-[28px] p-8 border border-[#F3F3F3] hover:-translate-y-2 transition">
                    <div class="w-12 h-12 rounded-full bg-[#FFD8E6] flex items-center justify-center text-xl">
                        <i class="fas fa-chart-line text-[#AC2471]"></i>
                    </div>
                    <h3 class="font-bold text-xl mt-5">
                        Pelacakan Produktivitas
                    </h3>
                    <p class="mt-3 text-[#7A4A54]">
                        Visualisasi perkembangan akademik secara real-time.
                    </p>
                </div>

                <!-- REKOMENDASI -->
                <div class="col-span-12 lg:col-span-6 bg-white rounded-[28px] p-8 border border-[#F3F3F3] hover:-translate-y-2 transition">
                    <div class="grid md:grid-cols-2 gap-6 items-center">
                        <div>
                            <div class="w-12 h-12 rounded-full bg-[#FFD8E6] flex items-center justify-center text-xl mb-4">
                                <i class="fas fa-clock text-[#AC2471]"></i>
                            </div>
                            <h3 class="font-bold text-2xl">
                                Rekomendasi Waktu Belajar
                            </h3>
                            <p class="mt-3 text-[#7A4A54]">
                                Teknik belajar yang dipersonalisasi berdasarkan gaya belajar unik Anda.
                            </p>
                        </div>
                        <img src="{{ asset('images/study-room.png') }}" class="rounded-xl">
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="bg-[#F8EDF2] py-32">
            <div class="max-w-[1280px] mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-5xl font-bold leading-tight">
                            Siap Mengelola
                            Kehidupan Akademik Anda?
                        </h2>
                        <p class="mt-5 text-[#7A4A54]">
                            Tingkatkan produktivitas dan capai target akademik Anda bersama Orbit.
                        </p>
                        <a href="#" class="inline-flex mt-8 bg-[#AC2471] text-white px-8 py-4 rounded-xl items-center gap-2">
                            Mulai Gratis Sekarang <i class="fas fa-rocket"></i>
                        </a>
                    </div>
                    <div>
                        <img src="{{ asset('images/rocket.png') }}" class="max-w-[400px] mx-auto">
                    </div>
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="bg-white py-10">
            <div class="max-w-[1280px] mx-auto px-6 flex flex-col lg:flex-row justify-between">
                <div>
                    <h3 class="font-bold text-[#AC2471] flex items-center gap-2">
                        <i class="fas fa-satellite-dish"></i> Orbit Academic
                    </h3>
                    <p class="text-sm mt-2 text-[#7A4A54]">
                        © 2024 Orbit Academic. Hak cipta dilindungi undang-undang.
                    </p>
                </div>
                <div class="flex gap-8 mt-5 lg:mt-0 text-sm">
                    <a href="#" class="hover:text-[#AC2471]"><i class="fas fa-lock mr-1"></i> Kebijakan Privasi</a>
                    <a href="#" class="hover:text-[#AC2471]"><i class="fas fa-file-contract mr-1"></i> Ketentuan Layanan</a>
                    <a href="#" class="hover:text-[#AC2471]"><i class="fas fa-life-ring mr-1"></i> Pusat Bantuan</a>
                    <a href="#" class="hover:text-[#AC2471]"><i class="fas fa-envelope mr-1"></i> Kontak</a>
                </div>
            </div>
        </footer>
    </div>
@endsection