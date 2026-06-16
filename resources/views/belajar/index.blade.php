@extends('layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#111827]">Daftar Rekomendasi Belajar</h1>
        <p class="text-gray-500 mt-2">Materi pilihan untuk meningkatkan produktivitas Anda hari ini.</p>
    </div>
    
    @if($rekomendasi->isEmpty())
        <div class="text-center py-20 border border-gray-800 rounded-2xl bg-[#1a1a1a]">
            <p class="text-gray-400">Belum ada rekomendasi belajar tersedia.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($rekomendasi as $item)
                <div class="bg-[#1a1a1a] p-6 rounded-2xl border border-gray-800">
                    <h3 class="text-lg font-bold text-white">{{ $item->judul }}</h3>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection