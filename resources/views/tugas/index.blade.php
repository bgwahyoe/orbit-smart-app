@extends('layouts.app')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manajemen Tugas - Orbit</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="font-[Poppins] bg-[#F6F7FB]">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-[280px] bg-white border-r border-gray-100 flex flex-col">

            <!-- Logo -->
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

                    <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                    <input type="text" placeholder="Cari tugas..."
                        class="w-[300px] h-12 rounded-2xl border border-pink-200 pl-12">

                </div>

                <div class="flex items-center gap-6">

                    <i class="fa-regular fa-bell text-[#AC2471] text-xl"></i>

                    <div
                        class="w-12 h-12 rounded-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] flex items-center justify-center text-white font-bold">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                </div>

            </div>

            <!-- BODY -->
            <div class="p-10">

                <div class="flex justify-between items-start">

                    <div>

                        <h1 class="text-5xl font-bold text-[#1E1E1E]">
                            Manajemen Tugas
                        </h1>

                        <p class="text-gray-500 mt-3 text-xl">
                            Kelola tenggat waktu mendatang dan pantau kemajuan Anda.
                        </p>

                    </div>

                    <div class="flex flex-col gap-4">

                        <select class="w-[240px] h-14 rounded-2xl border border-pink-200 bg-white px-5">

                            <option>Semua Mata Kuliah</option>

                        </select>

                        <a href="{{ route('tugas.create') }}"
                            class="bg-[#FF69B4] text-white h-14 px-8 rounded-2xl font-semibold flex items-center">

                            <i class="fa-solid fa-plus mr-2"></i>
                            Tambah Tugas

                        </a>

                    </div>

                </div>

                <!-- TABLE -->
                <div class="bg-white rounded-[30px] shadow-sm mt-10 overflow-hidden">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b text-left text-sm text-gray-500">

                                <th class="p-6">NAMA TUGAS</th>
                                <th>MATA KULIAH</th>
                                <th>DEADLINE</th>
                                <th>PRIORITAS</th>
                                <th>STATUS</th>
                                <th>AKSI</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($tugas as $item)

                                <tr class="border-b">

                                    <td class="p-6">

                                        <div class="font-bold">
                                            {{ $item->judul }}
                                        </div>

                                        <div class="text-gray-400">
                                            {{ $item->deskripsi }}
                                        </div>

                                    </td>

                                    <td>

                                        <span class="bg-pink-100 text-[#AC2471] px-4 py-2 rounded-full">

                                            {{ $item->mataKuliah->nama }}

                                        </span>

                                    </td>

                                    <td>

                                        {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}

                                    </td>

                                    <td>

                                        <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm">

                                            Sedang

                                        </span>

                                    </td>

                                    <td>

                                        {{ ucfirst($item->status) }}

                                    </td>

                                    <td>

                                        <div class="flex gap-4 text-[#AC2471]">

                                            <i class="fa-regular fa-eye"></i>

                                            <i class="fa-regular fa-pen-to-square"></i>

                                            <form action="{{ route('tugas.destroy', $item->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button>

                                                    <i class="fa-regular fa-trash-can"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-10 text-gray-400">

                                        Belum ada tugas

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</body>

</html>