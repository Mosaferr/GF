<!-- resources/views/admin/group.blade.php -->
@extends('layouts.app')
@section('title', 'Grupa')

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width:1300px;">

			<div class="row">
				<div class="col-md-12 text-start ms-5 pb-3 position-relative">
                    <h3 class="mb-0 fs-4">{{ $trip->trip->country }}: &nbsp;  &nbsp;  {{ \Carbon\Carbon::parse($trip->start_date)->format('d.m') }} - {{ \Carbon\Carbon::parse($trip->end_date)->format('d.m.Y') }}</h3>
					<h6 class="position-absolute end-0 bottom-0 mb-0">
						Dodaj klienta&nbsp;&nbsp;
						<a href="{{ route('admin.adddata.create') }}">
							<i class="bi bi-plus-square-fill fs-3 text-danger position-relative" style="top: 0.15em;"></i>
						</a>
					</h6>
				</div>
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

					<hr>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								@php
									$columns = [
										'id' => 'Id',
										'last_name' => 'Nazwisko',
										'name' => 'Imię',
										'birth_date' => 'Data urodzenia',
										'phone' => 'Telefon',
										'email' => 'Email',
										// 'city_name' => 'Adres',
										'stage' => 'Status',
										'expiry_date' => 'Ważność paszportu',
									];
								@endphp

								@foreach ($columns as $key => $label)
									<th scope="col">
										<a href="{{ route('group.show', ['trip_id' => $trip->id, 'sort_by' => $key, 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
											{{ $label }}
											@if(request('sort_by') == $key)
												<i class="bi bi-caret-{{ request('order') == 'asc' ? 'up-fill' : 'down-fill' }}"></i>
											@else
												<i class="bi bi-caret-down"></i>
											@endif
										</a>
									</th>
								@endforeach
								<th scope="col" class="text-center">Akcje</th>
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
								<td>{{ $client->email }}</td>
                                {{--!ZAKOMENTOWANE <td>{{ $client->address->city->city_name ?? 'Brak danych' }}</td> --}}
                                <td>{{ $client->stage ?? 'Brak danych' }}</td>
								<td class="text-center">
									{{ $client->expiry_date ? \Carbon\Carbon::parse($client->expiry_date)->format('d.m.Y') : 'Brak danych' }}
								</td>
								<td class="text-center">
                                    {{-- !ZAKOMENTOWANE <a href="{{ route('admin.clientdata.show', ['id' => $client->id]) }}" class="btn btn-success btn-sm shadow">Podgląd</a> --}}
                                    <a href="{{ route('admin.clientdata.edit', ['id' => $client->id, 'redirect_url' => url()->current()]) }}" class="btn btn-success btn-sm shadow">Edycja</a>
									<form action="{{ route('admin.clientdata.destroy', ['id' => $client->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
										@method('DELETE')
                                        <input type="hidden" name="redirect_url" value="{{ url()->current() }}">
										<button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('Czy na pewno chcesz usunąć tego klienta?')">Usuń</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

                    <div class="row">
                        <div class="col-12 text-end mt-3">
                            <p class="fw-bold">Liczba wolnych miejsc: {{ $trip->available_seats }}</p>
                        </div>
                    </div>

				</div>
			</div>

		</div>
	</main>
@endsection
