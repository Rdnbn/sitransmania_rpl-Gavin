<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 5) as $i) {
            $metode = ['qris', 'transfer'][rand(0, 1)];
            Pembayaran::create([
                'id_peminjaman' => $i,
                'metode' => $metode,
                'qr_code' => $metode === 'qris' ? 'qr_code_' . $i . '.png' : null,
                'bukti_transfer' => $metode === 'transfer' ? 'bukti_' . $i . '.jpg' : null,
                'jumlah_dibayar' => rand(10000, 50000),
                'status_pembayaran' => ['dp', 'dibayar'][rand(0, 1)]
            ]);
        }
    }
}
