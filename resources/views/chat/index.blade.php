@extends('layouts.main')

@section('title', 'Chat')

@section('content')
<div class="container py-4">
    <h3 class="mb-3"><i class="bi bi-chat-dots"></i> Daftar Kontak</h3>

    <div class="list-group shadow-sm">
        @foreach($users as $u)
            <a href="{{ route('chat.room', $u->id_user) }}" 
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span><i class="bi bi-person-circle"></i> {{ $u->name }}</span>
            </a>
        @endforeach
    </div>
</div>
@endsection
