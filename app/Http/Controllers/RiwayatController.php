<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RiwayatAktivitas;

class RiwayatController extends Controller
{
    /**
     * ===============================
     *  ADMIN — melihat semua aktivitas
     * ===============================
     */
    public function admin(Request $request)
    {
        $query = RiwayatAktivitas::with('user')
            ->orderBy('tanggal', 'DESC');

        // FILTER USER
        if ($request->filled('user')) {
            $query->where('id_user', $request->user);
        }

        // FILTER KATEGORI
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // FILTER TANGGAL
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
        }

        // PAGINATION
        $riwayat = $query->paginate(15);

        // Dropdown user & kategori
        $users = User::orderBy('nama')->get();
        $aksiList = RiwayatAktivitas::select('aktivitas')->distinct()->pluck('aktivitas');

        return view('admin.riwayat.index', compact('riwayat', 'users', 'aksiList'));
    }


    /**
     * ===============================
     *  PEMILIK — aktivitas pemilik
     * ===============================
     */
    public function pemilik(Request $request)
    {
        $query = RiwayatAktivitas::where('id_user', auth()->id())
            ->orderBy('tanggal', 'DESC');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
        }

        $riwayat = $query->paginate(15);
        $aksiList = RiwayatAktivitas::select('aktivitas')->distinct()->pluck('aktivitas');

        return view('pemilik.riwayat.index', compact('riwayat', 'aksiList'));
    }


    /**
     * ===============================
     *  PEMINJAM — aktivitas peminjam
     * ===============================
     */
    public function peminjam(Request $request)
    {
        $query = RiwayatAktivitas::where('id_user', auth()->id())
            ->orderBy('tanggal', 'DESC');

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal', '<=', $request->tanggal_akhir);
        }

        $riwayat = $query->paginate(15);
        $aksiList = RiwayatAktivitas::select('aktivitas')->distinct()->pluck('aktivitas');

        return view('peminjam.riwayat.index', compact('riwayat', 'aksiList'));
    }
}
