<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateRatings extends Command
{
    protected $signature = 'ratings:update';
    protected $description = 'Update or insert ratings based on bahan_baku_id from ulasan table';

    public function handle()
    {
        $ulasanData = DB::table('ulasan')
            ->whereNotNull('bahan_baku_id')
            ->select(
                'bahan_baku_id',
                DB::raw('COUNT(*) as rating_count'),
                DB::raw('AVG(rating) as average_rating'),
                DB::raw('SUM(rating) as total_rating')
            )
            ->groupBy('bahan_baku_id')
            ->get();

        foreach ($ulasanData as $data) {
            $existing = DB::table('ratings')->where('bahan_baku__id', $data->bahan_baku_id)->first();

            if ($existing) {
                DB::table('ratings')->where('id', $existing->id)->update([
                    'total_rating' => $data->total_rating,
                    'rating_count' => $data->rating_count,
                    'average_rating' => $data->average_rating,
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('ratings')->insert([
                    'bahan_baku__id' => $data->bahan_baku_id,
                    'product_umkm_id' => null,
                    'total_rating' => $data->total_rating,
                    'rating_count' => $data->rating_count,
                    'average_rating' => $data->average_rating,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->info('Ratings updated successfully.');
    }
}
