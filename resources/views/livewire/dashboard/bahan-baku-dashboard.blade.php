<div class="flex flex-col lg:flex-row gap-6 font-ibm mb-4">
    <!-- Section Filter -->
    <aside class="w-full lg:w-1/4 pt-6 max-sm:p-2 h-min bg-white sm:p-4 rounded-lg shadow-xl mb-4 text-[#222831]">
        <div class="w-full flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Filter</h2>
            <button wire:click="applyFilter"
                class="mt-2 bg-[#222831] text-white font-ibm font-semibold cursor-pointer px-4 py-2 rounded-md text-md">
                Terapkan Filter
            </button>

        </div>

        <!-- Salary Range -->

        <div class="mb-4" wire:ignore x-data="{ openHarga: true }" :class="{ 'shadow': !openHarga }">
            <div class="flex justify-between items-center cursor-pointer p-2" @click="openHarga = !openHarga">
                <p class="font-semibold text-lg">Harga</p>
                <svg :class="{ 'rotate-180': openHarga }"
                    class="w-5 h-5 transform transition-transform duration-200 text-black"
                    fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div class="space-y-2 p-2" x-show="openHarga" x-transition>
                <div class="flex items-center border-2 border-gray-300 rounded overflow-hidden">
                    <span class="bg-gray-100 px-3 py-2 text-sm text-gray-700">Rp</span>
                    <input type="number" placeholder="Harga Minimum" wire:model.defer="hargaMin"
                        class="w-full px-3 py-2 text-sm focus:outline-none">
                </div>

                <div class="flex items-center border-2 border-gray-300 rounded overflow-hidden">
                    <span class="bg-gray-100 px-3 py-2 text-sm text-gray-700">Rp</span>
                    <input type="number" placeholder="Harga Maksimum" wire:model.defer="hargaMax"
                        class="w-full px-3 py-2 text-sm focus:outline-none">
                </div>
            </div>
        </div>

        <!-- City -->
        <div class="mb-4"  :class="{ 'shadow': !openLokasi }" wire:ignore x-data="{ openLokasi: true, showModal: false }" >
           
            <div class="w-full flex justify-between items-center cursor-pointer p-2" @click="openLokasi = !openLokasi">
                <p class="font-semibold text-lg">Lokasi</p>
                <svg :class="{ 'rotate-180': openLokasi }" class="w-5 h-5 transform transition-transform duration-200 text-gray-600"
                    fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <!-- Konten Lokasi yang bisa ditutup -->
            <div class="p-2" x-show="openLokasi" x-transition>
                {{-- Hanya tampilkan 4 kota --}}
                @foreach ($regencies as $regency)
                    <label class="block">
                        <input type="checkbox" class="mr-2" wire:model.defer="selectedRegencies" value="{{ $regency->id }}">
                        {{ $regency->name }}
                    </label>
                @endforeach

                {{-- Tombol buka modal --}}
                <button @click="showModal = true"
                    class="mt-3 flex items-center gap-2 text-[#D98324] font-ibm cursor-pointer font-semibold rounded-md text-md transition duration-200">
                    Lihat Selengkapnya
                </button>
            </div>

            <!-- Modal -->
            <div x-show="showModal" class="fixed inset-0 flex items-center justify-left z-50 px-4 py-12" x-cloak
                x-transition>
                <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative overflow-y-auto max-h-[40vh]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">Daftar Kota</h3>
                        <button @click="showModal = false"
                            class="text-gray-500 hover:text-black text-lg font-bold cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="h-4 w-4 inline-block">
                                <path
                                    d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                            </svg>
                        </button>
                    </div>

                    <div class="space-y-2">
                        @foreach ($allRegencies as $regency)
                            <label class="block">
                                <input type="checkbox" class="mr-2" wire:model.defer="selectedRegencies" value="{{ $regency->id }}">
                                {{ $regency->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Rating -->
        <div class="mb-4" wire:ignore x-data="{ openRating: true }" :class="{ 'shadow': !openRating }">
            <div class="flex justify-between items-center p-2 cursor-pointer" @click="openRating = !openRating">
                <h3 class="font-semibold text-lg">Rating</h3>
                <svg :class="{ 'rotate-180': openRating }"
                    class="w-5 h-5 transform transition-transform duration-200 text-black"
                    fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <div class="p-2" x-show="openRating" x-transition>
                <label class="flex items-center space-x-1">
                    <input type="checkbox" class="mr-2 w-5 h-5" wire:model.defer="filterRating">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-5 w-5 text-yellow-400">
                        <path fill="#FFD43B" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                    </svg>
                    <span>Rating 4 Ke atas</span>
                </label>
            </div>
        </div>

    </aside>

    <!-- Section Produk -->
    <main class="w-full lg:w-3/4">
        <div class="p-6 mb-4 bg-white rounded-lg shadow-xl">
            <h2 class="text-xl font-bold mb-4">Rekomendasi Bahan Baku</h2>
            <!-- Konten produk grid -->
            @if (count($rekomendasiItems) > 0)
               <div class="grid grid-cols-2 md:grid-cols-5 gap-5 font-ibm mb-6 max-sm:grid-cols-1">
                @foreach ($rekomendasiItems as $item)
                    <a href="{{ route('produk.detail', $item['id']) }}" class="block">
                        <div class="box bg-gray-50 rounded-xl shadow-inner p-4 w-64 text-left max-sm:mx-0 mx-auto border-2 border-gray-100 transition hover:shadow-lg">
                            <img src="{{ $item['gambar'] }}" alt="Fermipan" class="w-full h-40 object-contain mb-3 mx-auto">

                            <h3 class="font-semibold text-sm mb-1">{{ $item['nama_bahan'] }}</h3>
                            <p class="text-sm text-gray-600 mb-2">{{ $item['deskripsi'] }}</p>
                            <p class="text-[#3B2F1E] font-bold text-sm mb-1">Rp.
                                {{ number_format($item['harga'], 0, ',', '.') }}
                            </p>

                            <div class="flex items-center text-sm text-gray-500 mb-1">
                                <span class="text-sm text-gray-600 mr-2">4</span>
                                <div class="flex items-center text-yellow-400 mr-2">
                                    @for($i = 0; $i < $item['rating']; $i++)
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
                                        <path fill="url(#half-grad)"
                                            d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 
                                            0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z" />
                                    </svg>
                                </div>
                                <span>200 Terjual</span>
                            </div>

                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1 text-black" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 2C6.686 2 4 4.686 4 8c0 4.418 6 10 6 10s6-5.582 
                                        6-10c0-3.314-2.686-6-6-6zm0 8a2 2 0 110-4 2 2 0 010 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ $item['lokasi'] }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            @else
                <div class="w-full flex justify-center items-center py-10 bg-gray-200 mb-4">
                    <p class="text-gray-500 text-md">Belum ada rekomendasi.</p>
                </div>
            @endif

            @if (count($rekomendasiItems) > 6)
                @if ($limitRekomendasi < 8)
                    <div class="text-left mb-6">
                        <button wire:click="loadMore1"
                            class="bg-[#3B2F1E] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-sm">
                            Tampilkan Lebih Banyak
                        </button>
                    </div>
                @else
                    <div class="text-left mb-6">
                        <button wire:click="showLess1"
                            class="bg-[#3B2F1E] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-sm">
                            Tampilkan Lebih Sedikit
                        </button>
                    </div>
                @endif
            @endif

            <h2 class="text-xl font-bold mb-4">Semua Bahan Baku</h2>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-5 font-ibm mb-6 max-sm:grid-cols-1">
                @foreach ($semuaItems as $item)
                    <a href="{{ route('produk.detail', $item['id']) }}" class="block">
                        <div class="box bg-gray-50 rounded-xl shadow-inner p-4 w-64 text-left max-sm:mx-0 mx-auto border-2 border-gray-100 transition hover:shadow-lg">
                            <img src="{{ $item['gambar'] }}" alt="Fermipan" class="w-full h-40 object-contain mb-3 mx-auto">

                            <h3 class="font-semibold text-sm mb-1">{{ $item['nama_bahan'] }}</h3>
                            <p class="text-sm text-gray-600 mb-2">{{ $item['deskripsi'] }}</p>
                            <p class="text-[#3B2F1E] font-bold text-sm mb-1">Rp.
                                {{ number_format($item['harga'], 0, ',', '.') }}
                            </p>

                            <div class="flex items-center text-sm text-gray-500 mb-1">
                                <span class="text-sm text-gray-600 mr-2">{{ $item['rating'] }}</span>
                                <div class="flex items-center text-yellow-400 mr-2">
                                    @for($i = 1; $i < $item['rating']; $i++)
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z" />
                                        </svg>
                                    @endfor
                                    <svg class="w-4 h-4 fill-current text-yellow-300" viewBox="0 0 20 20">
                                        <defs>
                                            <linearGradient id="half-grad">
                                                <stop offset="50%" stop-color="currentColor" />
                                                <stop offset="50%" stop-color="white" stop-opacity="1" />
                                            </linearGradient>
                                        </defs>
                                        <path fill="url(#half-grad)"
                                            d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z" />
                                    </svg>
                                </div>
                                <span>100 Terjual</span>
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
                    </a>
                @endforeach
            </div>

            @if ($limitSemua < 8)
                <div class="text-left mb-6">
                    <button wire:click="loadMore2"
                        class="bg-[#222831] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-md">Tampilkan
                        Lebih Banyak</button>
                </div>
            @else
                <div class="text-left mb-6">
                    <button wire:click="showLess2"
                        class="bg-[#222831] hover:bg-[#2c2317] cursor-pointer text-white px-4 py-2 font-ibm rounded-md text-md">Tampilkan
                        Lebih
                        Sedikit</button>
                </div>

            @endif
        </div>
    </main>
</div>