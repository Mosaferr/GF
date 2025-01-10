<!-- resources/views/admin/clientlist.blade.php -->
@extends('layouts.app')
@section('title', 'Lista klientów')

@section('content')
	<main class="custom-margin-top">

		<div class="container" style="max-width:1300px;">
		{{-- <div class="container" style="max-width: 1200px;"> --}}

			{{-- <div class="row"> --}}
				{{-- <div class="col-md-12 text-center pb-3"> --}}
					{{-- <h2 class="">Terminy wyjazdów</h2> --}}
					{{-- <h3>Lista turystów</h3> --}}
				{{-- </div> --}}
			{{-- </div> --}}

            <div class="d-flex flex-wrap justify-content-center gap-3 p-3 bg-light border rounded border-secondary border-md-primary bg-md-warning">
            {{-- <div class="lista-container menu-text col-md-12 text-center"> --}}
                <div class="d-flex flex-wrap justify-content-center gap-2 my-2">
                {{-- <div class="d-grid d-md-block mx-auto my-2"> --}}
                    <a href="{{ route('admin') }}" class="btn btn-warning shadow mx-4">Panel <br>admina</a>
                    <a href="{{ route('admin.clientlist') }}" class="btn btn-warning shadow mx-4">Lista <br>klientów</a>
                    <a href="{{ route('admin.triplist') }}" class="btn btn-warning shadow mx-4">Lista <br>wypraw</a>
                    {{-- <a href="{{ route('admin.findclient') }}" class="btn btn-warning shadow mx-4">Wyszukaj <br>klienta</a> --}}
                    <a href="{{ route('admin.findclient', ['redirect_url' => url()->current()]) }}" class="btn btn-warning shadow mx-4">Wyszukaj <br>klienta</a>
                    <a href="{{ route('admin.findtrip', ['redirect_url' => url()->current()]) }}" class="btn btn-warning shadow mx-4">Wyszukaj <br>wyprawę</a>
                    {{-- <a href="{{ route('admin.findtrip') }}" class="btn btn-warning shadow mx-4">Wyszukaj <br>wyprawę</a> --}}
                </div>
            </div>
			<div class="row">
				<div class="col-md-12 text-center pb-3 position-relative">
					<h3 class="mt-5 mb-4">Lista klientów</h3>
					<h6 class="position-absolute end-0 bottom-0 mb-3">
                        Dodaj klienta&nbsp;&nbsp;
                        <a href="{{ route('admin.adddata.create', ['redirect_url' => url()->current()]) }}">
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
								@php
									$columns = [
										'id' => 'Id',
										'last_name' => 'Nazwisko',
										'name' => 'Imię',
										'birth_date' => 'Data urodzenia',
										'phone' => 'Telefon',
										'email' => 'Email',
										// 'city_name' => 'Adres',
										'destination' => 'Destynacja',
										'start_date' => 'Termin',
									];
								@endphp

								@foreach ($columns as $key => $label)
									<th scope="col">
										<a href="{{ route('admin.clientlist', ['sort_by' => $key, 'order' => request('order') === 'asc' ? 'desc' : 'asc']) }}">
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
                                {{-- <td>{{ $client->address->city->city_name ?? 'Brak danych' }}</td> --}}
								{{-- <td>{{ $client->city_name }}</td> --}}
								{{-- <td>{{ $client->country }}</td> --}}
                                <td>{{ $client->dates->first()->trip->destination ?? 'Brak danych' }}</td>
                                {{-- <td>{{ \Carbon\Carbon::parse($client->start_date)->format('d.m') }}-{{ \Carbon\Carbon::parse($client->end_date)->format('d.m.Y') }}</td> --}}
                                <td>
                                    @if($client->dates->isNotEmpty())
                                        {{ \Carbon\Carbon::parse($client->dates->first()->start_date)->format('d.m') }}
                                        - {{ \Carbon\Carbon::parse($client->dates->first()->end_date)->format('d.m.Y') }}
                                    @else
                                        Brak danych
                                    @endif
                                </td>

                                <!-- Przyciski -->
								<td class="text-center">
                                    <a href="{{ route('admin.clientdata.edit', ['id' => $client->id, 'redirect_url' => url()->current()]) }}" class="btn btn-success btn-sm shadow">Edycja</a>
										<form id="deleteForm-{{ $client->id }}" method="POST" action="{{ route('admin.clientdata.destroy', ['id' => $client->id]) }}" style="display: inline-block;">
										@csrf
										@method('DELETE')
                                        <input type="hidden" name="redirect_url" value="{{ url()->current() }}">
										<button type="button" class="btn btn-danger btn-sm shadow deleteButton" data-form-id="deleteForm-{{ $client->id }}">Usuń</button>
                                    </form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>

		</div>
	</main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/delete.js') }}" defer></script>               <!-- Skrypt do okienka Usuń -->
@endsection

