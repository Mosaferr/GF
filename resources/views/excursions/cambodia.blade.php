<!-- resources/views/excursions/cambodia.blade.php -->
@extends('layouts.app')
@section('title', 'Kambodża')

@section('content')
	<main class="custom-margin-top">
		<div class="container"   style="max-width: 1100px;">
            <x-tabs :flags="['Cambodia-xs.gif']" title="Kambodża"/>

            <div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="program-tab-pane" role="tabpanel" aria-labelledby="program-tab" tabindex="0">
					<div class="row ms-2 g-5">
						<div class="col-lg-7 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3>Program</h3></p>
							<p><strong>Dzień 1.</strong><br>Spotkanie na lotnisku w Warszawie, przelot do Bangkoku, zakwaterowanie w hotelu, wieczorny spacer po dzielnicy turystycznej.</p>
							<p><strong>Dzień 2.</strong><br>Przejazd lokalnym autobusem do granicy z Kambodżą, przekroczenie granicy i przejazd do maista Batambang.</p>
							<p><strong>Dzień 3.</strong><br>Zwiedzanie Batambang i okolic, buddyjska świątynia, bambusowa kolejka, Bat Cave (obserwacja tysięcy nietoperzy wylatujących o zmroku na żer).</p>
							<p><strong>Dzień 4.</strong><br>Około 8-godzinna wyprawa łodzią do miasta Siem Reap, podziwianie wiosek na wodzie i życia ich mieszkańców. Postuj na jeden z wysepek, gdzie będzie możliwośż skorzystania z ekstremalnej toalety i spożycia prostego posiłku.</p>
							<p><strong>Dzień 5.</strong><br>Całodniowe zwiedzanie rykszą khmerskiego kompleksu świątynnego Angkor Wat, największego i najbardziej monumentalnego zabytku religijnego na świecie.</p>
							<p><strong>Dzień 6.</strong><br>Wycieczka do Preah Vihear, najstarszego kompleksu świątynnego położonego na granicy trzech krajów: Kambodży, Tajlandii i Laosu, gdzie obok siebie żyją buddyjscy mnisi i khmerscy żołnierze.</p>
							<p><strong>Dzień 7.</strong><br>Przeprawa przez dżunglę do niewielkiego miasteczka Kampong. Pływanie małą łódką po rzece Mekong i obserwacja ostatnich  żyjących delfinów rzecznych.</p>
							<p><strong>Dzień 8.</strong><br>Przejazd do stolicy Phnom Penh. Czas na relaks (tajski masaż, wyjście do lokalnej knajpki, wycieczka na największy w stolicy bazar).</p>
							<p><strong>Dzień 9.</strong><br>Zwiedzanie stolicy: Pałac Królewski, Independence Monument, Central Market, nocny market, liczne buddyjskie świątynie.</p>
							<p><strong>Dzień 10.</strong><br>Przejazd nad zatokę Tajlandzką, do niewielkiego miasteczka Kampot, słynącego z połowu krabów, przyrzadzanych od razu w nadmorskich knajpkach oraz z uprawy zielonego pieprzu. Spacer po mieście, wieczorna kolacja z krabem i lokalnymi owocami w jednej z przybrzeżnych knajpek.</p>
							<p><strong>Dzień 11.</strong><br>Poranny przejazd do najbardziej znanej miejscowości wypoczynkowej w Kambodży: Sihanoukville, spacer po mieście, relaks na plaży i drink z palemką dla chętnych.</p>
							<p><strong>Dzień 12.</strong><br>Kolejny dzień relaksu i odpoczynku, czas wolny na ostatnie zakupy, spacery i plażowanie. Dla chętnych wycieczka rowerowa do pobliskiego parku krajobrazowego.</p>
							<p><strong>Dzień 13.</strong><br>Poranny wyjazd do granicy z Bangkokiem, przekroczenie granicy i powrót do stolicy Tajlandii. Ostatnie zakupy i spacer po dzielnicy turystycznej. Ostatnia szansa na tajski masaż. Wieczorem wylot do Warszawy.</p>
							<p><strong>Dzień 14.</strong><br>Lądowanie w Warszawie w godzinach popołudniowych, pożegnanie z grupą i powrót do domu.</p>

							<div class="arrows my-4 text-center fs-3">
								<a href="#top"><i class="bi bi-arrow-up-circle"></i></a>
							</div>

							<div class="d-flex justify-content-center">
								<a href="{{ route('register') }}" class="btn btn-warning w-100 shadow">Wyślij zgłoszenie</a>
							</div>
						</div>

						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">

							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-camb13.jpg') }}" alt="sm-cambodia13" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-camb5.jpg') }}" alt="sm-cambodia5" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-camb3.jpg') }}" alt="sm-cambodia3" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-camb11.jpg') }}" alt="sm-cambodia11" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-camb4.jpg') }}" alt="sm-cambodia4" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-camb12.jpg') }}" alt="sm-cambodia12" class="img-thumbnail img-fluid"></div>
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
									@foreach ($dates as $date)
										<tr class="align-middle">
											<th scope="row">
												{{ \Carbon\Carbon::parse($date->start_date)->format('d.m') }} - {{ \Carbon\Carbon::parse($date->end_date)->format('d.m.Y') }}
											</th>
											<td class="text-center">
												{{ $date->price }} PLN
											</td>
											<td>
												{{ $date->available_seats == 0 ? 'Brak wolnych miejsc' :
												($date->available_seats == 1 ? '1 wolne miejsce' :
												($date->available_seats > 1 && $date->available_seats < 5 ? $date->available_seats . ' wolne miejsca' : $date->available_seats . ' wolnych miejsc'))
											}}
											</td>
											<td>
												<a href="{{ route('register') }}" class="btn btn-success btn-sm shadow {{ $date->available_seats > 0 ? '' : 'disabled' }}">
													<small>Rezerwuj</small>
												</a>
											</td>
										</tr>
									@endforeach
									<tr class="align-middle">
										<td scope="row">Twój termin</td>
										<th>Podróż na zamówienie</th>
										<td></td>
										<td><a href="{{ route('contact') }}" class="btn btn-success btn-sm shadow"><small> &nbsp; Napisz &nbsp; </small></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-camb10.jpg') }}" alt="sm-cambodia10" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
					<div class="col-12">
						<p><h5>Czas podróży: 14 dni</h5></p>
						<p><b>Cena zawiera:</b> ubezpieczenie KL 40.000 EUR i NNW 15.000 PLN, łódź z Batanbangu do Siem Reap, transport: pociągi, autobusy, ryksze, taksówki na trasie wycieczki, noclegi, koszty organizacyjne w Polsce i na miejscu wyprawy, opiekę pilota.</p>
						<p><b>Cena nie zawiera:</b> przelotu Warszawa - Bangkok - Warszawa (ok. 3500 - 4000 PLN), wizy kambodżańskiej (ok. 30 USD) kosztów wyżywienia (ok. 15 USD dziennie), biletów wstępu, zajęć fakultatywnych, napiwków.</p>
					</div>
				</div>

				<div class="tab-pane fade" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3> Praktyczne informacje</h3></p>
							<ul>
								<li>Paszport nie może mieć oznak uszkodzeń, musi być ważny minimum 6 miesięcy od daty wjazdu do Kambodży i musi posiadać co najmniej dwie wolne strony. Władze odmówią wjazdu jeśli paszport nie spełnia ww. wymogów. </li>
								<li>Wizę turystyczną można uzyskać między innymi na przejściach granicznych z Tajlandią.</li>
								<li>Szczepienia nie są obowiązkowe acz zalecane (żółtaczka A i B, błonica, tężec, dur brzuszny).</li>
								<li>Brak wymogów wjazdowych związanych z COVID-19.</li>
								<li>Przed dokonaniem zgłoszenia na wyjazd zachęcamy do zapoznania się z wiadomościami na stronie Ministerstwa Spraw Zagranicznych RP - <a href="https://www.gov.pl/web/dyplomacja/informacje-dla-podrozujacych">Informacje dla podróżujących.</a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-camb14.jpg') }}" alt="sm-cambodia14" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="registration-tab-pane" role="tabpanel" aria-labelledby="registration-tab" tabindex="0">
					<div class="row g-5">
						@include('components.warunki')

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<a href="{{ route('gallery.cambodia') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-camb15.jpg') }}" alt="sm-cambodia15" class="img-thumbnail img-fluid"></div>
							</a>
							<div class="d-flex justify-content-center">
								<a href="{{ route('register') }}" class="btn btn-warning w-100 mt-5 shadow">Wyślij zgłoszenie</a>
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
