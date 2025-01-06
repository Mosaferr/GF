<!-- resources/views/XXXXX.blade.php -->
@extends('layouts.app')

@section('title', 'XXXXX')
@section('head-scripts')
    @vite('resources/css/hide.css')
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container my-5" style="max-width: 1000px;">
			<div class="col-md-12 text-center pb-5 mt-3">
				<h2>Twoja wyprawa</h2>
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
						<i class="bi bi-2-circle-fill text-success"></i>
					</div>
					<small class="mb-1">Odbierz potwierdzenie</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-3-circle-fill text-success"></i>
					</div>
					<small class="mb-1">Wypełnij formularz umowy</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-4-circle-fill text-info-emphasis"></i>
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

		<div class="container" style="max-width: 1000px;">

			<div class="row g-md-4 g-lg-5 mx-sm-1 mx-md-2 lg-md-0">
				<div class="col-lg-8 col-md-7 col-sm-12 col-12 d-flex flex-column justify-content-center">
					<div class="image shadow mb-3">
						<a href="{{ asset('img/trip/arg1.jpg') }}" data-toggle="lightbox">
							<img src="{{ asset('img/trip/sm-arg1.jpg') }}" alt="sm-argentina1" class="img-thumbnail">
						</a>
					</div>
				</div>

				<div class="col-lg-4 col-md-5 col-sm-12 col-12 d-flex flex-column justify-content-center">
					<h4 class="mb-3">Argentyna i Chile</h4>
					<b>Wybrany termin:</b>
					<small>piątek, 25 października 2024</small>
					<small class="mt-0">sobota, 9 listopada 2024 (14 dni)</small>
					<b class="mt-2">Koszt wyprawy:</b>
					<small>6500 PLN + 1200 USD</small>
					<b class="mt-2">Do zapłaty w PLN:</b>
					<small>
						<input type="radio" id="zaliczka" name="payment" value="zaliczka">
						<label for="zaliczka">Zaliczka: 2500 PLN</label>
					</small>
					<small>
						<input type="radio" id="calosc" name="payment" value="calosc">
						<label for="calosc">Całość: 6500 PLN</label>
					</small>
					<div class=" mt-5 d-flex justify-content-end">
						<a href="#">
							<button type="submit" class="btn btn-warning shadow">Zapłać</button>
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