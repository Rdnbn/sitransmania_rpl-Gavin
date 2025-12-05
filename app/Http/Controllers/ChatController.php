<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use App\Services\ActivityService;

class ChatController extends Controller
{
    // List user yang pernah chat atau bisa diajak chat
    public function index()
    {
        $id = auth()->id();

        // Ambil daftar user yang pernah chat (pengirim/penerima)
        $users = User::where('id_user', '!=', $id)->get();

        return view('chat.index', compact('users'));
    }

    // Buka ruang chat dengan user tertentu
    public function room($id_penerima)
    {
        $id_pengirim = auth()->id();

        // Ambil riwayat chat antar 2 user
        $chat = Chat::where(function ($q) use ($id_pengirim, $id_penerima) {
                $q->where('id_pengirim', $id_pengirim)
                  ->where('id_penerima', $id_penerima);
            })
            ->orWhere(function ($q) use ($id_pengirim, $id_penerima) {
                $q->where('id_pengirim', $id_penerima)
                  ->where('id_penerima', $id_pengirim);
            })
            ->orderBy('waktu_kirim', 'asc')
            ->get();

        // Update status baca
        Chat::where('id_pengirim', $id_penerima)
            ->where('id_penerima', $id_pengirim)
            ->update(['status_baca' => 'dibaca']);

        $penerima = User::findOrFail($id_penerima);
        return view('chat.room', compact('chat', 'penerima'));
    }

    // Kirim pesan
    public function send(Request $request)
    {
        $request->validate([
            'id_penerima' => 'required',
            'isi_pesan' => 'required'
        ]);

        Chat::create([
            'id_pengirim' => auth()->id(),
            'id_penerima' => $request->id_penerima,
            'isi_pesan' => $request->isi_pesan,
            'status_baca' => 'terkirim'
        ]);

        return back();
    }
}