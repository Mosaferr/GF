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
@section('title', 'Lista wypraw')

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1300px;">

            <div class="d-flex flex-wrap justify-content-center gap-3 p-3 bg-light border rounded border-secondary border-md-primary bg-md-warning">
                {{-- <div class="lista-container menu-text col-md-12 text-center"> --}}
                    <div class="d-flex flex-wrap justify-content-center gap-3 mx-auto my-2">
                    {{-- <div class="d-grid d-md-block mx-auto my-2"> --}}
                    <a href="{{ route('admin.clientlist') }}" class="btn btn-warning shadow mx-4">Lista <br>klientów</a>
                    <a href="{{ route('admin.triplist') }}" class="btn btn-warning shadow mx-4">Lista <br>wypraw</a>
                    <a href="{{ route('admin.findclient') }}" class="btn btn-warning shadow mx-4">Wyszukaj <br>klienta</a>
                    <a href="{{ route('admin.findtrip') }}" class="btn btn-warning shadow mx-4">Wyszukaj <br>wyprawę</a>
                </div>
            </div>

			<div class="row">
				<div class="col-md-12 text-center pb-3 position-relative">
					<h3 class="mt-5 mb-4">Lista wypraw</h3>
					<h6 class="position-absolute end-0 bottom-0 mb-3">
						Dodaj wyprawę&nbsp;&nbsp;
                        <a href="{{ route('admin.addtrip.create', ['redirect_url' => url()->current()]) }}">
							<i class="bi bi-plus-square-fill fs-3 text-info position-relative" style="top: 0.15em;"></i>
						</a>
					</h6>
				</div>
                <hr>
			</div>

			@if(session('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ session('success') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif
			@if(session('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ session('error') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			@endif

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
                                <th scope="col" class="text-center" colspan="3">Akcje</th>
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
                                        <a href="{{ route('admin.tripdata.edit', ['tripId' => $date->trip_id, 'dateId' => $date->id, 'redirect_url' => url()->current()]) }}" class="btn btn-primary btn-sm shadow">Edycja</a>
                                        {{-- <a href="{{ route('admin.tripdata.edit', ['tripId' => $date->trip_id, 'dateId' => $date->id]) }}" class="btn btn-primary btn-sm shadow">Edycja</a> --}}
                                    </td>
									<td class="text-center">
                                        <form action="{{ route('admin.tripdata.destroy', ['tripId' => $date->trip->id, 'dateId' => $date->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="redirect_url" value="{{ url()->current() }}">
                                            <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('Czy na pewno chcesz usunąć tę wycieczkę?')">Usuń</button>
                                        </form>
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
