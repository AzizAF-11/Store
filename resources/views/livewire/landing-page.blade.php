<div class="bg-[#EEEEEE] min-h-screen text-[#222831] ">

    {{-- Include Navbar Component --}}
    @livewire('navbar')

    {{-- Include Login Modal --}}
    @livewire('auth.login')

    {{-- Include register Modal --}}
    @livewire('auth.register')

    <div class="relative w-full h-screen bg-no-repeat bg-cover bg-center background-clear mt-12"
        style="background-image: url('{{ asset('images/img1.webp') }}')">

        <div class="absolute inset-0 bg-black/50 flex justify-center items-center">

            <div
                class="w-[120vw] h-[25rem] sm:w-[35rem] sm:h-[35rem] bg-[#EEEEEE] rounded-[42%] flex justify-center items-center shadow-lg text-center p-4 overflow-hidden">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/img2.png') }}" alt="Logo FILA" class="w-43 h-43 object-contain">
                    <div class="text-left">
                        <h2 class="text-2xl font-bold text-[#222831] font-rubix grid grid-cols-11 gap-x-1 text-center">
                            <span class="brand-letter">F</span>
                            <span class="brand-letter">I</span>
                            <span class="brand-letter">L</span>
                            <span class="brand-letter">A</span>
                            <span class="brand-letter">&nbsp;</span>
                            <span class="brand-letter">S</span>
                            <span class="brand-letter">T</span>
                            <span class="brand-letter">O</span>
                            <span class="brand-letter">R</span>
                            <span class="brand-letter">E</span>
                        </h2>

                        <p class="mt-2 text-lg font-light text-gray-600 font-ibm">Penyedia bahan baku dan <br> produk
                            UMKM</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Hero Section --}}
    <section id="home" class="relative bg-white text-center py-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold font-ibm scroll-left opacity-0">Welcome to Shop</h1>
            <p class="mt-8 text-gray-700 px-4 md:px-0 leading-relaxed font-ibm scroll-right opacity-0">
                Temukan berbagai pilihan bahan baku unggulan dan produk UMKM hasil karya pelaku usaha lokal. Kami
                berkomitmen mendukung pertumbuhan ekonomi kreatif dengan menghadirkan produk berkualitas dan terpercaya.
            </p>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about"
        class="flex flex-col md:flex-row items-center justify-between gap-10 max-w-6xl mx-auto px-8 py-16">
        <div class="md:w-1/2 scroll-left opacity-0">
            <h2 class="text-2xl font-bold mb-4 font-ibm">About Us</h2>
            <p class="text-gray-700 leading-relaxed mb-4 font-ibm text-justify">
                Kami adalah platform belanja online yang berfokus pada penyediaan bahan baku berkualitas dan produk
                unggulan dari pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) lokal. Dengan semangat mendukung
                pertumbuhan ekonomi daerah dan memperkuat ekosistem UMKM, kami menghadirkan ruang bagi para pelaku usaha
                untuk memasarkan produknya secara lebih luas dan mudah dijangkau.
            </p>
            <a href="{{ url('about') }}">
                <button class="bg-[#393E46] text-white px-6 py-2 rounded font-ibm font-bold box-hover cursor-pointer">
                    Know More
                </button>
            </a>

        </div>
        <div class="md:w-1/2 scroll-right opacity-0 ml-8">
            <img src="{{ asset('images/img-about.png') }}" alt="About" class="w-96">
        </div>
    </section>

    {{-- Include Product Grid Component --}}
    @livewire('product-grid')

</div>