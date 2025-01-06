<!-- resources/views/terms.blade.php -->

@php
    $countryMap = [
        'Argentyna, Chile' => 'argentina',
        'Indonezja' => 'indonesia',
        'Kambodża' => 'cambodia',
        'Peru, Boliwia' => 'peru',
        'Sri Lanka' => 'sri_lanka',
        'Tybet, Chiny' => 'tibet',
    ];
@endphp

@extends('layouts.app')

@section('title', 'Terminy')
@section('head-scripts')
    @vite('resources/css/hide.css')
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
							@foreach ($dates as $date)
								<tr class="align-middle">
									<td class="text-center">{!! $date->trip->flag !!}</td>
									<th scope="row">
										{{ \Carbon\Carbon::parse($date->start_date)->format('d.m') }} -
										{{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
									</th>
									<td>{{ $date->trip->trip_name }}</td>
									<td>{{ $date->trip->country }}</td>
									<td class="text-center">
										<a href="{{ route('excursions.' . $countryMap[$date->trip->country]) }}" class="btn btn-primary btn-sm shadow">Program</a>
									</td>
									{{-- <td class="text-center"><a href="{{ route('excursions.argentina') }}" class="btn btn-primary btn-sm shadow">Program</a></td> --}}
								</tr>
							@endforeach
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