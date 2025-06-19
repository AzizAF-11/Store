<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\UpdateRatings;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('ratings:update', function () {
    $this->call(UpdateRatings::class);
});

Schedule::command('ratings:update')
    ->dailyAt('00:00')
    ->timezone('Asia/Jakarta')
    ->onSuccess(function () {
        Artisan::call('ratings:update');
    });
    
    


