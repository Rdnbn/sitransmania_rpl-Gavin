<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kendaraan;

class KendaraanSeeder extends Seeder
{
    public function run(): void
    {
        $pemilik_id = [1, 2, 3]; // Admin, Pemilik users from UserSeeder

        $kendaraanList = [
            ['motor', 'Honda Vario 125', 'Motor matic 125cc, warna hitam'],
            ['motor', 'Yamaha N-Max', 'Motor matic 155cc, warna putih'],
            ['sepeda', 'Sepeda Gunung', 'Sepeda gunung 21 speed, warna silver'],
            ['motor_helm', 'Honda Beat + Helm', 'Motor matic 110cc dengan helm SNI, warna kuning'],
            ['sepeda', 'Sepeda Lipat', 'Sepeda lipat portabel, warna hitam'],
        ];

        foreach ($kendaraanList as $i => $k) {
            Kendaraan::create([
                'id_pemilik' => $pemilik_id[$i % 3],
                'jenis_kendaraan' => $k[0],
                'nama_kendaraan' => $k[1],
                'spesifikasi' => $k[2],
                'status' => 'tersedia'
            ]);
        }
    }
}
