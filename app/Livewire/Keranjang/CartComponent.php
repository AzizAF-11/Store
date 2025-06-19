<?php

namespace App\Livewire\Keranjang;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{
    public $cartItems = [];

    public $selectedItems = [];
    public $selectAll = false;

    public $total = 0;

    public function toggleSelectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = array_map('strval', array_keys($this->cartItems));
        } else {
            $this->selectedItems = [];
        }

        $this->updatedSelectedItems();
    }


    public function toggleItem($index)
    {
        $index = (string) $index;

        if (in_array($index, $this->selectedItems)) {
            $this->selectedItems = array_values(array_diff($this->selectedItems, [$index]));
        } else {
            $this->selectedItems[] = $index;
        }

        $this->updatedSelectedItems();
    }


    public function updatedSelectedItems()
    {
        $this->selectAll = count($this->selectedItems) === count($this->cartItems);

        $this->updateTotal();
    }


    public function removeSelectedItems()
    {
        $idsToDelete = [];

        foreach ($this->selectedItems as $index) {
            $idsToDelete[] = $this->cartItems[$index]['id'];
            unset($this->cartItems[$index]);
        }

        Cart::whereIn('id', $idsToDelete)->delete();

        $this->cartItems = array_values($this->cartItems);
        $this->selectedItems = [];

        $this->updateTotal();

        $this->dispatch('cartUpdated');
        
    }

    private function updateTotal()
    {
        $this->total = collect($this->selectedItems)->sum(function ($index) {
            if (isset($this->cartItems[$index])) {
                return $this->cartItems[$index]['price'] * $this->cartItems[$index]['quantity'];
            }
            return 0;
        });
    }


    public function updatedCartItems()
    {
        // Memastikan re-render jika quantity berubah
        $this->selectedItems = array_filter($this->selectedItems, function ($index) {
            return isset($this->cartItems[$index]);
        });
    }


    public function mount()
    {
        $userId = Auth::id(); // Ambil user yang sedang login

        $this->cartItems = Cart::with('produk')
            ->where('user_id', $userId)
            ->get()
            ->map(function ($cart) {
                return [
                    'id' => $cart->id,
                    'shop_name' => $cart->produk->penyedia->nama_toko ?? 'Toko Default',
                    'product_name' => $cart->produk->nama_bahan ?? 'Produk Tidak Ditemukan',
                    'color' => null,
                    'size' => null,
                    'price' => $cart->harga_satuan,
                    'original_price' => $cart->harga_satuan,
                    'discount' => 0,
                    'quantity' => $cart->jumlah,
                    'image' => $cart->produk->gambar ?? 'https://via.placeholder.com/100',
                ];
            })
            ->toArray();
    }

    public function incrementQuantity($index)
    {
        $this->cartItems[$index]['quantity']++;
        $this->updateTotal();
    }

    public function decrementQuantity($index)
    {
        if ($this->cartItems[$index]['quantity'] > 1) {
            $this->cartItems[$index]['quantity']--;
            $this->updateTotal();
        }
    }

    public function removeItem($index)
    {
        $item = $this->cartItems[$index];

        Cart::where('id', $item['id'])->delete();

        unset($this->cartItems[$index]);
        $this->cartItems = array_values($this->cartItems);

        // Reset selectedItems sesuai index baru
        $this->selectedItems = array_filter($this->selectedItems, fn($i) => $i !== $index);
        $this->selectedItems = array_values($this->selectedItems);

        $this->dispatch('cartUpdated');
    }


    public function getTotalProperty()
    {
        return collect($this->selectedItems)->sum(function ($index) {
            if (isset($this->cartItems[$index])) {
                return $this->cartItems[$index]['price'] * $this->cartItems[$index]['quantity'];
            }
            return 0;
        });
    }


    public function render()
    {
        return view('livewire.keranjang.cart-component');
    }
}

