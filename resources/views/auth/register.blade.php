@extends('layouts.app')

@section('title', 'Rezerwacja')
@section('head-scripts')
    @vite('resources/js/hidden.js')
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
                    <label for="wyprawa" class="form-label">Wyprawa</label>
                    <select class="form-select" id="wyprawa" name="wyprawa" required>
                        <option selected>Wybierz...</option>
                        <option value="argentina">Argentyna i Chile</option>
                        <option value="indonesia">Indonezja</option>
                        <option value="cambodia">Kambodża</option>
                        <option value="peru">Peru i Boliwia</option>
                        <option value="sri_lanka">Sri Lanka</option>
                        <option value="tibet">Tybet, w Chinach</option>
                        <option value="inny">Inna</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="termin" class="form-label">Termin</label>
                    <select class="form-select" id="termin" name="termin" required>
                        <option selected>Wybierz...</option>
                        <option value="argentina_1407">14.07-27.07.2024</option>
                        <option value="argentina_1407">28.07-11.08.2024</option>
                        <option value="argentina_1407">04.08-17.08.2024</option>
                        <option value="argentina_inny">Inny</option>
                    </select>
                </div>
            </div>

            <h3 class="mt-5">Twoje dane kontaktowe</h3>
            <div id="participantSection">
                <div class="participant" id="participantTemplate">
                    
                    <!-- Imię -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-input-label for="name" :value="__('Imię')" class="form-label" />
                            {{-- <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" autofocus autocomplete="name" /> --}}
                            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            {{-- <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus /> --}}
                            <x-input-error :messages="$errors->get('name')" class="mt-2 red-text" />
                        </div>

                        <!-- Nazwisko -->
                        <div class="col-md-6">
                            <x-input-label for="last_name" :value="__('Nazwisko')" class="form-label" />
                            {{-- <x-text-input id="last_name" class="form-control" type="text" name="last_name" :value="old('last_name')" autocomplete="last_name" /> --}}
                            <x-text-input id="last_name" class="form-control" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
                            {{-- <x-text-input id="last_name" class="form-control" type="text" name="last_name" :value="old('last_name')" required /> --}}
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2 red-text" />
                        </div>
                    </div>

                    <!-- Telefon -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <x-input-label for="phone" :value="__('Telefon')" class="form-label" />
                            <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" autocomplete="phone"  />
                            {{-- <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" /> --}}
                            <x-input-error :messages="$errors->get('phone')" class="mt-2 red-text" />
                        </div>

                        <!-- Adres email -->
                        <div class="col-md-6">
                            <x-input-label for="email" :value="__('Adres email')" class="form-label" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            {{-- <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required /> --}}
                            <x-input-error :messages="$errors->get('email')" class="mt-2 red-text" />
                        </div>
                    </div>

                    <h5 class="login-data mt-4">Dane do logowania</h5>
                    <div class="login-info">
                        <p>Jeśli jesteś już zarejestrowany <a href="{{ route('login') }}">przejdź do strony logowania</a></p>
                    </div>
                    <div class="row mb-3 login-fields">
                        <!-- Hasło -->
                        <div class="col-md-6">
                            <x-input-label for="password" :value="__('Hasło')" class="form-label" />
                            <div class="form-group position-relative">
                                <x-text-input id="password" class="form-control" type="password" name="password" required />
                                {{-- <x-text-input id="password" class="form-control" type="password" name="password" required /> --}}
                                <i class="bi bi-eye toggle-password" id="togglePassword"></i>
                                <x-input-error :messages="$errors->get('password')" class="mt-2 red-text" />
                            </div>
                        </div>

                        <!-- Powtórz hasło -->
                        <div class="col-md-6">
                            <x-input-label for="password_confirmation" :value="__('Powtórz hasło')" class="form-label" />
                            <div class="form-group position-relative">
                                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                                {{-- <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required /> --}}
                                <i class="bi bi-eye toggle-password" id="toggleConfirmPassword"></i>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 red-text" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <small class="login-info">Dzięki podaniu hasła, w każdej chwili będziesz mógł zalogować się do serwisu i sprawdzić status swojego zamówienia.</small>
                    </div>
                </div>
            </div>

            {{-- <!-- Przyciski dodawania/usuwania uczestnika -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <button type="button" class="btn btn-secondary w-100 shadow" id="addParticipantBtn">Dodaj kolejnego uczestnika</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-secondary w-100 shadow" id="removeParticipantBtn">Usuń ostatniego uczestnika</button>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col-md-12">
                    <small class="text-danger">Jeśli każdy uczestnik chce mieć możliwość logowania do serwisu, musi dokonać osobnej rezerwacji.</small>
                </div>
            </div> --}}

            <!-- Klauzule obowiązkowe -->
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

            <!-- Klauzule nieobowiązkowe -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Klauzule nieobowiązkowe</strong>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="optional_clause" name="optional_clause">
                        <label class="form-check-label" for="optional_clause"><small>Wyrażam zgodę na przetwarzanie powyższych danych osobowych w celach marketingowych przez firmę GlobFrotter.pl.</small></label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-warning shadow w-100">Wyślij</button>
                </div>
            </div>

        </form>
    </div>
</main>
@endsection

@section('scripts')
    {{-- @vite('resources/js/participants.js') --}}
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
    @vite('resources/js/eye.js')
@endsection
