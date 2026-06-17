@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto space-y-8">

        {{-- HEADER --}}
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Preferensi Akun
                </h1>

                <p class="mt-2 text-gray-500 dark:text-gray-400">
                    Kelola profil, keamanan, dan pengalaman aplikasi Anda.
                </p>
            </div>

            <div class="bg-white dark:bg-[#1A1A1A] p-2 rounded-2xl border border-gray-200 dark:border-gray-800 shadow-sm">

                <div class="flex gap-2 text-sm font-semibold">

                    <button class="px-6 py-3 rounded-xl bg-pink-50 dark:bg-pink-500/20 text-[#AC2471]">
                        Profil
                    </button>
                </div>

            </div>

        </div>

        @if(session('success'))
            <div
                class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-300 px-6 py-4 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            {{-- KIRI --}}
            <div class="xl:col-span-2 space-y-6">

                <div class="bg-white border border-gray-200 rounded-[24px] p-8 shadow-sm">

                    {{-- HEADER --}}
                    <div class="flex items-center gap-3 mb-8">

                        <div class="w-12 h-12 rounded-2xl bg-pink-50 dark:bg-pink-500/10 flex items-center justify-center">
                            <i class="fa-regular fa-user text-[#AC2471] text-xl"></i>
                        </div>

                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">
                                Edit Profil
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Perbarui informasi profil Anda.
                            </p>
                        </div>

                    </div>

                    <form method="POST" action="{{ route('pengaturan.update') }}">
                        @csrf

                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- NAMA --}}
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    Nama Lengkap
                                </label>

                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="w-full h-14 px-4 rounded-xl
                                                    bg-gray-50
                                                    border border-gray-200
                                                    text-gray-900">
                            </div>

                            {{-- EMAIL --}}
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-700">
                                    Email
                                </label>

                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full h-14 px-4 rounded-xl
                    bg-gray-50
                    border border-gray-200
                    text-gray-900">
                            </div>

                        </div>

                        {{-- BIO --}}
                        <div class="mt-6">

                            <label class="block mb-2 text-sm font-semibold text-gray-700">
                                Biografi
                            </label>

                            <textarea rows="5" name="bio" placeholder="Ceritakan sedikit tentang diri Anda..." class="w-full p-4 rounded-xl
    bg-gray-50
    border border-gray-200
    text-gray-900
    placeholder:text-gray-400
    focus:ring-2 focus:ring-[#FF69B4]
    focus:border-transparent
    transition-all outline-none resize-none">{{ old('bio', auth()->user()->bio) }}</textarea>

                        </div>

                        {{-- BUTTON --}}
                        <div class="border-t border-gray-200 dark:border-gray-800 mt-8 pt-6 flex justify-end gap-4">

                            <button type="reset"
                                class="px-6 py-3 rounded-xl border border-gray-200
text-gray-600
hover:bg-gray-50">
                                Batal
                            </button>

                            <button type="submit" class="px-8 py-3 rounded-xl
                                                                                               bg-gradient-to-r from-[#FF69B4] to-[#AC2471]
                                                                                               text-white font-semibold
                                                                                               shadow-md hover:shadow-lg
                                                                                               hover:scale-[1.02]
                                                                                               transition-all">
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>



            {{-- KANAN --}}
            <div class="space-y-6">

                {{-- TEMA --}}
                <div class="bg-white border border-gray-200 rounded-[24px] p-6 shadow-sm">

                    <h3 class="font-bold text-lg text-gray-900 mb-5">
                        🎨 Tema Tampilan
                    </h3>

                    <div class="grid grid-cols-2 gap-4">

                        <button id="lightMode" class="theme-btn rounded-2xl p-5 text-center border-2">

                            <div class="w-16 h-12 rounded-xl bg-pink-50 flex items-center justify-center mx-auto mb-3">
                                ☀️
                            </div>

                            <p class="font-semibold">
                                Mode Terang
                            </p>

                        </button>

                        <button id="darkMode" class="theme-btn rounded-2xl p-5 text-center border-2">

                            <div class="w-16 h-12 rounded-xl bg-[#1A1A1A] flex items-center justify-center mx-auto mb-3">
                                🌙
                            </div>

                            <p class="font-semibold">
                                Mode Gelap
                            </p>

                        </button>

                    </div>

                </div>

                {{-- NOTIFIKASI --}}
                <div class="bg-white border border-gray-200 rounded-[24px] p-6 shadow-sm">

                    <h3 class="font-bold text-lg text-gray-900 mb-6">
                        🔔 Pengaturan Notifikasi
                    </h3>

                    <div class="space-y-5">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-900">
                                    Pengingat Tugas
                                </p>

                                <p class="text-sm text-gray-500">
                                    Beritahu saya 24 jam sebelum deadline
                                </p>
                            </div>

                            <input type="checkbox" checked>
                        </div>

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="font-medium text-gray-900">
                                    Perubahan Jadwal
                                </p>

                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Pembaruan kalender akademik
                                </p>
                            </div>

                            <input type="checkbox" checked>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const html = document.documentElement;

            const lightBtn = document.getElementById('lightMode');
            const darkBtn = document.getElementById('darkMode');

            function updateButtons() {

                const isDark = html.classList.contains('dark');

                if (isDark) {

                    darkBtn.classList.add(
                        'border-[#AC2471]',
                        'text-[#AC2471]'
                    );

                    darkBtn.classList.remove(
                        'border-gray-200',
                        'dark:border-gray-700',
                        'text-gray-500'
                    );

                    lightBtn.classList.remove(
                        'border-[#AC2471]',
                        'text-[#AC2471]'
                    );

                    lightBtn.classList.add(
                        'border-gray-200',
                        'dark:border-gray-700',
                        'text-gray-500'
                    );

                } else {

                    lightBtn.classList.add(
                        'border-[#AC2471]',
                        'text-[#AC2471]'
                    );

                    lightBtn.classList.remove(
                        'border-gray-200',
                        'dark:border-gray-700',
                        'text-gray-500'
                    );

                    darkBtn.classList.remove(
                        'border-[#AC2471]',
                        'text-[#AC2471]'
                    );

                    darkBtn.classList.add(
                        'border-gray-200',
                        'dark:border-gray-700',
                        'text-gray-500'
                    );
                }
            }

            lightBtn.addEventListener('click', function () {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                updateButtons();
            });

            darkBtn.addEventListener('click', function () {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                updateButtons();
            });

            updateButtons();
        });
    </script>

@endsection