<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ProfilPenyedia;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;

class ProfilPenyediaSeeder extends Seeder
{
    public function run()
    {
        $penyediaUsers = User::where('role', 'penyedia bahan baku')->get();

        foreach ($penyediaUsers as $index => $user) {
            $province = Province::inRandomOrder()->first();
            if (!$province) continue;

            $regency = $province->regencies()->inRandomOrder()->first();
            if (!$regency) continue;

            $district = $regency->districts()->inRandomOrder()->first();
            if (!$district) continue;

            ProfilPenyedia::create([
                'user_id'      => $user->id,
                'nama_toko'    => 'UMKM Bahan Baku ' . ($index + 1),
                'lokasi'       => 'Alamat lengkap UMKM ' . ($index + 1),
                'province_id'  => $province->id,
                'regency_id'   => $regency->id,
                'district_id'  => $district->id,
            ]);
        }

        echo "Seeder profil_penjual berhasil dijalankan.\n";
    }

}
