<div class="space-y-6">

    <div>
        <p class="text-sm text-gray-500">Judul Tugas</p>

        <h2 class="text-2xl font-bold text-gray-900">
            {{ $tugas->judul }}
        </h2>
    </div>

    <div>
        <p class="text-sm text-gray-500">Mata Kuliah</p>

        <p class="font-semibold text-gray-900">
            {{ $tugas->mataKuliah->nama }}
        </p>
    </div>

    <div>
        <p class="text-sm text-gray-500">Deskripsi</p>

        <p class="text-gray-700 leading-relaxed">
            {{ $tugas->deskripsi ?: '-' }}
        </p>
    </div>

    <div>
        <p class="text-sm text-gray-500">Deadline</p>

        <p class="font-semibold text-gray-900">
            {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y') }}
        </p>
    </div>

    <div>
        <p class="text-sm text-gray-500">Status</p>

        <span class="inline-flex px-4 py-2 rounded-full bg-pink-100 text-[#AC2471] font-medium">
            {{ ucfirst($tugas->status) }}
        </span>
    </div>

</div>