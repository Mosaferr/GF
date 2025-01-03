<!-- resources/views/terms.blade.php -->
@extends('layouts.app')

@section('title', 'Terminy')
@section('head-scripts')
	@vite('resources/js/hidden.js')
    <link rel="stylesheet" href="{{ asset('css/spotlight.min.css') }}">
    <script src="{{ asset('js/spotlight.min.js') }}"></script>
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1200px;">

			<div class="row">
				<div class="col-md-12 text-center pb-5">
					<h2 class="">Terminy wyjazdów</h2>
					<h5>Leć z nami, póki nie jest za późno:</h5>
				</div>
			</div>

			<div class="row">
				<div class="table-term col-lg-8 col-md-6 col-sm-12 col-12 px-4 d-flex flex-column justify-content-center">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col">Termin</th>
								<th scope="col">Wyprawa</th>
								<th scope="col">Kraj</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_arg.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Argentina">
									<img src="{{ asset('img/flags/f_chile.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Chile">
								</td>
								<th scope="row">14.07 - 27.07.2024</th>
								<td>W tango pod Andami</td>
								<td>Argentyna, Chile</td>
								<td class="text-center"><a href="{{ route('excursions.argentina') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_cam.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Cambodia">
								</td>
								<th scope="row">28.07 - 11.08.2024</th>
								<td>Królestwo w dżungli</td>
								<td>Kambodża</td>
								<td class="text-center"><a href="{{ route('excursions.cambodia') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_tib.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="">
									<img src="{{ asset('img/flags/f_chin.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="">
								</td>
								<th scope="row">04.08 - 17.08.2024</th>
								<td>Na Dachu Świata</td>
								<td>Tybet, Chiny</td>
								<td class="text-center"><a href="{{ route('excursions.tibet') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_peru.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Peru">
									<img src="{{ asset('img/flags/f_bol.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Bolivia">
								</td>
								<th scope="row">13.09 - 23.09.2024</th>
								<td>W krainie kultu Słońca</td>
								<td>Peru, Boliwia</td>
								<td class="text-center"><a href="{{ route('excursions.peru') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_indo.png') }}" width="auto" height="25" class="mx-1 shadow" alt="Flag of Indonesia">
								</td>
								<th scope="row">03.10 - 13.10.2024</th>
								<td>W świecie kontrastów</td>
								<td>Indonezja</td>
								<td class="text-center"><a href="{{ route('excursions.indonesia') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_tib.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Tibet">
									<img src="{{ asset('img/flags/f_chin.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of China">
								</td>
								<th scope="row">10.10 - 27.10.2024</th>
								<td>Na Dachu Świata</td>
								<td>Tybet, Chiny</td>
								<td class="text-center"><a href="{{ route('excursions.tibet') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_sri.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Sri Lanka">
								</td>
								<th scope="row">14.10 - 07.11.2024</th>
								<td>Budda, herbata i słonie</td>
								<td>Sri Lanka</td>
								<td class="text-center"><a href="{{ route('excursions.sri_lanka') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_arg.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Argentina">
									<img src="{{ asset('img/flags/f_chile.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Chile">
								</td>
								<th scope="row">14.07 - 27.07.2024</th>
								<td>W tango pod Andami</td>
								<td>Argentyna, Chile</td>
								<td class="text-center"><a href="{{ route('excursions.argentina') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_cam.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Cambodia">
								</td>
								<th scope="row">28.07 - 11.08.2024</th>
								<td>Królestwo w dżungli</td>
								<td>Kambodża</td>
								<td class="text-center"><a href="{{ route('excursions.cambodia') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_tib.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Tibet">
									<img src="{{ asset('img/flags/f_chin.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of China">
								</td>
								<th scope="row">04.08 - 17.08.2024</th>
								<td>Na Dachu Świata</td>
								<td>Tybet, Chiny</td>
								<td class="text-center"><a href="{{ route('excursions.tibet') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
							<tr class="align-middle">
								<td class="text-center">
									<img src="{{ asset('img/flags/f_peru.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Peru">
									<img src="{{ asset('img/flags/f_bol.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Bolivia">
								</td>
								<th scope="row">13.09 - 23.09.2024</th>
								<td>W krainie kultu Słońca</td>
								<td>Peru, Boliwia</td>
								<td class="text-center"><a href="{{ route('excursions.peru') }}" class="btn btn-primary btn-sm shadow">Program</a></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-12 col-12 px-4 d-flex flex-column justify-content-center">
					<div class="image shadow">
						<a class="spotlight" href="{{ asset('img/main/sm-term.jpg') }}">
							<img src="{{ asset('img/main/term.jpg') }}" alt="Apsara in Angkor Wat" class="img-thumbnail shadow">
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
@endsection