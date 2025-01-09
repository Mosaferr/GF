<!-- resources/views/excursions/tibet.blade.php -->
@extends('layouts.app')
@section('title', 'Tybet. W Chinach')

@section('content')
	<main class="custom-margin-top">
		<div class="container"   style="max-width: 1100px;">
            <x-tabs :flags="['Tibet-xs.gif', 'China-xs.gif']" title="Tybet. W Chinach"/>

			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="program-tab-pane" role="tabpanel" aria-labelledby="program-tab" tabindex="0">
					<div class="row ms-2 g-5">
						<div class="col-lg-7 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3>Program</h3></p>
							<p><strong>Dzień 1.</strong><br>Spotkanie na lotnisku w Warszawie, przelot do Chengdu z międzylądowaniem w jednym z azjatyckich portów lotniczych.</p>
							<p><strong>Dzień 2.</strong><br>Przylot do położonego w regionie Syczuan chińskiego miasta Chengdu, zakwaterowanie w hotelu, pierwszy kontakt z chińską kulturą i mentalnością podczas wieczornego spaceru po mieście.</p>
							<p><strong>Dzień 3.</strong><br>Największa atrakcja miasta, czyli Baza Badawcza Hodowli Pand Wielkich w Chengdu. Wieczorem wizyta w buddyjskim klasztorze Wenshu. Kolacja w lokalu serwującym specjały kuchni syczuańskiej.</p>
							<p><strong>Dzień 4.</strong><br>Przelot do stolicy Tybetu Lhasy. Powitanie na lotnisku przez lokalnego przewodnika, który będzie nam towarzyszył w trakcie wyprawy. Pierwszy zetknięcie się z tą niezwykłą kulturą podczas wieczornego spaceru.</p>
							<p><strong>Dzień 5.</strong><br>Zwiedzanie Lhasy, dawniej zajmowany przez Dalajlame pałac Potala, świątynia Jokhang, ulica Barkhor, gdzie zobaczyć można modląc się w zaskakujący sposób tłumy pielgrzymów. Wieczór w lokalnej restauracji serwującej specjały z bawolego mięsa.</p>
							<p><strong>Dzień 6.</strong><br>Po porannej tybetańskiej herbacie z bawolim masłem i solą dalsze zwiedzanie okolic Lhasy. Wycieczka do dwóch okolicznych tybetańskich monastyrów: Sera, gdzie będziemy świadkami słynnej debaty tybetańskich mnichów oraz klasztoru Drepung.</p>
							<p><strong>Dzień 7.</strong><br>Rano wyruszymy wzdłuż przełęczy Gampala w kierunku miasta Shigatse. Po drodze jezioro Yamdrok, lodowiec Karola, ozdobiona modlitewnymi flagami przełęcz Simila.</p>
							<p><strong>Dzień 8.</strong><br>Dalszy ciąg podróży, aż do szczytu Mount Everest. Spacer do Everest Base Camp, pierwszego miejsca, gdzie aklimatyzują się himalaiści. Nocleg u podnóży góry na wysokości 5200 m. n.p.m..</p>
							<p><strong>Dzień 9.</strong><br>Rano zwiedzimy najwyżej położony klasztor Rongbuk, mieści się on na wysokości 5154 m.n.p.m.. Po zwiedzaniu droga powrotna do Shigatse.</p>
							<p><strong>Dzień 10.</strong><br>Powrót do Lhasy, gdzie wsiądziemy w hermetyczny pociąg, którym przez ponad 40 godzin przemierzać będziemy bezkresne tereny Tybetu a potem Chin w drodze do Pekinu.</p>
							<p><strong>Dzień 11.</strong><br>Cały dzień w pociągu poświęcony wyglądaniu przez okno.</p>
							<p><strong>Dzień 12.</strong><br>Przed południem stolica Chin: Pekin. Zwiedzanie świątyni Niebios, niechlubnego Placu Tienanmen, świątyni Lamy, Zakazanego Miasto.</p>
							<p><strong>Dzień 13.</strong><br>Całodniowa wycieczka do Badaling, skąd będziemy mogli wspiąć się na Wielki Mur Chiński. Wieczorem powrót do Pekinu, kolacja w restauracji serwującej słynną kaczkę po pekińsku.</p>
							<p><strong>Dzień 14.</strong><br>Wylot z Pekinu do Warszawy, przylot w późnych godzinach nocnych.</p>

							<div class="arrows my-4 text-center fs-3">
								<a href="#top"><i class="bi bi-arrow-up-circle"></i></a>
							</div>

							<div class="d-flex justify-content-center">
								<a href="{{ route('register') }}" class="btn btn-warning w-100 shadow">Wyślij zgłoszenie</a>
							</div>
						</div>

						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.china') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-china11.jpg') }}" alt="sm-china11" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.tibet') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet2.jpg') }}" alt="sm-tibet2" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.tibet') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet9.jpg') }}" alt="sm-tibet9" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.tibet') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet12.jpg') }}" alt="sm-tibet12" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.china') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-china2.jpg') }}" alt="sm-china2" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.china') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-china1.jpg') }}" alt="sm-china1" class="img-thumbnail img-fluid"></div>
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
							<a href="{{ route('gallery.tibet') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-tibet14.jpg') }}" alt="sm-tibet14" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
					<div class="col-12">
						<p><h5>Czas podróży: 14 dni</h5></p>
						<p><b>Cena zawiera:</b> przelot  ubezpieczenie KL 50.000 EUR i NNW 15.000 PLN, transport: pociągi, autobusy, taksówki na trasie wyprawy, noclegi, koszty wyżywienia w Tybecie, koszty organizacyjne w Polsce i na miejscu wyprawy, opiekę pilota.</p>
						<p><b>Cena nie zawiera:</b> przelotu Warszawa - Chengdu - Warszawa (ok. 5500 PLN), wizy chińskiej (pomagamy w uzyskaniu), kosztów wyżywienia w Chinach (ok. 20 - 30 USD dziennie), biletów wstępu, zajęć fakultatywnych, napiwków.</p>
					</div>
				</div>

				<div class="tab-pane fade" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3> Praktyczne informacje</h3></p>
							<ul>
								<li>Paszport ważny minimum 6 miesięcy od daty powrotu do Polski i musi posiadać co najmniej trzy wolne strony (obok siebie).</li>
								<li>Wizę i pozwolenie na podróż do Tybetu można uzyskać za naszym pośrednictwem, z odpowiednim wyprzedzeniem przed wylotem do Chin. </li>
								<li>Szczepienia nie są obowiązkowe acz zalecane (żółtaczka A i B, błonica, tężec, dur brzuszny).</li>
								<li>Brak wymogów wjazdowych związanych z COVID-19.</li>
								<li>Przed dokonaniem zgłoszenia na wyjazd zachęcamy do zapoznania się z wiadomościami na stronie Ministerstwa Spraw Zagranicznych RP - <a href="https://www.gov.pl/web/dyplomacja/informacje-dla-podrozujacych">Informacje dla podróżujących.</a></li>
							</ul>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.tibet') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-tibet13.jpg') }}" alt="sm-tibet13" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="registration-tab-pane" role="tabpanel" aria-labelledby="registration-tab" tabindex="0">
					<div class="row g-5">
						@include('components.warunki')

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<a href="{{ route('gallery.china') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-china13.jpg') }}" alt="sm-china13" class="img-thumbnail img-fluid"></div>
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
