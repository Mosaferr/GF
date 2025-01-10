<!-- resources/views/admin/group.blade.php -->
@extends('layouts.app')
@section('title', 'Grupa')

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width:1300px;">

            <div class="d-flex flex-wrap justify-content-center gap-3 p-3 bg-light border rounded border-secondary border-md-primary bg-md-warning">
                <div class="d-flex flex-wrap justify-content-center gap-2 my-2">
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
				<div class="col-md-12 text-start pb-3 position-relative">
                    <h4 class="ms-3 mt-5 mb-0">{{ $trip->trip->country }}: &nbsp;  &nbsp;
                        {{ \Carbon\Carbon::parse($trip->start_date)->format('d.m') }}
                        - {{ \Carbon\Carbon::parse($trip->end_date)->format('d.m.Y') }}</h4>
					<h6 class="position-absolute end-0 bottom-0 mb-3">
						Dodaj klienta&nbsp;&nbsp;
                        <a href="{{ route('admin.adddata.create', ['redirect_url' => url()->current()]) }}">
							<i class="bi bi-plus-square-fill fs-3 text-info position-relative me-5" style="top: 0.15em;"></i>
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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault(); // Zatrzymaj domyślne zachowanie przycisku

                    const formId = this.getAttribute('data-form-id');
                    const deleteForm = document.getElementById(formId);

                    Swal.fire({
                        title: 'Czy na pewno?',
                        text: "Nie będziesz mógł cofnąć tej akcji!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Tak, usuń!',
                        cancelButtonText: 'Anuluj'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.submit(); // Wysyłanie formularza tylko po potwierdzeniu
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire(
                                'Anulowano',
                                'Operacja usunięcia została anulowana',
                                'info'
                            );
                        }
                    });
                });
            });
        });
    </script>
@endsection
