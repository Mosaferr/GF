<!-- resources/views/auth/forgot-password.blade.php -->
@extends('layouts.app')

@section('title', 'Reset hasła')
@section('head-scripts')
    <style>
        .carousel-inner, .container, .row, .image, .card .footer {visibility: hidden;}
    </style>
@endsection

@section('content')
    <main class="custom-margin-top">
        <div class="container mt-5" style="max-width: 1100px;">
            <div class="row ">
                <div class="col-md-12 text-center pb-5 mt-3">
                    {{-- <h2>Zapomniałem hasła</h2> --}}
                    <h2>Nie pamiętam hasła</h2>
                </div>

                <div class="col-md-12 text-center">
                    <div class="login-image shadow position-relative mx-md-4">
                        <img src="{{ asset('img/main/login.jpg') }}" alt="Chinese youth with cell phones" class="img-fluid">
                        <div class="login-form-box">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Forgot password -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="boldANDwhite d-flex align-items-center">
                                        <label for="remember_me" class="ms-2">{{ __('Nie pamiętasz swojego hasła? Żaden problem. Podaj nam swój adres email a my wyślemy Ci link do zresetowania hasła i do ustanowienia nowego.') }}</label>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="form-group mt-2">
                                    <input type="email" class="form-control" id="email" name="email" placeholder=" " :value="old('email')" required autofocus>
                                    <label for="email" class="floating-label">Email:</label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <button type="submit" class="btn btn-warning mt-2">
                                    Zresetuj hasło
                                </button>
                            </form>
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
