<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        $peminjam_id = [4, 5, 6]; // user role peminjam from UserSeeder
        $kendaraan_id = [1, 2, 3, 4, 5];

        foreach ($kendaraan_id as $i => $kid) {
            $tanggalPinjam = now()->subDays(rand(1, 7));
            Peminjaman::create([
                'id_kendaraan' => $kid,
                'id_peminjam' => $peminjam_id[$i % 3],
                'tanggal_pinjam' => $tanggalPinjam->toDateString(),
                'waktu_pinjam' => $tanggalPinjam->toTimeString(),
                'tanggal_kembali' => now()->addDays(rand(1, 5))->toDateString(),
                'waktu_kembali' => now()->addDays(rand(1, 5))->toTimeString(),
                'status_peminjaman' => ['menunggu', 'disetujui', 'berlangsung', 'selesai'][$i % 4],
                'total_biaya' => rand(10000, 50000)
            ]);
        }
    }
}
