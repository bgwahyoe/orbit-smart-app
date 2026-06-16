@extends('layouts.app')

@extends('layouts.app')

<style>
    /* Styling tombol "Mulai Belajar" agar senada */
    .bg-[#4F46E5] { background-color: #4F46E5; }
    .text-[#4F46E5] { color: #4F46E5; }
    
    /* Efek kartu yang modern */
    .rounded-[24px] { border-radius: 24px; }
    .border-gray-100 { border-color: #F3F4F6; }
</style>

@section('content')
    <div class="p-8">
        </div>
@endsection

@section('content')
<div class="p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#1F2937]">Rekomendasi Belajar</h1>
        <p class="text-[#6B7280]">Materi pilihan yang disesuaikan dengan progres Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($rekomendasi as $item)
        <div class="bg-white p-6 rounded-[24px] border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="text-[#4F46E5] mb-4">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <h3 class="text-lg font-bold text-[#1F2937] mb-2">{{ $item->judul }}</h3>
            <p class="text-[#6B7280] text-sm mb-6">{{ $item->deskripsi }}</p>
            
            <a href="{{ $item->link }}" class="inline-block w-full text-center bg-[#F3F4F6] text-[#4F46E5] font-semibold py-3 rounded-xl hover:bg-[#4F46E5] hover:text-white transition-all">
                Mulai Belajar
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection