<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use Illuminate\Support\Facades\Schema;

class WilayahSeeder extends Seeder
{
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        District::truncate();
        Regency::truncate();
        Province::truncate();
        Schema::enableForeignKeyConstraints();

        $provinces = Http::withoutVerifying()
            ->get("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
            ->json();

        $jawaTengah = collect($provinces)->firstWhere('name', 'JAWA TENGAH');

        Province::create([
            'id' => $jawaTengah['id'],
            'name' => $jawaTengah['name'],
        ]);

        
        $regencies = Http::withoutVerifying()
            ->get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$jawaTengah['id']}.json")
            ->json();

        foreach ($regencies as $regencyData) {
            Regency::create([
                'id' => $regencyData['id'],
                'province_id' => $jawaTengah['id'],
                'name' => $regencyData['name'],
            ]);

            
            $districts = Http::withoutVerifying()
                ->get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$regencyData['id']}.json")
                ->json();

            foreach ($districts as $districtData) {
                
                District::create([
                    'id' => $districtData['id'],
                    'regency_id' => $districtData['regency_id'],
                    'name' => $districtData['name'],
                ]);
            }

            usleep(300000); 
        }

        echo "✅ Semua data wilayah Jawa Tengah berhasil disimpan.\n";
    }
}
