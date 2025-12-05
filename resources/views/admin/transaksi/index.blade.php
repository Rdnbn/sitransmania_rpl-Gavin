@extends('layouts.admin')

@section('title', 'Riwayat Transaksi')

@section('content')

<h3 class="fw-bold mb-4">Riwayat Transaksi</h3>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Peminjam</th>
            <th>Kendaraan</th>
            <th>Status</th>
            <th>Pembayaran</th>
            <th>Tanggal</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transaksi as $t)
        <tr>
            <td>{{ $t->nama }}</td>
            <td>{{ $t->kendaraan->nama_kendaraan }} ({{ $t->kendaraan->jenis_kendaraan }})</td>
            <td>{{ $t->status_peminjaman }}</td>
            <td>{{ $t->pembayaran->status_pembayaran ?? 'Belum Bayar' }}</td>
            <td>{{ $t->tanggal_pinjam }} {{ $t->waktu_pinjam }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
