<!-- resources/views/available.blade.php -->
@extends('layouts.app')

@section('title', 'XXXXX')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container my-5" style="max-width: 1000px;">

			<div class="col-md-12 text-center pb-5 mt-3">
				<h2>Mamy dla Ciebie wolne miejsce!</h2>
			</div>
			<hr>
			<div class="row text-center pb-1">
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-1-circle-fill text-success"></i>
					</div>
					<small class="mb-1">Wypełnij formularz rezerwacji</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-2-circle-fill text-info-emphasis"></i>
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

		<div class="container" style="max-width: 1100px;">

			<div class="row g-md-4 g-lg-5 mx-sm-1 mx-md-2 lg-md-0">
				<div class="col-lg-7 col-md-7 col-sm-12 col-12 d-flex flex-column justify-content-center">
					<div class="image shadow mb-3">
						<a href="{{ asset('img/main/reservation.jpg') }}" data-toggle="lightbox">
							<img src="{{ asset('img/main/sm-reservation.jpg') }}" alt="Papuan" class="img-thumbnail">
						</a>
					</div>
				</div>

				<div class="about-text col-lg-5 col-md-5 col-sm-12 col-12 d-flex flex-column justify-content-center">
					<p>Witamy w grupie.</p>
					<p>Potwierdzenie wolnego miejsca wysłaliśmy mailem.</p>
					<p>Wypełnij jeszcze jeden formularz i dokonaj wpłaty.</p>
					<div class="mt-5 d-flex justify-content-end">
						<a href="f-registration.html">
							<button type="submit" class="btn btn-lg btn-warning shadow">Dalej</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
    <script src="{{ asset('js/lightbox.bundle.min.js') }}"></script>
@endsection