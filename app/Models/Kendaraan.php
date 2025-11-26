<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [
        'id_pemilik',
        'jenis_kendaraan',
        'nama_kendaraan',
        'spesifikasi',
        'foto_kendaraan',
        'syarat_ketentuan',
        'nomor_rekening',
        'status',
        'tanggal_tersedia',
        'waktu_tersedia'
    ];

    public function pemilik()
    {
        return $this->belongsTo(User::class, 'id_pemilik');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_kendaraan');
    }

    public function lokasi()
    {
        return $this->hasMany(LokasiKendaraan::class, 'id_kendaraan');
    }
}
