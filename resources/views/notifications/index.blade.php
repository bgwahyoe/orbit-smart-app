@extends('layouts.app')

@section('content')
<div class="p-8 max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#111827]">Notifikasi</h1>
        <p class="text-gray-500">Update terbaru mengenai aktivitas Anda.</p>
    </div>

    <div class="space-y-4">
        @forelse($notifications as $notif)
            <div class="bg-white p-6 rounded-[24px] border border-gray-100 shadow-sm flex items-start gap-4 hover:border-[#4F46E5] transition-all">
                <div class="p-3 bg-[#EEF2FF] rounded-full text-[#4F46E5]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </div>
                
                <div class="flex-1">
                    <h3 class="text-md font-bold text-[#111827]">{{ $notif->judul }}</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ $notif->pesan }}</p>
                    <span class="text-xs text-gray-400 mt-2 block">{{ $notif->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @empty
            <div class="text-center py-20 bg-white rounded-[24px] border border-gray-100">
                <p class="text-gray-400">Belum ada notifikasi baru.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection