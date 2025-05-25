<div class="flex-1 p-6 overflow-auto font-ibm">
    <h1 class="text-4xl font-bold mb-4 uppercase">Dashboard</h1>
    <p class="text-gray-500 mb-6">Mengoptimalkan pendapatan dan melacak kinerja penjualan</p>

    {{-- Stat boxes --}}
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="border border-gray-400 p-3 rounded-xl">
            <h2 class="mb-6 text-xl">PENDAPATAN</h2>
            <div class="bg-purple-100 p-4 rounded-lg">
                <div class="text-gray-500 text-sm">Total Pendapatan</div>
                <div class="text-xl font-bold text-purple-900">Rp. 1.000.000</div>
            </div>
        </div>
        <div class="border border-gray-400 p-3 rounded-xl">
            <h2 class="mb-6 text-xl">INVENTORY SUMMARY</h2>
            <div class="flex gap-4 w-full">
                <div class="bg-blue-100 p-4 rounded w-full">
                    <div class="text-gray-500 text-sm">Total Items</div>
                    <div class="text-xl font-bold text-blue-900">1,234</div>
                </div>
                <div class="bg-red-100 p-4 rounded w-full">
                    <div class="text-gray-500 text-sm">Low-Stock</div>
                    <div class="text-xl font-bold text-red-900">60</div>
                </div>
            </div>
        </div>
        <div class="border border-gray-400 p-3 rounded-xl">
            <h2 class="mb-6 text-xl uppercase">Orders</h2>
            <div class="bg-indigo-100 p-4 rounded">
                <div class="text-gray-500 text-sm">Total Order</div>
                <div class="text-xl font-bold text-indigo-900">40</div>
            </div>
        </div>
        <div class="border border-gray-400 p-3 rounded-xl">
            <h2 class="mb-6 text-xl uppercase">Orders</h2>
            <div class="bg-indigo-100 p-4 rounded">
                <div class="text-gray-500 text-sm">Total Order</div>
                <div class="text-xl font-bold text-indigo-900">40</div>
            </div>
        </div>
    </div>

    {{-- Penjualan --}}
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border border-gray-400">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-semibold text-xl">Product Terjual</h2>
                <a href="#" class="text-sm text-purple-600">see all</a>
            </div>
            <ul class="space-y-6">
                @foreach (range(1, 3) as $i)
                    <li class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                            <div>
                                <p class="font-medium">Makanan Xyz</p>
                                <p class="text-xs text-gray-500">Terjual : 12</p>
                            </div>
                        </div>
                        <div class="text-sm">Rp. 12.000</div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white p-4 rounded-xl border border-gray-400">
            <h2 class="font-semibold text-xl mb-3">Pesanan yang diterima</h2>
            {{-- Bisa integrasi chartjs atau gambar placeholder --}}
            <div class="h-48 bg-yellow-200 flex items-center justify-center text-gray-500">Chart Placeholder</div>
        </div>
    </div>

    {{-- Top Selling --}}
    <div class="bg-white h-auto p-4 rounded-xl border border-gray-400">
        <h2 class="font-semibold mb-4">Top Selling Products</h2>
        <div class="grid grid-cols-5 gap-4">
            @foreach (range(1, 5) as $i)
                <div class="bg-gray-100 p-3 rounded text-center h-full">
                    <div class="h-42 bg-gray-300 mb-2"></div>
                    <div class="text-left font-medium">Makanan A</div>
                    <div class="text-left text-xs text-gray-500">50 item terjual</div>
                </div>
            @endforeach
        </div>
    </div>
</div>