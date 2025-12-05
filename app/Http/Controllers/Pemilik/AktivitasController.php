<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;

class AktivitasController extends Controller
{
    public function index()
    {
        return view('pemilik.aktivitas.index');
    }

    public function liveMap($id)
    {
        $kendaraan = Kendaraan::where('id_pemilik', auth()->id())->findOrFail($id);
        return view('pemilik.livemap.view', compact('kendaraan'));
    }
}
