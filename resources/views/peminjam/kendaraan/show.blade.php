@extends('layouts.main')

@section('title', 'Detail Kendaraan')

@section('content')
<div style="background: linear-gradient(135deg, #f9f7f5 0%, #f5f3f1 100%); min-height: calc(100vh - 150px); padding: 3rem 2rem;">
    <div class="container">
        <!-- Back Button -->
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('peminjam.browse.index') }}" style="color: #6C4E3F; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="bi bi-arrow-left"></i> Kembali ke Pencarian
            </a>
        </div>

        <!-- Main Content -->
        <div class="row g-4">
            <!-- Left Column: Images & Details -->
            <div class="col-lg-7">
                <!-- Main Image -->
                <div style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1); margin-bottom: 2rem;">
                    <div style="background: linear-gradient(135deg, #E7D6C8 0%, #D9CABE 100%); min-height: 400px; display: flex; align-items: center; justify-content: center;">
                        @if($kendaraan->foto_kendaraan)
                            <img src="{{ asset('storage/' . $kendaraan->foto_kendaraan) }}" alt="{{ $kendaraan->nama_kendaraan }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="bi bi-car-front" style="font-size: 5rem; color: #C9A58C;"></i>
                        @endif
                    </div>
                </div>

                <!-- Specifications -->
                <div style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1); margin-bottom: 2rem;">
                    <h3 style="color: #3d2817; font-weight: 700; margin-bottom: 1.5rem;">
                        <i class="bi bi-info-circle"></i> Spesifikasi Kendaraan
                    </h3>

                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                        <div>
                            <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.3rem; font-weight: 500;">Jenis Kendaraan</p>
                            <p style="color: #3d2817; font-weight: 600; font-size: 1rem; margin: 0;">{{ ucfirst($kendaraan->jenis_kendaraan) }}</p>
                        </div>

                        <div>
                            <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.3rem; font-weight: 500;">Status</p>
                            <p style="color: white; font-weight: 600; font-size: 0.85rem; margin: 0; background: #6C4E3F; padding: 0.3rem 0.8rem; border-radius: 20px; display: inline-block; text-transform: capitalize;">
                                {{ $kendaraan->status }}
                            </p>
                        </div>

                        <div>
                            <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.3rem; font-weight: 500;">Tanggal Tersedia</p>
                            <p style="color: #3d2817; font-weight: 600; font-size: 1rem; margin: 0;">
                                {{ $kendaraan->tanggal_tersedia ? \Carbon\Carbon::parse($kendaraan->tanggal_tersedia)->format('d M Y') : 'Segera' }}
                            </p>
                        </div>

                        <div>
                            <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.3rem; font-weight: 500;">Waktu Tersedia</p>
                            <p style="color: #3d2817; font-weight: 600; font-size: 1rem; margin: 0;">
                                {{ $kendaraan->waktu_tersedia ?? '24 Jam' }}
                            </p>
                        </div>
                    </div>

                    <hr style="border-color: #E7D6C8; margin: 1.5rem 0;">

                    <div>
                        <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.5rem; font-weight: 500;">Deskripsi Lengkap</p>
                        <p style="color: #3d2817; line-height: 1.8; margin: 0;">
                            {{ $kendaraan->spesifikasi ?? 'Tidak ada deskripsi' }}
                        </p>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1);">
                    <h3 style="color: #3d2817; font-weight: 700; margin-bottom: 1.5rem;">
                        <i class="bi bi-file-text"></i> Syarat & Ketentuan
                    </h3>

                    <div style="background: #f9f7f5; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #6C4E3F;">
                        <p style="color: #3d2817; line-height: 1.8; margin: 0;">
                            {{ $kendaraan->syarat_ketentuan ?? 'Tidak ada syarat khusus' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Owner & Actions -->
            <div class="col-lg-5">
                <!-- Owner Card -->
                <div style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1); margin-bottom: 2rem; border-top: 4px solid #6C4E3F;">
                    <h3 style="color: #3d2817; font-weight: 700; margin-bottom: 1.5rem;">
                        <i class="bi bi-person-circle"></i> Pemilik Kendaraan
                    </h3>

                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid #E7D6C8;">
                        <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; flex-shrink: 0;">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h4 style="color: #3d2817; margin: 0 0 0.25rem 0; font-weight: 700;">
                                {{ $kendaraan->pemilik->nama ?? 'Pemilik' }}
                            </h4>
                            <p style="color: #8B6354; font-size: 0.9rem; margin: 0;">
                                <i class="bi bi-star-fill"></i> Pemilik Terpercaya
                            </p>
                        </div>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.3rem; font-weight: 500;">
                            <i class="bi bi-telephone"></i> Nomor Telepon
                        </p>
                        <p style="color: #3d2817; font-weight: 600; margin: 0;">
                            {{ $kendaraan->pemilik->no_telp ?? '-' }}
                        </p>
                    </div>

                    <div style="margin-bottom: 1rem;">
                        <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.3rem; font-weight: 500;">
                            <i class="bi bi-geo-alt"></i> Lokasi
                        </p>
                        <p style="color: #3d2817; font-weight: 600; margin: 0;">
                            @if($kendaraan->lokasi->count() > 0)
                                {{ $kendaraan->lokasi->first()->nama_lokasi ?? 'Tidak tersedia' }}
                            @else
                                Lokasi tidak tersedia
                            @endif
                        </p>
                    </div>

                    <div>
                        <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 0.3rem; font-weight: 500;">
                            <i class="bi bi-building"></i> Asrama
                        </p>
                        <p style="color: #3d2817; font-weight: 600; margin: 0;">
                            @if($kendaraan->pemilik->asrama && $kendaraan->pemilik->kamar)
                                {{ $kendaraan->pemilik->asrama }} Kamar {{ $kendaraan->pemilik->kamar }}
                            @else
                                Tidak tersedia
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                @if($waLink)
    <a href="{{ $waLink }}" target="_blank"
       class="action-btn"
       style="background: #25D366; color: white; border: none; padding: 1rem 1.5rem; border-radius: 10px; text-align: center; text-decoration: none; font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; display: block;">
        <i class="bi bi-whatsapp"></i> Chat via WhatsApp
    </a>
@else
    <button disabled
        class="action-btn"
        style="background: #ccc; color: #666; padding: 1rem 1.5rem; border-radius: 10px; text-align: center; font-weight: 600; font-size: 0.95rem; display: block; cursor: not-allowed;">
        <i class="bi bi-whatsapp"></i> Nomor WA Tidak Tersedia
    </button>
@endif


                <!-- Quick Info -->
                <div style="background: linear-gradient(135deg, rgba(108, 78, 63, 0.05) 0%, rgba(201, 165, 140, 0.05) 100%); border: 2px solid #E7D6C8; border-radius: 15px; padding: 1.5rem;">
                    <h4 style="color: #3d2817; font-weight: 700; margin-bottom: 1rem;">
                        <i class="bi bi-exclamation-circle"></i> Informasi Penting
                    </h4>
                    <ul style="list-style: none; padding: 0; margin: 0; color: #8B6354; font-size: 0.9rem; line-height: 1.8;">
                        <li><i class="bi bi-check-circle"></i> Pastikan data diri Anda lengkap</li>
                        <li><i class="bi bi-check-circle"></i> Hubungi pemilik sebelum meminjam</li>
                        <li><i class="bi bi-check-circle"></i> Bayar sesuai dengan jadwal</li>
                        <li><i class="bi bi-check-circle"></i> Jaga kondisi kendaraan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 78, 63, 0.2);
    }
    
    @media (max-width: 768px) {
        .row {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }
    }
</style>
@endsection
