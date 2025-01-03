<!-- resources/views/contact.blade.php -->
@extends('layouts.app')

@section('title', 'Kontakt')
@section('head-scripts')
    <style>
        .carousel-inner, .container, .row, .image, .card .footer {visibility: hidden;}
    </style>
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1100px;">
			<div class="row">

				<div class="col-md-12 text-center pb-5">
					<h2 class="">Kontakt</h2>
					<h5>Pisz, chętnie odpowiemy</h5>
				</div>

				<div class="col-md-12 text-center">
					<div class="contact-image shadow position-relative mx-md-4">
						<img src="{{ asset('img/main/contact.jpg') }}" alt="Chinese man" class="img-fluid">
						<div class="contact-form-box">
							<form>
								<div class="form-group">
									<input type="text" class="form-control" id="name" placeholder=" ">
									<label for="name" class="floating-label">Imię:</label>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="email" placeholder=" ">
									<label for="email" class="floating-label">Email:</label>
								</div>
								<div class="form-group">
									<textarea class="form-control" id="message" rows="5" placeholder=" "></textarea>
									<label for="message" class="floating-label">Wiadomość:</label>
								</div>
								<button type="submit" class="btn btn-warning">Wyślij</button>
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
@endsection
