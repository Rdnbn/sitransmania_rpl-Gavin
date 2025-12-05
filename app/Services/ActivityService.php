<?php

namespace App\Services;

use App\Models\RiwayatAktivitas;

class ActivityService
{
    public static function add($id_user, $aktivitas, $keterangan = null, $id_peminjaman = null)
    {
        RiwayatAktivitas::create([
            'id_user'       => $id_user,
            'aktivitas'     => $aktivitas,
            'tanggal'       => now(),
            'kategori'      => 'sistem'
        ]);
    }
}
