<!-- resources/views/admin/clientlist.blade.php -->

{{-- @php
    $countryMap = [
        'Argentyna, Chile' => 'argentina',
        'Indonezja' => 'indonesia',
        'Kambodża' => 'cambodia',
        'Peru, Boliwia' => 'peru',
        'Sri Lanka' => 'sri_lanka',
        'Tybet, Chiny' => 'tibet',
    ];
@endphp --}}

@extends('layouts.app')

@section('title', 'Lista klientów')

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1200px;">

			<div class="row">
				<div class="col-md-12 text-center pb-3">
					{{-- <h2 class="">Terminy wyjazdów</h2> --}}
					<h4>Lista turystów</h4>
				</div>
			</div>

			<div class="row">
				<div class="table-term col-12 px-4">
								
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'id', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Id
										@if(request('sort_by') == 'id')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'last_name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Nazwisko
										@if(request('sort_by') == 'last_name')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'name', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Imię
										@if(request('sort_by') == 'name')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'birth_date', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Data urodzenia
										@if(request('sort_by') == 'birth_date')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'phone', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Telefon
										@if(request('sort_by') == 'phone')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'passport_number', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Nr paszportu
										@if(request('sort_by') == 'passport_number')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
								</th>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'trips.country', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
										Kraj
										@if(request('sort_by') == 'trips.country')
											<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
										@else
											<i class="bi bi-caret-down"></i>
										@endif
									</a>
																	</th>
								<th scope="col">
									<a href="{{ route('admin.clientlist', ['sort_by' => 'start_date', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
									{{-- <a href="{{ route('admin.clientlist', ['sort_by' => 'dates.start_date', 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}"> --}}
										Termin
										@if(request('sort_by') == 'start_date')
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
							@foreach ($clients as $client)
								<tr class="align-middle">
									<td class="text-center">{{ $client->id }}</td>
									<td>{{ $client->last_name }}</td>
									<td>{{ $client->name }}</td>
									<td class="text-center">{{ \Carbon\Carbon::parse($client->birth_date)->format('d.m.Y') }}</td>
									<td>{{ $client->phone }}</td>
									<td>{{ $client->passport_number }}</td>
									<td>{{ $client->country }}</td>
									<td scope="row">
										{{ \Carbon\Carbon::parse($client->start_date)->format('d.m') }} -
										{{ \Carbon\Carbon::parse($client->end_date)->format('d.m.Y') }}
									</td>

									<td class="text-center">
										<a href="{{ route('admin.clientlist') }}" class="btn btn-success btn-sm shadow">Podgląd</a>
									{{-- </td>
									<td class="text-center"> --}}
										<a href="{{ route('admin.clientlist') }}" class="btn btn-primary btn-sm shadow">Edycja</a>
									{{-- </td>
									<td class="text-center"> --}}
										<a href="{{ route('admin.clientlist') }}" class="btn btn-danger btn-sm shadow">&nbsp;Usuń&nbsp;</a>
									</td>
									{{-- <td class="text-center">
										<a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-primary btn-sm shadow">Edycja</a>
										<a href="{{ route('admin.clients.delete', $client->id) }}" class="btn btn-danger btn-sm shadow">Usuń</a>
									</td> --}}
								</tr>
							@endforeach
						</tbody>
					</table>
					

					

				</div>
			</div>

		</div>
	</main>
@endsection