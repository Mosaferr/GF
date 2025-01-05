<!-- resources/views/XXXXX.blade.php -->
@extends('layouts.app')

@section('title', 'XXXXX')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container mt-5" style="max-width: 1100px;">
			<div class="row">
				<div class="col-md-12 text-center pb-5 mt-3">
					<h2>Nowe hasło</h2>
					<h6 style="margin-bottom: -20px;">Na Twój adres email wysłalismy nowe hasło.</h6>
				</div>

				<div class="col-md-12 text-center mt-0">
					<div class="login-image shadow position-relative mx-md-4">
						<img src="{{ asset('img/main/login.jpg') }}" alt="Chinese youth with cell phones" class="img-fluid">
						<div class="login-form-box">
							<form>
								<div class="form-group">
									<input type="email" class="form-control" id="email" placeholder=" " required>
									<label for="email" class="floating-label">Email:</label>
								</div>

								<div class="form-group position-relative">
									<input type="password" class="form-control" id="password" placeholder=" " required>
									<label for="password" class="floating-label">Hasło:</label>
									<i class="bi bi-eye toggle-password" id="togglePassword"></i>
								</div>

								<div class="d-flex justify-content-center">
									<a href="f-login2.html" class="btn btn-warning">Zaloguj się</a>
								</div>

								<!-- <button type="submit" class="btn btn-warning">Zaloguj się</button> -->
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