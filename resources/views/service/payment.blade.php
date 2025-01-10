<!-- resources/views/service/payment.blade.php -->
@extends('layouts.app')

@section('title', 'Twoja wyprawa')
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
						{{-- <a href="{{ asset('img/trip/arg1.jpg') }}" data-toggle="lightbox">
							<img src="{{ asset('img/trip/sm-arg1.jpg') }}" alt="sm-argentina1" class="img-thumbnail">
						</a> --}}
					</div>
				</div>

				<div class="col-lg-4 col-md-5 col-sm-12 col-12 d-flex flex-column justify-content-center">
					<h4 class="mb-3">{{ session('destination') }}</h4>
					<b>Wybrany termin:</b>
					<small>Od: {{ session('start_date') }}</small>
					<small class="mt-0">Do: {{ session('end_date') }} (15 dni)</small>
					<b class="mt-2">Koszt wyprawy uczestnika:</b>
					<small>{{ session('formatted_price') }} PLN</small>

					<b class="mt-3 mb-1">Do zapłaty w PLN:</b>
					<form action="{{ route('service.payment.checkout') }}" method="POST">
						@csrf
						<small>
							<div class="d-flex align-items-center mb-1">
								<input type="radio" id="zaliczka" name="payment" value="zaliczka" class="me-2" required>
								<label for="zaliczka" class="m-0">Zaliczka: {{ session('formatted_prepayment') }} * {{ session('participants') }} {{ session('participants_label') }} = <strong>{{ session('formatted_total_prepayment') }}</strong> PLN</label>
							</div>
						<small>
						</small>
						<div class="d-flex align-items-center mb-4">
							<input type="radio" id="calosc" name="payment" value="calosc" class="me-2">
							<label for="calosc" class="m-0">Całość: {{ session('formatted_price') }} * {{ session('participants') }} {{ session('participants_label') }} = <strong>{{ session('formatted_total_cost') }}</strong> PLN</label>
						</div>
						</small>
						<div class="text-end mt-3">
                            <button type="submit" class="btn btn-warning shadow" id="submitButton">Zapłać</button>
                            <button class="btn btn-warning shadow w-100" id="loadingButton" style="display: none;" disabled>
                                Przetwarzanie..<span class="spinner-border spinner-border-sm-ms-2"></span>
                            </button>
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
