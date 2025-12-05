<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | @yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- SITRANSMANIA Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/sitransmania.css') }}">

    {{-- Palette SITRANSMANIA --}}
    <style>
        :root {
            --primary: #6C4E3F;
            --secondary: #C9A58C;
            --accent: #E8D9CC;
            --bg-main: #F5EFE9;
            --text-dark: #3A2A23;
            --text-muted: #766860;
        }

        body {
            background: var(--bg-main);
            color: var(--text-dark);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .sidebar-wrapper {
            width: 250px;
            background: linear-gradient(180deg, var(--primary) 0%, #5a3d2f 100%);
            color: white;
            min-height: 100vh;
            border-right: 2px solid rgba(108, 78, 63, 0.2);
            box-shadow: 2px 0 10px rgba(108, 78, 63, 0.1);
        }

        /* NAVBAR */
        .top-navbar {
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 0.75rem 1.2rem;
            border-bottom: 2px solid rgba(108, 78, 63, 0.2);
            box-shadow: 0 2px 8px rgba(108, 78, 63, 0.15);
        }

        /* CONTENT */
        .page-wrapper {
            flex-grow: 1;
            overflow-y: auto;
            min-height: 100vh;
            background: var(--bg-main);
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 786px) {
            .sidebar-wrapper {
                position: fixed;
                left: -260px;
                top: 0;
                z-index: 2000;
                transition: 0.3s;
                width: 80%;
                max-width: 260px;
            }
            .sidebar-wrapper.show {
                left: 0;
            }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,.55);
                z-index: 1999;
                display: none;
            }
            .sidebar-overlay.show {
                display: block;
            }

            .sidebar-toggle-btn {
                position: fixed;
                top: 16px;
                left: 16px;
                z-index: 2050;
                background: var(--primary);
                color: white;
                border: none;
                border-radius: 8px;
                width: 44px;
                height: 44px;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- Toggle sidebar (mobile) --}}
    <button class="sidebar-toggle-btn d-md-none" id="sidebarToggle"><i class="bi bi-list fs-4"></i></button>

    <div class="d-flex" style="min-height: 100vh;">
        
        {{-- Sidebar --}}
        <div class="sidebar-wrapper" id="sidebarWrapper">
            @include('partials.sidebar-admin')
        </div>

        {{-- Overlay untuk mobile --}}
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        {{-- Main content --}}
        <div class="page-wrapper">
            {{-- Navbar --}}
            <div class="top-navbar">
                @include('partials.navbar')
            </div>

            {{-- Page content --}}
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebarWrapper');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('sidebarToggle');

        toggle?.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay?.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>

    @stack('scripts')
</body>
</html>
