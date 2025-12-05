<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | SITRANSMANIA</title>

    <!-- Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- SITRANSMANIA Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/sitransmania.css') }}">
    @stack('styles')
</head>

<body style="background-color: #f9f7f5;">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); box-shadow: 0 4px 6px rgba(108, 78, 63, 0.15);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}" style="font-size: 1.3rem; color: white;">
                <i class="bi bi-car-front-fill"></i> SITRANSMANIA
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" style="color: white;">
                <i class="bi bi-list" style="font-size: 1.3rem;"></i>
            </button>

            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if(auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('search') }}" style="color: white;">
                                <i class="bi bi-search"></i> Cari
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: white;">
                                <i class="bi bi-bell"></i> Notifikasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: white;">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->nama ?? auth()->user()->name }}
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm" style="background: transparent; color: white; border: 1px solid white; font-weight: 600;">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/" style="color: white;"><i class="bi bi-house"></i> Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tentang" style="color: white;"><i class="bi bi-info-circle"></i> Tentang</a></li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-sm btn-primary" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main style="min-height: calc(100vh - 150px);">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5><i class="bi bi-car-front-fill"></i> SITRANSMANIA</h5>
                    <p style="font-size: 0.9rem;">Sistem Informasi Transportasi Mania - Solusi manajemen kendaraan terpadu untuk kemudahan Anda.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5><i class="bi bi-link-45deg"></i> Menu</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="/" style="text-decoration: none;"><i class="bi bi-arrow-right"></i> Beranda</a></li>
                        <li><a href="#tentang" style="text-decoration: none;"><i class="bi bi-arrow-right"></i> Tentang</a></li>
                        <li><a href="{{ route('login') }}" style="text-decoration: none;"><i class="bi bi-arrow-right"></i> Login</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5><i class="bi bi-telephone"></i> Hubungi Kami</h5>
                    <p style="font-size: 0.85rem; margin: 0;">
                        <i class="bi bi-envelope"></i> info@sitransmania.com<br>
                        <i class="bi bi-telephone"></i> +62 123 4567 8901
                    </p>
                </div>
            </div>
            <hr style="border-color: rgba(255, 255, 255, 0.1); margin-top: 2rem;">
            <div class="text-center" style="color: rgba(255, 255, 255, 0.8); font-size: 0.85rem;">
                <p style="margin: 0;">&copy; 2024 SITRANSMANIA. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

</body>
</html>
