<!-- resources/views/admin/admin.blade.php -->
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

@section('title', 'Panel administratora')

@section('content')
	<main class="custom-margin-top">
		<div class="container my-5" style="max-width: 1300px;">
			<div class="col-md-12 text-center pb-1 mt-3">
				<h2>Panel administratora</h2>
			</div>

            <div class="admin-container menu-text col-md-12 d-flex flex-wrap justify-content-center align-items-center gap-5
            my-5 mt-4 p-3 bg-light border rounded border-secondary border-md-primary bg-md-warning">
                <a href="{{ route('admin.clientlist') }}" class="btn btn-warning shadow btn-lg p-3 text-center">
                    Lista <br>klientów
                </a>
                <a href="{{ route('admin.triplist') }}" class="btn btn-warning shadow btn-lg p-3 text-center">
                    Lista <br>wypraw
                </a>
                <a href="{{ route('admin.findclient', ['redirect_url' => url()->current()]) }}" class="btn btn-warning shadow  btn-lg p-3 text-center">
                    Wyszukaj <br>klienta
                </a>
                <a href="{{ route('admin.findtrip', ['redirect_url' => url()->current()]) }}" class="btn btn-warning shadow  btn-lg p-3 text-center">
                    Wyszukaj <br>wyprawę</a>
                <div class="d-grid text-center gap-2">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.adddata.create', ['redirect_url' => url()->current()]) }}" class="btn btn-outline-dark shadow
                        d-flex align-items-center justify-content-between px-2 py-0 rounded">
                            <span class="ms-3 me-2">Dodaj klienta</span>
                            <i class="bi bi-plus-square-fill text-info fs-3"></i>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('admin.addtrip.create', ['redirect_url' => url()->current()]) }}" class="btn btn-outline-dark shadow
                        d-flex align-items-center justify-content-between px-2 py-0 rounded">
                            <span class="me-2">Dodaj wyprawę</span>
                            <i class="bi bi-plus-square-fill text-info fs-3"></i>
                        </a>
                    </div>
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

            <div class="table-term col-12 px-4 mt-4">
                <div class="col-md-12 text-left pb-1 mt-4">
                    <h5>Najbliższe wyprawy</h5>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Kraj</th>
                            <th scope="col">Termin</th>
                            <th scope="col">Nazwa wyprawy</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Miejsca</th>
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
                                    ($date->available_seats > 1 && $date->available_seats < 5 ? $date->available_seats .
                                    ' wolne miejsca' : $date->available_seats . ' wolnych miejsc'))
                                }}

                                <!-- Przyciski -->
                                </td>
                                    <td class="text-center">
                                    <a href="{{ route('group.show', ['trip_id' => $date->id]) }}" class="btn btn-success btn-sm shadow">&nbsp;Grupa&nbsp;</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.tripdata.edit', ['tripId' => $date->trip_id, 'dateId' => $date->id, 'redirect_url' => url()->current()]) }}" class="btn btn-primary btn-sm shadow">Edycja</a>
                                </td>
                                <td class="text-center">
                                    <form id="deleteForm-{{ $date->id }}" method="POST" action="{{ route('admin.tripdata.destroy', ['tripId' => $date->trip->id, 'dateId' => $date->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="redirect_url" value="{{ url()->current() }}">
                                        <button type="button" class="btn btn-danger btn-sm shadow deleteButton" data-form-id="deleteForm-{{ $date->id }}">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/delete.js') }}" defer></script>               <!-- Skrypt do okienka Usuń -->
@endsection
