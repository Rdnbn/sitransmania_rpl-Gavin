@extends('layouts.main')

@section('title', 'Form Peminjaman')

@section('content')
<div style="background: linear-gradient(135deg, rgba(249, 247, 245, 0.95) 0%, rgba(245, 243, 241, 0.95) 100%), url('{{ asset('images/Asrama.jpg') }}') center/cover fixed; min-height: calc(100vh - 150px); padding: 3rem 2rem;">
    <div class="container">
        <!-- Back Button -->
        <div style="margin-bottom: 2rem;">
            <a href="{{ route('peminjam.browse.index') }}" style="color: #6C4E3F; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem;">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- Page Header -->
        <div style="margin-bottom: 3rem;">
            <h1 style="color: #3d2817; font-weight: 700; font-size: 2.2rem; margin-bottom: 0.5rem;">
                <i class="bi bi-clipboard-check"></i> Formulir Peminjaman
            </h1>
            <p style="color: #8B6354; font-size: 1rem;">
                Lengkapi data berikut untuk mengajukan peminjaman kendaraan
            </p>
        </div>

        <div class="row g-4">
            <!-- Form Section -->
            <div class="col-lg-7">
                <div style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1);">
                    <!-- Vehicle Info -->
                    <div style="background: linear-gradient(135deg, rgba(108, 78, 63, 0.05) 0%, rgba(201, 165, 140, 0.05) 100%); border-left: 4px solid #6C4E3F; padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem;">
                        <h4 style="color: #3d2817; font-weight: 700; margin-bottom: 0.5rem;">
                            {{ $kendaraan->nama_kendaraan }}
                        </h4>
                        <p style="color: #8B6354; font-size: 0.9rem; margin: 0;">
                            <i class="bi bi-tag"></i> {{ ucfirst($kendaraan->jenis_kendaraan) }}
                        </p>
                        <p style="color: #8B6354; font-size: 0.85rem; margin: 0.5rem 0 0 0;">
                            {{ $kendaraan->spesifikasi ?? 'Tidak ada deskripsi' }}
                        </p>
                    </div>

                    <!-- Alert Messages -->
                    @if($errors->any())
                        <div style="background: #fee; border: 1px solid #fcc; border-radius: 10px; padding: 1rem; margin-bottom: 1.5rem; color: #c33;">
                            <p style="margin: 0; font-weight: 500;"><i class="bi bi-exclamation-circle"></i> Ada kesalahan:</p>
                            <ul style="margin: 0.5rem 0 0 0; padding-left: 1.5rem;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('peminjam.pinjam.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1.5rem;">
                        @csrf
                        <input type="hidden" name="id_kendaraan" value="{{ $kendaraan->id_kendaraan }}">

                        <!-- Personal Information -->
                        <div>
                            <h5 style="color: #3d2817; font-weight: 700; margin-bottom: 1rem;">
                                <i class="bi bi-person"></i> Informasi Pribadi
                            </h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>

                                <div class="col-md-6">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Nomor Telepon</label>
                                    <input type="tel" name="no_telp" class="form-control" value="{{ old('no_telp') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>

                                <div class="col-md-4">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Asrama</label>
                                    <input type="text" name="asrama" class="form-control" value="{{ old('asrama') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>

                                <div class="col-md-4">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Kamar</label>
                                    <input type="text" name="kamar" class="form-control" value="{{ old('kamar') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>

                                <div class="col-md-4">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Program Studi</label>
                                    <input type="text" name="prodi" class="form-control" value="{{ old('prodi') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>
                            </div>
                        </div>

                        <!-- Academic Information -->
                        <div>
                            <h5 style="color: #3d2817; font-weight: 700; margin-bottom: 1rem;">
                                <i class="bi bi-mortarboard"></i> Informasi Akademik
                            </h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>

                                <div class="col-md-6">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Foto KTP</label>
                                    <input type="file" name="foto_ktp" class="form-control" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required accept="image/*">
                                </div>
                            </div>
                        </div>

                        <!-- Rental Schedule -->
                        <div>
                            <h5 style="color: #3d2817; font-weight: 700; margin-bottom: 1rem;">
                                <i class="bi bi-calendar-event"></i> Jadwal Peminjaman
                            </h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" class="form-control" value="{{ old('tanggal_pinjam') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>

                                <div class="col-md-6">
                                    <label style="display: block; color: #3d2817; font-weight: 600; margin-bottom: 0.5rem; font-size: 0.9rem;">Waktu Pinjam</label>
                                    <input type="time" name="waktu_pinjam" class="form-control" value="{{ old('waktu_pinjam') }}" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid #E7D6C8; border-radius: 10px; color: #3d2817; font-size: 0.95rem;" required>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-submit" style="background: linear-gradient(135deg, #6C4E3F 0%, #8B6354 100%); color: white; border: none; padding: 1rem 1.5rem; border-radius: 10px; font-weight: 600; font-size: 0.95rem; cursor: pointer; transition: all 0.3s ease; width: 100%;">
                            <i class="bi bi-send-check"></i> Kirim Permintaan Peminjaman
                        </button>
                    </form>
                </div>
            </div>

            <!-- Info Sidebar -->
            <div class="col-lg-5">
                <!-- Important Info -->
                <div style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 2px 8px rgba(108, 78, 63, 0.1); margin-bottom: 2rem;">
                    <h4 style="color: #3d2817; font-weight: 700; margin-bottom: 1.5rem;">
                        <i class="bi bi-info-circle"></i> Informasi Penting
                    </h4>

                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        <div style="background: #f9f7f5; padding: 1rem; border-radius: 10px; border-left: 4px solid #6C4E3F;">
                            <p style="color: #3d2817; font-weight: 600; margin: 0 0 0.5rem 0; font-size: 0.9rem;">
                                <i class="bi bi-check-circle"></i> Data Harus Lengkap
                            </p>
                            <p style="color: #8B6354; font-size: 0.85rem; margin: 0; line-height: 1.6;">
                                Pastikan semua data diri Anda terisi dengan benar dan lengkap untuk mempercepat proses persetujuan.
                            </p>
                        </div>

                        <div style="background: #f9f7f5; padding: 1rem; border-radius: 10px; border-left: 4px solid #6C4E3F;">
                            <p style="color: #3d2817; font-weight: 600; margin: 0 0 0.5rem 0; font-size: 0.9rem;">
                                <i class="bi bi-shield-check"></i> Verifikasi KTP
                            </p>
                            <p style="color: #8B6354; font-size: 0.85rem; margin: 0; line-height: 1.6;">
                                Upload foto KTP yang jelas dan terbaca untuk proses verifikasi identitas diri Anda.
                            </p>
                        </div>

                        <div style="background: #f9f7f5; padding: 1rem; border-radius: 10px; border-left: 4px solid #6C4E3F;">
                            <p style="color: #3d2817; font-weight: 600; margin: 0 0 0.5rem 0; font-size: 0.9rem;">
                                <i class="bi bi-clock"></i> Proses Approval
                            </p>
                            <p style="color: #8B6354; font-size: 0.85rem; margin: 0; line-height: 1.6;">
                                Pemilik akan merespon dalam 24 jam. Cek notifikasi Anda secara berkala untuk update.
                            </p>
                        </div>

                        <div style="background: #f9f7f5; padding: 1rem; border-radius: 10px; border-left: 4px solid #6C4E3F;">
                            <p style="color: #3d2817; font-weight: 600; margin: 0 0 0.5rem 0; font-size: 0.9rem;">
                                <i class="bi bi-chat"></i> Komunikasi
                            </p>
                            <p style="color: #8B6354; font-size: 0.85rem; margin: 0; line-height: 1.6;">
                                Setelah pengajuan diterima, Anda dapat berkomunikasi langsung dengan pemilik melalui chat.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Rental Terms -->
                <div style="background: linear-gradient(135deg, rgba(108, 78, 63, 0.05) 0%, rgba(201, 165, 140, 0.05) 100%); border: 2px solid #E7D6C8; border-radius: 15px; padding: 1.5rem;">
                    <h4 style="color: #3d2817; font-weight: 700; margin-bottom: 1rem;">
                        <i class="bi bi-file-text"></i> Syarat & Ketentuan
                    </h4>
                    <p style="color: #8B6354; font-size: 0.85rem; line-height: 1.8; margin: 0;">
                        Dengan mengirim formulir ini, Anda menyetujui untuk mematuhi semua syarat dan ketentuan yang ditetapkan oleh pemilik kendaraan dan platform SITRANSMANIA.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: #6C4E3F !important;
        outline: none;
        box-shadow: 0 0 0 3px rgba(108, 78, 63, 0.1);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(108, 78, 63, 0.3);
    }

    @media (max-width: 768px) {
        .row {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }
    }
</style>
@endsection
