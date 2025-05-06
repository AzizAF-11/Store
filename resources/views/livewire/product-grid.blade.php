<section class="bg-gray-50 py-16 px-4 md:px-8">
    <h2 class="text-3xl font-bold text-center mb-4 font-ibm scroll-left">Product</h2>
    <p class="text-center text-gray-600 mb-8 font-ibm scroll-left">
        Temukan berbagai pilihan bahan baku unggulan dan produk UMKM hasil karya pelaku usaha lokal.
    </p>

    {{-- Filter --}}
    <div class="flex justify-center space-x-4 mb-8 scroll-right">
        <button class="bg-[#3B2F1E] text-white px-4 py-1.5 rounded-xl font-ibm">ALL</button>
        <button class="border border-[#3B2F1E] px-4 py-1.5 rounded-xl font-ibm">Product</button>
        <button class="border border-[#3B2F1E] px-4 py-1.5 rounded-xl font-ibm">Bahan Baku</button>
    </div>

    {{-- Product Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto font-ibm">
        @foreach (range(1, 8) as $item)
            <div class="box bg-white rounded-xl shadow-md p-4 w-64 text-left mx-auto border-2 border-gray-100">

                <img src="{{ asset('images/fermipan.png') }}" alt="Fermipan"
                    class="w-full h-40 object-contain mb-3 mx-auto">

                <h3 class="font-semibold text-sm mb-1">Fermipan - Ragi instan (4 x 11 gr)</h3>
                <p class="text-sm text-gray-600 mb-2">instant yeast for baking</p>
                <p class="text-[#3B2F1E] font-bold text-sm mb-1">Rp. 21.000</p>

                <!-- Rating dan jumlah terjual -->
                <div class="flex items-center text-sm text-gray-500 mb-1">
                    <span class="text-sm text-gray-600 mr-2">4.5</span>
                    <div class="flex items-center text-yellow-400 mr-2">
                        @for($i = 0; $i < 4; $i++)
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 
                                            6.562.955-4.756 4.635 1.122 6.545z" />
                            </svg>
                        @endfor
                        <svg class="w-4 h-4 fill-current text-yellow-300" viewBox="0 0 20 20">
                            <defs>
                                <linearGradient id="half-grad">
                                    <stop offset="50%" stop-color="currentColor" />
                                    <stop offset="50%" stop-color="white" stop-opacity="1" />
                                </linearGradient>
                            </defs>
                            <path fill="url(#half-grad)" d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 
                            0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z" />
                        </svg>
                    </div>
                    <span>221 Terjual</span>
                </div>

                <!-- Lokasi -->
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 mr-1 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 2C6.686 2 4 4.686 4 8c0 4.418 6 10 6 10s6-5.582 6-10c0-3.314-2.686-6-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z"
                            clip-rule="evenodd" />
                    </svg>
                    Semarang
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-8 font-ibm">
        <button class="bg-[#3B2F1E] text-white px-6 py-2 rounded-md box-press cursor-pointer">View More</button>
    </div>
</section>