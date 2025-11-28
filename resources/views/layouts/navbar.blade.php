{{-- layouts/navbar.blade.php --}}
@php $user = Auth::user(); @endphp
<nav class="navbar navbar-expand-lg navbar-app fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">SITRANSMANIA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navApp">
            <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
        </button>
        <div class="collapse navbar-collapse" id="navApp">
            <ul class="navbar-nav ms-auto">
                @if(!$user)
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('showRegisterForm') }}">Register</a></li>
                @else
                    @if($user->role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                    @elseif($user->role === 'pemilik')
                        <li class="nav-item"><a class="nav-link" href="{{ route('pemilik.dashboard') }}">Dashboard Pemilik</a></li>
                    @elseif($user->role === 'peminjam')
                        <li class="nav-item"><a class="nav-link" href="{{ route('peminjam.dashboard') }}">Dashboard Peminjam</a></li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endif
            </ul>
        </div>
    </div>
</nav>
