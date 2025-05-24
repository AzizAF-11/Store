<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilPenyedia;
use App\Models\BahanBaku;

class BahanBakuSeeder extends Seeder
{
    public function run()
    {
        $file = database_path('seeders/tokopedia_products.json');
        $json = json_decode(file_get_contents($file), true);

        $penyediaList = ProfilPenyedia::pluck('id')->toArray();
        if (empty($penyediaList)) {
            echo "Tidak ada penyedia ditemukan.\n";
            return;
        }

        foreach ($json as $index => $item) {
            $cleanPrice = (float) str_replace(['Rp', '.', ','], '', $item['price']);

            BahanBaku::create([
                'penyedia_id'  => $penyediaList[$index % count($penyediaList)],
                'nama_bahan'   => $item['nama_produk'],
                'harga'        => $cleanPrice,
                'stok'         => 100, 
                'satuan'       => 'kg',
                'deskripsi'    => 'Produk bahan baku: ' . $item['nama_produk'],
            ]);
        }

        echo "Seeder bahan_baku berhasil dijalankan.\n";
    }
}

