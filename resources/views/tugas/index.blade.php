@extends('layouts.app')

@section('content')

<div class="space-y-8">

    {{-- ALERT --}}
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

        <div>
            <h1 class="text-4xl font-extrabold text-gray-900">
                Manajemen Tugas
            </h1>

            <p class="text-gray-500 mt-2 text-lg">
                Kelola tenggat waktu mendatang dan pantau kemajuan Anda.
            </p>
        </div>

        <button
            onclick="openModal('{{ route('tugas.create') }}')"
            class="inline-flex items-center justify-center gap-3 h-14 px-8 rounded-2xl
                   bg-gradient-to-r from-[#FF69B4] to-[#AC2471]
                   text-white font-semibold shadow-md hover:shadow-lg
                   hover:scale-[1.02] transition-all duration-300">

            <i class="fa-solid fa-plus"></i>
            Tambah Tugas

        </button>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-gray-50 border-b border-gray-100 text-left text-xs font-bold tracking-wider text-gray-500 uppercase">

                        <th class="px-8 py-5">Nama Tugas</th>
                        <th class="px-6 py-5">Mata Kuliah</th>
                        <th class="px-6 py-5">Deadline</th>
                        <th class="px-6 py-5">Prioritas</th>
                        <th class="px-6 py-5">Status</th>
                        <th class="px-6 py-5 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($tugas as $item)

                        <tr class="border-b border-gray-100 hover:bg-pink-50/30 transition-colors duration-200">

                            {{-- NAMA TUGAS --}}
                            <td class="px-8 py-6">

                                <div class="font-bold text-gray-900">
                                    {{ $item->judul }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1 line-clamp-1">
                                    {{ $item->deskripsi }}
                                </div>

                            </td>

                            {{-- MATA KULIAH --}}
                            <td class="px-6 py-6">

                                <span class="inline-flex items-center px-4 py-2 rounded-full
                                             bg-pink-100 text-[#AC2471] text-sm font-medium">

                                    {{ $item->mataKuliah->nama }}

                                </span>

                            </td>

                            {{-- DEADLINE --}}
                            <td class="px-6 py-6 text-gray-700">

                                <div class="flex items-center gap-2">

                                    <i class="fa-regular fa-calendar text-gray-400"></i>

                                    {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d M Y') }}

                                </div>

                            </td>

                            {{-- PRIORITAS --}}
                            <td class="px-6 py-6">

                                <span class="inline-flex items-center px-3 py-1 rounded-full
                                             bg-yellow-100 text-yellow-700 text-sm font-medium">

                                    Sedang

                                </span>

                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-6">

                                @php
                                    $statusColor = match($item->status) {
                                        'selesai' => 'bg-emerald-100 text-emerald-700',
                                        'proses' => 'bg-blue-100 text-blue-700',
                                        default => 'bg-gray-100 text-gray-700'
                                    };
                                @endphp

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }}">

                                    {{ ucfirst($item->status) }}

                                </span>

                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-6">

                                <div class="flex items-center justify-center gap-4 text-[#AC2471]">

                                    <button
                                        onclick="openModal('{{ route('tugas.show', $item->id) }}')"
                                        class="hover:text-blue-500 transition">

                                        <i class="fa-regular fa-eye"></i>

                                    </button>

                                    <button
                                        onclick="openModal('{{ route('tugas.edit', $item->id) }}')"
                                        class="hover:text-amber-500 transition">

                                        <i class="fa-regular fa-pen-to-square"></i>

                                    </button>

                                    <form
    action="{{ route('tugas.destroy', $item->id) }}"
    method="POST"
    class="delete-form">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="hover:text-red-500 transition">

        <i class="fa-regular fa-trash-can"></i>

    </button>

</form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="py-20">

                                <div class="flex flex-col items-center justify-center">

                                    <div class="w-20 h-20 rounded-full bg-pink-100 flex items-center justify-center">

                                        <i class="fa-regular fa-folder-open text-3xl text-[#AC2471]"></i>

                                    </div>

                                    <h3 class="mt-5 text-xl font-bold text-gray-900">
                                        Belum ada tugas
                                    </h3>

                                    <p class="mt-2 text-gray-500">
                                        Tambahkan tugas pertama Anda untuk mulai lebih produktif.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- MODAL --}}
<div
    id="taskModal"
    class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">

    <div class="bg-white rounded-3xl w-full max-w-3xl max-h-[90vh] overflow-y-auto shadow-2xl">

        <div class="flex items-center justify-between p-6 border-b border-gray-200">

            <h3 class="text-xl font-bold text-gray-900">
                Manajemen Tugas
            </h3>

            <button
                onclick="closeModal()"
                class="text-gray-400 hover:text-gray-700">

                <i class="fa-solid fa-xmark text-xl"></i>

            </button>

        </div>

        <div id="modalContent" class="p-6"></div>

    </div>

</div>

<script>
    async function openModal(url) {

        const modal = document.getElementById('taskModal');
        const content = document.getElementById('modalContent');

        modal.classList.remove('hidden');

        content.innerHTML = `
            <div class="flex flex-col items-center justify-center py-10">
                <i class="fa-solid fa-spinner fa-spin text-2xl text-[#AC2471]"></i>
                <p class="mt-3 text-gray-500">Memuat...</p>
            </div>
        `;

        try {

            const response = await fetch(url);

            if (!response.ok) {
                throw new Error('Gagal memuat halaman');
            }

            const html = await response.text();

            content.innerHTML = html;

        } catch (error) {

            console.error(error);

            content.innerHTML = `
                <div class="text-center py-10 text-red-500">
                    Gagal memuat data.
                </div>
            `;
        }
    }

    function closeModal() {

        document.getElementById('taskModal').classList.add('hidden');
        document.getElementById('modalContent').innerHTML = '';
    }

    document.getElementById('taskModal').addEventListener('click', function(e) {

        if (e.target === this) {
            closeModal();
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.delete-form').forEach(form => {

        form.addEventListener('submit', function(e) {

            e.preventDefault();

            Swal.fire({
                title: 'Hapus tugas?',
                text: 'Data yang dihapus tidak dapat dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#AC2471',
                cancelButtonColor: '#9CA3AF',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });

    });

});
</script>



@endsection
