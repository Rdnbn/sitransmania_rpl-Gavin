<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Pembayaran;
use App\Models\ChatMessage;

class DashboardPemilikController extends Controller
{
    public function index()
    {
        $pemilikId = auth()->id();

        // Get kendaraan IDs owned by this pemilik
        $kendaraanIds = Kendaraan::where('id_pemilik', $pemilikId)->pluck('id_kendaraan');

        return view('pemilik.dashboard.index', [
            'totalKendaraan' => Kendaraan::where('id_pemilik', $pemilikId)->count(),
            'totalPinjam'    => Peminjaman::whereIn('id_kendaraan', $kendaraanIds)->count(),
            'totalPay'       => Pembayaran::whereHas('peminjaman', function ($query) use ($kendaraanIds) {
                $query->whereIn('id_kendaraan', $kendaraanIds);
            })->count(),
        ]);
    }
}
