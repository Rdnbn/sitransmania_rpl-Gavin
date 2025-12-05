@extends('layouts.main')

@section('title', 'Daftar Chat')

@section('content')
<div class="container py-4">
    <h3>Daftar Chat</h3>
    <ul class="list-group mt-3">
        @forelse($listChat as $userId => $messages)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('chat.index', $userId) }}">
                    Chat dengan User ID: {{ $userId }}
                </a>
                <small>{{ $messages->first()->created_at->diffForHumans() }}</small>
            </li>
        @empty
            <li class="list-group-item text-center text-muted">Belum ada chat</li>
        @endforelse
    </ul>
</div>
@endsection
