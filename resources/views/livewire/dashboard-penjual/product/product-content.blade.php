<div class="bg-white rounded-lg shadow overflow-hidden" >
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center p-4 border-b border-gray-200">
        <div class="flex text-gray-600 space-x-6 mb-4 md:mb-0">
            <button wire:click="setFilter('all')"
                class="tab-button pb-2 cursor-pointer {{ $statusFilter === 'all' ? 'text-blue-500 font-medium border-b-2 border-blue-500' : 'hover:text-gray-900' }}">
                Semua bahan baku ({{ $totalCount }})
            </button>
            <button wire:click="setFilter('aktif')"
                class="tab-button pb-2 cursor-pointer {{ $statusFilter === 'aktif' ? 'text-blue-500 font-medium border-b-2 border-blue-500' : 'hover:text-gray-900' }}">
                Active ({{ $activeCount }})
            </button>
            <button wire:click="setFilter('nonaktif')"
                class="tab-button pb-2 cursor-pointer {{ $statusFilter === 'nonaktif' ? 'text-blue-500 font-medium border-b-2 border-blue-500' : 'hover:text-gray-900' }}">
                Inactive ({{ $inactiveCount }})
            </button>
        </div>

        <div class="flex flex-col sm:flex-row gap-2 sm:items-center">
            <!-- Input Search -->
            <div class="relative">
                <input type="search" wire:model.live.debounce.300ms="search" placeholder="Cari bahan baku..."
                    class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#D98324] focus:border-transparent w-full sm:w-96" />
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103 10.5a7.5 7.5 0 0013.15 6.15z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="list-product overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded">
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                        PRODUCT</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                        NAME
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                        CATEGORY</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                        INVENTORY</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                        VENDOR</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-md font-medium text-gray-500 uppercase tracking-wider">
                        STATUS</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($products as $product)
                    @php
                        $statusColorClass = match ($product['status']) {
                            'Aktif' => 'bg-yellow-100 text-yellow-800',
                            'Nonaktif' => 'bg-gray-200 text-gray-800',
                            default => '',
                        };
                    @endphp

                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="checkbox" @if($product['checked']) checked @endif
                                class="form-checkbox h-4 w-4 text-blue-600 border-gray-300 rounded">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex-shrink-0 h-20 w-20 items-center justify-center">
                                <img class="h-20 w-20 rounded-md object-cover" src="{{ $product['image'] }}"
                                    alt="{{ $product['name'] }}">
                            </div>
                        </td>
                        <td class="px-3 py-4 text-base font-medium text-gray-900">
                            {{ $product['name'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-base text-blue-500">
                            {{ $product['category'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                            {{ $product['inventory'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">
                            {{ $product['vendor'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColorClass }}">
                                {{ $product['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-base font-medium">
                            <button class="text-gray-500 hover:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            Tidak ada produk yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
    <div class="p-4 border-t border-gray-200">
        {{ $products->links() }}
    </div>

</div>