<!-- Sidebar Layout -->
<div class="d-flex">

    {{-- Sidebar --}}
    <nav id="sidebar" class="bg-gradient-sidebar vh-100 p-3" style="width: 250px;">
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-4 text-decoration-none">
            <span class="fs-4 fw-bold text-white">SITRANSMANIA Admin</span>
        </a>

        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('users.index') }}" class="nav-link text-white {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill me-2"></i> Akun Pengguna
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.peminjaman.index') }}" class="nav-link text-white {{ request()->routeIs('admin.peminjaman.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-check me-2"></i> Peminjaman
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.pembayaran.index') }}" class="nav-link text-white {{ request()->routeIs('admin.pembayaran.*') ? 'active' : '' }}">
                    <i class="bi bi-cash-stack me-2"></i> Pembayaran
                </a>
            </li>
            <li class="nav-item mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    {{-- Main Content --}}
    <div class="flex-grow-1 p-4" style="background-color: #fff8f0; min-height: 100vh;">
        @yield('content')
    </div>
</div>

<style>
    /* Sidebar gradient coklat susu */
    .bg-gradient-sidebar {
        background: linear-gradient(135deg, #F0D8BA 0%, #A67C52 100%);
    }

    /* Sidebar links */
    #sidebar .nav-link {
        color: #fff;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.2s;
    }

    #sidebar .nav-link:hover {
        background-color: rgba(255,255,255,0.15);
        color: #fff;
    }

    #sidebar .nav-link.active {
        background-color: rgba(255,255,255,0.25);
        font-weight: 600;
    }

    /* Sidebar icons */
    #sidebar i {
        font-size: 1.1rem;
    }
</style>
