@extends('layouts.app')

@section('content')
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

        <!-- CONTENT -->
        <main class="flex-1">

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

@endsection