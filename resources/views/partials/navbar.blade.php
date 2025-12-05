<!-- Main Navbar -->
<nav class="navbar shadow-sm navbar-main">
    <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

        <!-- Brand -->
        <a class="navbar-brand navbar-title" href="#">
           SITRANSMANIA
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="bi bi-list"></i>
        </button>

        <!-- Navbar Contents -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto d-flex align-items-center gap-4">

                <!-- Username -->
                @auth
                    <span class="navbar-user">
                        <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                    </span>
                @endauth

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn logout-btn">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
