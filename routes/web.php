<?php

use App\Livewire\Dashboard\DashboardPembeli;
use App\Livewire\DashboardPenjual\DashboardPenjual;
use Illuminate\Support\Facades\Route;
use App\Livewire\LandingPage;
use App\Livewire\About;
use App\Livewire\ProductDetail;
use App\Livewire\Keranjang\CartComponent;

Route::get('/produk/{id}', ProductDetail::class)->name('produk.detail');
Route::get('/', LandingPage::class)->name('home');
Route::get('/about', About::class);

Route::get('/dashboard', DashboardPembeli::class)
    ->name('dashboard.pembeli')
    ->middleware('auth');

Route::get('/dashboard-penjual', DashboardPenjual::class)
    ->name('dashboard.penjual')
    ->middleware('auth');

Route::get('/keranjang', CartComponent::class)
    ->name('keranjang')
    ->middleware('auth');




