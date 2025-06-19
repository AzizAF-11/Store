<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class Navbar extends Component
{
    public $open = false;
    public $cartItems = [];

    protected $listeners = ['cartUpdated' => 'refreshCart'];

    public function mount()
    {
        $this->open = false;
        $this->refreshCart();
    }

    public function refreshCart()
    {
        if (Auth::check()) {
            $this->cartItems = Cart::with('produk')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $this->cartItems = [];
        }
    }

    public function toggleDropdown()
    {
        $this->open = !$this->open;
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
