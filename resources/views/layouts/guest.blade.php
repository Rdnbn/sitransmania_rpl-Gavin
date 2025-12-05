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

    @stack('styles')

    <style>
        :root {
            --primary: #6C4E3F;
            --secondary: #C9A58C;
            --bg-main: #F4ECE6;
            --accent: #E7D6C8;
            --text-dark: #3B2A22;
        }

        body {
            background: var(--bg-main);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .auth-wrap {
            max-width: 480px;
            width: 100%;
        }

        .auth-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow:
                0px 10px 30px rgba(0, 0, 0, 0.12),
                inset 0px 0px 6px rgba(0,0,0,0.02);
            transition: 0.25s ease;
        }

        .auth-card:hover {
            box-shadow:
                0px 12px 40px rgba(0, 0, 0, 0.18),
                inset 0px 0px 6px rgba(0,0,0,0.03);
            transform: translateY(-2px);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 28px;
        }

        .logo-container img {
            width: 160px;
        }

        h2 {
            color: var(--text-dark);
            font-weight: 700;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .text-muted {
            font-size: 0.9rem;
            text-align: center;
            color: #6f625c !important;
        }

        .form-label {
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #d7c6ba;
            padding: 0.65rem 0.9rem;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.15rem rgba(108, 78, 63, 0.25);
        }

        .btn-login {
            background: var(--primary);
            border: none;
            padding: 0.75rem 1.5rem;
            color: white;
            font-weight: 600;
            border-radius: 12px;
            transition: 0.25s;
            width: 100%;
            font-size: 1rem;
        }

        .btn-login:hover {
            background: #5f4437;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 78, 63, 0.35);
        }

        .text-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
        }

        .text-link:hover {
            color: #4c362b;
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .auth-card { padding: 28px 24px; }
        }
    </style>
</head>

<body>

    <div class="auth-wrap">
        <div class="logo-container">
            <img src="{{ asset('images/SITRANSMANIA.png') }}" alt="SITRANSMANIA">
        </div>

        <div class="auth-card">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
