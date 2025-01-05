<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Logowanie')
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
                    <h2>Logowanie</h2>
                </div>

                <div class="col-md-12 text-center">
                    <div class="login-image shadow position-relative mx-md-4">
                        <img src="{{ asset('img/main/login.jpg') }}" alt="Chinese youth with cell phones" class="img-fluid">
                        <div class="login-form-box">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder=" " :value="old('email')" required autofocus>
                                    <label for="email" class="floating-label">Email:</label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="form-group position-relative mt-4">
                                    <input type="password" class="form-control" id="password" name="password" placeholder=" " required>
                                    <label for="password" class="floating-label">Hasło:</label>
                                    <i class="bi bi-eye toggle-password" id="togglePassword"></i>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                        <span class="ms-2 text-sm text-gray-600">Zapamiętaj mnie</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            Nie pamiętam hasła
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-warning ms-3">
                                        Zaloguj się
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 text-center mt-4">
                    <p>Logować mogą się jedynie osoby, które zarezerwowały, bądź wykupiły jedną z naszych wypraw.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('excursions') }}" class="btn btn-warning shadow">Poznaj nasze wyprawy</a>
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
