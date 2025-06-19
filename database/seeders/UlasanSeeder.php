<?php

namespace Database\Seeders;

use App\Models\Ulasan;
use App\Models\BahanBaku;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UlasanSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Ulasan::truncate();
        Schema::enableForeignKeyConstraints();

        $jsonPath = database_path('seeders/tokopedia_reviews.json');
        $ulasanData = json_decode(file_get_contents($jsonPath), true);

        $bahanBakuList = BahanBaku::pluck('id')->toArray();
        $reviewers = User::where('role', 'pencari bahan baku')->pluck('id')->toArray();

        if (empty($bahanBakuList) || empty($reviewers)) {
            echo "Data bahan baku atau reviewer tidak ditemukan.\n";
            return;
        }

        $reviewerBahanMapping = [];

        foreach ($reviewers as $reviewerId) {
            // Tentukan jumlah bahan baku yang akan diulas oleh reviewer ini (acak, misal 10–60)
            $jumlahUlasan = rand(10, 60);

            // Acak bahan baku
            $shuffledBahanBaku = $bahanBakuList;
            shuffle($shuffledBahanBaku);

            // Ambil sejumlah bahan baku untuk diulas oleh reviewer
            $selectedBahanBaku = array_slice($shuffledBahanBaku, 0, min($jumlahUlasan, count($bahanBakuList)));

            foreach ($selectedBahanBaku as $bahanBakuId) {
                // Hindari review ganda untuk kombinasi reviewer + bahan baku
                if (!isset($reviewerBahanMapping[$reviewerId]) || !in_array($bahanBakuId, $reviewerBahanMapping[$reviewerId])) {
                    $randomIndex = rand(0, count($ulasanData) - 1);
                    $ulasan = $ulasanData[$randomIndex];

                    Ulasan::create([
                        'bahan_baku_id' => $bahanBakuId,
                        'product_id' => null,
                        'reviewer_id' => $reviewerId,
                        'rating' => $ulasan['rating'],
                        'komentar' => $ulasan['content'] ?? $this->fakeKomentar(),
                    ]);

                    $reviewerBahanMapping[$reviewerId][] = $bahanBakuId;
                }
            }
        }

        echo "Seeder ulasan berhasil dijalankan. Total ulasan: " . Ulasan::count() . "\n";
    }

    private function fakeKomentar(): string
    {
        $komentarPositif = [
            'Produk sangat bagus dan berkualitas.',
            'Pelayanan cepat dan ramah.',
            'Saya puas dengan bahan bakunya.',
            'Barang sesuai deskripsi dan cepat sampai.',
            'Bahan baku sangat direkomendasikan.',
        ];

        $komentarNegatif = [
            'Kualitas produk kurang memuaskan.',
            'Pengiriman lama dan pelayanan buruk.',
            'Barang tidak sesuai dengan yang dijanjikan.',
            'Bahan baku jelek dan tidak layak pakai.',
            'Saya kecewa dengan produk ini.',
        ];

        return rand(0, 1)
            ? $komentarPositif[array_rand($komentarPositif)]
            : $komentarNegatif[array_rand($komentarNegatif)];
    }


}
