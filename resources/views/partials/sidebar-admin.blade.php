<aside class="sidebar">
    <h5 class="sidebar-title">
        <i class="bi bi-shield-lock"></i> Admin Panel
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
    </a>

    <hr class="sidebar-divider">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-logout">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</aside>
