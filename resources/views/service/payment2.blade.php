<!-- resources/views/service/payment2.blade.php -->
@extends('layouts.app')

@section('title', 'Dopłata')
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

		<div class="container" style="max-width: 1050px;">

			<div class="row g-md-4 g-lg-5 mx-sm-1 mx-md-2 lg-md-0">
				<div class="col-lg-8 col-md-7 col-sm-12 col-12 d-flex flex-column justify-content-center">
					<div class="image shadow mb-3">
						<a href="{{ asset('img/trip/' . $image) }}" data-toggle="lightbox">
							<img src="{{ asset('img/trip/' . $smallImage) }}" alt="sm-{{ pathinfo($image, PATHINFO_FILENAME) }}" class="img-thumbnail">
						</a>
					</div>
				</div>

				<div class="col-lg-4 col-md-5 col-sm-12 col-12 d-flex flex-column justify-content-center">
					<b class="green-text mb-3">Zaliczka jest zatwierdzona</b>
					<h4 class="mb-3">{{ session('destination') }}</h4>
					<b>Wybrany termin:</b>
					<small>Od: {{ session('start_date') }}</small>
					<small class="mt-0">Do: {{ session('end_date') }} (15 dni)</small>
					<b class="mt-2">Koszt wyprawy uczestnika:</b>
					<small>{{ session('formatted_price') }} PLN</small>
					<small class="mt-1">Zapłacono zaliczkę:</small>
					<small><label for="zaliczka">{{ session('formatted_prepayment') }} PLN * {{ session('participant_count') }} {{ session('participants_label') }} = {{ session('formatted_total_prepayment') }} PLN</label></small>
					<b class="mt-2 mb-1">Pozostało do zapłaty:</b>
					<small>{{ session('formatted_total_cost') }} PLN - {{ session('formatted_total_prepayment') }} PLN = <strong>{{ session('formatted_balance') }}</strong> PLN</small>

					<form action="{{ route('service.payment2.checkout') }}" method="POST">
						@csrf
						<div class="text-end mt-3">
							<button type="submit" class="btn btn-warning shadow">Zapłać</button>
						</div>
					</form>

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