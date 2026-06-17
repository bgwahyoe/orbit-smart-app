<form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="space-y-5">

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Judul Tugas
            </label>

            <input
                type="text"
                name="judul"
                value="{{ old('judul', $tugas->judul) }}"
                required
                class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Mata Kuliah
            </label>

            <select
                name="mata_kuliah_id"
                required
                class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                @foreach($mataKuliah as $mk)

                    <option
                        value="{{ $mk->id }}"
                        {{ $mk->id == $tugas->mata_kuliah_id ? 'selected' : '' }}>

                        {{ $mk->nama }}

                    </option>

                @endforeach

            </select>
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Deskripsi
            </label>

            <textarea
                name="deskripsi"
                rows="4"
                class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Deadline
            </label>

            <input
                type="date"
                name="deadline"
                value="{{ \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d') }}"
                required
                class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>

        <div>
            <label class="block mb-2 font-medium text-gray-700">
                Status
            </label>

            <select
                name="status"
                class="w-full border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-400">

                <option value="belum" {{ $tugas->status == 'belum' ? 'selected' : '' }}>
                    Belum
                </option>

                <option value="proses" {{ $tugas->status == 'proses' ? 'selected' : '' }}>
                    Proses
                </option>

                <option value="selesai" {{ $tugas->status == 'selesai' ? 'selected' : '' }}>
                    Selesai
                </option>

            </select>
        </div>

        <button
            type="submit"
            class="w-full h-14 rounded-2xl bg-gradient-to-r from-[#FF69B4] to-[#AC2471] text-white font-semibold">

            Simpan Perubahan

        </button>

    </div>
</form>