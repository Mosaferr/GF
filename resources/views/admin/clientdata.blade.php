<!-- resources/views/admin/clientdata.blade.php -->
@extends('layouts.app')
@section('title', 'Dane klienta')

@section('content')
	<main class="custom-margin-top">

		<div class="form-container">
			<form id="saveForm" method="POST" action="{{ route('admin.clientdata.update', ['id' => $client->id]) }}">
				@csrf
				@method('PUT')
                <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">
                <h3 class="my-1">{{ $client->name }} {{ $client->last_name }}</h3>
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

				<h5 class="mt-3"> Dane osobowe </h5>
				<div class="row mb-2">
					<div class="col-md-3">
						<label for="name" class="form-label">Imię</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}" required>
						<x-input-error :messages="$errors->get('name')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="middle_name" class="form-label">Drugie imię</label>
						<input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $client->middle_name) }}">
						<x-input-error :messages="$errors->get('middle_name')" class="mt-2 red-text" />
					</div>
					<div class="col-md-6">
						<label for="last_name" class="form-label">Nazwisko</label>
						<input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $client->last_name) }}" required>
						<x-input-error :messages="$errors->get('last_name')" class="mt-2 red-text" />
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-2">
						<label for="phone" class="form-label">Telefon</label>
						<input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $client->phone) }}">
						<x-input-error :messages="$errors->get('phone')" class="mt-2 red-text" />
					</div>
					<div class="col-md-4">
						<label for="email" class="form-label">Adres email</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}" required>
						<x-input-error :messages="$errors->get('email')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="birth_date" class="form-label">Data urodzenia</label>
						<input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $client->birth_date) }}" required>
						<x-input-error :messages="$errors->get('birth_date')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="pesel" class="form-label">PESEL</label>
						<input type="text" class="form-control" id="pesel" name="pesel" value="{{ old('pesel', $client->pesel) }}" required>
						<x-input-error :messages="$errors->get('pesel')" class="mt-2 red-text" />
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-6">
						<label for="passport_number" class="form-label">Seria i numer paszportu</label>
						<input type="text" class="form-control" id="passport_number" name="passport_number" value="{{ old('passport_number', $client->passport_number) }}" required>
						<x-input-error :messages="$errors->get('passport_number')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="issue_date" class="form-label">Data wydania</label>
						<input type="date" class="form-control" id="issue_date" name="issue_date" value="{{ old('issue_date', $client->issue_date) }}" required>
						<x-input-error :messages="$errors->get('issue_date')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="expiry_date" class="form-label">Data ważności</label>
						<input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $client->expiry_date) }}" required>
						<x-input-error :messages="$errors->get('expiry_date')" class="mt-2 red-text" />
					</div>
				</div>
				<h5 class="login-address mt-3">Adres</h5>
				<div class="row mb-2">
					<div class="col-md-8">
						<label for="street" class="form-label">Ulica</label>
						<input type="text" class="form-control" id="street" name="street" value="{{ old('street', $client->address->street) }}" required>
						<x-input-error :messages="$errors->get('street')" class="mt-2 red-text" />
					</div>
					<div class="col-md-2">
						<label for="house_number" class="form-label">Numer domu</label>
						<input type="text" class="form-control" id="house_number" name="house_number" value="{{ old('house_number', $client->address->house_number) }}" required>
						<x-input-error :messages="$errors->get('house_number')" class="mt-2 red-text" />
					</div>
					<div class="col-md-2">
						<label for="apartment_number" class="form-label">Nr mieszkania</label>
						<input type="text" class="form-control" id="apartment_number" name="apartment_number" value="{{ old('apartment_number', $client->address->apartment_number) }}">
						<x-input-error :messages="$errors->get('apartment_number')" class="mt-2 red-text" />
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-3">
						<label for="postal_code" class="form-label">Kod</label>
						<input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $client->address->postal_code) }}" required>
						<x-input-error :messages="$errors->get('postal_code')" class="mt-2 red-text" />
					</div>
					<div class="col-md-5">
						<label for="city_name" class="form-label">Miejscowość</label>
						<input type="text" class="form-control" id="city_name" name="city_name" value="{{ old('city_name', $client->address->city->city_name) }}" required>
						<x-input-error :messages="$errors->get('city_name')" class="mt-2 red-text" />
					</div>
					<div class="col-md-4">
						<label for="citizenship" class="form-label">Obywatelstwo</label>
						<select class="form-select" id="citizenship" name="citizenship_id" required>
							<option value="1" {{ $client->citizenship_id == 1 ? 'selected' : '' }}>Polskie</option>
							<option value="2" {{ $client->citizenship_id == 2 ? 'selected' : '' }}>Amerykańskie</option>
							<option value="3" {{ $client->citizenship_id == 3 ? 'selected' : '' }}>Brytyjskie</option>
							<option value="4" {{ $client->citizenship_id == 4 ? 'selected' : '' }}>Francuskie</option>
							<option value="5" {{ $client->citizenship_id == 5 ? 'selected' : '' }}>Niemieckie</option>
							<option value="6" {{ $client->citizenship_id == 6 ? 'selected' : '' }}>Ukraińskie</option>
							<option value="7" {{ $client->citizenship_id == 7 ? 'selected' : '' }}>Inne</option>
						</select>
						<x-input-error :messages="$errors->get('citizenship_id')" class="mt-2 red-text" />
					</div>
				</div>
				<h5 class="mt-3">Wyprawa</h5>
				<div class="row mb-2">

					<div class="col-md-4">
						<label for="trip" class="form-label">Wyprawa</label>
						<select class="form-select" id="trip" name="trip" required>
							<option value="" disabled>Wybierz...</option>
							@foreach($trips as $trip)
								<option value="{{ $trip->id }}" {{ $trip->id == $selectedTripId ? 'selected' : '' }}>
									{{ $trip->destination }}
								</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4">
						<label for="start_date" class="form-label">Termin</label>
						<select class="form-select" id="start_date" name="start_date" required>
							<option value="" disabled>Wybierz...</option>
							@foreach($dates as $date)
								<option value="{{ $date->id }}" {{ $date->id == $selectedDateId ? 'selected' : '' }}>
									{{ \Carbon\Carbon::parse($date->start_date)->format('d.m.Y') }} - {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-4">
						<label for="stage" class="form-label">Status</label>
						<select class="form-select" id="stage" name="stage" required>
							<option value="" disabled>Wybierz...</option>
							<option value="zarezerwowany" {{ $client->stage == 'zarezerwowany' ? 'selected' : '' }}>Zarezerwowane</option>
							<option value="zapisany" {{ $client->stage == 'zapisany' ? 'selected' : '' }}>Podpisano umowę</option>
							<option value="przedpłacone" {{ $client->stage == 'przedpłacone' ? 'selected' : '' }}>Dokonano przedpłaty</option>
							<option value="opłacone" {{ $client->stage == 'opłacone' ? 'selected' : '' }}>Wszystko opłacone</option>
						</select>
						<x-input-error :messages="$errors->get('stage')" class="mt-2 red-text" />
					</div>
				</div>
			</form>

			<form id="deleteForm" action="{{ route('admin.clientdata.destroy', $client->id) }}" method="POST">
				@csrf
				@method('DELETE')
                <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">
			</form>

			<div class="row mt-5">
				<div class="col-md-12 text-end">
					<!-- Usuń klienta -->
					<button type="submit" class="btn btn-danger shadow mr-5 px-3" form="deleteForm" onclick="return confirm('Czy na pewno chcesz usunąć tego klienta?');">&nbsp; Usuń &nbsp;</button>
					<!-- Zapisz zmiany -->
					<button type="submit" class="btn btn-primary shadow mx-5 px-3" form="saveForm"> Zapisz </button>
					<!-- Powrót do listy -->
                    <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">
                    <a href="{{ $redirectUrl }}" class="btn btn-success shadow ml-5 px-3">Powrót</a>
                    {{-- <a href="{{ request()->get('redirect_url', route('admin.clientlist')) }}" class="btn btn-success shadow ml-5 px-3">Powrót</a> --}}
				</div>
			</div>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/register.js?v=1.0') }}"></script> <!-- Skrypt do obsługi terminów i destynacji -->
@endsection
