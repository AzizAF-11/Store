<div class="flex bg-gray-100 h-screen overflow-hidden">
    <!-- Sidebar -->
    <livewire:dashboard-penjual.side-navbar />

    <!-- Konten Utama -->
    <div class="w-full p-4 overflow-y-auto">
        @if ($currentTab === 'dashboard')
            <livewire:dashboard-penjual.dashboard-content />
        @elseif ($currentTab === 'product')
            <livewire:dashboard-penjual.product.index />
        @endif
    </div>
</div>
