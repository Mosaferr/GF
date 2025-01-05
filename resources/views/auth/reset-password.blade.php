<!-- resources/views/auth/reset-password.blade.php -->
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
                    <h2>Reset hasła</h2>
                </div>

                <div class="col-md-12 text-center">
                    <div class="login-image shadow position-relative mx-md-4">
                        <img src="{{ asset('img/main/login.jpg') }}" alt="Chinese youth with cell phones" class="img-fluid">
                        <div class="login-form-box">


							<form method="POST" action="{{ route('password.store') }}">
								@csrf

								<!-- Password Reset Token -->
								<input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <!-- Email Address -->
                                <div class="form-group mt-2">
                                    <input type="email" class="form-control" id="email" name="email" placeholder=" " value="{{ request()->email }}" required autofocus autocomplete="email">
                                    {{-- <input type="email" class="form-control" id="email" name="email" placeholder=" " :value="old('email', $request->email)" required autofocus autocomplete="email"> --}}
                                    {{-- <input type="email" class="form-control" id="email" name="email" placeholder=" " :value="old('email', $request->email)" required autofocus> --}}
                                    <label for="email" class="floating-label">Email:</label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 yellow-text" />
                                </div>

                                <!-- Password -->
                                <div class="form-group position-relative mt-4">
                                    <input type="password" class="form-control" id="password" name="password" placeholder=" " required>
                                    <label for="password" class="floating-label">Hasło:</label>
                                    <i class="bi bi-eye toggle-password" id="togglePassword"></i>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2 yellow-text" />
                                </div>
                                
                                <!-- Confirm Password -->
                                <div class="form-group position-relative mt-4">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder=" " required>
                                    <label for="password_confirmation" class="floating-label">Powtórz hasło:</label>
                                    <i class="bi bi-eye toggle-password" id="toggleConfirmPassword"></i>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 yellow-text" />
                                </div>
                                
                                <button type="submit" class="btn btn-warning mt-2">
                                    Resetuj hasło
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
