<!-- resources/views/XXXXX.blade.php -->
@extends('layouts.app')

@section('title', 'XXXXX')

@section('content')
	<main class="custom-margin-top">
		<div class="container"   style="max-width: 1100px;">

			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="program-tab" data-bs-toggle="tab" data-bs-target="#program-tab-pane" type="button" role="tab" aria-controls="program-tab-pane" aria-selected="true">Program</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link " id="timetable-tab" data-bs-toggle="tab" data-bs-target="#timetable-tab-pane" type="button" role="tab" aria-controls="timetable-tab-pane" aria-selected="false">Terminy</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="information-tab" data-bs-toggle="tab" data-bs-target="#information-tab-pane" type="button" role="tab" aria-controls="information-tab-pane" aria-selected="false">Informacje</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="registration-tab" data-bs-toggle="tab" data-bs-target="#registration-tab-pane" type="button" role="tab" aria-controls="registration-tab-pane" aria-selected="false">Zgłoszenie</button>
				</li>
			</ul>

			<div class="d-flex align-items-center">
				<div class="text-start mt-4 mb-3 ms-5 me-auto">
					<img src="{{ asset('img/flags/Argentina-xs.gif') }}" alt="Flag of Argentina" class="me-2">
					<img src="{{ asset('img/flags/Chile-xs.gif') }}" alt="Flag of Chile">
				</div>
				<h2 class="mb-0 me-5">Argentyna i Chile</h2>
			</div>

			<div class="tab-content" id="myTabContent">

				<div class="tab-pane fade show active" id="program-tab-pane" role="tabpanel" aria-labelledby="program-tab" tabindex="0">
					<div class="row ms-2 g-5">
						<div class="col-lg-7 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3>Program</h3></p>
							<p><strong>Dzień 1.</strong><br>Spotkanie na lotnisku w Warszawie, przelot do Buenos Aires z międzylądowaniem w jednym z europejskich portów.</p>
							<p><strong>Dzień 2.</strong><br>Przylot do Buenos, zakwaterowanie, wieczorny spacer po mieście, kolacja w jednym z lokali serwujących najlepszą na świecie wołowinę i wyborne lokalne wino.</p>
							<p><strong>Dzień 3.</strong><br>Zwiedzanie Buenos, Plaza De Mayo, słynnej dzielnicy La Boca, malowniczy cmentarz Recoleta, gdzie można oddać hołd wielbionej acz kontrowersyjnej Evicie Peron. Wieczorem podziwianie tancerzy tańczących tango w dzielnicy San Telmo.</p>
							<p><strong>Dzień 4.</strong><br>Przelot do górskiego kurortu Batiloche, owianego złą sławą miejsca, gdzie schronienie znaleźli po II Wonie Światowej naziści.</p>
							<p><strong>Dzień 5.</strong><br>Treking w Andach, wycieczka w malownicze regiony Refugio Frey, szczytu z malowniczym jeziorkiem polodowcowym.</p>
							<p><strong>Dzień 6.</strong><br>Przejazd do Santiago De Chile, zwiedzanie stolicy Chile, Plaza De Armas, katedra metropolitalna, Central Market.</p>
							<p><strong>Dzień 7.</strong><br>Całodzienna wycieczka do położonego nad oceanem Spokojnym malowniczego miasteczka Valparaiso, spacer po kolorowych i malowniczych uliczkach wpisanego na listę dziedzictwa UNESCO miasteczka. Wieczorem powrót do Santiago.</p>
							<p><strong>Dzień 8.</strong><br>Powrót do Argentyny, przejazd do miasta Mendoza. Czas wolny przeznaczony na odpoczynek, regenerację i zbieranie sił przed kolejnym dniem. </p>
							<p><strong>Dzień 9.</strong><br>Jeszcze przed świtem przejazd do doliny Horcones, miejsca z którego wybierzemy się do Confluenci, pierwszej bazy w której aklimatyzują się wspinacze chcący zdobyć najwyższy szczyt Ameryki Południowej, Aconcague. Trudy wspinaczki osłodzą zapierające dech widoki.</p>
							<p><strong>Dzień 10.</strong><br>Przejazd do Cordoby, gdzie odpoczniemy po trudach dnia poprzedniego. Dla tych, którzy mają jeszcze siły zwiedzanie miasta, inni mogą odpocząć przy winie i empanadas.</p>
							<p><strong>Dzień 11.</strong><br>Całodzienny przejazd do Puerto Iguazu. Nocleg w miasteczku.</p>
							<p><strong>Dzień 12.</strong><br>Kolejne zapierające dech widoki: całodzienne podziwianie największych i najpiękniejszych wodospadów Iguazu. Po powrocie do miasteczka spacer do Hito Tres Fronteres, skąd pomachać można obywatelom Paragwaju i Brazylii w miejscu, gdzie stykają się granice trzech krajów.</p>
							<p><strong>Dzień 13.</strong><br>Powrót do Buenos Aires, ostatnia szansa na zakup pamiątek i napełnienie placaka winem i mate. Dla fanów literatury spacer śladami Gombrowicza. Wieczorem wylot.</p>
							<p><strong>Dzień 14.</strong><br>Przylot na lotnisko Okęcie, pożegnanie z towarzyszami podróży.</p>

							<div class="arrows my-4 text-center fs-3">
								<a href="#top"><i class="bi bi-arrow-up-circle"></i></a>
							</div>

							<div class="d-flex justify-content-center">
								<a href="f-reservation.html" class="btn btn-warning w-100 shadow">Wyślij zgłoszenie</a>
							</div>
						</div>

						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="g-argentina.html">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-arg4.jpg') }}" alt="sm-argentina4" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="g-argentina.html">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-arg7.jpg') }}" alt="sm-argentina7" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="g-chile.html">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-chile7.jpg') }}" alt="sm-chile7" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="g-argentina.html">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-arg6.jpg') }}" alt="sm-argentina6" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="g-argentina.html">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-arg1.jpg') }}" alt="sm-argentina1" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="g-argentina.html">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-arg10.jpg') }}" alt="sm-argentina10" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="timetable-tab-pane" role="tabpanel" aria-labelledby="timetable-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-7 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3>Terminy i cena</h3></p>
							<table class="table table-striped table-hover">
								<tbody>
									<tr class="align-middle">
										<td scope="row">14.07-27.07.2024</td>
										<td>6500 PLN + 1200 USD</td>
										<td>Brak miejsc</td>
										<td><a href="f-reservation.html" class="btn btn-success btn-sm shadow disabled"><small>Rezerwuj</small></a></td>
									</tr>
									<tr class="align-middle">
										<td scope="row">28.07-11.08.2024</td>
										<td>6500 PLN + 1200 USD</td>
										<td>Brak miejsc</td>
										<td><a href="f-reservation.html" class="btn btn-success btn-sm shadow"><small>Rezerwuj</small></a></td>
									</tr>
									<tr class="align-middle">
										<td scope="row">04.08-17.08.2024</td>
										<td>7200 PLN + 1300 USD</td>
										<td>3 wolne miejsca</td>
										<td><a href="f-reservation.html" class="btn btn-success btn-sm shadow"><small>Rezerwuj</small></a></td>
									</tr>
									<tr class="align-middle">
										<td scope="row">Twój termin</td>
										<th>Podróż na zamówienie</th>
										<td></td>
										<td><a href="contact.html" class="btn btn-success btn-sm shadow"><small> &nbsp; Napisz &nbsp; </small></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="g-argentina.html">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-arg5.jpg') }}" alt="sm-argentina5" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
					<div class="col-12">
						<p><h5>Czas podróży: 14 dni</h5></p>
						<p><b>Cena zawiera:</b> ubezpieczenie KL 40.000 EUR i NNW 15.000 PLN, transport: autobusy, taksówki na trasie wycieczki, noclegi, koszty organizacyjne w Polsce i na miejscu wyprawy, opiekę pilota.</p>
						<p><b>Cena nie zawiera:</b> przelotu Warszawa - Buenos Aires - Warszawa (ok. 6000 PLN), kosztów wyżywienia (ok. 20 USD dziennie), zezwolenia na trekking do baz pod Aconcaguą (ok. 100 USD), biletów wstępu, zajęć fakultatywnych, napiwków.</p>
					</div>
				</div>

				<div class="tab-pane fade" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3> Praktyczne informacje</h3></p>
							<ul>
								<li>Do udziału w wyprawie wymagany jest paszport ważny przez cały okres planowanego pobytu w Argentynie lub sześć miesięcy od daty wjazdu do Chile.</li>
								<li>Obywatele polscy nie potrzebują wizy, gdy udają się do Argentyny lub Chile turystycznie na okres do 90 dni.</li>
								<li>Szczepienia nie są obowiązkowe acz zalecane (żółtaczka A i B, błonica, tężec, dur brzuszny).</li>
								<li>Brak wymogów wjazdowych związanych z COVID-19.</li>
								<li>Przed dokonaniem zgłoszenia na wyjazd zachęcamy do zapoznania się z wiadomościami na stronie Ministerstwa Spraw Zagranicznych RP - <a href="https://www.gov.pl/web/dyplomacja/informacje-dla-podrozujacych">Informacje dla podróżujących.</a></li>
							</ul>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="g-argentina.html">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-arg9.jpg') }}" alt="sm-argentina9" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="registration-tab-pane" role="tabpanel" aria-labelledby="registration-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3> Warunki uczestnictwa</h3></p>
							<p>Przed zarezerwowaniem wycieczki zapoznaj się z regulaminem serwisu, warunkami uczestnictwa oraz wymaganiami wizowymi i paszportowymi, które musisz spełnić, aby udać się w podróż.</p>
							<p>W razie pytań przejdź do zakładki <a href="contact.html">kontakt</a> i napisz do nas.</p>
							<ul>
								<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
									<a href="docs/regulamin_serwisu_internetowego.pdf" target = "_blanc">Regulamin serwisu internetowego</a>
								</li>
								<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
									<a href="docs/polityka_prywatnosci.pdf" target = "_blanc">Polityka prywatności</a>
								</li>
								<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
									<a href="docs/owu.pdf" target = "_blanc">Ogólne warunki uczestnictwa</a>
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
							</ul>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<a href="g-chile.html">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-chile8.jpg') }}" alt="sm-chile8" class="img-thumbnail img-fluid"></div>
							</a>
							<div class="d-flex justify-content-center">
								<a href="f-reservation.html" class="btn btn-warning w-100 mt-5 shadow">Wyślij zgłoszenie</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

@section('scripts')
	@vite('resources/js/links.js')
@endsection