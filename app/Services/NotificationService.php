<?php

namespace App\Services;

use App\Models\Notifikasi;

class NotificationService
{
    public static function send($id_user, $id_peminjaman, $judul, $isi, $tipe = 'sistem')
    {
        return Notifikasi::create([
            'id_user' => $id_user,
            'id_peminjaman' => $id_peminjaman,
            'judul' => $judul,
            'isi' => $isi,
            'tipe' => $tipe,
            'status' => 'baru'
        ]);
    }
}
