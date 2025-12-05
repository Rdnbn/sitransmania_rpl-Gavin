@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="login-container" style="max-width: 420px; width: 100%;">
    <div class="login-header" style="text-align: center; margin-bottom: 2.5rem;">
        <h1 style="font-size: 2rem; color: #3d2817; font-weight: 700; margin-bottom: 0.5rem;">
            Login
        </h1>
        <p style="color: #8B6354; font-size: 0.95rem;">
            Masuk ke akun SITRANSMANIA Anda
        </p>
    </div>

    {{-- Error Message --}}
    @if($errors->any())
        <div style="background: #fee; border: 1px solid #fcc; border-radius: 10px; padding: 1rem; margin-bottom: 1.5rem; color: #c33;">
            <p style="margin: 0; font-weight: 500;">
                <i class="bi bi-exclamation-circle"></i> {{ $errors->first() }}
            </p>
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf

        <!-- Email Field -->
        <div class="form-group">
            <label for="email" style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <i class="bi bi-envelope"></i> Email
            </label>
            <input 
                type="email" 
                name="email" 
                id="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="nama@email.com"
                required 
                autofocus
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box;"
            >
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password" style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <i class="bi bi-lock"></i> Password
            </label>
            <input 
                type="password" 
                name="password" 
                id="password"
                class="form-control"
                placeholder="••••••••"
                required
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box;"
            >
        </div>

        <!-- Remember Me -->
        <div style="display: flex; align-items: center; gap: 0.5rem;">
            <input 
                type="checkbox" 
                name="remember" 
                id="remember"
                style="cursor: pointer; width: 18px; height: 18px; accent-color: #6C4E3F;"
            >
            <label for="remember" style="color: #8B6354; font-size: 0.9rem; cursor: pointer; margin: 0;">
                Ingat saya
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-login" style="background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; border: none; padding: 0.85rem 1.5rem; font-weight: 600; border-radius: 10px; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; width: 100%; margin-top: 1rem;">
            <i class="bi bi-box-arrow-in-right"></i> Login
        </button>
    </form>

    <!-- Divider -->
    <div style="margin: 2rem 0; display: flex; align-items: center; gap: 1rem;">
        <div style="flex: 1; height: 1px; background: #E7D6C8;"></div>
        <span style="color: #C9A58C; font-size: 0.85rem;">atau</span>
        <div style="flex: 1; height: 1px; background: #E7D6C8;"></div>
    </div>

    <!-- Register Link -->
    <div style="text-align: center;">
        <p style="color: #8B6354; margin: 0 0 1rem 0;">
            Belum punya akun?
        </p>
        <a href="{{ route('showRegisterForm') }}" class="btn-register" style="background: transparent; color: #6C4E3F; border: 2px solid #6C4E3F; padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 10px; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-block; width: 100%;">
            Daftar Sekarang
        </a>
    </div>

    <!-- Forgot Password -->
    <div style="text-align: center; margin-top: 1.5rem;">
        <a href="{{ route('password.request') }}" style="color: #C9A58C; text-decoration: none; font-size: 0.85rem; transition: all 0.3s ease;">
            Lupa password?
        </a>
    </div>
</div>

<style>
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #6C4E3F !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(108, 78, 63, 0.1);
    }
    
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(108, 78, 63, 0.3);
    }
    
    .btn-register:hover {
        background: #f5f3f1;
        transform: translateY(-2px);
    }
</style>
@endsection
