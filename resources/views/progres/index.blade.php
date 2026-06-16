@extends('layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Progres Belajar</h1>
        <p class="text-gray-400 mt-2">Pantau perkembangan akademik dan produktivitas Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-[#1a1a1a] p-6 rounded-2xl border border-gray-800">
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Tugas Selesai</p>
            <h2 class="text-4xl font-extrabold text-white mt-2">12</h2>
        </div>
        <div class="bg-[#1a1a1a] p-6 rounded-2xl border border-gray-800">
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Target Mingguan</p>
            <h2 class="text-4xl font-extrabold text-[#EC4899] mt-2">80%</h2>
        </div>
        <div class="bg-[#1a1a1a] p-6 rounded-2xl border border-gray-800">
            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Produktivitas</p>
            <h2 class="text-4xl font-extrabold text-[#10B981] mt-2">82%</h2>
        </div>
    </div>

    <div class="bg-[#1a1a1a] p-8 rounded-2xl border border-gray-800">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-white">Progress Semester</h3>
            <span class="text-[#EC4899] font-bold">45%</span>
        </div>
        <div class="w-full bg-gray-800 rounded-full h-4 overflow-hidden">
            <div class="bg-gradient-to-r from-[#EC4899] to-pink-600 h-full rounded-full" style="width: 45%"></div>
        </div>
    </div>
</div>
@endsection