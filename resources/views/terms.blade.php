<!-- resources/views/terms.blade.php -->
@extends('layouts.app')

@section('title', 'Terminy')
@section('head-scripts')
	@vite('resources/js/hidden.js')
    <script src="{{ asset('js/spotlight.bundle.js') }}"></script>
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1200px;">

			<div class="row">
				<div class="table-term col-lg-8 col-md-6 col-sm-12 col-12 px-4 d-flex flex-column justify-content-center">
					<h2 class="">Terminy wyjazdów</h2>
					<h5>Leć z nami, póki nie jest za późno:</h5>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-12 col-12 px-4 d-flex flex-column justify-content-center">
					<div class="image shadow">
						<a class="spotlight" href="{{ asset('img/main/sm-term.jpg') }}">
							<img src="{{ asset('img/main/term.jpg') }}" alt="Apsara in Angkor Wat" class="img-thumbnail shadow">
						</a>
						{{-- <a href="{{ asset('img/main/sm-term.jpg') }}" data-toggle="lightbox">
							<img src="{{ asset('img/main/term.jpg') }}" alt="Apsara in Angkor Wat" class="img-thumbnail shadow">
						</a> --}}
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