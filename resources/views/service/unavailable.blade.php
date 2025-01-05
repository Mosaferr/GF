<!-- resources/views/unavailable.blade.php -->
@extends('layouts.app')

@section('title', 'Brak miejsc')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container my-5" style="max-width: 1100px;">

			<div class="col-md-12 text-center pb-5 mt-3">
				<h2>Niestety, mamy już komplet</h2>
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

		<div class="container" style="max-width: 1200px;">
			<div class="row">
				<div class="about-text col-md-12 text-center pb-3">
					<p>Przykro nam, ale w tym terminie nie mamy już wolnych miejsc. Zapraszamy na inny termin lub na inną wyprawę</p>
				</div>
			</div>

			<div class="row g-lg-5 g-md-4 g-sm-3 mx-sm-1 mx-md-3 lg-md-0 pb-sm-5">
				<div class="col-sm-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-peru.html">
								<img src="{{ asset('img/main/trip-peru.jpg') }}" class="img-fluid"/>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title shadow accordion bg-success-subtle rounded p-2">Peru i Boliwia</h5>
							<p class="card-text mt-3">Lima, Cusco, La Paz. Królestwo Inków z Machu Picchu na czele. Lamy, wioski na jeziorze Titicaca...</p>
							<div class="text-center">
								<a href="exc-peru.html" class="btn btn-success shadow"><small>Zobacz program</small></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-tibet.html"><img src="{{ asset('img/main/trip-tibet.jpg') }}" class="img-fluid"/></a>
						</div>
						<div class="card-body">
							<h5 class="card-title shadow bg-success-subtle rounded p-2">Tybet, w Chinach</h5>
							<p class="card-text mt-3">Święta Lhasa, odległe klasztory, spotkania z michami, wycieczka pod Mout Everest...</p>
							<div class="text-center">
								<a href="exc-tibet.html" class="btn btn-success shadow"><small>Zobacz program</small></a>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-cambodia.html"><img src="{{ asset('img/main/trip-camb.jpg') }}" class="img-fluid"/></a>
						</div>
						<div class="card-body">
							<h5 class="card-title shadow bg-success-subtle rounded p-2">Kambodża</h5>
							<p class="card-text mt-3">Angkor Wat i starożytne świątynie. Czerwoni Khmerzy i dzisiejsze królestwo. I relaks nad oceanem...</p>
							<div class="text-center">
								<a href="exc-cambodia.html" class="btn btn-success shadow"><small>Zobacz program</small></a>
							</div>
						</div>
					</div>
				</div>

			</div>

				<div class="d-flex justify-content-center">
					<a href="excursions.html" class="btn btn-warning w-100 mx-5 shadow">Poznaj więcej naszych wypraw</a>
				</div>

			</div>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection