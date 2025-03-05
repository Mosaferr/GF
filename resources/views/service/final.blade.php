<!-- resources/views/service/final.blade.php -->
@extends('layouts.app')

@section('title', 'Finał')
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
						<i class="bi bi-4-circle-fill text-success"></i>
					</div>
					<small class="mb-1">Dokonaj wpłaty</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-5-circle-fill text-info-emphasis"></i>
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
					<b class="green-text">Wszystkie płatności są zatwierdzone</b>
					<small  class="mt-1 mb-1">Tydzień przed wyjazdem przyślemy mailem niezbędne informacje dotyczące wyprawy.</small>
					<h4 class="mb-3">{{ session('destination') }}</h4>
					<b>Wybrany termin:</b>
					<small>Od: {{ session('start_date') }}</small>
					<small class="mt-0">Do: {{ session('end_date') }} (15 dni)</small>
					<small><b class="mt-5">Koszt wyprawy uczestnika:</b></small>
					<small>{{ session('formatted_price') }} PLN</small>
					<small><b class="mt-5 mb-1">Koszt wszystkich uczestników:</b></small>
					<small>{{ session('formatted_price') }} PLN * {{ session('participants') }} {{ session('participants_label') }} PLN = <strong>{{ session('formatted_total_cost') }}</strong> PLN</small>
                    <b class="mt-2"></b>
                    {{-- <a href="#" class="btn btn-success">Pobierz rachunek (PDF)</a> --}}
                    <a href="{{ route('pdf.receipt', ['clientId' => $client->id, 'dateId' => $date->id]) }}" class="btn btn-success">
                        Pobierz rachunek (PDF)
                    </a>
					<b class="mt-2 fs-4 text-center">Zacznij się pakować!</b>
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
