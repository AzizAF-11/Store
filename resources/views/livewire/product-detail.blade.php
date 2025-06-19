<div class="pt-24 bg-[#EEEEEE]">
    @if (session()->has('success'))
        <div x-cloak x-data="{ show: true }" x-show="show" x-transition
            class="fixed top-5 right-5 bg-white border border-gray-200 shadow-lg font-ibm rounded-lg p-4 max-w-xl w-full z-222">

            <div class="flex justify-between items-start">
                <h2 class="text-xl font-semibold text-green-600">Berhasil Ditambahkan</h2>
                <button @click="show = false" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 384 512">
                        <path
                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                </button>
            </div>

            <div class="mt-3 rounded-lg bg-gray-50 flex items-center justify-between p-3 shadow-inner">
                <div class="flex items-center gap-3">
                    <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" alt="Produk"
                        class="w-14 h-14 rounded object-cover border border-gray-300" />
                    <span class="text-gray-800 text-sm font-medium line-clamp-2 max-w-xs">
                        {{ session('product_name') }}
                    </span>
                </div>

                <a href="{{ url('keranjang') }}"
                    class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-2 px-4 rounded whitespace-nowrap ml-4">
                    Lihat Keranjang
                </a>
            </div>
        </div>

    @endif


    @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    @livewire('navbar')
    <div class="mx-auto flex max-w-7xl gap-6 mb-4">
        <div class="mx-auto max-w-4xl grid grid-cols-1 md:grid-cols-1 gap-8 font-ibm">
            <div class="flex gap-4 border border-gray-300 rounded-xl p-4">
                <div class="w-1/3">
                    <img src="{{ asset('images/fermipan.png') }}" alt="{{ $produk->nama_bahan }}" class="">
                </div>

                <div>
                    <h1 class="text-2xl font-bold mb-2">{{ $produk->nama_bahan }}</h1>
                    <div class="flex items-center gap-3">
                        <div class="text-gray-500 text-sm/[15px] mb-1"><span class="font-semibold text-md">Terjual
                            </span>
                            {{ $produk->terjual ?? '250+' }}+</div>
                        <div class="text-gray-500 text-sm/[15px] mb-1">
                            <span aria-hidden="true"> • </span>
                            <svg class="unf-icon" viewBox="0 0 24 24" width="16" height="16"
                                fill="var(--YN300, #FFD45F)" aria-hidden="true"
                                style="display: inline-block; vertical-align: middle;">
                                <path
                                    d="M21.57 9.14a2.37 2.37 0 0 0-1.93-1.63L15.9 7l-1.68-3.4a2.38 2.38 0 0 0-4.27 0L8.27 7l-3.75.54a2.39 2.39 0 0 0-1.32 4.04l2.71 2.64L5.27 18a2.38 2.38 0 0 0 2.35 2.79 2.42 2.42 0 0 0 1.11-.27l3.35-1.76 3.35 1.76a2.41 2.41 0 0 0 2.57-.23 2.369 2.369 0 0 0 .89-2.29l-.64-3.73L21 11.58a2.38 2.38 0 0 0 .57-2.44Z">
                                </path>
                            </svg>
                            {{ $produk->rating->average_rating ?? '0' }}
                            ( {{ $produk->rating->total_rating ?? '0' }} rating )
                        </div>
                    </div>
                    <div class="flex items-center gap-2 py-5">
                        <span class="text-3xl text-[#00ADB5] font-semibold">Rp
                            {{ number_format($produk->harga) }}</span>
                    </div>

                    <div class="flex flex-col text-md/[15px] gap-2 mb-4">
                        <span><strong>Kondisi :</strong> Baru</span>
                        <span><strong>Min. Pemesanan :</strong> 1 Buah</span>
                        <span><strong>Etalase :</strong> Semua Etalase</span>
                    </div>

                    <p class="text-gray-700 mb-6">
                        {{ $produk->deskripsi }}
                    </p>

                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3 border px-3 py-2 w-full border-gray-300 rounded-lg">
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 512" fill="currentColor">
                                    <path
                                        d="M36.8 192h566.3c20.3 0 36.8-16.5 36.8-36.8 0-7.3-2.2-14.4-6.2-20.4L558.2 21.4C549.3 8 534.4 0 518.3 0H121.7c-16 0-31 8-39.9 21.4L6.2 134.7C2.2 140.8 0 147.9 0 155.2 0 175.5 16.5 192 36.8 192zM64 224v240c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V224h-64v160H128V224H64zm448 0v256c0 17.7 14.3 32 32 32s32-14.3 32-32V224h-64z" />
                                </svg>
                            </div>
                            <div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-green-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span
                                        class="font-bold text-base">{{ $produk->penyedia->nama_toko ?? 'unknow' }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 mt-0.5">
                                    <svg class="w-4 h-4 text-gray-500 mr-1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512" fill="currentColor">
                                        <path
                                            d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                    </svg>
                                    <span>{{ $produk->penyedia->regency->name ?? 'unknow' }}</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="justify-center items-center font-ibm">
                <h3 class="font-bold text-lg mb-4 uppercase">Ulasan Pembeli</h3>

                <div class="flex items-start gap-4 border p-4 rounded-lg border-gray-300">
                    <div class="flex-shrink-0 text-left">
                        <div class="flex items-start justify-star gap-2 text-yellow-500 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="currentColor"
                                viewBox="0 0 576 512">
                                <path
                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                            </svg>
                            <p class="font-bold text-3xl text-gray-800">
                                {{ number_format($ratingAverage, 1) }}
                            </p>
                        </div>
                        @php
                            $satisfaction = $ratingCount > 0 ? round((($ratingDistribution[4] ?? 0) + ($ratingDistribution[5] ?? 0)) / $ratingCount * 100) : 0;
                        @endphp
                        <p class="text-lg text-gray-700">{{ $satisfaction }}% pembeli merasa puas</p>
                        <p class="text-md text-gray-500 mt-1">
                            {{ $ratingCount }} rating &bull; {{ array_sum($ratingDistribution) }} ulasan
                        </p>
                    </div>

                    <div class="flex-grow max-w-4xl">
                        <div class="grid grid-cols-2 gap-y-2 gap-x-8">
                            @foreach([5, 4, 3, 2, 1] as $star)
                                @php
                                    $count = $ratingDistribution[$star] ?? 0;
                                    $percentage = $ratingCount > 0 ? ($count / $ratingCount) * 100 : 0;
                                @endphp
                                <div class="flex items-center gap-2">
                                    <span class="text-yellow-500">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="..." />
                                        </svg>
                                    </span>
                                    <span>{{ $star }}</span>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-[#D98324] h-2.5 rounded-full" style="width: {{ $percentage }}%;">
                                        </div>
                                    </div>
                                    <span class="ml-2 text-gray-600">({{ $count }})</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-start gap-4">
                <div class="flex-1 p-4 rounded-lg border border-gray-300 text-sm">
                    <h2 class="font-semibold text-lg text-gray-800 mb-4">FILTER ULASAN</h2>

                    <div class="mb-4">
                        <button
                            class="w-full flex justify-between items-center text-gray-700 font-medium focus:outline-none">
                            <span class="text-base mb-2">Media</span>
                            <svg class="w-4 h-4 transform rotate-180" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="mt-2 ml-1">
                            <label class="inline-flex items-center">
                                <input type="checkbox"
                                    class="w-4 h-5 form-checkbox text-yellow-400 border-gray-300 rounded">
                                <span class="ml-2 text-gray-600">Dengan Foto & Video</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center text-gray-700 font-medium mb-2">
                            <span class="text-base mb-2">Rating</span>
                            <svg class="w-4 h-4 transform rotate-180" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <div class="space-y-2 ml-1">
                            @for ($i = 5; $i >= 1; $i--)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" wire:model.live="selectedRatings" value="{{ $i }}"
                                        class="w-4 h-4 form-checkbox text-yellow-400 border-gray-300 rounded">
                                    <div class="flex items-center text-gray-700">
                                        @for ($j = 0; $j < $i; $j++)
                                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.236 3.804a1 1 0 00.95.69h3.998c.969 0 1.371 1.24.588 1.81l-3.238 2.353a1 1 0 00-.364 1.118l1.236 3.804c.3.921-.755 1.688-1.538 1.118l-3.238-2.353a1 1 0 00-1.176 0L6.225 17.62c-.783.57-1.838-.197-1.538-1.118l1.236-3.804a1 1 0 00-.364-1.118L2.32 9.23c-.783-.57-.38-1.81.588-1.81h3.998a1 1 0 00.95-.69l1.236-3.804z" />
                                            </svg>
                                        @endfor
                                    </div>
                                </label>
                            @endfor
                        </div>

                    </div>
                </div>

                <div class="flex-2 antialiased rounded-lg border border-gray-300 p-4">
                    <!-- FOTO & VIDEO PEMBELI -->
                    <div class="p-4 mb-6">
                        <h2 class="text-lg font-semibold mb-4 text-gray-800">FOTO & VIDEO PEMBELI</h2>
                        <div class="flex gap-4">
                            @foreach ($photos->take(4) as $photo)
                                <div
                                    class="relative w-20 h-20 rounded-md overflow-hidden flex items-center justify-center">
                                    <img src="{{ $photo->url }}" alt="Foto Pembeli"
                                        class="absolute inset-0 w-full h-full object-cover">
                                </div>
                            @endforeach

                            @if ($photos->count() > 4)
                                <div
                                    class="relative w-20 h-20 rounded-md overflow-hidden bg-whitw flex items-center justify-center">
                                    <img src="{{ $photos[4]->url }}" alt="Foto Lainnya"
                                        class="absolute inset-0 w-full h-full object-cover opacity-60">
                                    <div class="absolute text-white font-bold text-xl">+{{ $photos->count() - 4 }}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- ULASAN PILIHAN -->
                    <div class="md p-4">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">ULASAN PILIHAN</h2>
                                <p class="text-sm text-gray-500">Menampilkan {{ $reviews->count() }} dari
                                    {{ $totalReview }} ulasan
                                </p>
                            </div>
                            <div class="flex items-center mt-3 sm:mt-0">
                                <span class="text-sm text-gray-600 mr-2">Urutkan</span>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-md leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option>Paling Membantu</option>
                                        <option>Terbaru</option>
                                        <option>Terlama</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 pt-4 mt-4 space-y-10">
                            @if ($reviews->isNotEmpty())
                                @foreach ($reviews as $review)
                                    <div>
                                        {{-- Rating Stars --}}
                                        <div class="flex items-center mb-2">
                                            <div class="flex text-yellow-400 mr-2">
                                                @for ($i = 1; $i <= $review->rating; $i++)
                                                    <svg class="w-4 h-4 fill-current {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M10 15.27L16.18 19l-1.64-7.03L20 7.24l-7.19-.61L10 0 7.19 6.63 0 7.24l5.46 4.73L3.82 19z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span
                                                class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>

                                        {{-- Reviewer Info --}}
                                        <div class="flex items-center mb-3">
                                            <div
                                                class="w-10 h-10 mr-2 rounded-full bg-gray-300 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400"
                                                    fill="currentColor" viewBox="0 0 448 512">
                                                    <path
                                                        d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" />
                                                </svg>
                                            </div>
                                            <span
                                                class="font-medium text-gray-800">{{ $review->reviewer->name ?? 'Pengguna' }}</span>
                                        </div>

                                        {{-- Komentar --}}
                                        <p class="text-sm text-gray-600 mb-3">{{ $review->komentar }}</p>

                                        {{-- Footer --}}
                                        <div class="flex justify-between items-center text-sm text-gray-500">
                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400"
                                                    fill="currentColor" viewBox="0 0 512 512">
                                                    <path
                                                        d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2l144 0c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48l-97.5 0c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3l0-38.3 0-48 0-24.9c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192l64 0c17.7 0 32 14.3 32 32l0 224c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32-14.3-32-32L0 224c0-17.7 14.3-32 32-32z" />
                                                </svg>
                                                <span>5 orang terbantu</span>
                                            </div>
                                            <button class="text-[#00ADB5] hover:underline">Lihat Balasan</button>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="bg-gray-400 p-4 rounded-lg text-center">
                                    <p class="text-sm text-white italic">Belum ada komentar.</p>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <div class="sticky top-[80px] border border-gray-300 p-4 rounded-lg h-fit flex-1 font-ibm self-start">
            <h3 class="font-semibold text-lg mb-4">Atur jumlah dan catatan</h3>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-6">
                    <button wire:click="kurang"
                        class="w-8 h-8 rounded-md border-2 border-gray-300 text-gray-600 flex items-center justify-center text-xl cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                            viewBox="0 0 448 512">
                            <path
                                d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                        </svg>
                    </button>
                    <span class="font-medium text-lg">{{ $jumlah }}</span>
                    <button wire:click="tambah"
                        class="w-8 h-8 rounded-md border-2 border-[#00ADB5] text-[#00ADB5] hover:bg-[#00ADB5]/10 flex items-center justify-center text-xl cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                            viewBox="0 0 448 512">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                        </svg>
                    </button>
                </div>
                <div class="text-md text-gray-600">
                    Stok Total : <span class="text-[#00ADB5]">{{ $produk->stok }}</span>
                </div>
            </div>

            <div class="flex justify-between items-center mb-4">
                <div class="text-gray-600">Subtotal</div>
                <div class="text-2xl font-bold">Rp {{ number_format($subtotal) }}</div>
            </div>


            <div class="flex flex-col gap-3 mb-4">
                <button wire:click="tambahKeKeranjang"
                    class="bg-[#393E46] text-white py-3 rounded-lg hover:bg-[#222831] font-semibold flex cursor-pointer items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Keranjang
                </button>
                <button class="border border-[#222831] text-[#393E46] py-3 rounded-lg cursor-pointer font-semibold">
                    Beli Langsung
                </button>
            </div>


        </div>
    </div>

</div>