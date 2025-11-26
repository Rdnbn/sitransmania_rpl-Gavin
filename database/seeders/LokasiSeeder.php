<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LokasiKendaraan;

class LokasiSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 5) as $kid) {
            LokasiKendaraan::create([
                'id_kendaraan' => $kid,
                'latitude' => -8.6500 + rand(-10, 10) / 1000,
                'longitude' => 115.2167 + rand(-10, 10) / 1000,
            ]);
        }
    }
}
