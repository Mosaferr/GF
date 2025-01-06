<!-- resources/views/XXXXX.blade.php -->
@extends('layouts.app')

@section('title', 'XXXXX')
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
			<form action="registration.php" method="POST" id="registrationForm">
				<h3> Twoja przygoda </h3>
				<div class="row mb-3">
					<div class="col-md-6">
						<label for="wyprawa" class="form-label">Wyprawa</label>
						<select class="form-select" id="wyprawa" name="wyprawa" required>
							<option selected>Wybierz...</option>
							<option value="argentina">Argentyna i Chile</option>
							<option value="indonesia">Indonezja</option>
							<option value="cambodia">Kambodża</option>
							<option value="peru">Peru i Boliwia</option>
							<option value="sri_lanka">Sri Lanka</option>
							<option value="tibet">Tybet, w Chinach</option>
							<option value="inny">Inna</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="termin" class="form-label">Termin</label>
						<select class="form-select" id="termin" name="termin" required>
							<option selected>Wybierz...</option>
							<option value="argentina_1407">14.07-27.07.2024</option>
							<option value="argentina_1407">28.07-11.08.2024</option>
							<option value="argentina_1407">04.08-17.08.2024</option>
							<option value="argentina_inny">Inny</option>
						</select>
					</div>
				</div>

				<h3 class="mt-5"> Twoje dane osobowe </h3>
				<div id="participantSection">
					<div class="participant" id="participantTemplate">
						<p><small class="text-danger">Ważne: Podaj informacje identyczne z danymi w paszporcie.</small></p>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="first_name" class="form-label">Imię<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="first_name" name="first_name[]" required>
							</div>
							<div class="col-md-6">
								<label for="second_name" class="form-label">Drugie imię</label>
								<input type="text" class="form-control" id="second_name" name="second_name[]">
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-md-6">
								<label for="last_name" class="form-label">Nazwisko<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="last_name" name="last_name[]" required>
							</div>
							<div class="col-md-6">
								<label for="date_of_birth" class="form-label">Data urodzenia<span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="phone" class="form-label">Telefon</label>
								<input type="text" class="form-control" id="phone" name="phone[]">
							</div>
							<div class="col-md-6">
								<label for="email" class="form-label">Adres email<span class="text-danger">*</span></label>
								<input type="email" class="form-control" id="email" name="email[]" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="pesel" class="form-label">PESEL<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="pesel" name="pesel" required>
							</div>
							<div class="col-md-6">
								<label for="citizenship" class="form-label">Obywatelstwo<span class="text-danger">*</span></label>
								<select class="form-select" id="citizenship" name="citizenship" required>
									<option selected>Wybierz...</option>
									<option value="polish">Polskie</option>
									<option value="american">Amerykańskie</option>
									<option value="british">Brytyjskie</option>
									<option value="french">Francuskie</option>
									<option value="german">Niemieckie</option>
									<option value="ukrainian">Ukraińskie</option>
									<option value="other">Inne</option>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-12">
								<label for="passport" class="form-label">Seria i numer paszportu<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="passport" name="passport" required>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-md-6">
								<label for="date_of_issue" class="form-label">Data wydania paszportu<span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="date_of_issue" required>
							</div>
							<div class="col-md-6">
								<label for="date_of_expire" class="form-label">Data ważności paszportu<span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="date_of_expire" name="date_of_expire" required>
							</div>
						</div>
	
						<h5 class="login-address mt-5">Adres</h5>
						<div class="row mb-3">
							<div class="col-md-8">
								<label for="street" class="form-label">&nbsp;<br>Ulica<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="street" name="street[]" required>
							</div>
							<div class="col-md-2">
								<label for="house_nr" class="form-label">Numer domu<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="house_nr" name="house_nr[]" required>
							</div>
							<div class="col-md-2">
								<label for="flat_nr" class="form-label">Numer mieszkania<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="flat_nr" name="flat_nr[]" required>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-md-2">
								<label for="street" class="form-label">Kod<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="street" name="street[]" required>
							</div>
							<div class="col-md-6">
								<label for="house_nr" class="form-label">Miejscowość<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="house_nr" name="house_nr[]" required>
							</div>
							<div class="col-md-4">
								<label for="flat_nr" class="form-label">Kraj<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="flat_nr" name="flat_nr[]" required>
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
						<button type="submit" class="btn btn-warning shadow w-100">Wyślij</button>
					</div>
				</div>
			</form>
		</div>

		<div class ="tymcz text-center mt-5">(<small>Tymczasowo: </small>
			<a href="f-payment.html">
				<button type="submit" class="btn btn-sm btn-light shadow">Dalej</button>
			</a>)
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/participants.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection