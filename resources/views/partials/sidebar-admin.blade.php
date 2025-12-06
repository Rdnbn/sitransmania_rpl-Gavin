<aside class="sidebar"
    style="width: 250px; min-height: 100vh; background: linear-gradient(180deg, #6C4E3F 0%, #5a3d2f 100%);
           border-right: 2px solid rgba(255,255,255,0.08); box-shadow: 2px 0 10px rgba(0,0,0,0.2); padding-top: 15px;">

    <h5 style="padding: 0 20px; margin: 15px 0 25px; color: #ffffff; font-weight: 700; font-size: 18px;">
        <i class="bi bi-shield-lock me-2"></i> Admin Panel
    </h5>

    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>

    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <i class="bi bi-people-fill me-2"></i> Akun Pengguna
    </a>

    <a href="{{ route('admin.peminjaman.index') }}" class="sidebar-link {{ request()->routeIs('admin.peminjaman.*') ? 'active' : '' }}">
        <i class="bi bi-journal-check me-2"></i> Peminjaman
    </a>

    <a href="{{ route('admin.pembayaran.index') }}" class="sidebar-link {{ request()->routeIs('admin.pembayaran.*') ? 'active' : '' }}">
        <i class="bi bi-cash-stack me-2"></i> Pembayaran
    </a>

    <a href="{{ route('admin.kendaraan.index') }}" class="sidebar-link {{ request()->routeIs('admin.kendaraan.*') ? 'active' : '' }}">
        <i class="bi bi-car-front me-2"></i> Kendaraan
    </a>

    <a href="{{ route('admin.notifikasi.index') }}" class="sidebar-link {{ request()->routeIs('admin.notifikasi.*') ? 'active' : '' }}">
        <i class="bi bi-bell me-2"></i> Notifikasi

    <a href="{{ route('profile') }}" class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}">
    <i class="bi bi-person-circle me-2"></i> Profil
    </a>

    <hr class="sidebar-divider">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-logout">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</aside>

<style>
    .sidebar-link {
        color: #ffffff;
        display: block;
        padding: 12px 22px;
        font-size: 15px;
        text-decoration: none;
        transition: 0.25s;
    }

    .sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.12);
        padding-left: 28px;
    }

    .sidebar-link.active {
        background-color: rgba(255, 255, 255, 0.20);
        border-left: 4px solid #fff;
        font-weight: 600;
    }

    .sidebar-divider {
        border-color: rgba(255, 255, 255, 0.15);
        margin: 18px 0;
    }

    .sidebar-logout {
        width: 88%;
        margin: 0 auto;
        background: linear-gradient(135deg, #d34040 0%, #9c2a2a 100%);
        color: white;
        padding: 10px 0;
        border: none;
        font-weight: 600;
        border-radius: 6px;
        transition: 0.25s;
        display: block;
        text-align: center;
    }

    .sidebar-logout:hover {
        opacity: 0.88;
        transform: scale(1.02);
    }
</style>
