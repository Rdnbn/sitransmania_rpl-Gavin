<h5>Pemilik Panel</h5>
<a href="{{ route('pemilik.dashboard') }}" class="{{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
    <i class="bi bi-house-door me-2"></i> Dashboard
</a>
<a href="{{ route('pemilik.kendaraan.index') }}" class="{{ request()->routeIs('pemilik.kendaraan.*') ? 'active' : '' }}">
    <i class="bi bi-car-front me-2"></i> Kendaraan
</a>
<a href="{{ route('pemilik.aktivitas.index') }}" class="{{ request()->routeIs('pemilik.aktivitas.*') ? 'active' : '' }}">
    <i class="bi bi-map me-2"></i> Aktivitas
</a>
<a href="{{ route('pemilik.peminjam.index') }}" class="{{ request()->routeIs('pemilik.peminjam.*') ? 'active' : '' }}">
    <i class="bi bi-people me-2"></i> Peminjam
</a>
<a href="{{ route('pemilik.peminjaman.index') }}" class="{{ request()->routeIs('pemilik.peminjaman.*') ? 'active' : '' }}">
    <i class="bi bi-journal-check me-2"></i> Peminjaman
</a>
<a href="{{ route('pemilik.pembayaran.index') }}" class="{{ request()->routeIs('pemilik.pembayaran.*') ? 'active' : '' }}">
    <i class="bi bi-cash-stack me-2"></i> Pembayaran
</a>
<a href="{{ route('pemilik.chat.index') }}" class="{{ request()->routeIs('pemilik.chat.*') ? 'active' : '' }}">
    <i class="bi bi-chat-dots me-2"></i> Chat
</a>
<a href="{{ route('pemilik.riwayat') }}" class="{{ request()->routeIs('pemilik.riwayat') ? 'active' : '' }}">
    <i class="bi bi-clock-history me-2"></i> Riwayat
</a>
