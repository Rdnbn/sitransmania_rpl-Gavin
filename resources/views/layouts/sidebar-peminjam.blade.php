<h5>Peminjam Panel</h5>
<a href="{{ route('peminjam.dashboard') }}" class="{{ request()->routeIs('peminjam.dashboard') ? 'active' : '' }}">
    <i class="bi bi-house-door me-2"></i> Dashboard
</a>
<a href="{{ route('peminjam.browse.index') }}" class="{{ request()->routeIs('peminjam.browse.*') ? 'active' : '' }}">
    <i class="bi bi-search me-2"></i> Browse Kendaraan
</a>
<a href="{{ route('peminjam.peminjaman.index') }}" class="{{ request()->routeIs('peminjam.peminjaman.*') ? 'active' : '' }}">
    <i class="bi bi-journal-check me-2"></i> Peminjaman
</a>
<a href="{{ route('peminjam.pembayaran.index') }}" class="{{ request()->routeIs('peminjam.pembayaran.*') ? 'active' : '' }}">
    <i class="bi bi-cash-stack me-2"></i> Pembayaran
</a>
<a href="{{ route('peminjam.chat.index') }}" class="{{ request()->routeIs('peminjam.chat.*') ? 'active' : '' }}">
    <i class="bi bi-chat-dots me-2"></i> Chat
</a>
<a href="{{ route('peminjam.riwayat') }}" class="{{ request()->routeIs('peminjam.riwayat') ? 'active' : '' }}">
    <i class="bi bi-clock-history me-2"></i> Riwayat
</a>
