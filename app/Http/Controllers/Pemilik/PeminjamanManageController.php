<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Notifikasi;
use App\Models\Kendaraan;
use App\Models\Pembayaran;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class PeminjamanManageController extends Controller
{
    // LIST PEMINJAMAN
    public function index()
    {
        $peminjaman = Peminjaman::with(['kendaraan', 'pembayaran'])
            ->whereHas('kendaraan', function ($q) {
                $q->where('id_pemilik', auth()->id());
            })
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pemilik.peminjam.index', compact('peminjaman'));
    }

    // SETUJUI PEMINJAMAN
    public function setujui($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->update(['status_peminjaman' => 'disetujui']);

        // NOTIFIKASI UNTUK PEMINJAM
        Notifikasi::create([
            'id_user' => $pinjam->id_peminjam,
            'tipe' => 'peminjaman',
            'isi' => 'Permintaan peminjaman Anda disetujui. Silakan lanjut ke pembayaran.',
            'id_peminjaman' => $pinjam->id_peminjaman,
            'status' => 'baru'
        ]);

        // CATATAN RIWAYAT
        ActivityService::add(
            auth()->id(),
            "Setujui Peminjaman",
            "Menyetujui peminjaman ID #{$pinjam->id_peminjaman}",
            $pinjam->id_peminjaman
        );

        return back()->with('success', 'Peminjaman disetujui.');
    }

    // TOLAK PEMINJAMAN
    public function tolak($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->update(['status_peminjaman' => 'ditolak']);

        $kendaraan = Kendaraan::find($pinjam->id_kendaraan);
        $kendaraan->update(['status' => 'tersedia']);

        Notifikasi::create([
            'id_user' => $pinjam->id_peminjam,
            'tipe' => 'peminjaman',
            'isi' => 'Permintaan peminjaman Anda ditolak.',
            'id_peminjaman' => $pinjam->id_peminjaman,
            'status' => 'baru'
        ]);

        // CATATAN RIWAYAT
        ActivityService::add(
            auth()->id(),
            "Tolak Peminjaman",
            "Menolak peminjaman ID #{$pinjam->id_peminjaman}",
            $pinjam->id_peminjaman
        );

        return back()->with('success', 'Peminjaman ditolak.');
    }

    // VERIFIKASI PEMBAYARAN
    public function verifikasi($id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pembayaran = Pembayaran::where('id_peminjaman', $id)->first();

        if (!$pembayaran) {
            return back()->with('error', 'Belum ada bukti pembayaran.');
        }

        $pembayaran->update(['status_pembayaran' => 'dibayar']);

        // NOTIFIKASI
        Notifikasi::create([
            'id_user' => $pinjam->id_peminjam,
            'tipe' => 'pembayaran',
            'isi' => 'Pembayaran Anda telah diverifikasi.',
            'id_peminjaman' => $pinjam->id_peminjaman,
            'status' => 'baru'
        ]);

        // CATATAN RIWAYAT
        ActivityService::add(
            auth()->id(),
            "Verifikasi Pembayaran",
            "Memverifikasi pembayaran untuk peminjaman ID #{$pinjam->id_peminjaman}",
            $pinjam->id_peminjaman
        );

        return back()->with('success', 'Pembayaran diverifikasi.');
    }

    // UPDATE STATUS PEMINJAMAN
    public function updateStatus(Request $request, $id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        $pinjam->update(['status_peminjaman' => $request->status]);

        // Jika selesai → kendaraan tersedia lagi
        if ($request->status == 'selesai') {
            $kendaraan = Kendaraan::find($pinjam->id_kendaraan);
            $kendaraan->update(['status' => 'tersedia']);
        }

        // CATATAN RIWAYAT
        ActivityService::add(
            auth()->id(),
            "Update Status Peminjaman",
            "Mengubah status peminjaman menjadi: {$request->status}",
            $pinjam->id_peminjaman
        );

        return back()->with('success', 'Status peminjaman diperbarui.');
    }
}
