<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('title', 'Rezerwacja')
@section('head-scripts')
    @vite('resources/css/hide.css')
@endsection

@section('content')
<main class="custom-margin-top">
    <div class="container my-5" style="max-width: 1000px;">
        <div class="col-md-12 text-center pb-5 mt-3">
            <h2>Rezerwacja wyprawy</h2>
        </div>

        <hr>
        <div class="row text-center pb-1">
            <div class="col">
                <div class="number" style="font-size: 60px;">
                    <i class="bi bi-1-circle-fill text-info-emphasis"></i>
                </div>
                <small class="mb-1">Wypełnij formularz rezerwacji</small>
            </div>
            <div class="col">
                <div class="number" style="font-size: 60px;">
                    <i class="bi bi-2-circle-fill text-warning"></i>
                </div>
                <small class="mb-1">Odbierz potwierdzenie</small>
            </div>
            <div class="col">
                <div class="number" style="font-size: 60px;">
                    <i class="bi bi-3-circle-fill text-warning"></i>
                </div>
                <small class="mb-1">Wypełnij formularz umowy</small>
            </div>
            <div class="col">
                <div class="number" style="font-size: 60px;">
                    <i class="bi bi-4-circle-fill text-warning"></i>
                </div>
                <small class="mb-1">Dokonaj wpłaty</small>
            </div>
            <div class="col">
                <div class="number" style="font-size: 60px;">
                    <i class="bi bi-5-circle-fill text-warning"></i>
                </div>
                <small class="mb-1">Zacznij się pakować</small>
            </div>
        </div>
        <hr>
    </div>

    <div class="form-container">
        <form method="POST" action="{{ route('register') }}" id="registrationForm">
            @csrf
            <h3> Twoja przygoda </h3>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="trip" class="form-label">Wyprawa</label>
                    <select class="form-select" id="trip" name="trip" required>
                        <option value="" selected>Wybierz...</option>
                        @foreach($trips as $trip)
                            <option value="{{ $trip->id }}">{{ $trip->destination }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="start_date" class="form-label">Termin</label>
                    <select class="form-select" id="start_date" name="start_date" required>
                        <option value="" selected>Wybierz...</option>
                        <!-- Opcje będą dynamicznie ładowane przez JavaScript -->
                    </select>
                </div>
            </div>

            <h3 class="mt-5">Twoje dane kontaktowe</h3>
            <div id="participantSection">
                <div class="participant" id="participantTemplate">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-input-label for="name" :value="__('Imię')" class="form-label" />
                            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 red-text" />
                        </div>
                        <div class="col-md-6">
                            <x-input-label for="last_name" :value="__('Nazwisko')" class="form-label" />
                            <x-text-input id="last_name" class="form-control" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2 red-text" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="participants" class="form-label">Uczestnicy</label>
                            <input type="number" class="form-control" id="participants" name="participants" value="{{ old('participants') }}" min="1" step="1" required>
                        </div>
                        <div class="col-md-4">
                            <x-input-label for="phone" :value="__('Telefon')" class="form-label" />
                            <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" autocomplete="phone"  />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2 red-text" />
                        </div>
                        <div class="col-md-6">
                            <x-input-label for="email" :value="__('Adres email')" class="form-label" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 red-text" />
                        </div>
                    </div>
                    <h5 class="login-data mt-4">Dane do logowania</h5>
                    <div>
                        <small class="login-info green-text">Dzięki podaniu hasła, w każdej chwili będziesz mógł zalogować się do serwisu i sprawdzić status swojego zamówienia.</small>
                    </div>
                    <div class="login-info mt-2">
                        <p>Jeśli jesteś już zarejestrowany <a href="{{ route('login') }}">przejdź do strony logowania</a></p>
                    </div>
                    <div class="row mb-3 login-fields">
                        <div class="col-md-6">
                            <x-input-label for="password" :value="__('Hasło')" class="form-label" />
                            <div class="position-relative password-field">
                                <x-text-input id="password" class="form-control specific-password-input" type="password" name="password" required />
                                <i class="bi bi-eye position-absolute toggle-password specific-password-icon" id="togglePassword"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <x-input-label for="password_confirmation" :value="__('Powtórz hasło')" class="form-label" />
                            <div class="position-relative password-field">
                                <x-text-input id="password_confirmation" class="form-control specific-password-input" type="password" name="password_confirmation" required />
                                <i class="bi bi-eye position-absolute toggle-password specific-password-icon" id="toggleConfirmPassword"></i>
                            </div>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 red-text full-width-error" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 red-text full-width-error" />
                </div>
            </div>

            <div class="row mt-4 mb-3">
                <div class="col-md-12">
                    <strong>Klauzule obowiązkowe</strong><span class="text-danger">*</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mandatory_clause" name="mandatory_clause" required>
                        <label class="form-check-label" for="mandatory_clause">
                            <small>Oświadczam, iż zapoznałem się z <a href="docs/regulamin_serwisu_internetowego.pdf" target="_blank">Regulaminem</a> i <a href="docs/polityka_prywatnosci.pdf" target="_blank">Polityką prywatności</a> serwisu internetowego oraz akceptuję ich postanowienia.</small>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Klauzule nieobowiązkowe</strong>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="optional_clause" name="optional_clause">
                        <label class="form-check-label" for="optional_clause"><small>Wyrażam zgodę na przetwarzanie powyższych danych osobowych w celach marketingowych przez firmę GlobFrotter.pl.</small></label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    {{-- <button type="submit" class="btn btn-warning shadow w-100">Wyślij</button> --}}
                    <button type="submit" class="btn btn-warning shadow w-100" id="submitButton">Wyślij</button>
                    <button class="btn btn-warning shadow w-100" id="loadingButton" style="display: none;" disabled>
                        Wysyłanie..<span class="spinner-border spinner-border-sm ms-2"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
    @vite('resources/js/eye.js')
    <script src="{{ asset('js/register.js?v=1.0') }}"></script> <!-- Dodanie nowego skryptu -->
    <script src="{{ asset('js/spinner-button.js') }}"></script>
@endsection
