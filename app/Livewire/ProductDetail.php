<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BahanBaku;
use App\Models\Ulasan;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductDetail extends Component
{
    public $produk;
    public $ratingAverage;
    public $ratingCount;
    public $ratingDistribution = [];
    public $photos = [];
    public $reviews;
    public $totalReview;

    public $selectedRatings = [];

    public $jumlah = 1;
    public $subtotal = 0;

    public function updatedSelectedRatings()
    {
        $this->applyFilters();
    }

    public function applyFilters()
    {
        $query = Ulasan::where('bahan_baku_id', $this->produk->id)->latest();

        if (!empty($this->selectedRatings)) {
            $query->whereIn('rating', $this->selectedRatings);
        }

        $ulasan = $query->get();
        $this->reviews = $ulasan;
        $this->totalReview = $ulasan->count();
    }

    public function mount($id)
    {
        $this->produk = BahanBaku::with('penyedia.regency', 'rating', 'ulasan')->findOrFail($id);

        $rating = $this->produk->rating;
        $this->ratingCount = $rating?->rating_count ?? 0;
        $this->ratingAverage = $rating?->average_rating ?? 0;

        $allUlasan = $this->produk->ulasan;
        $this->ratingDistribution = $allUlasan->groupBy('rating')->map->count()->toArray();
        for ($i = 1; $i <= 5; $i++) {
            if (!isset($this->ratingDistribution[$i])) {
                $this->ratingDistribution[$i] = 0;
            }
        }

        krsort($this->ratingDistribution);

        $this->applyFilters();

        $this->jumlah = 1;
        $this->subtotal = $this->produk->harga;

        // Dummy photos
        $this->photos = collect([
            (object) ['url' => 'https://archive.org/download/placeholder-image/placeholder-image.jpg'],
            (object) ['url' => 'https://archive.org/download/placeholder-image/placeholder-image.jpg'],
            (object) ['url' => 'https://archive.org/download/placeholder-image/placeholder-image.jpg'],
            (object) ['url' => 'https://archive.org/download/placeholder-image/placeholder-image.jpg'],
            (object) ['url' => 'https://archive.org/download/placeholder-image/placeholder-image.jpg'],
        ]);
    }


    public function render()
    {
        return view('livewire.product-detail');
    }

    public function tambah()
    {
        if ($this->jumlah < $this->produk->stok) {
            $this->jumlah++;
            $this->updateSubtotal();
        }
    }

    public function kurang()
    {
        if ($this->jumlah > 1) {
            $this->jumlah--;
            $this->updateSubtotal();
        }
    }

    public function updateSubtotal()
    {
        $this->subtotal = $this->produk->harga * $this->jumlah;
    }

    public function tambahKeKeranjang()
    {
        try {
            Cart::create([
                'user_id' => Auth::id(),
                'bahan_baku_id' => $this->produk->id,
                'jumlah' => $this->jumlah,
                'harga_satuan' => $this->produk->harga,
                'subtotal' => $this->subtotal,
                'catatan' => null,
            ]);

            session()->flash('success', 'Produk berhasil ditambahkan ke keranjang!');
            session()->flash('product_name', $this->produk->nama_bahan);
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan ke keranjang: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat menambahkan ke keranjang.');
        }

        $this->dispatch('cartUpdated');
    }

    
}


