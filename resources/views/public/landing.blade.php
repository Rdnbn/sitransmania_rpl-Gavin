@extends('layouts.main')

@section('title', 'Landing')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); position: relative; height: 600px; display: flex; align-items: center; justify-content: center; color: white; text-align: center; margin-top: -80px; padding-top: 80px;">
    <div class="hero-overlay" style="position: absolute; inset: 0; background: rgba(0, 0, 0, 0.3);"></div>
    
    <div class="hero-content" style="position: relative; z-index: 2; max-width: 600px; padding: 2rem;">
        <h1 style="font-size: 3.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.2;">
            SITRANSMANIA
        </h1>
        <p style="font-size: 1.25rem; margin-bottom: 2rem; color: #E7D6C8; font-weight: 300;">
            Sistem Manajemen Transportasi Terpadu untuk Kemudahan Anda
        </p>
        <a href="{{ route('login') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #C9A58C 0%, #B89976 100%); color: #3d2817; border: none; padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 50px; display: inline-block; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
            Mulai Sekarang
        </a>
    </div>
</section>

<!-- Features Section -->
<section class="features-section" style="padding: 4rem 2rem; background: #f5f3f1;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 0.5rem; color: #3d2817; font-weight: 700;">
            Fitur Utama
        </h2>
        <p style="text-align: center; color: #8B6354; margin-bottom: 3rem; font-size: 1.1rem;">
            Platform lengkap untuk mengelola transportasi dengan mudah
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
            <!-- Feature Card 1 -->
            <div class="feature-card" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🚗</div>
                <h3 style="color: #3d2817; margin-bottom: 1rem; font-weight: 600;">Manajemen Kendaraan</h3>
                <p style="color: #8B6354; font-size: 0.95rem; line-height: 1.6;">
                    Kelola data kendaraan Anda dengan sistem yang terorganisir dan mudah dipantau.
                </p>
            </div>

            <!-- Feature Card 2 -->
            <div class="feature-card" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">💰</div>
                <h3 style="color: #3d2817; margin-bottom: 1rem; font-weight: 600;">Pembayaran Mudah</h3>
                <p style="color: #8B6354; font-size: 0.95rem; line-height: 1.6;">
                    Sistem pembayaran terintegrasi dengan verifikasi cepat dan aman.
                </p>
            </div>

            <!-- Feature Card 3 -->
            <div class="feature-card" style="background: white; padding: 2rem; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">💬</div>
                <h3 style="color: #3d2817; margin-bottom: 1rem; font-weight: 600;">Komunikasi Real-time</h3>
                <p style="color: #8B6354; font-size: 0.95rem; line-height: 1.6;">
                    Chat langsung dengan pemilik kendaraan untuk koordinasi yang lebih baik.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" style="padding: 4rem 2rem; background: white;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
            <div>
                <h2 style="font-size: 2.2rem; margin-bottom: 1.5rem; color: #3d2817; font-weight: 700;">
                    Tentang SITRANSMANIA
                </h2>
                <p style="color: #666; margin-bottom: 1rem; font-size: 1rem; line-height: 1.8;">
                    SITRANSMANIA adalah solusi terpadu untuk manajemen transportasi asrama yang dirancang khusus untuk memudahkan koordinasi antara pemilik kendaraan dan peminjam.
                </p>
                <p style="color: #666; margin-bottom: 2rem; font-size: 1rem; line-height: 1.8;">
                    Dengan antarmuka yang intuitif dan fitur-fitur canggih, kami memastikan setiap transaksi berjalan lancar dan aman.
                </p>
                <a href="{{ route('login') }}" class="btn" style="background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; border: none; padding: 0.6rem 2rem; font-weight: 600; border-radius: 25px; display: inline-block; transition: all 0.3s ease; text-decoration: none;">
                    Daftar Sekarang
                </a>
            </div>
            <div style="background: linear-gradient(135deg, #E7D6C8 0%, #D9CABE 100%); border-radius: 15px; height: 300px; display: flex; align-items: center; justify-content: center; color: #8B6354;">
                <p style="font-size: 4rem; opacity: 0.3;">📱</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section" style="padding: 4rem 2rem; background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; text-align: center;">
    <div class="container">
        <h2 style="font-size: 2.2rem; margin-bottom: 1rem; font-weight: 700;">
            Siap Memulai?
        </h2>
        <p style="font-size: 1.1rem; margin-bottom: 2rem; color: #E7D6C8;">
            Bergabunglah dengan ribuan pengguna yang telah merasakan manfaat SITRANSMANIA
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="{{ route('login') }}" class="btn" style="background: #C9A58C; color: #3d2817; border: none; padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 50px; display: inline-block; transition: all 0.3s ease; text-decoration: none;">
                Login
            </a>
            <a href="{{ route('showRegisterForm') }}" class="btn" style="background: transparent; color: white; border: 2px solid white; padding: 0.75rem 2.5rem; font-weight: 600; border-radius: 50px; display: inline-block; transition: all 0.3s ease; text-decoration: none;">
                Daftar
            </a>
        </div>
    </div>
</section>

<style>
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    }
    
    .btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    
    @media (max-width: 768px) {
        .hero-section {
            height: 400px;
        }
        
        .hero-content h1 {
            font-size: 2.2rem !important;
        }
        
        .about-section > div {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection
