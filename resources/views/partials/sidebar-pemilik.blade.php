<!-- Pemilik Sidebar -->
<aside class="sidebar" style="width: 250px; background: linear-gradient(180deg, #6C4E3F 0%, #5a3d2f 100%); border-right: 2px solid rgba(108, 78, 63, 0.2); box-shadow: 2px 0 10px rgba(108, 78, 63, 0.1);">
    <h5 style="padding: 0 20px; margin: 20px 0; color: #F4ECE6; font-weight: 700; letter-spacing: 0.5px;">
        <i class="bi bi-speedometer2"></i> Pemilik Panel
    </h5>
    
        <a href="{{ route('pemilik.dashboard') }}" class="{{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-house-door me-2"></i> Dashboard
    </a>
    
    <a href="{{ route('pemilik.kendaraan.index') }}" class="{{ request()->routeIs('pemilik.kendaraan.*') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-car-front me-2"></i> Kendaraan
    </a>
    
    <a href="{{ route('pemilik.aktivitas.index') }}" class="{{ request()->routeIs('pemilik.aktivitas.*') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-map me-2"></i> Aktivitas
    </a>
    
    <a href="{{ route('pemilik.peminjam.index') }}" class="{{ request()->routeIs('pemilik.peminjam.*') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-people me-2"></i> Peminjam
    </a>
    
    <a href="{{ route('pemilik.peminjaman.index') }}" class="{{ request()->routeIs('pemilik.peminjaman.*') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-journal-check me-2"></i> Peminjaman
    </a>
    
    <a href="{{ route('pemilik.pembayaran.index') }}" class="{{ request()->routeIs('pemilik.pembayaran.*') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-cash-stack me-2"></i> Pembayaran
    </a>
    
    <a href="{{ route('pemilik.chat.index') }}" class="{{ request()->routeIs('pemilik.chat.*') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-chat-dots me-2"></i> Chat
    </a>
    
    <a href="{{ route('pemilik.riwayat') }}" class="{{ request()->routeIs('pemilik.riwayat') ? 'active' : '' }}" style="color: rgba(255, 255, 255, 0.85); display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-clock-history me-2"></i> Riwayat
    </a>
    
    <hr style="border-color: rgba(255, 255, 255, 0.15); margin: 1rem 0;">
    
    <form method="POST" action="{{ route('logout') }}" style="padding: 0 20px;">
        @csrf
                <button type="submit" class="btn btn-sm w-100" style="background: linear-gradient(135deg, #C9A58C 0%, #B89976 100%); color: #3d2817; border: none; font-weight: 600; box-shadow: 0 2px 8px rgba(201, 165, 140, 0.3); transition: all 0.3s ease;">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</aside>

<style>
    .sidebar a:hover {
        background-color: rgba(201, 165, 140, 0.2);
        border-left-color: #E7D6C8;
        color: #F4ECE6;
        padding-left: 25px;
    }
    
    .sidebar a.active {
        background: linear-gradient(90deg, rgba(231, 214, 200, 0.25) 0%, transparent 100%);
        border-left-color: #E7D6C8;
        color: #F4ECE6;
        font-weight: 600;
    }
    
    .sidebar button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(201, 165, 140, 0.4);
    }
</style>
