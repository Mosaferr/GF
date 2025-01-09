<!-- resources/views/admin/adddata.blade.php -->
@extends('layouts.app')
@section('title', 'Dodaj klienta')

@section('content')
	<main class="custom-margin-top">

		<div class="form-container">
            <form id="saveForm" method="POST" action="{{ route('admin.adddata.store') }}">
                @csrf
                <input type="hidden" name="redirect_url" value="{{ request('redirect_url', route('admin.clientlist')) }}">
                {{-- <input type="hidden" name="redirect_url" value="{{ url()->previous() }}">      zapamiętanie poprzedniej strony --}}
                <h3 class="my-1" id="header-title">Nowy klient</h3>
				<hr>

				@if (session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif

				<h5 class="mt-3"> Dane osobowe </h5>
				<div class="row mb-2">
					<div class="col-md-3">
						<label for="name" class="form-label">Imię</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
						<x-input-error :messages="$errors->get('name')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="middle_name" class="form-label">Drugie imię</label>
						<input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
						<x-input-error :messages="$errors->get('middle_name')" class="mt-2 red-text" />
					</div>
					<div class="col-md-6">
						<label for="last_name" class="form-label">Nazwisko</label>
						<input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
						<x-input-error :messages="$errors->get('last_name')" class="mt-2 red-text" />
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-2">
						<label for="phone" class="form-label">Telefon</label>
						<input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
						<x-input-error :messages="$errors->get('phone')" class="mt-2 red-text" />
					</div>
					<div class="col-md-4">
						<label for="email" class="form-label">Adres email</label>
						<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
						<x-input-error :messages="$errors->get('email')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="birth_date" class="form-label">Data urodzenia</label>
						<input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
						<x-input-error :messages="$errors->get('birth_date')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="pesel" class="form-label">PESEL</label>
						<input type="text" class="form-control" id="pesel" name="pesel" value="{{ old('pesel') }}" required>
						<x-input-error :messages="$errors->get('pesel')" class="mt-2 red-text" />
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-6">
						<label for="passport_number" class="form-label">Seria i numer paszportu</label>
						<input type="text" class="form-control" id="passport_number" name="passport_number" value="{{ old('passport_number') }}" required>
						<x-input-error :messages="$errors->get('passport_number')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="issue_date" class="form-label">Data wydania</label>
						<input type="date" class="form-control" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" required>
						<x-input-error :messages="$errors->get('issue_date')" class="mt-2 red-text" />
					</div>
					<div class="col-md-3">
						<label for="expiry_date" class="form-label">Data ważności</label>
						<input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" required>
						<x-input-error :messages="$errors->get('expiry_date')" class="mt-2 red-text" />
					</div>
				</div>
				<h5 class="login-address mt-3">Adres</h5>
				<div class="row mb-2">
					<div class="col-md-8">
						<label for="street" class="form-label">Ulica</label>
						<input type="text" class="form-control" id="street" name="street" value="{{ old('street') }}" required>
						<x-input-error :messages="$errors->get('street')" class="mt-2 red-text" />
					</div>
					<div class="col-md-2">
						<label for="house_number" class="form-label">Numer domu</label>
						<input type="text" class="form-control" id="house_number" name="house_number" value="{{ old('house_number') }}" required>
						<x-input-error :messages="$errors->get('house_number')" class="mt-2 red-text" />
					</div>
					<div class="col-md-2">
						<label for="apartment_number" class="form-label">Nr mieszkania</label>
						<input type="text" class="form-control" id="apartment_number" name="apartment_number" value="{{ old('apartment_number') }}">
						<x-input-error :messages="$errors->get('apartment_number')" class="mt-2 red-text" />
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-3">
						<label for="postal_code" class="form-label">Kod</label>
						<input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
						<x-input-error :messages="$errors->get('postal_code')" class="mt-2 red-text" />
					</div>
					<div class="col-md-5">
						<label for="city_name" class="form-label">Miejscowość</label>
						<input type="text" class="form-control" id="city_name" name="city_name" value="{{ old('city_name') }}" required>
						<x-input-error :messages="$errors->get('city_name')" class="mt-2 red-text" />
					</div>
					<div class="col-md-4">
						<label for="citizenship" class="form-label">Obywatelstwo</label>
						<select class="form-select" id="citizenship" name="citizenship_id" required>
							<option value="" disabled selected>Wybierz...</option>
							<option value="1" {{ old('citizenship_id') == 1 ? 'selected' : '' }}>Polskie</option>
							<option value="2" {{ old('citizenship_id') == 2 ? 'selected' : '' }}>Amerykańskie</option>
							<option value="3" {{ old('citizenship_id') == 3 ? 'selected' : '' }}>Brytyjskie</option>
							<option value="4" {{ old('citizenship_id') == 4 ? 'selected' : '' }}>Francuskie</option>
							<option value="5" {{ old('citizenship_id') == 5 ? 'selected' : '' }}>Niemieckie</option>
							<option value="6" {{ old('citizenship_id') == 6 ? 'selected' : '' }}>Ukraińskie</option>
							<option value="7" {{ old('citizenship_id') == 7 ? 'selected' : '' }}>Inne</option>
						</select>
						<x-input-error :messages="$errors->get('citizenship_id')" class="mt-2 red-text" />
					</div>
				</div>

                <h5 class="mt-3">Wyprawa</h5>
				<div class="row mb-2">
					<div class="col-md-4">
						<label for="trip" class="form-label">Destynacja</label>
						<select class="form-select" id="trip" name="trip" required>
							<option value="" disabled selected>Wybierz...</option>
							@foreach($trips as $trip)
								<option value="{{ $trip->id }}" {{ old('trip') == $trip->id ? 'selected' : '' }}>
									{{ $trip->destination }}
								</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4">
						<label for="start_date" class="form-label">Termin</label>
						<select class="form-select" id="start_date" name="start_date" required>
							<option value="" disabled selected>Wybierz...</option>
							@foreach($dates as $date)
								<option value="{{ $date->id }}" {{ old('start_date') == $date->id ? 'selected' : '' }}>
									{{ \Carbon\Carbon::parse($date->start_date)->format('d.m.Y') }} - {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-4">
						<label for="stage" class="form-label">Status</label>
						<select class="form-select" id="stage" name="stage" required>
							<option value="" disabled selected>Wybierz...</option>
							<option value="zarezerwowany" {{ old('stage') == 'zarezerwowany' ? 'selected' : '' }}>Zarezerwowane</option>
							<option value="zapisany" {{ old('stage') == 'zapisany' ? 'selected' : '' }}>Podpisano umowę</option>
							<option value="przedpłacone" {{ old('stage') == 'przedpłacone' ? 'selected' : '' }}>Dokonano przedpłaty</option>
							<option value="opłacone" {{ old('stage') == 'opłacone' ? 'selected' : '' }}>Wszystko opłacone</option>
						</select>
						<x-input-error :messages="$errors->get('stage')" class="mt-2 red-text" />
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-md-12 text-end">
						<!-- Wyczyść dane -->
						<button type="reset" class="btn btn-secondary shadow mr-4 px-3">Wyczyść</button>
						<!-- Zapisz zmiany -->
						<button type="submit" class="btn btn-primary shadow mx-4 px-3">Zapisz</button>
						<!-- Powrót do listy -->
                        <a href="{{ request('redirect_url', route('admin.clientlist')) }}" class="btn btn-success shadow ml-5 px-3">Powrót</a>
						{{-- <a href="{{ route('admin.clientlist') }}" class="btn btn-success shadow ml-5 px-3">Powrót</a> --}}
					</div>
				</div>
			</form>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/register.js?v=1.0') }}"></script> <!-- Skrypt do obsługi terminów i destynacji -->

    <script>
        document.getElementById('name').addEventListener('input', updateHeader);
        document.getElementById('last_name').addEventListener('input', updateHeader);

        function updateHeader() {
            const name = document.getElementById('name').value.trim();
            const lastName = document.getElementById('last_name').value.trim();
            const header = document.getElementById('header-title');

            if (name || lastName) {
                header.textContent = `${name} ${lastName}`.trim();
            } else {
                header.textContent = 'Nowy klient';
            }
        }
    </script>
@endsection
