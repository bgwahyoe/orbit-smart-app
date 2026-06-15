<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Tambah Tugas</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body class="bg-[#F6F7FB] font-[Poppins]">

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h1 class="text-3xl font-bold mb-8">

            Tambah Tugas

        </h1>

        <form
            action="{{ route('tugas.store') }}"
            method="POST">

            @csrf

            <div class="space-y-5">

                <div>

                    <label class="block mb-2">
                        Judul Tugas
                    </label>

                    <input
                        type="text"
                        name="judul"
                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2">
                        Mata Kuliah
                    </label>

                    <select
                        name="mata_kuliah_id"
                        class="w-full border rounded-xl px-4 py-3">

                        @foreach($mataKuliah as $mk)

                            <option value="{{ $mk->id }}">
                                {{ $mk->nama }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="w-full border rounded-xl px-4 py-3"></textarea>

                </div>

                <div>

                    <label class="block mb-2">
                        Deadline
                    </label>

                    <input
                        type="date"
                        name="deadline"
                        class="w-full border rounded-xl px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-xl px-4 py-3">

                        <option value="belum">
                            Belum
                        </option>

                        <option value="proses">
                            Proses
                        </option>

                        <option value="selesai">
                            Selesai
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="w-full bg-[#FF69B4] text-white py-4 rounded-xl">

                    Simpan Tugas

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>