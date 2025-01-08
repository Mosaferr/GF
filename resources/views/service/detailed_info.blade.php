<!-- resources/views/service/detailed_info.blade.php -->
@extends('layouts.app')

@section('title', 'Dane osobowe')
@section('head-scripts')
    @vite('resources/css/hide.css')
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container my-5" style="max-width: 1000px;">
			<div class="col-md-12 text-center pb-5 mt-3">
				<h2>Umowa - Zgłoszenie</h2>
			</div>

			<hr>
			<div class="row text-center pb-1">
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-1-circle-fill text-success"></i>
					</div>
					<small class="mb-1">Wypełnij formularz rezerwacji</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-2-circle-fill text-success"></i>
					</div>
					<small class="mb-1">Odbierz potwierdzenie</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-3-circle-fill text-info-emphasis"></i>
					</div>
					<small class="mb-1">Wypełnij formularz umowy</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-4-circle-fill text-warning"></i>
					</div>
					<small class="mb-1">Dokonaj wpłaty</small>
				</div>
				<div class="col">
					<div class="number" style="font-size: 60px;">
						<i class="bi bi-5-circle-fill text-warning"></i>
					</div>
					<small class="mb-1">Zacznij się pakować</small>
				</div>
			</div>
			<hr>
		</div>

		<div class="form-container">
											
			<!-- Komunikaty -->
			<div id="alertContainer">
				@if(session('error'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ session('error') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif

				@if(session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
			</div>
											
			<form method="POST" action="{{ route('client.store') }}">
				@csrf
				<h3> Twoja przygoda </h3>
				<div class="row mb-3">
					<div class="col-md-6">
						<label for="trip" class="form-label">Wyprawa</label>
						<input type="text" class="form-control" id="trip" name="trip" value="{{ session('destination') }}" readonly>
					</div>
					<div class="col-md-6">
						<label for="start_date" class="form-label">Termin</label>
						<input type="text" class="form-control" id="start_date" name="start_date" value="{{ session('start_date') }}" readonly>
					</div>
				</div>

				<h3 class="mt-5"> Twoje dane osobowe </h3>
				<div id="participantSection">
					<div class="participant" id="participantTemplate">
						<p><small class="green-text">Ważne: Podaj informacje identyczne z danymi w paszporcie.</small></p>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="name" class="form-label">Imię<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="name" name="participants[0][name]" value="{{ old('participants[0][name]', session('name')) }}" required>
								<x-input-error :messages="$errors->get('participants.0.name')" class="mt-2 red-text" />
							</div>
							<div class="col-md-6">
								<label for="middle_name" class="form-label">Drugie imię</label>
								<input type="text" class="form-control" id="middle_name" name="participants[0][middle_name]" value="{{ old('participants[0][middle_name]') }}">
								<x-input-error :messages="$errors->get('participants.0.middle_name')" class="mt-2 red-text" />
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="last_name" class="form-label">Nazwisko<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="last_name" name="participants[0][last_name]" value="{{ old('participants[0][last_name]', session('last_name')) }}" required>
								<x-input-error :messages="$errors->get('participants.0.last_name')" class="mt-2 red-text" />
							</div>
							<div class="col-md-6">
								<label for="birth_date" class="form-label">Data urodzenia<span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="birth_date" name="participants[0][birth_date]" value="{{ old('participants[0][birth_date]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.birth_date')" class="mt-2 red-text" />
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="phone" class="form-label">Telefon</label>
								<input type="text" class="form-control" id="phone" name="participants[0][phone]" value="{{ old('participants[0][phone]', session('phone')) }}">
								<x-input-error :messages="$errors->get('participants.0.phone')" class="mt-2 red-text" />
							</div>
							<div class="col-md-6">
								<label for="email" class="form-label">Adres email<span class="text-danger">*</span></label>
								<input type="email" class="form-control" id="email" name="participants[0][email]" value="{{ old('participants[0][email]', session('email')) }}" required>
								<x-input-error :messages="$errors->get('participants.0.email')" class="mt-2 red-text" />
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="pesel" class="form-label">PESEL<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="pesel" name="participants[0][pesel]" value="{{ old('participants[0][pesel]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.pesel')" class="mt-2 red-text" />
							</div>
							<div class="col-md-6">
								<label for="citizenship" class="form-label">Obywatelstwo<span class="text-danger">*</span></label>
								<select class="form-select" id="citizenship" name="participants[0][citizenship]" required>
									<option value="" disabled selected>Wybierz...</option>
									<option value="polskie" {{ old('participants[0][citizenship]') == 'polskie' ? 'selected' : '' }}>Polskie</option>
									<option value="amerykańskie" {{ old('participants[0][citizenship]') == 'amerykańskie' ? 'selected' : '' }}>Amerykańskie</option>
									<option value="brytyjskie" {{ old('participants[0][citizenship]') == 'brytyjskie' ? 'selected' : '' }}>Brytyjskie</option>
									<option value="francuskie" {{ old('participants[0][citizenship]') == 'francuskie' ? 'selected' : '' }}>Francuskie</option>
									<option value="niemieckie" {{ old('participants[0][citizenship]') == 'niemieckie' ? 'selected' : '' }}>Niemieckie</option>
									<option value="ukraińskie" {{ old('participants[0][citizenship]') == 'ukraińskie' ? 'selected' : '' }}>Ukraińskie</option>
									<option value="inne" {{ old('participants[0][citizenship]') == 'inne' ? 'selected' : '' }}>Inne</option>
								</select>
								<x-input-error :messages="$errors->get('participants.0.citizenship')" class="mt-2 red-text" />
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label class="form-label">Płeć<span class="text-danger">*</span></label>
								<div class="row">
									<div class="col-auto">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="participants[0][gender]" id="gender_female_0" value="F" {{ old('participants[0][gender]') == 'F' ? 'checked' : '' }} required>
											{{-- <input class="form-check-input" type="radio" name="participants[0][gender]" id="gender_female" value="F" {{ old('participants[0][gender]') == 'F' ? 'checked' : '' }} required> --}}
											<label class="form-check-label" for="gender_female">Kobieta</label>
										</div>
									</div>
									<div class="col-auto">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="participants[0][gender]" id="gender_male_0" value="M" {{ old('participants[0][gender]') == 'M' ? 'checked' : '' }} required>
											{{-- <input class="form-check-input" type="radio" name="participants[0][gender]" id="gender_male" value="M" {{ old('participants[0][gender]') == 'M' ? 'checked' : '' }} required> --}}
											<label class="form-check-label" for="gender_male">Mężczyzna</label>
										</div>
									</div>
								</div>
								<x-input-error :messages="$errors->get('participants.0.gender')" class="mt-2 red-text" />
							</div>
							<div class="col-md-6">
								<label for="passport_number" class="form-label">Seria i numer paszportu<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="passport_number" name="participants[0][passport_number]" value="{{ old('participants[0][passport_number]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.passport_number')" class="mt-2 red-text" />
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="passport_issue_date" class="form-label">Data wydania paszportu<span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="passport_issue_date" name="participants[0][passport_issue_date]" value="{{ old('participants[0][passport_issue_date]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.passport_issue_date')" class="mt-2 red-text" />
							</div>
							<div class="col-md-6">
								<label for="passport_expiry_date" class="form-label">Data ważności paszportu<span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="passport_expiry_date" name="participants[0][passport_expiry_date]" value="{{ old('participants[0][passport_expiry_date]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.passport_expiry_date')" class="mt-2 red-text" />
							</div>
						</div>
						<h5 class="login-address mt-5">Adres</h5>
						<div class="row mb-3">
							<div class="col-md-8">
								<label for="street" class="form-label">Ulica<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="street" name="participants[0][street]" value="{{ old('participants[0][street]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.street')" class="mt-2 red-text" />
							</div>
							<div class="col-md-2">
								<label for="house_number" class="form-label">Numer domu<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="house_number" name="participants[0][house_number]" value="{{ old('participants[0][house_number]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.house_number')" class="mt-2 red-text" />
							</div>
							<div class="col-md-2">
								<label for="apartment_number" class="form-label">Nr mieszkania</label>
								<input type="text" class="form-control" id="apartment_number" name="participants[0][apartment_number]" value="{{ old('participants[0][apartment_number]') }}">
								<x-input-error :messages="$errors->get('participants.0.apartment_number')" class="mt-2 red-text" />
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-4">
								<label for="postal_code" class="form-label">Kod<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="postal_code" name="participants[0][postal_code]" value="{{ old('participants[0][postal_code]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.postal_code')" class="mt-2 red-text" />
							</div>
							<div class="col-md-8">
								<label for="city_name" class="form-label">Miejscowość<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="city_name" name="participants[0][city_name]" value="{{ old('participants[0][city_name]') }}" required>
								<x-input-error :messages="$errors->get('participants.0.city_name')" class="mt-2 red-text" />
							</div>
						</div>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-md-6">
						<button type="button" class="btn btn-secondary w-100 shadow" id="addParticipantBtn">Dodaj kolejnego uczestnika</button>
					</div>
					<div class="col-md-6">
						<button type="button" class="btn btn-secondary w-100 shadow" id="removeParticipantBtn">Usuń ostatniego uczestnika</button>
					</div>
				</div>

				<div class="row mt-3 mb-3">
					<div class="col-md-12">
						<small class="text-danger"></span>
							Pamiętaj, że dodając kolejnego uczestnika, tworzycie jedną wspólną umowę, a link do płatności będzie obejmował wszystkie zgłoszone osoby. Jeśli każdy uczestnik chce mieć własną umowę, musi założyć osobne zgłoszenie.</small>
					</div>
				</div>

				<div class="row mt-4 mb-3">
					<div class="col-md-12">
						<strong>Klauzule obowiązkowe</strong><span class="text-danger">*</span>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="mandatory_clause" name="mandatory_clause" required>
							<label class="form-check-label" for="mandatory_clause">
								<small>Oświadczam, iż zapoznałem się z <a href="docs/regulamin_serwisu_internetowego.pdf" target = "_blanc">Regulaminem</a>, <a href="docs/polityka_prywatnosci.pdf" target = "_blanc">Polityką prywatności</a> serwisu internetowego i <a href="docs/owu.pdf" target = "_blanc">Warunkami uczestnictwa</a> oraz akceptuję ich postanowienia.</small>
							</label>
						</div>
					</div>
				</div>

				<div class="row mb-2">
					<div class="col-md-12">
						<strong>Inne ważne dokumenty</strong>
						<ul><small>
							<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
								<a href="information.html" target = "_blanc">Praktyczne informacje</a>
							</li>
							<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
								<a href="docs/standardowy_formularz.pdf" target = "_blanc">Standardowy formularz informacyjny</a>
							</li>
							<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
								<a href="docs/ow_ubezpieczenie_podrozy.pdf" target = "_blanc">Ogólne warunki ubezpieczenia "Bezpieczne podróże"</a>
							</li>
							<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
								<a href="docs/ow_ubezpieczenie_rezygnacji.pdf" target = "_blanc">Ogólne warunki ubezpieczenia "Bezpieczne rezerwacje"</a>
							</li>
							<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
								<a href="docs/instrkucja_dla_ubezpieczonych.pdf" target = "_blanc">Instrukcja dla ubezpieczonych</a>
							</li>
						</small></ul>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-md-12">
						<strong>Klauzule nieobowiązkowe</strong>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="optional_clause" name="optional_clause">
							<label class="form-check-label" for="optional_clause"><small>
								Wyrażam zgodę na przetwarzanie powyższych danych osobowych w celach marketingowych przez firmę GlobFrotter.pl.</small>
							</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 text-center">
						<!-- Dodanie atrybutu do kontrolowania liczby uczestników -->
						<button type="submit" class="btn btn-warning shadow w-100" data-max-participants="{{ session('participant_count') }}">Wyślij</button>
						{{-- <button type="submit" class="btn btn-warning shadow w-100">Wyślij</button> --}}
					</div>
				</div>
			</form>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/storage.js') }}"></script>
    <script src="{{ asset('js/participants.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection