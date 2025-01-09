<!-- resources/views/excursions/peru.blade.php -->
@extends('layouts.app')
@section('title', 'Peru i Boliwia')

@section('content')
	<main class="custom-margin-top">
		<div class="container"   style="max-width: 1100px;">
            <x-tabs :flags="['Peru-xs.gif', 'Bolivia-xs.gif']" title="Peru i Boliwia"/>

			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="program-tab-pane" role="tabpanel" aria-labelledby="program-tab" tabindex="0">
					<div class="row ms-2 g-5">
						<div class="col-lg-7 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3>Program</h3></p>
							<p><strong>Dzień 1.</strong><br>Zbiórka na lotnisku w Warszawie. Przelot do stolicy Peru Limy z mięzdylądowaniem w jednej z europejskich portów lotniczych.</p>
							<p><strong>Dzień 2.</strong><br>Lądowanie w Limie, zakwaterowanie w hotelu, wieczorny spacer i pierwsze zetknięcie z kulturą lokalną. Kolacja w jednej z licznych knajpek z lokalnymi trunkami i potrawami.</p>
							<p><strong>Dzień 3.</strong><br>Całodzinne zwiedzanie stolicy Limy, spacer po Plaza de Armas, podziwianie pałacu prezydenckiego i budynków rządowych, zwiedzania bazyliki San Francisko el Grande i katedry. Spacer po Plaza San Martin. Wieczorny przejazd do Paracas.</p>
							<p><strong>Dzień 4.</strong><br>Wyprawa szybką łodzią w okolice wysp Ballestas, gdzie obserwować można ogromne skupisko morskich zwierząt. W drodze możliwość zobaczenia Kandelabru z Paracas, wyrzeźbionego w nadmorskiej skale wielkiego płaskorzeźbu o wysokości 190 metrów.</p>
							<p><strong>Dzień 5.</strong><br>Przejazd do miasta Arequipa. Spacer po uroczym starym mieście, zwiedzanie przepięknego kompleksu klaztornego: klasztoru Santa Catalina.</p>
							<p><strong>Dzień 6.</strong><br>Przejazd do miasta Puno, położonego nad jeziorem Titicaca. Wyciaczka łodzią na zbudowane z trzciny pływające wioski Uros.</p>
							<p><strong>Dzień 7.</strong><br>Przejazd do stolicy Boliwii La Paz, po mieście przemieszczać się będziemy siecią kolejek linowych Teleferico. Wycieczka do Moon Valley, doliny pełnej niezywkłych formacji skalnych.</p>
							<p><strong>Dzień 8.</strong><br>Wycieczka do Tiwanaku, największego ośrodka kultury andyjskiej istniejącego w latach 550-950 naszej ery.</p>
							<p><strong>Dzień 9.</strong><br>Przejazd do magicznego maista Inków Cuzco. Zwiedzanie starego miasta, ruin inkaskich budowli, licznych kościołów i klasztorów. Dla odważnych możliwość skonsumowania świnki morskiej.</p>
							<p><strong>Dzień 10.</strong><br>Cały dzień poświęcony wędrówkom szlakami Inków, imponujące osiągnięcie rolnictwa: tarasy w Moray, zachwycające tarasy solne w Maras.</p>
							<p><strong>Dzień 11.</strong><br>Ciąg dalszy zwiedzania doliny Inków, ruiny w Ollantaytambo, malownicze stanowisko archeologiczne z pałacem Tupac Yupanqui łączącym w sobie architerkturę Inków z architekturą kolonialną w wiosce Chinchero.</p>
							<p><strong>Dzień 12.</strong><br>Główny punkt programu: wycieczka do najbardziej znanego miejsca w Peru: Machu Picchu. Możliwość zejścia z góry dla wytrwałych, zjazd państwowym autobusem, po oczekiwaniu w kilometrowej kolejce dla leniwych. </p>
							<p><strong>Dzień 13.</strong><br>Powrót do Limy, ostatni spacer po mieście i ostatnia szansa na zakup lokalnych pamiątek, np.flatni pana, do wygrywania El Condor Passa.</p>
							<p><strong>Dzień 14.</strong><br>Przylot do Warszawy, pożegnanie na lotnisku Chopina.</p>

							<div class="arrows my-4 text-center fs-3">
								<a href="#top"><i class="bi bi-arrow-up-circle"></i></a>
							</div>

							<div class="d-flex justify-content-center">
								<a href="{{ route('register') }}" class="btn btn-warning w-100 shadow">Wyślij zgłoszenie</a>
							</div>
						</div>

						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-peru4.jpg') }}" alt="sm-peru4" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-peru12.jpg') }}" alt="sm-peru12" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-peru11.jpg') }}" alt="sm-peru11" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-peru6.jpg') }}" alt="sm-peru6" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-peru1.jpg') }}" alt="sm-peru1" class="img-thumbnail img-fluid"></div>
							</a>

							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-peru2.jpg') }}" alt="sm-peru2" class="img-thumbnail img-fluid"></div>
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
							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-peru10.jpg') }}" alt="sm-peru10" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
					<div class="col-12">
						<p><h5>Czas podróży: 14 dni</h5></p>
						<p><b>Cena zawiera:</b> przelot wewnętrzny La Paz - Cuzco, ubezpieczenie KL 40.000 EUR i NNW 15.000 PLN, transport: autobusy, taksówki na trasie wyprawy, noclegi, koszty organizacyjne w Polsce i na miejscu wyprawy, opiekę pilota.</p>
						<p><b>Cena nie zawiera:</b> przelotu Warszawa - Lima - Warszawa (ok. 5500 PLN), kosztów wyżywienia (ok. 20 USD dziennie), pociągu do Machu Picchu (ok. 200 USD), biletów wstępu, napiwków.</p>
					</div>
				</div>

				<div class="tab-pane fade" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3> Praktyczne informacje</h3></p>
							<ul>
								<li>Paszport musi być ważny minimum 6 miesięcy od daty wjazdu zarówno do Peru jak i do Boliwii. </li>
								<li>Obywatele Polski mogą przebywać na terenie Peru i Boliwii bez wiz. Podczas wjazdu do Boliwii wręczany jest specjalny formularz wjazdowy, tzw. Tarjeta Andina, który należy zachować i bezwzględnie zwrócić przy wyjeździe.</li>
								<li>Szczepienia nie są obowiązkowe acz zalecane (żółtaczka A i B, błonica, tężec, dur brzuszny).</li>
								<li>Brak wymogów wjazdowych związanych z COVID-19.</li>
								<li>Przed dokonaniem zgłoszenia na wyjazd zachęcamy do zapoznania się z wiadomościami na stronie Ministerstwa Spraw Zagranicznych RP - <a href="https://www.gov.pl/web/dyplomacja/informacje-dla-podrozujacych">Informacje dla podróżujących.</a></li>
							</ul>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.peru') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-peru13.jpg') }}" alt="sm-peru13" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="registration-tab-pane" role="tabpanel" aria-labelledby="registration-tab" tabindex="0">
					<div class="row g-5">
						@include('components.warunki')
						@include('components.warunki')

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<a href="{{ route('gallery.bolivia') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-bol12.jpg') }}" alt="sm-bolivia12" class="img-thumbnail img-fluid"></div>
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
