@extends('layouts.main')

@section('title', 'Chat')

@section('content')
<div class="container py-4" style="max-width: 700px;">
    <h4 class="mb-3"><i class="bi bi-person-circle"></i> {{ $penerima->name }}</h4>

    <div class="border rounded p-3 mb-3" style="height: 60vh; overflow-y: auto; background: #fdf7f3;">
        @foreach($chat as $c)
            <div class="mb-2 d-flex {{ $c->id_pengirim == auth()->id() ? 'justify-content-end' : 'justify-content-start' }}">
                <div class="{{ $c->id_pengirim == auth()->id() ? 'bg-primary text-white' : 'bg-white' }}"
                     style="padding: 8px 14px; border-radius: 12px; max-width: 60%;">
                    {{ $c->isi_pesan }}
                    <div class="small text-muted mt-1">{{ $c->waktu_kirim }}</div>
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send') }}" method="POST" class="d-flex">
        @csrf
        <input type="hidden" name="id_penerima" value="{{ $penerima->id_user }}">
        <input type="text" name="isi_pesan" class="form-control me-2" placeholder="Tulis pesan...">
        <button class="btn btn-primary"><i class="bi bi-send"></i></button>
    </form>
</div>
@endsection
