<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatAktivitas extends Model
{
    protected $table = 'riwayat';
    protected $primaryKey = 'id_riwayat';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'aktivitas',
        'tanggal',
        'kategori'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
