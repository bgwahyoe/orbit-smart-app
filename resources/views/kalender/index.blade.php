@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kalender Aktivitas - Orbit</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
</head>

<body class="font-[Poppins] bg-[#F6F7FB]">

    <div class="flex min-h-screen">

        <!-- CONTENT -->
        <main class="flex-1">

            <!-- BODY -->
            <div class="p-8">

                <div class="mb-6">

                    <h1 class="text-3xl font-extrabold text-[#1F2937]">
                        Kalender Aktivitas
                    </h1>

                    <p class="text-[#6B7280]">
                        Kelola jadwal dan aktivitas Anda di sini.
                    </p>

                </div>

                <div class="bg-white p-6 rounded-[24px] border border-gray-200 shadow-sm">

                    <div id="calendar"></div>

                </div>

            </div>

        </main>

    </div>

    <style>
        .fc .fc-toolbar-title {
            font-family: 'Inter', sans-serif !important;
            font-size: 1.75rem !important;
            font-weight: 800 !important;
            color: #DB2777 !important;
            letter-spacing: -0.025em;
        }

        .fc-col-header-cell-cushion {
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            color: #DB2777 !important;
            text-transform: uppercase;
            padding: 12px 0 !important;
        }

        .fc-daygrid-day:hover .fc-daygrid-day-number {
            background-color: #DB2777 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 6px -1px rgba(219, 39, 119, 0.4);
            border-radius: 9999px;
        }

        .fc-daygrid-day-number {
            font-size: 1rem !important;
            font-weight: 700 !important;
            color: #DB2777 !important;
            padding: 8px !important;
            transition: all 0.2s ease;
        }

        .fc-daygrid-day:hover {
            background-color: #FDF2F8 !important;
            cursor: pointer;
        }

        .fc-theme-standard td,
        .fc-theme-standard th {
            border: 1px solid #F3F4F6 !important;
        }

        .fc-daygrid-day-frame {
            padding: 4px;
        }

        .fc-day-today {
            background-color: #FFF1F2 !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',

                locale: 'id',

                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                buttonText: {
                    today: 'Hari Ini',
                    month: 'Bulan',
                    week: 'Minggu',
                    day: 'Hari'
                },

                height: 'auto',

                events: @json($events)

            });

            calendar.render();

        });
    </script>

</body>

</html>

@endsection