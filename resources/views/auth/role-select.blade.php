@extends('layouts.main')

@section('title', 'Pilih Peran')

@section('content')
<div class="container py-5">
    <div style="max-width: 900px; margin: 0 auto;">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 style="font-size: 2.5rem; color: #3d2817; font-weight: 700; margin-bottom: 0.5rem;">
                Pilih Peran Anda
            </h1>
            <p style="color: #8B6354; font-size: 1.1rem;">
                Sebagai apa Anda ingin bergabung dengan SITRANSMANIA?
            </p>
        </div>

        <!-- Role Selection Cards -->
        <div class="row g-4">
            <!-- Peminjam Card -->
            <div class="col-md-6">
                <div class="role-card" style="background: white; border: 2px solid #E7D6C8; border-radius: 15px; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; min-height: 400px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); opacity: 0; transition: opacity 0.3s ease;"></div>
                    
                    <div style="font-size: 4rem; margin-bottom: 1.5rem; color: #6C4E3F;">
                        <i class="bi bi-person-check-fill"></i>
                    </div>

                    <h2 style="color: #3d2817; font-weight: 700; font-size: 1.5rem; margin-bottom: 1rem;">
                        Peminjam
                    </h2>

                    <p style="color: #8B6354; font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem; flex-grow: 1;">
                        Anda adalah pencari kendaraan yang membutuhkan transportasi untuk mobilitas sehari-hari.
                    </p>

                    <div style="background: #f9f7f5; border-radius: 10px; padding: 1rem; margin-bottom: 2rem; width: 100%; text-align: left;">
                        <h4 style="color: #6C4E3F; font-weight: 600; margin-bottom: 0.75rem; font-size: 0.9rem;">
                            <i class="bi bi-check-circle-fill"></i> Fitur Anda:
                        </h4>
                        <ul style="list-style: none; padding: 0; margin: 0; color: #8B6354; font-size: 0.85rem;">
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Jelajahi kendaraan tersedia</li>
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Ajukan peminjaman</li>
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Kelola pembayaran</li>
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Chat dengan pemilik</li>
                            <li><i class="bi bi-check2"></i> Lihat riwayat peminjaman</li>
                        </ul>
                    </div>

                    <a href="{{ route('register', ['role' => 'peminjam']) }}" class="btn btn-primary" style="width: 100%; padding: 0.75rem 1.5rem; font-weight: 600;">
                        <i class="bi bi-arrow-right-circle"></i> Lanjut sebagai Peminjam
                    </a>
                </div>
            </div>

            <!-- Pemilik Card -->
            <div class="col-md-6">
                <div class="role-card" style="background: white; border: 2px solid #E7D6C8; border-radius: 15px; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; min-height: 400px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); opacity: 0; transition: opacity 0.3s ease;"></div>
                    
                    <div style="font-size: 4rem; margin-bottom: 1.5rem; color: #6C4E3F;">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>

                    <h2 style="color: #3d2817; font-weight: 700; font-size: 1.5rem; margin-bottom: 1rem;">
                        Pemilik Kendaraan
                    </h2>

                    <p style="color: #8B6354; font-size: 0.95rem; line-height: 1.8; margin-bottom: 1.5rem; flex-grow: 1;">
                        Anda adalah pemilik kendaraan yang ingin memungkinkan orang lain menyewa kendaraan Anda.
                    </p>

                    <div style="background: #f9f7f5; border-radius: 10px; padding: 1rem; margin-bottom: 2rem; width: 100%; text-align: left;">
                        <h4 style="color: #6C4E3F; font-weight: 600; margin-bottom: 0.75rem; font-size: 0.9rem;">
                            <i class="bi bi-check-circle-fill"></i> Fitur Anda:
                        </h4>
                        <ul style="list-style: none; padding: 0; margin: 0; color: #8B6354; font-size: 0.85rem;">
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Daftarkan kendaraan Anda</li>
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Kelola permintaan peminjaman</li>
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Lihat status pembayaran</li>
                            <li style="margin-bottom: 0.5rem;"><i class="bi bi-check2"></i> Komunikasi dengan peminjam</li>
                            <li><i class="bi bi-check2"></i> Lacak riwayat penyewaan</li>
                        </ul>
                    </div>

                    <a href="{{ route('register', ['role' => 'pemilik']) }}" class="btn btn-primary" style="width: 100%; padding: 0.75rem 1.5rem; font-weight: 600;">
                        <i class="bi bi-arrow-right-circle"></i> Lanjut sebagai Pemilik
                    </a>
                </div>
            </div>
        </div>

        <!-- Back Link -->
        <div class="text-center mt-4">
            <a href="{{ route('landing') }}" style="color: #8B6354; text-decoration: none; font-weight: 500;">
                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<style>
    .role-card:hover {
        border-color: #6C4E3F;
        box-shadow: 0 8px 24px rgba(108, 78, 63, 0.15);
        transform: translateY(-3px);
    }
    
    .role-card:hover > div:first-child {
        opacity: 1;
    }
    
    .role-card i {
        transition: all 0.3s ease;
    }
    
    .role-card:hover i {
        color: #8B6354;
        transform: scale(1.1);
    }
</style>
@endsection
