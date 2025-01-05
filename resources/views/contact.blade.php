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
							
                            @if(session('success'))
							{{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
								{{ session('success') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div> --}}
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
                            @endif

							<form action="{{ route('contact.send') }}" method="POST">
								@csrf
								<div class="form-group">
									<input type="text" class="form-control" name="name" id="name" placeholder=" " required>
									<label for="name" class="floating-label">Imię:</label>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder=" " required>
									<label for="email" class="floating-label">Email:</label>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="message" id="message" rows="5" placeholder=" " required></textarea>
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
