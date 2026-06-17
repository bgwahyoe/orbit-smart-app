@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h1 class="text-3xl font-extrabold text-[#1F2937]">
            Notifikasi
        </h1>

        <p class="text-[#6B7280]">
            Update terbaru mengenai aktivitas Anda.
        </p>
    </div>

    {{-- LIST NOTIFIKASI --}}
    <div class="space-y-4">

        @forelse($notifications as $notif)

            <div
                class="bg-white p-6 rounded-[24px] border border-gray-200 shadow-sm
                flex items-start gap-4 hover:border-pink-300 hover:shadow-md
                transition-all duration-200">

                {{-- ICON --}}
                <div class="shrink-0 p-3 bg-pink-100 rounded-2xl text-[#AC2471]">

                    <svg class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />

                    </svg>

                </div>

                {{-- CONTENT --}}
                <div class="flex-1 min-w-0">

                    <div class="flex items-start justify-between gap-4">

                        <div>

                            <h3 class="text-lg font-bold text-gray-900">
                                {{ $notif->judul }}
                            </h3>

                            <p class="text-gray-600 mt-2 leading-relaxed">
                                {{ $notif->pesan }}
                            </p>

                        </div>

                        <span class="text-xs text-gray-400 whitespace-nowrap">
                            {{ $notif->created_at->diffForHumans() }}
                        </span>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-[24px] border border-gray-200 p-12 text-center shadow-sm">

                <div class="w-16 h-16 mx-auto rounded-full bg-pink-100 flex items-center justify-center text-[#AC2471]">

                    <i class="fa-regular fa-bell text-2xl"></i>

                </div>

                <h3 class="text-xl font-bold text-gray-900 mt-5">
                    Belum ada notifikasi
                </h3>

                <p class="text-gray-500 mt-2">
                    Semua pembaruan akan muncul di sini.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection