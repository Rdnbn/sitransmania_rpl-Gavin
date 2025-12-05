<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Services\ActivityService;

class NotifikasiController extends Controller
{
    public function read($id)
    {
        $notif = Notifikasi::findOrFail($id);
        $notif->status = 'dibaca';
        $notif->save();

        // === CATATAN RIWAYAT ===
        ActivityService::add(
            auth()->id(),
            "Baca Notifikasi",
            "Membaca notifikasi: {$notif->judul}",
            $notif->id_peminjaman
        );

        if ($notif->id_peminjaman) {
            return redirect()->route('peminjam.peminjaman.detail', $notif->id_peminjaman);
        }
        
        return back();
    }
}
