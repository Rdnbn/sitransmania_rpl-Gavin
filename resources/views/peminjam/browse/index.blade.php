@extends('layouts.main')

@section('title', 'Transportasi - Cari Kendaraan')

@section('content')
<div style="background: linear-gradient(135deg, #f9f7f5 0%, #f5f3f1 100%); min-height: calc(100vh - 150px); padding: 3rem 2rem;">
    <div class="container">
        <!-- Page Header -->
        <div style="margin-bottom: 3rem;">
            <h1 style="color: #3d2817; font-weight: 700; font-size: 2.2rem; margin-bottom: 0.5rem;">
                <i class="bi bi-search"></i> Cari Kendaraan
            </h1>
            <p style="color: #8B6354; font-size: 1rem;">
                Temukan kendaraan yang tepat untuk kebutuhan Anda
            </p>
        </div>

        <!-- Filter Section -->
        <div style="background: white; border-radius: 15px; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1);">
            <h3 style="color: #3d2817; font-weight: 600; margin-bottom: 1.5rem;">
                <i class="bi bi-funnel"></i> Filter Pencarian
            </h3>
            
            <div class="row g-3">
                <div class="col-md-3">
                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Jenis Kendaraan</label>
                    <select style="width: 100%; padding: 0.75rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;">
                        <option value="">-- Semua Jenis --</option>
                        <option value="motor">Motor</option>
                        <option value="mobil">Mobil</option>
                        <option value="sepeda">Sepeda</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Harga Mulai Dari</label>
                    <input type="number" placeholder="Rp" style="width: 100%; padding: 0.75rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;">
                </div>
                <div class="col-md-3">
                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Hingga</label>
                    <input type="number" placeholder="Rp" style="width: 100%; padding: 0.75rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;">
                </div>
                <div class="col-md-3">
                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">&nbsp;</label>
                    <button style="width: 100%; background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; border: none; padding: 0.75rem 1rem; border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </div>
        </div>

        <!-- Results Count -->
        <div style="margin-bottom: 2rem;">
            <p style="color: #8B6354; font-weight: 500;">
                <i class="bi bi-info-circle"></i> Ditemukan <strong>{{ count($kendaraan) }}</strong> kendaraan tersedia
            </p>
        </div>

        <!-- Vehicle Grid -->
        @if(count($kendaraan) > 0)
            <div class="row g-4">
                @foreach($kendaraan as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="vehicle-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1); transition: all 0.3s ease; cursor: pointer;">
                            <!-- Image Section -->
                            <div style="position: relative; height: 220px; background: linear-gradient(135deg, #E7D6C8 0%, #D9CABE 100%); overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                @if($item->foto_kendaraan)
                                    <img src="{{ asset('storage/' . $item->foto_kendaraan) }}" alt="{{ $item->nama_kendaraan }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="bi bi-car-front" style="font-size: 4rem; color: #C9A58C;"></i>
                                @endif
                                
                                <!-- Badge -->
                                <div style="position: absolute; top: 1rem; right: 1rem; background: #6C4E3F; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">
                                    {{ ucfirst($item->jenis_kendaraan) }}
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div style="padding: 1.5rem;">
                                <h3 style="color: #3d2817; font-weight: 700; margin-bottom: 0.5rem; font-size: 1.1rem;">
                                    {{ $item->nama_kendaraan }}
                                </h3>
                                
                                <p style="color: #8B6354; font-size: 0.85rem; margin-bottom: 1rem;">
                                    <i class="bi bi-person-circle"></i> {{ $item->pemilik->nama ?? 'Pemilik' }}
                                </p>

                                <div style="background: #f9f7f5; border-radius: 10px; padding: 1rem; margin-bottom: 1rem;">
                                    <p style="color: #8B6354; font-size: 0.85rem; margin: 0; line-height: 1.6;">
                                        {{ Str::limit($item->spesifikasi, 80) }}
                                    </p>
                                </div>

                                <!-- Location Info -->
                                <div style="margin-bottom: 1rem;">
                                    <p style="color: #8B6354; font-size: 0.85rem; margin: 0;">
                                        <i class="bi bi-geo-alt"></i> 
                                        @if($item->lokasi->count() > 0)
                                            {{ $item->lokasi->first()->nama_lokasi ?? 'Lokasi tidak tersedia' }}
                                        @else
                                            Lokasi tidak tersedia
                                        @endif
                                    </p>
                                </div>

                                <!-- Footer with CTA -->
                                <div style="display: flex; gap: 1rem; padding-top: 1rem; border-top: 1px solid #E7D6C8;">
                                    <a href="{{ route('peminjam.browse.detail', $item->id_kendaraan) }}" class="btn-detail" style="flex: 1; background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; border: none; padding: 0.65rem 1rem; border-radius: 8px; text-align: center; text-decoration: none; font-weight: 600; font-size: 0.85rem; cursor: pointer; transition: all 0.3s ease;">
                                        <i class="bi bi-eye"></i> Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div style="background: white; border-radius: 15px; padding: 4rem 2rem; text-align: center; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1);">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #C9A58C; margin-bottom: 1rem; display: block;"></i>
                <h3 style="color: #3d2817; font-weight: 700; margin-bottom: 0.5rem;">
                    Tidak Ada Kendaraan Tersedia
                </h3>
                <p style="color: #8B6354; margin-bottom: 2rem;">
                    Silahkan coba lagi nanti atau sesuaikan filter pencarian Anda
                </p>
                <a href="{{ route('peminjam.dashboard') }}" class="btn" style="background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; border: none; padding: 0.75rem 2rem; border-radius: 10px; text-decoration: none; font-weight: 600; display: inline-block;">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</div>

<style>
    .vehicle-card:hover {
        box-shadow: 0 8px 24px rgba(108, 78, 63, 0.15);
        transform: translateY(-5px);
    }
    
    .btn-detail:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 78, 63, 0.2);
    }
    
    @media (max-width: 768px) {
        .vehicle-card {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection
