<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pemilik\DashboardPemilikController;
use App\Http\Controllers\Pemilik\KendaraanController;
use App\Http\Controllers\Pemilik\AktivitasController;
use App\Http\Controllers\Pemilik\PeminjamController;
use App\Http\Controllers\Pemilik\ChatPemilikController;
use App\Http\Controllers\Pemilik\PembayaranPemilikController;
use App\Http\Controllers\Pemilik\PeminjamanManageController;
use App\Http\Controllers\RiwayatController;

        // DASHBOARD
        Route::get('/dashboard', [DashboardPemilikController::class, 'index'])
            ->name('pemilik.dashboard');

        // KENDARAAN
        Route::resource('/kendaraan', KendaraanController::class);

        // AKTIVITAS
        Route::get('/aktivitas', [AktivitasController::class, 'index'])
            ->name('pemilik.aktivitas.index');

        Route::get('/aktivitas/lokasi/{id}', [AktivitasController::class, 'liveMap'])
            ->name('pemilik.aktivitas.map');

        // DATA PEMINJAM
        Route::get('/peminjam', [PeminjamController::class, 'index'])
            ->name('pemilik.peminjam.index');

        // PEMINJAMAN
        Route::get('/peminjaman', [PeminjamanManageController::class, 'index'])
            ->name('pemilik.peminjaman.index');

        Route::post('/peminjaman/setujui/{id}', [PeminjamanManageController::class, 'setujui'])
            ->name('pemilik.peminjaman.setujui');

        Route::post('/peminjaman/tolak/{id}', [PeminjamanManageController::class, 'tolak'])
            ->name('pemilik.peminjaman.tolak');

        Route::post('/peminjaman/verifikasi/{id}', [PeminjamanManageController::class, 'verifikasi'])
            ->name('pemilik.peminjaman.verifikasi');

        Route::post('/peminjaman/status/{id}', [PeminjamanManageController::class, 'updateStatus'])
            ->name('pemilik.peminjaman.updateStatus');

        // CHAT
        Route::get('/chat', [ChatPemilikController::class, 'index'])
            ->name('pemilik.chat.index');

        Route::get('/chat/{room}', [ChatPemilikController::class, 'show'])
            ->name('pemilik.chat.show');

        // PEMBAYARAN
        Route::get('/pembayaran', [PembayaranPemilikController::class, 'index'])
            ->name('pemilik.pembayaran.index');

        // RIWAYAT
        Route::get('/riwayat', [RiwayatController::class, 'pemilik'])
            ->name('pemilik.riwayat');
