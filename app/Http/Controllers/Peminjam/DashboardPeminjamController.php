<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pembayaran;
use App\Models\Chat;

class DashboardPeminjamController extends Controller
{
    public function index()
    {
        $id = auth()->id();

        // ambil semua id peminjaman milik user
        $peminjamanIds = Peminjaman::where('id_peminjam', $id)->pluck('id_peminjaman');

        return view('peminjam.dashboard.index', [
            'totalPinjam' => $peminjamanIds->count(),
            'totalPay'    => Pembayaran::whereIn('id_peminjaman', $peminjamanIds)->count(),
            'lastStatus'  => Peminjaman::where('id_peminjam', $id)->latest()->value('status_peminjaman'),
        ]);
    }
}
