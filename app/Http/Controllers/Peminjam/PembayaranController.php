<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pembayaran;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    // HALAMAN PEMBAYARAN
    public function index($id_peminjaman)
    {
        $peminjaman = Peminjaman::with(['kendaraan.pemilik'])->findOrFail($id_peminjaman);

        // Ambil QR pemilik dari users.qris_image
        $qris = $peminjaman->kendaraan->pemilik->qris_image ?? null;

        return view('peminjam.pembayaran.index', compact('peminjaman', 'qris'));
    }

    // UPLOAD BUKTI PEMBAYARAN
    public function upload(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjaman,id_peminjaman',
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $peminjaman = Peminjaman::with('kendaraan.pemilik')
            ->where('id_peminjaman', $request->id_peminjaman)
            ->firstOrFail();

        // ambil id pemilik dari relasi → BUKAN dari request
        $id_pemilik = $peminjaman->kendaraan->pemilik->id;

        // upload bukti
        $fileName = time() . '-' . $request->bukti->getClientOriginalName();
        $request->bukti->move(public_path('uploads/bukti'), $fileName);

        // simpan pembayaran
        Pembayaran::create([
            'id_peminjaman' => $request->id_peminjaman,
            'id_pemilik'    => $id_pemilik,
            'id_peminjam'   => Auth::id(),        // ditambahkan agar relasi jelas
            'status'        => 'DP',
            'bukti'         => $fileName,
        ]);

        // notifikasi untuk pemilik
        Notifikasi::create([
            'id_user'       => $id_pemilik,
            'jenis'         => 'pembayaran',
            'pesan'         => 'Peminjam mengunggah bukti pembayaran.',
            'id_peminjaman' => $request->id_peminjaman,
            'is_read'       => 0,
        ]);

        return redirect()->route('peminjam.dashboard')
            ->with('success', 'Bukti pembayaran berhasil dikirim! Tunggu konfirmasi dari pemilik.');
    }
}
