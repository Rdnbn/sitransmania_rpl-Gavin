<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use App\Services\ActivityService;

class PembayaranController extends Controller
{
    public function index($id_peminjaman)
    {
        $pinjam = Peminjaman::with('kendaraan.pemilik')->findOrFail($id_peminjaman);

        return view('peminjam.pembayaran.index', [
            'pinjam' => $pinjam,
            'pemilik' => $pinjam->kendaraan->pemilik,
            'pembayaran' => $pinjam->pembayaran
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required',
            'bukti' => 'required|mimes:jpg,png,jpeg,pdf|max:2048'
        ]);

        $file = $request->file('bukti');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/pembayaran/'), $filename);

        $pinjam = Peminjaman::findOrFail($request->id_peminjaman);

        Pembayaran::updateOrCreate(
            ['id_peminjaman' => $request->id_peminjaman],
            [
                'status_pembayaran' => 'dp',
                'bukti_transfer' => $filename
            ]
        );
        // === NOTIFIKASI UNTUK PEMILIK ===
        NotificationService::send(
            $pinjam->kendaraan->id_pemilik,
            $request->id_peminjaman,
            "Bukti Pembayaran Dikirim",
            "Peminjam telah mengirim bukti pembayaran untuk diverifikasi."
        );

        // === CATATAN RIWAYAT ===
        ActivityService::add(
            auth()->id(),
            "Upload Bukti Pembayaran",
            "Mengirim bukti pembayaran untuk verifikasi",
            $request->id_peminjaman
        );

        return back()->with('success', 'Bukti pembayaran berhasil dikirim.');
    }

    // ===============================
    //  PEMILIK — verifikasi pembayaran
    // ===============================
    public function pemilikView($id_peminjaman)
    {
        $pembayaran = Pembayaran::where('id_peminjaman', $id_peminjaman)->first();

        return view('pemilik.pembayaran.index', compact('pembayaran'));
    }

    public function verifikasi(Request $request)
    {
        $request->validate([
            'id_pembayaran' => 'required',
            'status' => 'required|in:dp,dibayar'
        ]);

        $bayar = Pembayaran::findOrFail($request->id_pembayaran);
        $bayar->status_pembayaran = $request->status;
        $bayar->save();
        
        // === NOTIFIKASI UNTUK PEMINJAM ===
        NotificationService::send(
            $bayar->peminjaman->id_peminjam,
            $bayar->id_peminjaman,
            "Status Pembayaran",
            "Pembayaran Anda telah {$request->status}."
        );

        // === CATATAN RIWAYAT ===
        ActivityService::add(
            auth()->id(),
            "Verifikasi Pembayaran",
            "Memverifikasi pembayaran menjadi: {$request->status}",
            $bayar->id_peminjaman
        );

        return back()->with('success', 'Status pembayaran diperbarui.');
    }

    public function riwayatPemilik()
    {
        $pemilikId = auth()->id();
        
        $riwayat = Pembayaran::with('peminjaman.kendaraan')
            ->whereHas('peminjaman.kendaraan', function ($q) use ($pemilikId) {
                $q->where('id_pemilik', $pemilikId);
            })
            ->latest()
            ->get();

        return view('pemilik.pembayaran.riwayat', compact('riwayat'));
    }
}
