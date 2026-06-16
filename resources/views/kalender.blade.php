@extends('layouts.app')

@section('content')
<div class="p-8">
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-[#1F2937]">Kalender Aktivitas</h1>
        <p class="text-[#6B7280]">Kelola jadwal dan aktivitas Anda di sini.</p>
    </div>

    <div class="bg-white p-6 rounded-[24px] border border-gray-200 shadow-sm">
        <div id="calendar"></div>
    </div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<style>
    /* 1. Tipografi Bulan dan Tahun */
    .fc .fc-toolbar-title { 
        font-family: 'Inter', sans-serif !important;
        font-size: 1.75rem !important; 
        font-weight: 800 !important; 
        color: #DB2777 !important; 
        letter-spacing: -0.025em;
    }

    /* 2. Styling Header Hari (Sun, Mon, Tue) */
    .fc-col-header-cell-cushion { 
        font-size: 0.875rem !important;
        font-weight: 600 !important;
        color: #DB2777 !important; 
        text-transform: uppercase;
        padding: 12px 0 !important;
    }

    /* 3. Efek saat angka tanggal di-hover */
    .fc-daygrid-day:hover .fc-daygrid-day-number {
        background-color: #DB2777 !important; /* Warna pink Orbit */
        color: #ffffff !important; /* Warna teks jadi putih */
        box-shadow: 0 4px 6px -1px rgba(219, 39, 119, 0.4);
    }

    /* 4. Styling Angka Tanggal */
    .fc-daygrid-day-number { 
        font-size: 1rem !important;
        font-weight: 700 !important;
        color: #DB2777 !important;
        padding: 8px !important;
        transition: all 0.2s ease;
    }

    /* 5. Efek Hover pada Tanggal */
    .fc-daygrid-day:hover {
        background-color: #FDF2F8 !important; /* Pink sangat muda saat di-hover */
        cursor: pointer;
    }

    /* 6. Merapikan Tabel (Grid) */
    .fc-theme-standard td, .fc-theme-standard th {
        border: 1px solid #F3F4F6 !important; /* Border sangat halus */
    }

    /* 7. Membuat Sudut Hari (Cell) membulat */
    .fc-daygrid-day-frame {
        padding: 4px;
    }

    /* 8. Fokus pada hari ini (Today) */
    .fc-day-today {
        background-color: #FFF1F2 !important; /* Highlight halus untuk hari ini */
    }
</style>
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: { 
        left: 'prev,next today', 
        center: 'title', 
        right: 'dayGridMonth,timeGridWeek,timeGridDay' // Menambahkan opsi tampilan
      },
      // Menambahkan konfigurasi agar tombol bisa merespon
      views: {
        dayGridMonth: { buttonText: 'month' },
        timeGridWeek: { buttonText: 'week' },
        timeGridDay: { buttonText: 'day' }
      },
      height: 'auto',
      events: @json($events->map(fn($e) => ['title' => $e->title, 'start' => $e->start_date]))
    });
    calendar.render();
  });
</script>
@endsection