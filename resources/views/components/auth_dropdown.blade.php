<!-- resources/views/components/auth_dropdown.blade.php -->
@auth
    @if (Auth::user()->hasVerifiedEmail())
        <a id="navbarDropdown" class="nav-link dropdown-toggle me-5" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            @if (Auth::user()->role == 3)
                <a class="dropdown-item" href="{{ route('admin') }}">
                    {{ __('Panel administratora') }}
                </a>
            @endif
            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                {{ __('Profil') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                {{ __('Wyloguj się') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @else
        <a class="nav-link me-5" href="{{ route('verification.notice') }}">
            {{ __('Zweryfikuj swój e-mail') }}
        </a>
    @endif
@else
    <a class="nav-link me-5" href="{{ route('login') }}">
        <i class="bi bi-box-arrow-in-right fs-3"></i>
    </a>
@endauth
