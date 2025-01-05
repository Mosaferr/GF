<!-- resources/views/components/auth_dropdown.blade.php -->
@auth
    <a id="navbarDropdown" class="nav-link dropdown-toggle me-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle me-5" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a> --}}

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    {{-- <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown"> --}}
        <a class="dropdown-item" href="{{ route('profile.edit') }}">
            {{ __('Profile') }}
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            {{ __('Log Out') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@else
    <a class="nav-link me-5" href="{{ route('login') }}">
        <i class="bi bi-box-arrow-in-right fs-3"></i>
    </a>
@endauth
