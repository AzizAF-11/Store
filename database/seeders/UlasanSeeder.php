<?php

namespace Database\Seeders;

use App\Models\Ulasan;
use App\Models\BahanBaku;
use App\Models\User;
use Illuminate\Database\Seeder;

class UlasanSeeder extends Seeder
{
    public function run()
    {
        $jsonPath = database_path('seeders/tokopedia_reviews.json');
        $ulasanData = json_decode(file_get_contents($jsonPath), true);
        
        // Ambil semua bahan baku dan reviewer
        $bahanBakuList = BahanBaku::pluck('id')->toArray();
        $reviewers = User::where('role', 'pencari bahan baku')->pluck('id')->toArray();
        
        if (empty($bahanBakuList) || empty($reviewers)) {
            echo "Data bahan baku atau reviewer tidak ditemukan.\n";
            return;
        }
        
        // Tracking untuk reviewer dan bahan baku yang sudah pernah diulas
        $reviewerBahanMapping = [];
        
        // Memastikan setiap bahan baku mendapat 20-30 ulasan (atau sejumlah reviewer yang tersedia)
        foreach ($bahanBakuList as $bahanBakuId) {
            // Acak urutan reviewer untuk setiap bahan baku
            $shuffledReviewers = $reviewers;
            shuffle($shuffledReviewers);
            
            // Tentukan berapa banyak reviewer untuk bahan baku ini (antara 20-30, atau semua reviewer jika < 20)
            $maxReviewers = min(count($reviewers), rand(20, 30));
            
            // Batasi jumlah reviewer untuk bahan baku ini
            $selectedReviewers = array_slice($shuffledReviewers, 0, $maxReviewers);
            
            // Untuk setiap reviewer yang dipilih, buat ulasan
            foreach ($selectedReviewers as $reviewerId) {
                // Pastikan reviewer belum pernah menilai bahan baku ini
                if (!isset($reviewerBahanMapping[$reviewerId]) || !in_array($bahanBakuId, $reviewerBahanMapping[$reviewerId])) {
                    // Ambil data ulasan secara acak dari dataset
                    $randomIndex = rand(0, count($ulasanData) - 1);
                    $ulasan = $ulasanData[$randomIndex];
                    
                    // Buat ulasan baru
                    Ulasan::create([
                        'bahan_baku_id' => $bahanBakuId,
                        'product_id' => null,
                        'reviewer_id' => $reviewerId,
                        'rating' => $ulasan['rating'],
                        'komentar' => $ulasan['content'],
                    ]);
                    
                    // Catat bahwa reviewer ini sudah menilai bahan baku tersebut
                    if (!isset($reviewerBahanMapping[$reviewerId])) {
                        $reviewerBahanMapping[$reviewerId] = [];
                    }
                    $reviewerBahanMapping[$reviewerId][] = $bahanBakuId;
                }
            }
        }
        
        echo "Seeder ulasan berhasil dijalankan. Total ulasan: " . Ulasan::count() . "\n";
    }
}
