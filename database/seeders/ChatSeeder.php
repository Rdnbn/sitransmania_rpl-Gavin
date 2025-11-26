<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChatMessage;

class ChatSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 5) as $pid) {

            ChatMessage::create([
                'id_peminjaman' => $pid,
                'id_pengirim' => 4, // peminjam from UserSeeder
                'id_penerima' => 2, // pemilik from UserSeeder
                'isi_pesan' => "Halo kak, apakah kendaraan tersedia?",
                'status_baca' => 'dibaca'
            ]);

            ChatMessage::create([
                'id_peminjaman' => $pid,
                'id_pengirim' => 2, // pemilik
                'id_penerima' => 4, // peminjam
                'isi_pesan' => "Iya, kendaraan siap digunakan.",
                'status_baca' => 'terkirim'
            ]);
        }
    }
}
