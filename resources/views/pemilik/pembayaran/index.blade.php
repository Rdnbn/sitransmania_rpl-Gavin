@extends('layouts.pemilik')

@section('title', 'Verifikasi Pembayaran')

@section('content')

<h3 class="fw-bold mb-3">Verifikasi Pembayaran</h3>

@if(!$pembayaran)
    <div class="alert alert-warning">Belum ada bukti pembayaran.</div>
@else

<div class="card shadow-sm p-4">

    <h5>Bukti Pembayaran</h5>
    <a href="{{ asset('uploads/bukti/'.$pembayaran->bukti_transfer) }}" 
       target="_blank" class="btn btn-primary mb-3">
       Lihat Bukti
    </a>

    {{-- Flash & Error --}}
    <x-flash />
    <x-error />

    <form action="{{ route('pemilik.pembayaran.verifikasi') }}" method="POST">
        @csrf

        <input type="hidden" name="id_pembayaran" value="{{ $pembayaran->id_pembayaran }}">

        <label>Status Pembayaran</label>
        <select name="status_pembayaran" class="form-control mb-3">
            <option value="pending" {{ $pembayaran->status_pembayaran=='pending' ? 'selected' : '' }}>Pending</option>
            <option value="dp" {{ $pembayaran->status_pembayaran=='dp' ? 'selected' : '' }}>DP</option>
            <option value="dibayar" {{ $pembayaran->status_pembayaran=='dibayar' ? 'selected' : '' }}>Dibayar</option>
        </select>

        <button class="btn btn-success">Perbarui Status</button>
    </form>

</div>

@endif

@endsection
