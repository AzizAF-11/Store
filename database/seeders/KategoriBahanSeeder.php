<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBahanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori_bahan')->insert([
            [
                'nama_kategori' => 'Bahan Dasar',
                'deskripsi' => 'Bahan pokok utama untuk produksi seperti tepung, gula, dan garam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Bahan Pengembang',
                'deskripsi' => 'Bahan untuk mengembangkan adonan seperti ragi dan baking powder.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Produk Susu dan Lemak',
                'deskripsi' => 'Produk susu, keju, margarin, dan butter.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Topping dan Isian',
                'deskripsi' => 'Meses, selai, choco chips, dan bahan isian lainnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Pewarna dan Perisa',
                'deskripsi' => 'Pasta rasa, ekstrak, dan pewarna makanan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kemasan',
                'deskripsi' => 'Plastik, kertas kemasan, dan perlengkapan pengemasan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
