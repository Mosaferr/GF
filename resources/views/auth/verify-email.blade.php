<!-- resources/views/auth/verify-email.blade.php -->
@extends('layouts.app')

@section('title', 'Logowanie')
@section('head-scripts')
    @vite('resources/css/hide.css')
@endsection

@section('content')
    <main class="custom-margin-top">
        <div class="container mt-5" style="max-width: 1100px;">
            <div class="row ">
                <div class="col-md-12 text-center pb-5 mt-3">
                    <h2>Weryfikacja</h2>
                </div>

                <div class="col-md-12 text-center">
                    <div class="login-image shadow position-relative mx-md-4">
                        <img src="{{ asset('img/main/login.jpg') }}" alt="Chinese youth with cell phones" class="img-fluid">

                        <div class="login-form-box">
                            <!-- Session Status -->
                            @if (session('status') == 'verification-link-sent')
                                <div class="button-text mb-4  mt-1">
                                    {{ __('Nowy link weryfikacyjny został wysłany na adres email podany podczas rejestracji.') }}
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="boldANDwhite d-flex align-items-center">
                                    <label for="remember_me" class="ms-2">{{ __('Dziękujemy za rejestrację! Zanim zaczniemy, prosimy o potwierdzenie adresu email.
                                    Otwórz swoją pocztę i kliknij w link, który właśnie do Ciebie wysłaliśmy. Jeśli wiadomość nie dotarła, wyślemy ją ponownie.') }}</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="button-text">
                                        {{ __('Wyślij ponownie') }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="button-text">
                                        {{ __('Wyloguj się') }}
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
    @vite('resources/js/eye.js')
@endsection
