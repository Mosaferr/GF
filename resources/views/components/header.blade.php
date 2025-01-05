<!-- resources/views/components/header.blade.php -->
<header>
    <nav class="navbar fixed-top navbar-light bg-body-secondary shadow navbar-expand-lg">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/logo_black.svg') }}" width="23" height="auto" class="d-inline-block ms-sm-4 align-text-bottom" alt="logo">  Glob<i>Frotter</i>.pl
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainmenu">
            <ul class="navbar-nav nav-underline mx-5">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        O nas
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->is('excursions*') ? 'active' : '' }}" href="{{ route('excursions') }}" id="wyprawyLink" role="button" aria-expanded="false">
                        Wyprawy
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="wyprawyLink">
                        <li><a class="dropdown-item {{ request()->is('excursions/argentina') ? 'active' : '' }}" href="{{ route('excursions.argentina') }}">Argentyna i Chile</a></li>
                        <li><a class="dropdown-item {{ request()->is('excursions/indonesia') ? 'active' : '' }}" href="{{ route('excursions.indonesia') }}">Indonezja</a></li>
                        <li><a class="dropdown-item {{ request()->is('excursions/cambodia') ? 'active' : '' }}" href="{{ route('excursions.cambodia') }}">Kambodża</a></li>
                        <li><a class="dropdown-item {{ request()->is('excursions/peru') ? 'active' : '' }}" href="{{ route('excursions.peru') }}">Peru i Boliwia</a></li>
                        <li><a class="dropdown-item {{ request()->is('excursions/sri_lanka') ? 'active' : '' }}" href="{{ route('excursions.sri_lanka') }}">Sri Lanka</a></li>
                        <li><a class="dropdown-item {{ request()->is('excursions/tibet') ? 'active' : '' }}" href="{{ route('excursions.tibet') }}">Tybet, w Chinach</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('terms') ? 'active' : '' }}" href="{{ route('terms') }}">
                        Terminy
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}" href="{{ route('gallery') }}" id="galeriaLink" role="button" aria-expanded="false">
                        Galeria
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="galeriaLink">
                        <li><a class="dropdown-item {{ request()->is('gallery/argentina') ? 'active' : '' }}" href="{{ route('gallery.argentina') }}">Argentyna</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/bolivia') ? 'active' : '' }}" href="{{ route('gallery.bolivia') }}">Boliwia</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/chile') ? 'active' : '' }}" href="{{ route('gallery.chile') }}">Chile</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/china') ? 'active' : '' }}" href="{{ route('gallery.china') }}">Chiny</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/indonesia') ? 'active' : '' }}" href="{{ route('gallery.indonesia') }}">Indonezja</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/cambodia') ? 'active' : '' }}" href="{{ route('gallery.cambodia') }}">Kambodża</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/peru') ? 'active' : '' }}" href="{{ route('gallery.peru') }}">Peru</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/sri_lanka') ? 'active' : '' }}" href="{{ route('gallery.sri_lanka') }}">Sri Lanka</a></li>
                        <li><a class="dropdown-item {{ request()->is('gallery/tibet') ? 'active' : '' }}" href="{{ route('gallery.tibet') }}">Tybet</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('information') ? 'active' : '' }}" href="{{ route('information') }}">
                        Informacje
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        Kontakt
                    </a>
                </li>
            </ul>

            @include('components.auth_dropdown')        <!-- Włączenie komponentu logowania (?) i dropdown dla użytkownika -->

            {{-- <a class="nav-link me-5 " href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right fs-3"></i>
            </a> --}}
        </div>
    </nav>
</header>
