<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;

class BrowseKendaraanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::where('status', 'tersedia')->get();
        return view('peminjam.browse.index', compact('kendaraan'));
    }

    public function detail($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('peminjam.kendaraan.show', compact('kendaraan'));
    }
}
