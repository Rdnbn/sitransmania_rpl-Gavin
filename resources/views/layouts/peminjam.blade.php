<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjam | @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- SITRANSMANIA Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/sitransmania.css') }}">
    @stack('styles')
</head>
<body style="background-color: #F5EFE9;">
    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        @include('partials.sidebar-peminjam')

        <!-- Main Content -->
        <div class="flex-grow-1" style="overflow-y: auto; background-color: #F5EFE9;">
            <!-- Navbar -->
            @include('partials.navbar')

            <!-- Page Content -->
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
