<div class="flex flex-col lg:flex-row gap-8 font-ibm">
    <!-- Section Filter -->
    <aside class="w-full lg:w-1/4 pt-6">
        <h2 class="text-xl font-bold mb-4">Filter</h2>

        <!-- Salary Range -->
        <div class="mb-4">
            <h3 class="font-semibold mb-2">Harga</h3>
            <div class="space-y-2">
                <!-- Input Harga Minimum -->
                <div class="flex items-center border-2 border-gray-300 rounded overflow-hidden">
                    <span class="bg-gray-100 px-3 py-2 text-sm text-gray-700">Rp</span>
                    <input type="number" placeholder="Harga Minimum"
                        class="w-full px-3 py-2 text-sm focus:outline-none">
                </div>

                <!-- Input Harga Maksimum -->
                <div class="flex items-center border-2 border-gray-300 rounded overflow-hidden">
                    <span class="bg-gray-100 px-3 py-2 text-sm text-gray-700">Rp</span>
                    <input type="number" placeholder="Harga Maksimum"
                        class="w-full px-3 py-2 text-sm focus:outline-none">
                </div>
            </div>
        </div>

        <!-- Condition 1 -->
        <div class="mb-4">
            <h3 class="font-semibold mb-2">Lokasi</h3>
            <label class="block"><input type="checkbox" checked class="mr-2"> Jakarta</label>
            <label class="block"><input type="checkbox" class="mr-2"> Semarang</label>
            <label class="block"><input type="checkbox" class="mr-2"> Boyolali</label>
        </div>

        <!-- Condition 2 -->
        <div class="mb-4">
            <h3 class="font-semibold mb-2">Condition 2</h3>
            <label class="block"><input type="checkbox" checked class="mr-2"> Checkbox</label>
            <label class="block"><input type="checkbox" class="mr-2"> Checkbox</label>
            <label class="block"><input type="checkbox" class="mr-2"> Checkbox</label>
        </div>

        <!-- Rating -->
        <div class="mb-4">
            <h3 class="font-semibold mb-2">Rating</h3>
            <label class="flex items-center space-x-1 text-yellow-400">
                <input type="checkbox" checked class="mr-2">
                <span>★★★★★</span>
            </label>
            <label class="flex items-center space-x-1 text-yellow-400">
                <input type="checkbox" class="mr-2">
                <span>★★★★☆</span>
            </label>
            <label class="flex items-center space-x-1 text-yellow-400">
                <input type="checkbox" class="mr-2">
                <span>★★★☆☆</span>
            </label>
        </div>
    </aside>

    <!-- Section Produk -->
    <main class="w-full lg:w-3/4">
        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Rekomendasi Bahan Baku</h2>
            <!-- Konten produk grid -->
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 font-ibm mb-6">
                @foreach ($rekomendasiItems as $item)
                    <div class="box bg-white rounded-xl shadow-md p-4 w-64 text-left mx-auto border-2 border-gray-100">
                        <img src="{{ $item['gambar'] }}" alt="Fermipan" class="w-full h-40 object-contain mb-3 mx-auto">

                        <h3 class="font-semibold text-sm mb-1">{{ $item['nama'] }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $item['deskripsi'] }}</p>
                        <p class="text-[#3B2F1E] font-bold text-sm mb-1">Rp.
                            {{ number_format($item['harga'], 0, ',', '.') }}
                        </p>

                        <div class="flex items-center text-sm text-gray-500 mb-1">
                            <span class="text-sm text-gray-600 mr-2">{{ $item['rating'] }}</span>
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
                            <span>{{ $item['terjual'] }} Terjual</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 2C6.686 2 4 4.686 4 8c0 4.418 6 10 6 10s6-5.582 6-10c0-3.314-2.686-6-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $item['lokasi'] }}
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($limitRekomendasi < 8)
                <div class="text-left mb-6">
                    <button wire:click="loadMore1"
                        class="bg-[#3B2F1E] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-sm">Tampilkan
                        Lebih
                        Banyak</button>
                </div>

            @else
                <div class="text-left mb-6">
                    <button wire:click="showLess1"
                        class="bg-[#3B2F1E] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-sm">Tampilkan
                        Lebih
                        Sedikit</button>
                </div>

            @endif

            <h2 class="text-xl font-bold mb-4">Semua Bahan Baku</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 font-ibm mb-6">
                @foreach ($semuaItems as $item)
                    <div class="box bg-white rounded-xl shadow-md p-4 w-64 text-left mx-auto border-2 border-gray-100">
                        <img src="{{ $item['gambar'] }}" alt="Fermipan" class="w-full h-40 object-contain mb-3 mx-auto">

                        <h3 class="font-semibold text-sm mb-1">{{ $item['nama'] }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $item['deskripsi'] }}</p>
                        <p class="text-[#3B2F1E] font-bold text-sm mb-1">Rp.
                            {{ number_format($item['harga'], 0, ',', '.') }}
                        </p>

                        <div class="flex items-center text-sm text-gray-500 mb-1">
                            <span class="text-sm text-gray-600 mr-2">{{ $item['rating'] }}</span>
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
                            <span>{{ $item['terjual'] }} Terjual</span>
                        </div>

                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 2C6.686 2 4 4.686 4 8c0 4.418 6 10 6 10s6-5.582 6-10c0-3.314-2.686-6-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ $item['lokasi'] }}
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($limitSemua < 8)
                <div class="text-left mb-6">
                    <button wire:click="loadMore2"
                        class="bg-[#3B2F1E] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-sm">Tampilkan
                        Lebih Banyak</button>
                </div>
            @else
                <div class="text-left mb-6">
                    <button wire:click="showLess2"
                        class="bg-[#3B2F1E] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-sm">Tampilkan
                        Lebih
                        Sedikit</button>
                </div>

            @endif
        </div>
    </main>
</div>