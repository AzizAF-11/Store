<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'Pencari Bahan Baku ' . $i,
                'email' => 'pencari' . $i . '@example.com',
                'password' => Hash::make('password'),
                'role' => 'pencari bahan baku',
                'email_verified_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => 'Penyedia Bahan Baku ' . $i,
                'email' => 'penyedia' . $i . '@example.com',
                'password' => Hash::make('password'),
                'role' => 'penyedia bahan baku',
                'email_verified_at' => now(),
            ]);
        }

        echo "Seeder users berhasil dijalankan.\n";
    }
}
