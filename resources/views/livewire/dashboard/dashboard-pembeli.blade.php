<div class="min-h-screen bg-[#EEEEEE] text-[#222831] font-ibm">

    {{-- Include Login Modal --}}
    @livewire('navbar')

    <div class="flex justify-between items-center mt-20 px-4 max-md:flex-col">
        <!-- Tab Buttons -->
        <div class="flex space-x-3 bg-[#393E46] px-2 py-2 rounded-lg font-ibm w-full max-w-3xl">
            <button wire:click="setTab('bahan-baku')" class="text-lg font-semibold text-white py-2 w-full rounded-md cursor-pointer
                {{ $activeTab === 'bahan-baku' ? 'font-bold bg-[#00ADB5]' : '' }}">
                Bahan Baku
            </button>
            <button wire:click="setTab('produk')" class="text-lg font-semibold text-white py-2 w-full rounded-md cursor-pointer
                {{ $activeTab === 'produk' ? 'font-bold bg-[#00ADB5]' : '' }}">
                Product
            </button>
        </div>

        <!-- Search Input with Icon -->
        <div class="ml-4 relative flex-1 font-ibm max-md:mt-4 max-md:ml-0 max-md:w-full">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-[#393E46]" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </span>
            <input type="search" placeholder="Cari produk..." wire:model.live.debounce.300ms="search"
                class="w-full pl-12 pr-4 py-3 rounded-lg focus:outline-2 focus:outline-offset-2 border border-gray-300 focus:outline-[#00ADB5] bg-white text-[#393E46] placeholder-[#393E46] focus:ring-0 transition duration-300 ease-in-out" />
        </div>
    </div>

    <div class="mt-6 px-0 md:px-6 w-full" wire:key="dashboard-container">
        @if ($activeTab === 'bahan-baku')
            @livewire('dashboard.bahan-baku-dashboard', key('bahan-baku-dashboard'))
        @elseif ($activeTab === 'produk')
            @livewire('dashboard.product-page', key('product-page'))
        @endif
    </div>
</div>