<?php

use App\Livewire\Dashboard\DashboardPembeli;
use Illuminate\Support\Facades\Route;
use App\Livewire\LandingPage;
use App\Livewire\About;

Route::get('/', LandingPage::class)->name('home');
Route::get('/about', About::class);
Route::get('/dashboard', DashboardPembeli::class)->name('dashboard.pembeli')->middleware('auth');



