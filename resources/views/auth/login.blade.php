<x-guest-layout>

<div class="min-h-screen bg-[#F8EFF3] flex items-center justify-center px-6 py-12">

 <!-- #region -->
<div class="w-full max-w-[480px]">

    <!-- Logo -->
    <div class="text-center mb-8">

        <div
            class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-[#FF69B4] to-[#AC2471] flex items-center justify-center shadow-lg shadow-pink-300/30">

            <i class="fas fa-sparkles text-white text-xl"></i>

        </div>

        <h1
            class="mt-4 text-6xl font-extrabold text-[#AC2471]">

            Orbit

        </h1>

        <p
            class="mt-3 text-[#564149] text-lg">

            Alam Semesta Akademik Anda, Terorganisir.

        </p>

    </div>

    <!-- Card Login -->
    <div
        class="bg-white rounded-[32px] p-10 shadow-[0_15px_50px_rgba(0,0,0,0.08)]">

        <h2
            class="text-center text-4xl font-bold text-[#AC2471] mb-8">

            Masuk ke Akun

        </h2>

        <form
            method="POST"
            action="{{ route('login') }}"
            class="space-y-5">

            @csrf

            <!-- Email -->
            <div>

                <label
                    class="block mb-2 text-[#564149] font-medium">

                    Email

                </label>

                <div class="relative">

                    <i
                        class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    </i>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="mahasiswa@universitas.ac.id"
                        class="w-full h-14 bg-[#F8F8F8] border border-transparent rounded-xl pl-12 pr-4 focus:border-[#FF69B4] focus:ring-2 focus:ring-pink-100 transition">

                </div>

                @error('email')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Password -->
            <div>

                <div class="flex justify-between mb-2">

                    <label
                        class="text-[#564149] font-medium">

                        Kata Sandi

                    </label>

                    @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="text-[#AC2471] text-sm font-medium hover:text-[#FF69B4]">

                            Lupa Kata Sandi?

                        </a>
                    @endif

                </div>

                <div class="relative">

                    <i
                        class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                    </i>

                    <input
                        type="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="w-full h-14 bg-[#F8F8F8] border border-transparent rounded-xl pl-12 pr-4 focus:border-[#FF69B4] focus:ring-2 focus:ring-pink-100 transition">

                </div>

                @error('password')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Remember -->
            <label
                class="flex items-center gap-3 text-[#564149]">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-pink-300 text-[#AC2471] focus:ring-[#AC2471]">

                Ingat Saya

            </label>

            <!-- Submit -->
            <button
                type="submit"
                class="w-full h-14 rounded-xl bg-gradient-to-r from-[#FF69B4] to-[#AC2471] text-white text-lg font-semibold shadow-lg shadow-pink-300/30 hover:scale-[1.02] transition-all duration-300">

                Masuk

            </button>

        </form>

        <!-- Divider -->
        <div class="flex items-center my-8">

            <div class="flex-1 border-t border-gray-200"></div>

            <span class="px-4 text-gray-400 text-sm">
                ATAU
            </span>

            <div class="flex-1 border-t border-gray-200"></div>

        </div>

        <!-- Google Login -->
        <button
            type="button"
            class="w-full h-14 border border-gray-200 rounded-xl bg-white hover:bg-gray-50 transition flex items-center justify-center gap-3">

            <img
                src="https://www.svgrepo.com/show/475656/google-color.svg"
                class="w-5 h-5">

            Masuk dengan Google

        </button>

        <!-- Register -->
        <p
            class="text-center mt-8 text-[#564149]">

            Belum punya akun?

            <a
                href="{{ route('register') }}"
                class="font-semibold text-[#AC2471] hover:text-[#FF69B4]">

                Daftar

            </a>

        </p>

    </div>

    <!-- Footer -->
    <div
        class="flex justify-center gap-8 mt-8 text-sm text-[#7A4A54]">

        <div class="flex items-center gap-2">

            <i class="fas fa-shield-alt"></i>

            Akses Aman

        </div>

        <div class="flex items-center gap-2">

            <i class="fas fa-cloud"></i>

            Sinkronisasi Cloud

        </div>

    </div>

</div>


</div>

</x-guest-layout>
