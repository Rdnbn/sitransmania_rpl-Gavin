@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="register-container" style="max-width: 500px; width: 100%;">
    <div class="register-header" style="text-align: center; margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; color: #3d2817; font-weight: 700; margin-bottom: 0.5rem;">
            Daftar
        </h1>
        <p style="color: #8B6354; font-size: 0.95rem;">
            Buat akun baru untuk memulai
        </p>
    </div>

    {{-- Error Message --}}
    @if($errors->any())
        <div style="background: #fee; border: 1px solid #fcc; border-radius: 10px; padding: 1rem; margin-bottom: 1.5rem; color: #c33;">
            <ul style="margin: 0; padding: 0; list-style: none;">
                @foreach($errors->all() as $error)
                    <li style="font-weight: 500; margin-bottom: 0.5rem;">
                        <i class="bi bi-exclamation-circle"></i> {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}" style="display: flex; flex-direction: column; gap: 1.2rem;">
        @csrf

        <!-- Name Field -->
        <div class="form-group">
            <label for="nama" style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <i class="bi bi-person"></i> Nama Lengkap
            </label>
            <input 
                type="text" 
                name="nama" 
                id="nama"
                class="form-control"
                value="{{ old('nama') }}"
                placeholder="Nama Lengkap Anda"
                required
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box;"
            >
        </div>

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
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box;"
            >
        </div>

        <!-- Phone Field -->
        <div class="form-group">
            <label for="no_telp" style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <i class="bi bi-telephone"></i> Nomor Telepon
            </label>
            <input 
                type="tel" 
                name="no_telp" 
                id="no_telp"
                class="form-control"
                value="{{ old('no_telp') }}"
                placeholder="+62..."
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box;"
            >
        </div>

        <!-- Role Selection -->
        <div class="form-group">
            <label for="role" style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <i class="bi bi-briefcase"></i> Daftar Sebagai
            </label>
            <select 
                name="role" 
                id="role"
                class="form-control"
                required
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box; cursor: pointer;"
            >
                <option value="">-- Pilih Peran --</option>
                <option value="peminjam" {{ old('role')=='peminjam' ? 'selected' : '' }}>Peminjam (Pencari Kendaraan)</option>
                <option value="pemilik" {{ old('role')=='pemilik' ? 'selected' : '' }}>Pemilik (Penyedia Kendaraan)</option>
            </select>
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
                placeholder="Minimal 8 karakter"
                required
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box;"
            >
        </div>

        <!-- Confirm Password Field -->
        <div class="form-group">
            <label for="password_confirmation" style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">
                <i class="bi bi-lock-check"></i> Konfirmasi Password
            </label>
            <input 
                type="password" 
                name="password_confirmation" 
                id="password_confirmation"
                class="form-control"
                placeholder="Ulangi password Anda"
                required
                style="background: white; border: 2px solid #E7D6C8; border-radius: 10px; padding: 0.75rem 1rem; color: #3d2817; font-size: 1rem; transition: all 0.3s ease; width: 100%; box-sizing: border-box;"
            >
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-register" style="background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; border: none; padding: 0.85rem 1.5rem; font-weight: 600; border-radius: 10px; font-size: 1rem; cursor: pointer; transition: all 0.3s ease; width: 100%; margin-top: 0.5rem;">
            <i class="bi bi-person-plus"></i> Daftar Sekarang
        </button>
    </form>

    <!-- Divider -->
    <div style="margin: 1.5rem 0; display: flex; align-items: center; gap: 1rem;">
        <div style="flex: 1; height: 1px; background: #E7D6C8;"></div>
        <span style="color: #C9A58C; font-size: 0.85rem;">atau</span>
        <div style="flex: 1; height: 1px; background: #E7D6C8;"></div>
    </div>

    <!-- Login Link -->
    <div style="text-align: center;">
        <p style="color: #8B6354; margin: 0 0 1rem 0;">
            Sudah punya akun?
        </p>
        <a href="{{ route('login') }}" class="btn-login-link" style="background: transparent; color: #6C4E3F; border: 2px solid #6C4E3F; padding: 0.75rem 1.5rem; font-weight: 600; border-radius: 10px; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-block; width: 100%;">
            Login di sini
        </a>
    </div>
</div>

<style>
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="password"]:focus,
    select:focus {
        border-color: #6C4E3F !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(108, 78, 63, 0.1);
    }
    
    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(108, 78, 63, 0.3);
    }
    
    .btn-login-link:hover {
        background: #f5f3f1;
        transform: translateY(-2px);
    }
</style>
@endsection
