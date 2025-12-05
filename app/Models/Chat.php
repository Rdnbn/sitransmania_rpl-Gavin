<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'id_chat';
    public $timestamps = false;

    protected $fillable = [
        'id_pengirim',
        'id_penerima',
        'id_peminjaman',
        'isi_pesan',
        'waktu_kirim',
        'status_baca'
    ];

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'id_pengirim');
    }

    public function penerima()
    {
        return $this->belongsTo(User::class, 'id_penerima');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
