<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | SITRANSMANIA</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body { background-color: #f8f4ef; overflow-x: hidden; }

        /* Navbar */
        .navbar-app { background: #8B5E3C; }
        .navbar-app .nav-link, .navbar-app .navbar-brand { color: #fff !important; font-weight: 600; }
        .navbar-app .nav-link.active { color: #f5e6d3 !important; }

        /* Sidebar */
        .sidebar {
            height: 100vh; width: 250px; position: fixed; top: 0; left: 0;
            background: linear-gradient(180deg, #A67C52 0%, #F5E6D3 100%);
            color: #fff; padding-top: 70px; transition: transform 0.3s ease-in-out;
            z-index: 1000; box-shadow: 2px 0 10px rgba(0,0,0,0.1); overflow-y: auto;
        }
        .sidebar h5 { padding: 0 20px; margin-bottom: 20px; font-size: 18px; border-bottom: 2px solid rgba(255,255,255,0.2); padding-bottom: 15px; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 12px 20px; border-left: 3px solid transparent; transition: all 0.3s ease; font-size: 14px; }
        .sidebar a:hover { background-color: rgba(255,255,255,0.2); border-left-color: #fff; padding-left: 25px; }
        .sidebar a.active { background-color: rgba(255,255,255,0.3); border-left-color: #fff; font-weight: 600; }

        /* Content */
        .content { margin-left: 250px; padding: 80px 20px 20px 20px; min-height: 100vh; transition: margin-left 0.3s ease-in-out; }

        /* Toggle sidebar mobile */
        .sidebar-toggle {
            display: none; position: fixed; top: 10px; left: 10px; z-index: 1030;
            background: #8B5E3C; border: none; color: white; width: 45px; height: 45px;
            border-radius: 8px; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .sidebar-toggle:hover { background: #A67C52; transform: scale(1.05); }
        .sidebar-toggle i { font-size: 20px; }

        .sidebar-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); z-index: 999; opacity: 0; transition: opacity 0.3s ease-in-out; }
        .sidebar-overlay.show { display: block; opacity: 1; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .content { margin-left: 0; padding: 70px 15px 15px 15px; }
            .sidebar-toggle { display: flex; align-items: center; justify-content: center; }
        }
        @media (min-width: 769px) and (max-width: 1024px) { .sidebar { width: 220px; } .content { margin-left: 220px; } }
    </style>
    @stack('styles')
</head>
<body>

@if(Auth::check())
    <button class="sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
@endif

{{-- Navbar --}}
@include('layouts.navbar')

{{-- Sidebar --}}
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

{{-- Main content --}}
<div class="content" id="main-content">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    function closeSidebar() {
        $('.sidebar').removeClass('show');
        $('#sidebarOverlay').removeClass('show');
        $('#sidebarToggle i').removeClass('bi-x-lg').addClass('bi-list');
    }

    $(document).on('click', '#sidebarToggle', function(e) {
        e.preventDefault();
        const $sidebar = $('.sidebar');
        const $overlay = $('#sidebarOverlay');
        const $icon = $(this).find('i');
        if($sidebar.hasClass('show')) { closeSidebar(); } else { $sidebar.addClass('show'); $overlay.addClass('show'); $icon.removeClass('bi-list').addClass('bi-x-lg'); }
    });

    $(document).on('click', '#sidebarOverlay', closeSidebar);
    $(document).on('click', '.sidebar a', function(){ if($(window).width() <= 768) setTimeout(closeSidebar, 100); });
    $(window).on('resize', function(){ if($(window).width() > 768) closeSidebar(); });
});
</script>

@stack('scripts')
@yield('scripts')
</body>
</html>
