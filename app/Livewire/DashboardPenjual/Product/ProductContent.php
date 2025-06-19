<?php

namespace App\Livewire\DashboardPenjual\Product;

use App\Models\BahanBaku;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProductContent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $statusFilter = 'all';
    public $totalCount, $activeCount, $inactiveCount;

    protected $updatesQueryString = ['statusFilter'];
    public $search = '';

    public function mount()
    {
        $this->totalCount = BahanBaku::where('penyedia_id', Auth::user()?->profilePenyedia?->id)->count();
        $this->activeCount = BahanBaku::where('penyedia_id', Auth::user()?->profilePenyedia?->id)->where('status', 'aktif')->count();
        $this->inactiveCount = BahanBaku::where('penyedia_id', Auth::user()?->profilePenyedia?->id)->where('status', 'nonaktif')->count();
    }

    public function setFilter($status)
    {
        $this->statusFilter = $status;
        $this->resetPage(); 
    }

    public function render()
    {
        $penyediaId = Auth::user()?->profilePenyedia?->id;

        $query = BahanBaku::with(['kategori', 'penyedia'])
            ->where('penyedia_id', $penyediaId);

        if ($this->statusFilter === 'aktif') {
            $query->where('status', 'aktif');
        } elseif ($this->statusFilter === 'nonaktif') {
            $query->where('status', 'nonaktif');
        }

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama_bahan', 'like', '%' . $this->search . '%')
                    ->orWhereHas('kategori', function ($q2) {
                        $q2->where('nama_kategori', 'like', '%' . $this->search . '%');
                    });
            });
        }

        $products = $query->latest()->paginate(7);

        return view('livewire.dashboard-penjual.product.product-content', [
            'products' => $products->through(function ($item) {
                return [
                    'id' => $item->id,
                    'image' => $item->image ?? 'https://archive.org/download/placeholder-image/placeholder-image.jpg',
                    'name' => $item->nama_bahan,
                    'category' => $item->kategori->nama_kategori ?? 'belum ditentukan',
                    'inventory' => $item->stok,
                    'vendor' => $item->penyedia->nama_toko ?? 'Unknown',
                    'status' => ucfirst($item->status),
                    'checked' => false,
                ];
            }),
        ]);
    }

}
