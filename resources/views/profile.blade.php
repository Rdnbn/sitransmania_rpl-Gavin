@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="card border-0 mb-4"
         style="background: linear-gradient(135deg, #917347bc 0%, #855d3ad1 100%); border-radius: 15px;">
        <div class="card-body d-flex align-items-center gap-3 text-white">
            <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.18); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-person-bounding-box" style="font-size: 2rem;"></i>
            </div>
            <div>
                <h2 class="fw-bold mb-1">Profil Pengguna</h2>
                <p class="mb-0 opacity-75">Perbarui informasi akun Anda</p>
            </div>
        </div>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    {{-- FORM UPDATE PROFIL --}}
    <div class="card shadow-sm p-4 mb-4" style="border-radius: 15px;">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor HP</label>
                <input type="text" class="form-control" name="no_hp" value="{{ $user->no_hp }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Role</label>
                <input type="text" class="form-control" value="{{ ucfirst($user->role) }}" disabled>
            </div>

            {{-- Role-Specific Extra Section --}}
            <hr>
            @if($user->role === 'pemilik')
                <p class="fw-bold">📌 Informasi Tambahan (Pemilik Kendaraan)</p>
                <p class="text-muted">Kelola data kendaraan di menu <b>Kendaraan</b>.</p>
            @elseif($user->role === 'peminjam')
                <p class="fw-bold">📌 Informasi Tambahan (Peminjam)</p>
                <p class="text-muted">Lihat riwayat peminjaman di menu <b>Peminjaman</b>.</p>
            @elseif($user->role === 'admin')
                <p class="fw-bold">📌 Informasi Tambahan (Admin)</p>
                <p class="text-muted">Anda memiliki kontrol penuh terhadap sistem.</p>
            @endif

            <div class="text-end mt-3">
                <button type="submit" class="btn"
                    style="background: linear-gradient(135deg, #dac291ff 0%, #604621ff 100%); color:white; font-weight:600; border-radius:8px;">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- FORM UPDATE PASSWORD --}}
    <div class="card shadow-sm p-4" style="border-radius: 15px;">
        <h5 class="fw-bold mb-3"><i class="bi bi-key me-2"></i>Ganti Password</h5>

        <form action="{{ route('profile.updatePassword') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Password Baru</label>
                <input type="password" class="form-control" name="password" required placeholder="Minimal 6 karakter">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn"
                    style="background: linear-gradient(135deg, #e9cca5ff 0%, #604621ff 100%); color:white; font-weight:600; border-radius:8px;">
                    <i class="bi bi-shield-check me-1"></i> Perbarui Password
                </button>
            </div>
        </form>
    </div>

</div>
@endsection