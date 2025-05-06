<nav
    class="fixed top-0 left-0 w-full z-50 bg-[#3B2F1E] text-white flex items-center justify-between px-8 py-4 shadow-md">
    <div class="text-2xl font-rubix">FILA STORE</div>

    <!-- Desktop Menu -->
    <div class="space-x-10 hidden md:flex">
        <a href="{{ url('/') }}"
            class="font-ibm text-lg {{ request()->is('/') ? 'font-bold underline underline-offset-24' : '' }}">
            Home
        </a>
        <a href="{{ url('/about') }}"
            class="font-ibm text-lg {{ request()->is('about') ? 'font-bold underline underline-offset-24' : '' }}">
            About
        </a>
        @auth
            <a href="{{ url('dashboard') }}"
                class="font-ibm text-lg {{ request()->is('dashboard') ? 'font-bold underline underline-offset-24' : '' }}">
                Shop
            </a>
        @endauth
    </div>

    <!-- Desktop Buttons -->
    <div class="space-x-8 hidden md:flex items-center">
        @if (Auth::check() && Auth::user()->role === 'pencari bahan baku')
            <!-- Desktop Icons -->
            <button class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 h-6 fill-current">
                    <path
                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                </svg>
            </button>

            <button class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6 fill-current">
                    <path
                        d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                </svg>
            </button>

            <div x-data="{ open: false }" class="relative">
                <div @click="open = !open" class="flex items-center space-x-2 cursor-pointer">
                    <svg class="w-8 h-8 rounded-full bg-gray-200 p-1" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>{{ Auth::user()->name }}</span>
                </div>

                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-md z-50">
                    <button wire:click="logout"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                        Logout
                    </button>
                </div>
            </div>
        @else
            <!-- Desktop DAFTAR & LOGIN -->
            <button onclick="window.dispatchEvent(new CustomEvent('open-register-modal'))"
                class="font-poetsen box-hover cursor-pointer text-lg tracking-[2px]">DAFTAR</button>
            <button onclick="window.dispatchEvent(new CustomEvent('open-login-modal'))"
                class="font-poetsen box-hover cursor-pointer text-lg tracking-[2px]">LOGIN</button>
        @endif
    </div>

    <!-- Hamburger Icon (Mobile Only) -->
    <div class="md:hidden flex items-center">
        <button id="burger-btn" class="focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
        class="absolute top-[100%] left-0 w-full bg-[#3B2F1E] text-white p-4 space-y-4 mt-0 hidden md:hidden">
        <a href="{{ url('/') }}" class="block text-lg font-ibm">Home</a>
        <a href="#about" class="block text-lg font-ibm">About</a>

        @if (Auth::check() && Auth::user()->role === 'pencari bahan baku')
            <!-- Mobile Icons -->
            <div class="flex space-x-4 items-center">
                <button>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 6h15l-1.68 9H8.34L6 6zm0 0l-2 0"></path>
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                    </svg>
                </button>

                <button>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8a6 6 0 00-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 01-3.46 0"></path>
                    </svg>
                </button>

                <div x-data="{ open: false }" class="relative">
                    <div @click="open = !open" class="flex items-center space-x-2 cursor-pointer">
                        <svg class="w-8 h-8 rounded-full bg-gray-200 p-1" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>{{ Auth::user()->name }}</span>
                    </div>

                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-md z-50">
                        <button wire:click="logout"
                            class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
                            Logout
                        </button>
                    </div>
                </div>

            </div>
        @else
            <button onclick="window.dispatchEvent(new CustomEvent('open-register-modal'))"
                class="block w-full text-left font-poetsen text-lg cursor-pointer">DAFTAR</button>
            <button onclick="window.dispatchEvent(new CustomEvent('open-login-modal'))"
                class="block w-full text-left font-poetsen text-lg cursor-pointer">LOGIN</button>
        @endif
    </div>

</nav>

<script>
    const burgerBtn = document.getElementById('burger-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    burgerBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>