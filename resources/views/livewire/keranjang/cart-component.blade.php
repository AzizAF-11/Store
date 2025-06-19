<div class="">

    @livewire('navbar')

    <div class="p-6 w-full flex justify-center items-start font-ibm min-h-screen bg-gray-100">
        <div class="w-full max-w-7xl mt-16">

            <h2 class="text-2xl font-bold mb-6">Keranjang</h2>

            <div class="flex flex-col lg:flex-row gap-6">

                <!-- Kolom Daftar Produk -->
                <div class="w-full lg:w-3/4 space-y-6">

                    <!-- Toolbar Pilih Semua & Hapus Terpilih -->
                    <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md mb-4">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" wire:model="selectAll" wire:change="toggleSelectAll"
                                class="w-5 h-5 text-orange-600 border-gray-300 rounded">
                            <span class="text-sm text-gray-700">Pilih Semua</span>
                        </label>
                        <button wire:click="removeSelectedItems"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition disabled:opacity-50"
                            @if(count($selectedItems) === 0) disabled @endif>
                            Hapus Terpilih
                        </button>
                    </div>

                    <!-- Daftar Produk -->
                    @forelse ($cartItems as $index => $item)
                        <div class="rounded-lg p-4 bg-white shadow-md flex gap-4 items-start">
                            <!-- Checkbox per produk -->
                            <input type="checkbox" :checked="{{ in_array($index, $selectedItems) ? 'true' : 'false' }}"
                                wire:click="toggleItem('{{ $index }}')"
                                class="mt-2 w-5 h-5 text-orange-600 rounded border-gray-300 focus:ring-orange-500">

                            <!-- Konten produk -->
                            <div class="flex gap-4 w-full">
                                <img src="https://archive.org/download/placeholder-image/placeholder-image.jpg" alt="Image"
                                    class="w-24 h-24 object-cover rounded">

                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800">{{ $item['shop_name'] }}</p>
                                    <p class="text-gray-700 text-sm mt-1">{{ $item['product_name'] }}</p>
                                    @if ($item['color'] || $item['size'])
                                        <p class="text-xs text-gray-500 mt-1">
                                            @if($item['color']) Warna: {{ $item['color'] }} @endif
                                            @if($item['size']) , Ukuran: {{ $item['size'] }} @endif
                                        </p>
                                    @endif
                                </div>

                                <div class="text-right">
                                    <button wire:click="removeItem({{ $index }})"
                                        class="text-sm text-gray-400 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block"
                                            fill="currentColor" viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                        </svg>
                                    </button>
                                    <div class="flex items-center justify-end mt-2 space-x-2">
                                        <span class="text-lg font-bold text-orange-600">
                                            Rp{{ number_format($item['price'], 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <div
                                        class="flex items-center gap-2 mt-3 px-4 py-1.5 justify-around border rounded-lg border-gray-400">
                                        <button wire:click="decrementQuantity({{ $index }})" class="py-1 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z" />
                                            </svg>
                                        </button>
                                        <span class="px-4">{{ $item['quantity'] }}</span>
                                        <button wire:click="incrementQuantity({{ $index }})" class="py-1 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div
                            class="flex flex-col items-center justify-center py-12 px-6 text-gray-500 bg-white rounded-xl shadow-md">
                            <img src="{{ asset('images/empty-cart.png') }}" alt="Empty Cart" class="w-40 mb-6">

                            <p class="text-xl font-semibold mb-2">Keranjangmu masih kosong</p>
                            <p class="text-sm text-center max-w-md mb-6">
                                Yuk, mulai tambahkan produk ke keranjang untuk pengalaman belanja yang lebih seru.
                            </p>

                            <a href="{{ route('dashboard.pembeli') }}" 
                                class="bg-orange-500 hover:bg-orange-600 transition text-white text-sm px-6 py-3 rounded-full font-medium shadow">
                                Mulai Belanja
                            </a>
                        </div>

                    @endforelse
                </div>

                <!-- Ringkasan Belanja -->
                <div class="w-full lg:w-1/4">
                    <div class="bg-white p-4 rounded-lg shadow-md sticky top-24">
                        <h3 class="text-lg font-semibold mb-2">Ringkasan Belanja</h3>
                        <div class="flex justify-between text-sm mb-2">
                            <span>Total</span>
                            <span class="font-bold text-green-700">
                                Rp{{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                        <button
                            class="mt-4 w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition duration-200">
                            Beli ({{ count($selectedItems) }})
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>