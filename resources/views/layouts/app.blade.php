<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | SITRANSMANIA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- Palette SITRANSMANIA --}}
    <style>
        :root {
            --primary: #6C4E3F;
            --secondary: #C9A58C;
            --bg-main: #F4ECE6;
            --accent: #E7D6C8;
            --text-dark: #3B2A22;
            --text-muted: #7D6D63;
        }

        body {
            background: var(--bg-main);
            color: var(--text-dark);
            overflow-x: hidden;
            font-family: "Poppins", sans-serif;
        }

        /* NAVBAR */
        .navbar-app {
            background: var(--primary);
            border-bottom: 2px solid rgba(0,0,0,.12);
            padding: 0.75rem 1.2rem;
        }
        .navbar-app .nav-link,
        .navbar-app .navbar-brand {
            color: white !important;
            font-weight: 600;
        }
        .navbar-app .nav-link:hover {
            opacity: .85;
        }
        .navbar-app .nav-link.active {
            text-decoration: underline;
        }

        /* SIDEBAR */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--primary);
            padding-top: 75px;
            overflow-y: auto;
            z-index: 1000;
            transition: .3s;
        }
        .sidebar h5 {
            padding: 0 18px 12px;
            margin-bottom: 12px;
            color: var(--accent);
            border-bottom: 1px solid rgba(255,255,255,.25);
            font-size: .9rem;
            font-weight: 700;
        }
        .sidebar a {
            display: block;
            color: #F1E8E2;
            text-decoration: none;
            padding: 12px 20px;
            font-size: .92rem;
            border-left: 3px solid transparent;
            transition: .25s;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,.15);
            border-left-color: var(--accent);
        }
        .sidebar a.active {
            background: rgba(255,255,255,.22);
            border-left-color: white;
            font-weight: 600;
            color: white;
        }
        .sidebar a i {
            margin-right: 9px;
        }

        /* SIDEBAR RESPONSIVE */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 12px;
            left: 12px;
            z-index: 1050;
            width: 44px;
            height: 44px;
            border-radius: 8px;
            border: none;
            background: var(--primary);
            color: white;
            font-size: 20px;
        }
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.45);
            z-index: 999;
            opacity: 0;
            transition: .25s;
        }
        .sidebar-overlay.show { display: block; opacity: 1; }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 82%;
                max-width: 260px;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .sidebar-toggle { display: block; }
        }

        /* MAIN CONTENT */
        .content {
            margin-left: 250px;
            min-height: 100vh;
            padding: 85px 22px 25px;
            transition: .3s;
        }
        @media (max-width: 768px) {
            .content { margin-left: 0; padding: 75px 16px 25px; }
        }
    </style>

    @stack('styles')
</head>

<body>

{{-- Toggle Sidebar Mobile --}}
@if(Auth::check())
<button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
@endif

{{-- Navbar --}}
@include('layouts.navbar')

{{-- Sidebar Based on Role --}}
@if(Auth::check())
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    @if(Auth::user()->role === 'admin')
        @include('layouts.sidebar-admin')
    @elseif(Auth::user()->role === 'pemilik')
        @include('layouts.sidebar-pemilik')
    @elseif(Auth::user()->role === 'peminjam')
        @include('layouts.sidebar-peminjam')
    @endif
@endif

{{-- CONTENT --}}
<div class="content" id="main-content">
    @yield('content')
</div>

{{-- JS --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(function() {
    const $sidebar = $('.sidebar');
    const $overlay = $('#sidebarOverlay');
    const $toggle = $('#sidebarToggle');
    const $icon = $('#sidebarToggle i');

    function closeSidebar() {
        $sidebar.removeClass('show');
        $overlay.removeClass('show');
        $icon.removeClass('bi-x-lg').addClass('bi-list');
    }

    $toggle.on('click', function(e) {
        e.preventDefault();
        if($sidebar.hasClass('show')) { closeSidebar(); }
        else {
            $sidebar.addClass('show');
            $overlay.addClass('show');
            $icon.removeClass('bi-list').addClass('bi-x-lg');
        }
    });

    $overlay.on('click', closeSidebar);
    $(window).on('resize', function(){ if($(window).width() > 768) closeSidebar(); });
});
</script>

@stack('scripts')
@yield('scripts')
</body>
</html>
