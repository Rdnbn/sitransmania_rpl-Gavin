<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KendaraanSeeder::class,
            PeminjamanSeeder::class,
            PembayaranSeeder::class,
            ChatSeeder::class,
            LokasiSeeder::class,
            RiwayatSeeder::class,
        ]);
    }
}
