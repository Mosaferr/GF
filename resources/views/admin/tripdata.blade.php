<!-- resources/views/admin/tripdata.blade.php -->
@extends('layouts.app')
@section('title', 'Dane wycieczki')

@section('content')
	<main class="custom-margin-top">

		<div class="form-container">
            <form id="saveForm" method="POST" action="{{ route('admin.tripdata.update', ['tripId' => $trip->id, 'dateId' => $date->id]) }}">
                @csrf
				@method('PUT')
                <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">
                <h3 class="mb-0 ms-2">
                    {{ $trip->destination }}
                    <span class="float-end fs-5 mt-2">
                        {{ \Carbon\Carbon::parse($date->start_date)->format('d.m') }} - {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
                    </span>
                </h3>
                <hr>

				@if (session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
				{{-- @if (session('error'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ session('error') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif --}}

                <div class="row align-items-center mb-2">
                    <div class="col-auto">
                        <label class="form-label">ID:</label>
                        <span class="form-control-plaintext text-end"><strong>{{ $date->id }}.</strong></span>

                        {{-- <label for="date_id" class="form-label">ID </label>
                        <input type="text" class="form-control" id="date_id" name="date_id" value="{{ old('date_id', $date->id) }}" readonly> --}}
                    </div>
                    <div class="col-md-5">
                        <label for="destination" class="form-label">Destynacja</label>
                        <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $trip->destination) }}" required>
                        <x-input-error :messages="$errors->get('destination')" class="mt-2 red-text" />
                    </div>
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Termin rozpoczęcia</label>
                        <input type="date" class="form-control text-center" id="start_date" name="start_date" value="{{ old('start_date', $date->start_date ?? '') }}" required>
                        <x-input-error :messages="$errors->get('start_date')" class="mt-2 red-text" />
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">Termin zakończenia</label>
                        <input type="date" class="form-control text-center" id="end_date" name="end_date" value="{{ old('end_date', $date->end_date ?? '') }}" required>
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2 red-text" />
                    </div>

				<div class="row mb-2">
                    <div class="col-md-9">
                        <label for="trip_name" class="form-label">Nazwa wycieczki</label>
                        <input type="text" class="form-control" id="trip_name" name="trip_name" value="{{ old('trip_name', $trip->trip_name) }}" required>
                        <x-input-error :messages="$errors->get('trip_name')" class="mt-2 red-text" />
                    </div>
					<div class="col-md-3">
                        <label for="price" class="form-label">Cena w PLN</label>
                        <input type="number" class="form-control text-center" id="price" name="price" value="{{ old('price', $date->price ?? '') }}" required>
                        <x-input-error :messages="$errors->get('price')" class="mt-2 red-text" />
                            </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="country" class="form-label">Odwiedzane kraje</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $trip->country) }}" required>
                        <x-input-error :messages="$errors->get('country')" class="mt-2 red-text" />
                    </div>
					<div class="col-md-3">
                        <label for="available_seats" class="form-label">Liczba wolnych miejsc</label>
                        <input type="number" class="form-control text-center" id="available_seats" name="available_seats" value="{{ old('available_seats', $date->available_seats ?? '') }}" required>
                        <x-input-error :messages="$errors->get('available_seats')" class="mt-2 red-text" />
                    </div>
					<div class="col-md-3">
                        <label for="end_date" class="form-label">Lista członków grupy</label>
                        <input type="number" class="form-control text-center" id="total_seats" name="total_seats" value="{{ old('total_seats', $date->total_seats ?? '') }}" required>
                        <x-input-error :messages="$errors->get('total_seats')" class="mt-2 red-text" />
                        {{-- <a href="{{ route('group.show', ['trip_id' => $date->id]) }}" class="btn btn-success btn-sm shadow">&nbsp;Grupa&nbsp;</a> --}}
                    </div>
                </div>

			{{-- <form id="deleteForm" action="{{ route('admin.clientdata.destroy', $client->id) }}" method="POST">
				@csrf
				@method('DELETE')
                <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">
			</form> --}}

			<div class="row mt-5">
				<div class="col-md-12 text-end">
					<!-- Usuń klienta -->
					<button type="submit" class="btn btn-danger shadow mr-5 px-3" form="deleteForm" onclick="return confirm('Czy na pewno chcesz usunąć tego klienta?');">&nbsp; Usuń &nbsp;</button>
					<!-- Zapisz zmiany -->
					<button type="submit" class="btn btn-primary shadow mx-5 px-3" form="saveForm"> Zapisz </button>
					<!-- Powrót do listy -->
                    <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">
                    {{-- <a href="{{ $redirectUrl }}" class="btn btn-success shadow ml-5 px-3">Powrót</a> --}}
                    <a href="{{ $redirectUrl ?? route('admin.triplist') }}" class="btn btn-success shadow ml-5 px-3">Powrót</a>
				</div>
			</div>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/register.js?v=1.0') }}"></script> <!-- Skrypt do obsługi terminów i destynacji -->
@endsection
