<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notif';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_peminjaman',
        'judul',
        'isi',
        'tipe',
        'status',
        'waktu'
    ];

    protected $casts = [
        'waktu' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
