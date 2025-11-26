<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RiwayatAktivitas;

class RiwayatSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 5) as $i) {
            RiwayatAktivitas::create([
                'id_user' => 4, // peminjam from UserSeeder
                'aktivitas' => 'Mengajukan peminjaman kendaraan #' . $i,
                'tanggal' => now()->subDays(rand(1, 3)),
                'kategori' => 'peminjaman'
            ]);

            RiwayatAktivitas::create([
                'id_user' => 2, // pemilik from UserSeeder
                'aktivitas' => 'Menyetujui peminjaman kendaraan #' . $i,
                'tanggal' => now()->subDays(rand(0, 2)),
                'kategori' => 'peminjaman'
            ]);
        }
    }
}
