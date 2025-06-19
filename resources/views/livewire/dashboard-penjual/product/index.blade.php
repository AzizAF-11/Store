<div class="font-ibm w-full">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 mt-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4 md:mb-0 uppercase">Products</h1>
        <div class="flex space-x-3">
            <button
                class="flex items-center px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Export
            </button>
            <button
                class="flex items-center px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                </svg>
                Import
            </button>
            <button wire:click="goToCreate"
                class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow cursor-pointer hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Product
            </button>

        </div>
    </div>

    <div wire:key="tab-switch">
        @if ($tab === 'list')
            <livewire:dashboard-penjual.product.product-content :key="$tab" />
        @elseif ($tab === 'create')
            <livewire:dashboard-penjual.product.create-product :key="$tab" />
        @endif
    </div>


</div>
