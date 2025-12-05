<!-- Main Navbar -->
<nav class="navbar" style="background: linear-gradient(90deg, #0a0e27 0%, #1a1f3a 50%, #2a265b 100%); border-bottom: 2px solid #00d4ff; box-shadow: 0 0 30px rgba(0, 212, 255, 0.2); z-index: 100;">
    <div class="container-fluid px-4">
        <!-- Brand -->
        <a class="navbar-brand" href="#" style="font-size: 1.5rem; background: linear-gradient(135deg, #00d4ff 0%, #bd39ff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 700;">
            <i class="bi bi-rocket-takeoff"></i> SITRANSMANIA
        </a>

        <!-- Navbar Toggler for Mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="color: #00d4ff !important;">
            <i class="bi bi-list" style="font-size: 1.5rem; color: #00d4ff;"></i>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto d-flex align-items-center gap-3">
                <!-- User Info -->
                @auth
                    <span style="color: #b0b0d0; font-size: 0.9rem;">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </span>
                @endauth

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm" style="background: linear-gradient(135deg, #ff006e 0%, #d10050 100%); color: white; border: none; font-weight: 600; box-shadow: 0 0 15px rgba(255, 0, 110, 0.4); transition: all 0.3s ease;">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
