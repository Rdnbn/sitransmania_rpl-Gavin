<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // LIST KENDARAAN PEMILIK
    public function index()
    {
        $kendaraan = Kendaraan::where('id_pemilik', auth()->id())->get();

        return view('pemilik.kendaraan.index', compact('kendaraan'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('pemilik.kendaraan.create');
    }

    // SIMPAN DATA KENDARAAN
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kendaraan'    => 'required|in:sepeda,motor,motor_helm',
            'nama_kendaraan'     => 'required',
            'spesifikasi'        => 'nullable',
            'status'             => 'required|in:tersedia,tidak_tersedia,tidak_aktif',
            'foto_kendaraan'     => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // HANDLE UPLOAD FOTO
        $fotoName = null;
        if ($request->hasFile('foto_kendaraan')) {
            $fotoName = time() . '_' . $request->foto_kendaraan->getClientOriginalName();
            $request->foto_kendaraan->move(public_path('uploads/kendaraan'), $fotoName);
        }

        // SIMPAN DATABASE
        Kendaraan::create([
            'id_pemilik'         => auth()->id(),
            'jenis_kendaraan'    => $request->jenis_kendaraan,
            'nama_kendaraan'     => $request->nama_kendaraan,
            'spesifikasi'        => $request->spesifikasi,
            'foto_kendaraan'     => $fotoName,
            'status'             => $request->status
        ]);

        return redirect()->route('pemilik.kendaraan.index')->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    // FORM EDIT
    public function show($id)
    {
        $kendaraan = Kendaraan::where('id_pemilik', auth()->id())->findOrFail($id);

        return view('pemilik.kendaraan.show', compact('kendaraan'));
    }

    // FORM EDIT
    public function edit($id)
    {
        $kendaraan = Kendaraan::where('id_pemilik', auth()->id())->findOrFail($id);

        return view('pemilik.kendaraan.edit', compact('kendaraan'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::where('id_pemilik', auth()->id())->findOrFail($id);

        $request->validate([
            'jenis_kendaraan'    => 'required|in:sepeda,motor,motor_helm',
            'nama_kendaraan'     => 'required',
            'spesifikasi'        => 'nullable',
            'status'             => 'required|in:tersedia,tidak_tersedia,tidak_aktif',
            'foto_kendaraan'     => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // FOTO BARU
        if ($request->hasFile('foto_kendaraan')) {
            if ($kendaraan->foto_kendaraan && file_exists(public_path('uploads/kendaraan/' . $kendaraan->foto_kendaraan))) {
                unlink(public_path('uploads/kendaraan/' . $kendaraan->foto_kendaraan));
            }

            $fotoName = time() . '_' . $request->foto_kendaraan->getClientOriginalName();
            $request->foto_kendaraan->move(public_path('uploads/kendaraan'), $fotoName);
            $kendaraan->foto_kendaraan = $fotoName;
        }

        // UPDATE DATA
        $kendaraan->update([
            'jenis_kendaraan'    => $request->jenis_kendaraan,
            'nama_kendaraan'     => $request->nama_kendaraan,
            'spesifikasi'        => $request->spesifikasi,
            'status'             => $request->status,
            'foto_kendaraan'     => $kendaraan->foto_kendaraan
        ]);

        return redirect()->route('pemilik.kendaraan.index')->with('success', 'Kendaraan berhasil diperbarui!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $kendaraan = Kendaraan::where('id_pemilik', auth()->id())->findOrFail($id);

        if ($kendaraan->foto_kendaraan && file_exists(public_path('uploads/kendaraan/' . $kendaraan->foto_kendaraan))) {
            unlink(public_path('uploads/kendaraan/' . $kendaraan->foto_kendaraan));
        }

        $kendaraan->delete();

        return redirect()->route('pemilik.kendaraan.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
