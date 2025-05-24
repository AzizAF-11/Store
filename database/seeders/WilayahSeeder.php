<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;

class WilayahSeeder extends Seeder
{
    public function run()
    {
        
        $provinces = Http::withoutVerifying()
            ->get("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
            ->json();

        $jawaTengah = collect($provinces)->firstWhere('name', 'JAWA TENGAH');
        $province = Province::create([
            'id' => $jawaTengah['id'],
            'name' => $jawaTengah['name'],
        ]);

        
        $regencies = Http::withoutVerifying()
            ->get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/33.json")
            ->json();

        $targetRegencies = collect($regencies)->whereIn('name', ['KOTA SEMARANG', 'KABUPATEN SEMARANG']);

        foreach ($targetRegencies as $regencyData) {
            Regency::create([
                'id' => $regencyData['id'],
                'province_id' => $jawaTengah['id'],
                'name' => $regencyData['name'],
            ]);
        }

       
        $districts = Http::withoutVerifying()
            ->get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/3322.json")
            ->json();

        foreach ($districts as $districtData) {
            District::create([
                'id' => $districtData['id'],
                'regency_id' => $districtData['regency_id'],
                'name' => $districtData['name'],
            ]);
        }

        echo "Data wilayah berhasil disimpan.\n";
    }
}
