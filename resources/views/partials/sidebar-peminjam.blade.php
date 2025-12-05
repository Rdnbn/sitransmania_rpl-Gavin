<!-- Peminjam Sidebar -->
<aside class="sidebar" style="width: 250px; background: linear-gradient(180deg, #1a1f3a 0%, #0f1426 100%); border-right: 2px solid rgba(0, 212, 255, 0.2);">
    <h5 style="padding: 0 20px; margin: 20px 0; color: #00d4ff; font-weight: 700; letter-spacing: 0.5px;">
        <i class="bi bi-person"></i> Peminjam Panel
    </h5>
    
    <a href="{{ route('peminjam.dashboard') }}" class="{{ request()->routeIs('peminjam.dashboard') ? 'active' : '' }}" style="color: #b0b0d0; display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-house-door me-2"></i> Dashboard
    </a>
    
    <a href="{{ route('peminjam.browse.index') }}" class="{{ request()->routeIs('peminjam.browse.*') ? 'active' : '' }}" style="color: #b0b0d0; display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-search me-2"></i> Browse Kendaraan
    </a>
    
    <a href="{{ route('peminjam.peminjaman.index') }}" class="{{ request()->routeIs('peminjam.peminjaman.*') ? 'active' : '' }}" style="color: #b0b0d0; display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-journal-check me-2"></i> Peminjaman
    </a>
    
    <a href="{{ route('peminjam.pembayaran.index') }}" class="{{ request()->routeIs('peminjam.pembayaran.*') ? 'active' : '' }}" style="color: #b0b0d0; display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-cash-stack me-2"></i> Pembayaran
    </a>
    
    <a href="{{ route('peminjam.chat.index') }}" class="{{ request()->routeIs('peminjam.chat.*') ? 'active' : '' }}" style="color: #b0b0d0; display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-chat-dots me-2"></i> Chat
    </a>
    
    <a href="{{ route('peminjam.riwayat') }}" class="{{ request()->routeIs('peminjam.riwayat') ? 'active' : '' }}" style="color: #b0b0d0; display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; text-decoration: none;">
        <i class="bi bi-clock-history me-2"></i> Riwayat
    </a>
    
    <hr style="border-color: rgba(0, 212, 255, 0.1); margin: 1rem 0;">
    
    <form method="POST" action="{{ route('logout') }}" style="padding: 0 20px;">
        @csrf
        <button type="submit" class="btn btn-sm w-100" style="background: linear-gradient(135deg, #ff006e 0%, #d10050 100%); color: white; border: none; font-weight: 600; box-shadow: 0 0 15px rgba(255, 0, 110, 0.4); transition: all 0.3s ease;">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</aside>

<style>
    .sidebar a:hover {
        background-color: rgba(0, 212, 255, 0.1);
        border-left-color: #00d4ff;
        color: #00d4ff;
        padding-left: 25px;
        box-shadow: inset 0 0 10px rgba(0, 212, 255, 0.1);
    }
    
    .sidebar a.active {
        background: linear-gradient(90deg, rgba(0, 212, 255, 0.2) 0%, transparent 100%);
        border-left-color: #00d4ff;
        color: #00d4ff;
        font-weight: 600;
        box-shadow: inset 0 0 15px rgba(0, 212, 255, 0.15);
    }
</style>
