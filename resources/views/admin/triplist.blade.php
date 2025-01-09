<!-- resources/views/admin/triplist.blade.php -->
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
@section('title', 'Lista wycieczek')

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1300px;">
		{{-- <div class="container" style="max-width: 1200px;"> --}}

			<div class="row">
				<div class="col-md-12 text-center pb-3">
					{{-- <h2 class="">Terminy wyjazdów</h2> --}}
					<h4>Lista wypraw</h4>
				</div>
			</div>

			<div class="row">
				<div class="table-term col-12 px-4">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">
									<a href="{{ route('admin.triplist', ['sort_by' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Id
										@if(request('sort_by') == 'id')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.triplist', ['sort_by' => 'trip.country', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Kraj
										@if(request('sort_by') == 'trip.country')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.triplist', ['sort_by' => 'start_date', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Termin
										@if(request('sort_by') == 'start_date')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">Nazwa wyprawy</th>
								<th scope="col">
									<a href="{{ route('admin.triplist', ['sort_by' => 'price', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Cena
										@if(request('sort_by') == 'price')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.triplist', ['sort_by' => 'available_seats', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Miejsca
										@if(request('sort_by') == 'available_seats')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col"></th>
							</tr>
						</thead>

						<tbody>
							@foreach ($dates as $date)
								<tr class="align-middle">
									<td class="text-center">{{ $date->id }}</td>
									<td>{{ $date->trip->country }}</td>
									<td scope="row">
										{{ \Carbon\Carbon::parse($date->start_date)->format('d.m') }} -
										{{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
									</td>
									<td>{{ $date->trip->trip_name }}</td>
									<td>{{ $date->price }} PLN</td>
									<td>
										{{ $date->available_seats == 0 ? 'Brak wolnych miejsc' :
										($date->available_seats == 1 ? '1 wolne miejsce' :
										($date->available_seats > 1 && $date->available_seats < 5 ? $date->available_seats . ' wolne miejsca' : $date->available_seats . ' wolnych miejsc'))
									}}
									</td>
									<td class="text-center">
                                        <a href="{{ route('group.show', ['trip_id' => $date->id]) }}" class="btn btn-success btn-sm shadow">&nbsp;Grupa&nbsp;</a>
									</td>
									<td class="text-center">
										<a href="{{ route('excursions.' . $countryMap[$date->trip->country]) }}" class="btn btn-primary btn-sm shadow">Edycja</a>
									</td>
									<td class="text-center">
										<a href="{{ route('excursions.' . $countryMap[$date->trip->country]) }}" class="btn btn-danger btn-sm shadow">Usuń</a>
									</td>
									{{-- <td class="text-center"><a href="{{ route('excursions.argentina') }}" class="btn btn-primary btn-sm shadow">Program</a></td> --}}
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</main>
@endsection
