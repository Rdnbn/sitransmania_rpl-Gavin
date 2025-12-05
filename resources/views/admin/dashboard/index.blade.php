@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="admin-header card border-0 shadow-sm">
                <div class="card-body py-4 d-flex align-items-center gap-3">
                    <div class="header-icon d-flex align-items-center justify-content-center">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-1 text-light">Dashboard Admin</h2>
                        <p class="mb-0 text-light">Ringkasan statistik sistem peminjaman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row mb-4 g-3">
        <div class="col-md-3">
            <div class="stat-card card shadow-sm">
                <div class="card-body">
                    <div class="stat-icon-wrapper">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <p class="label">Total Pemilik</p>
                    <h3 class="value">{{ $totalPemilik ?? '-' }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card card shadow-sm">
                <div class="card-body">
                    <div class="stat-icon-wrapper">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <p class="label">Total Peminjam</p>
                    <h3 class="value">{{ $totalPeminjam ?? '-' }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card card shadow-sm">
                <div class="card-body">
                    <div class="stat-icon-wrapper">
                        <i class="bi bi-truck"></i>
                    </div>
                    <p class="label">Total Kendaraan</p>
                    <h3 class="value">{{ $totalKendaraan ?? '-' }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card card shadow-sm">
                <div class="card-body">
                    <div class="stat-icon-wrapper">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <p class="label">Total Peminjaman</p>
                    <h3 class="value">{{ $totalPeminjaman ?? '-' }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik --}}
    <div class="card shadow-sm p-4 mb-4">
        <h5 class="mb-3 fw-semibold text-dark">Grafik Peminjaman Tahun {{ date('Y') }}</h5>
        <canvas id="chartPeminjaman" height="200"></canvas>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="card shadow-sm p-3">
        <h5 class="mb-3 fw-semibold text-dark">Aktivitas Terbaru</h5>
        <ul class="list-group">
            @forelse ($recent ?? [] as $r)
                <li class="list-group-item">
                    <strong>{{ $r->peminjam?->nama ?? 'Tidak diketahui' }}</strong> — {{ $r->aktivitas ?? '-' }}
                    <div class="text-muted small">{{ $r->tanggal }}</div>
                </li>
            @empty
                <li class="list-group-item text-muted">Belum ada aktivitas.</li>
            @endforelse
        </ul>
    </div>

</div>


{{--👇 Style Clean Palette --}}
<style>
    :root {
        --primary: #6C4E3F;
        --secondary: #C9A58C;
        --bg-main: #F4ECE6;
        --accent: #E7D6C8;
        --text-dark: #3B2A22;
    }

    /* Header */
    .admin-header {
        background: var(--primary);
        border-radius: 16px;
        color: white;
    }
    .header-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.25);
        border-radius: 14px;
        font-size: 2rem;
        color: white;
    }

    /* Statistik Card */
    .stat-card {
        border-radius: 14px;
        padding-top: 18px;
        padding-bottom: 18px;
        transition: .25s;
        cursor: pointer;
    }
    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 30px rgba(0,0,0,.12);
    }
    .stat-card .stat-icon-wrapper {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: var(--accent);
        color: var(--primary);
        font-size: 1.6rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: .65rem;
    }
    .stat-card .label {
        font-size: .85rem;
        color: var(--text-dark);
        opacity: .7;
        margin-bottom: .25rem;
    }
    .stat-card .value {
        font-weight: 700;
        color: var(--primary);
    }

    #chartPeminjaman { height: 200px !important; }
</style>

@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPeminjaman');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($chartData ?? [])) !!},
            datasets: [{
                label: 'Total Peminjaman',
                data: {!! json_encode(array_values($chartData ?? [])) !!},
                backgroundColor: '#6C4E3F',
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
@endsection
