<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-white/30 backdrop-blur-xl border-b border-pink-200/30 shadow-sm">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="h-20 flex items-center justify-between">

            <!-- Logo -->
            <a href="#" class="text-[#AC2471] text-2xl font-bold flex items-center gap-2">
                <i class="fas fa-satellite-dish"></i>
                Orbit
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center gap-10 text-sm font-semibold">

                <li>
                    <a href="#hero"
                        class="relative text-[#AC2471] hover:text-[#FF69B4] transition-all duration-300 hover:scale-105">
                        <i class="fas fa-home mr-1"></i>
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="#fitur"
                        class="relative text-[#AC2471] hover:text-[#FF69B4] transition-all duration-300 hover:scale-105 hover:drop-shadow-[0_0_10px_rgba(255,105,180,0.6)]">
                        <i class="fas fa-cogs mr-1"></i>
                        Fitur
                    </a>
                </li>

                <li>
                    <a href="#tentang"
                        class="relative text-[#AC2471] hover:text-[#FF69B4] transition-all duration-300 hover:scale-105 hover:drop-shadow-[0_0_10px_rgba(255,105,180,0.6)]">
                        <i class="fas fa-info-circle mr-1"></i>
                        Tentang Kami
                    </a>
                </li>

                <li>
                    <a href="#kontak"
                        class="relative text-[#AC2471] hover:text-[#FF69B4] transition-all duration-300 hover:scale-105 hover:drop-shadow-[0_0_10px_rgba(255,105,180,0.6)]">
                        <i class="fas fa-envelope mr-1"></i>
                        Kontak
                    </a>
                </li>

            </ul>

            <!-- Right Side -->
            <div class="flex items-center gap-3">


                <!-- <button @click="dark=!dark"
                            class="w-10 h-10 rounded-full border border-pink-200 bg-white/50 backdrop-blur-sm flex items-center justify-center text-[#AC2471] hover:bg-pink-50 transition">
                            <i class="fas" :class="dark ? 'fa-sun' : 'fa-moon'"></i>
                        </button> -->

                <!-- Login Button -->
                <a href="{{ route('login') }}"
                    class="hidden md:flex items-center gap-2 bg-gradient-to-r from-[#FF69B4] to-[#AC2471] hover:scale-105 transition-all duration-300 text-white px-5 py-2 rounded-xl shadow-lg shadow-pink-300/30">
                    <i class="fas fa-sign-in-alt"></i>
                    Masuk Akun
                </a>

                <!-- Mobile Button -->
                <button @click="mobile=!mobile" class="lg:hidden text-[#AC2471] text-2xl">
                    <i class="fas fa-bars"></i>
                </button>

            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobile" x-transition class="lg:hidden py-5 bg-white/90 backdrop-blur-lg rounded-b-2xl shadow-lg">

            <div class="flex flex-col gap-4 text-[#AC2471] font-medium">

                <a href="#hero" class="hover:text-[#FF69B4] transition">
                    <i class="fas fa-home mr-2"></i>
                    Beranda
                </a>

                <a href="#fitur" class="hover:text-[#FF69B4] transition">
                    <i class="fas fa-cogs mr-2"></i>
                    Fitur
                </a>

                <a href="#tentang" class="hover:text-[#FF69B4] transition">
                    <i class="fas fa-info-circle mr-2"></i>
                    Tentang Kami
                </a>

                <a href="#kontak" class="hover:text-[#FF69B4] transition">
                    <i class="fas fa-envelope mr-2"></i>
                    Kontak
                </a>

                <a href="{{ route('login') }}"
                    class="mt-2 bg-gradient-to-r from-[#FF69B4] to-[#AC2471] text-white text-center py-2 rounded-xl">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Masuk Akun
                </a>

            </div>
        </div>
    </div>
</nav>