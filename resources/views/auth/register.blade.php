<x-guest-layout>

    <div class="min-h-screen flex items-center mt-20">

        <div class="max-w-[1440px] mx-auto grid lg:grid-cols-2 gap-20 px-10">

            <!-- LEFT -->

            <div>

                <div class="flex items-center gap-3">

                    <span class="text-[#AC2471] text-3xl">
                        ✨
                    </span>

                    <span class="text-[#AC2471] font-bold text-3xl">
                        Orbit
                    </span>

                </div>

                <h1 class="text-[72px] leading-[90%] font-bold mt-12">

                    Mulai Perjalanan
                    Akademik Anda di

                    <span class="text-[#AC2471]">
                        Orbit.
                    </span>

                </h1>

                <p class="text-[#7A4A54] text-xl mt-8 max-w-xl">

                    Kelola jadwal kuliah, tugas,
                    dan kolaborasi dalam satu platform modern.

                </p>

                <img src="{{ asset('images/orang.png') }}" class="rounded-3xl mt-12 shadow-2xl">

            </div>

            <!-- RIGHT -->

            <div>

                <div class="bg-white rounded-[40px] p-12 shadow-xl">

                    <h2 class="text-4xl font-bold">
                        Buat Akun Baru
                    </h2>

                    <p class="mt-3 text-[#7A4A54]">
                        Bergabunglah dengan ribuan mahasiswa lainnya.
                    </p>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5 mt-10">

                       
                        @csrf

                        <!-- Nama -->
                        <div>

                            <label class="block mb-2 text-[#564149] font-medium">
                                Nama Lengkap
                            </label>

                            <input type="text" name="name" value="{{ old('name') }}" required
                                placeholder="Masukkan nama lengkap"
                                class="w-full bg-[#F5F5F5] rounded-xl px-5 py-4 border border-transparent focus:border-[#FF69B4] focus:ring-2 focus:ring-pink-100">

                            @error('name')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- NIM -->
                        <div>

                            <label class="block mb-2 text-[#564149] font-medium">
                                NIM
                            </label>

                            <input type="text" name="nim" value="{{ old('nim') }}" required placeholder="Masukkan NIM"
                                class="w-full bg-[#F5F5F5] rounded-xl px-5 py-4 border border-transparent focus:border-[#FF69B4] focus:ring-2 focus:ring-pink-100">

                            @error('nim')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- Email -->
                        <div>

                            <label class="block mb-2 text-[#564149] font-medium">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="Masukkan email"
                                class="w-full bg-[#F5F5F5] rounded-xl px-5 py-4 border border-transparent focus:border-[#FF69B4] focus:ring-2 focus:ring-pink-100">

                            @error('email')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- Password -->
                        <div>

                            <label class="block mb-2 text-[#564149] font-medium">
                                Password
                            </label>

                            <input type="password" name="password" required placeholder="Masukkan password"
                                class="w-full bg-[#F5F5F5] rounded-xl px-5 py-4 border border-transparent focus:border-[#FF69B4] focus:ring-2 focus:ring-pink-100">

                            @error('password')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        <!-- Konfirmasi Password -->
                        <div>

                            <label class="block mb-2 text-[#564149] font-medium">
                                Konfirmasi Password
                            </label>

                            <input type="password" name="password_confirmation" required placeholder="Ulangi password"
                                class="w-full bg-[#F5F5F5] rounded-xl px-5 py-4 border border-transparent focus:border-[#FF69B4] focus:ring-2 focus:ring-pink-100">

                        </div>

                        <!-- Tombol -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-[#FF69B4] to-[#AC2471] text-white py-4 rounded-xl font-semibold shadow-lg shadow-pink-300/30 hover:scale-[1.02] transition-all duration-300">

                            Buat Akun

                        </button>
                        

                    </form>


                    <p class="text-center mt-8">

                        Sudah punya akun?

                        <a href="{{ route('login') }}" class="text-[#AC2471] font-semibold">

                            Masuk

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>