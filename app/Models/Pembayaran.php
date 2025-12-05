<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;

    protected $fillable = [
        'id_peminjaman',
        'metode',
        'qr_code',
        'bukti_transfer',
        'jumlah_dibayar',
        'status_pembayaran',
        'tanggal_bayar'
    ];

    public function peminjaman()
{
    return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
}



}
