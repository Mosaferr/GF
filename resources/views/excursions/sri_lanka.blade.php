<!-- resources/views/excursions/sri_lanka.blade.php -->
@extends('layouts.app')
@section('title', 'Sri Lanka')

@section('content')
	<main class="custom-margin-top">
		<div class="container"   style="max-width: 1100px;">
            <x-tabs :flags="['Sri_Lanka-xs.gif']" title="Sri Lanka"/>

			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="program-tab-pane" role="tabpanel" aria-labelledby="program-tab" tabindex="0">
					<div class="row ms-2 g-5">
						<div class="col-lg-7 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3>Program</h3></p>
							<p><strong>Dzień 1.</strong><br>Spotkanie na lotnisku w Warszawie, przelot do Kolombo z międzylądowaniem w jednym z azjatyckich portów lotniczych.</p>
							<p><strong>Dzień 2.</strong><br>Lądowanie i przejazd pociągiem do Kolombo a następnie do Anuradhapury. Przejazd do hotelu, relaks, kolacja i nocleg.</p>
							<p><strong>Dzień 3.</strong><br>Rano zwiedzanie starożytnej stolicy: Anuradhapury, wpisanej na liste światowego dziedzictwa UNESCO. Miasto wciąż stanowi ważne centrum buddyzmu, do dziś rośnie tutaj szczep świętego drzewa Bodhi, pod którym Budda według tradycji osiągnął oświecenie.</p>
							<p><strong>Dzień 4.</strong><br>Zwiedzanie pobliskiego Mihinthale, kolebki buddyzmu na Cejlonie. Potem przejazd do Polonaruwy i nocleg.</p>
							<p><strong>Dzień 5.</strong><br>Wizyta w starożytnym mieście Polonnaruwa, drugiej stolicy Sri Lanki (wpisana na listę dziedzictwa UNESCO).</p>
							<p><strong>Dzień 6.</strong><br>Przejazd do Dambulli.  Zwiedzanie kompleksu świątynnnego w jaskiniach Dambulli datowanego na II wiek p.n.e. i wpisanego na listę dziedzictwa UNESCO.</p>
							<p><strong>Dzień 7.</strong><br>Rano wejście na niezwykłą twierdzę Sigiriya, zwaną też fortecą w chmurach, z V w n.e. Następnie przejazd do Kandy, górskiej stolicy Sri Lanki, ostatniego miejsca oporu przed okupacją brytyjską.</p>
							<p><strong>Dzień 8.</strong><br>Zwiedzanie Świątyni Świętego Zęba Buddy – najważniejszego miejsca pielgrzymkowego tutejszych buddystów. Po południu spacer po okolicy Kandy.</p>
							<p><strong>Dzień 9.</strong><br>Malownicza podróż pociągiem do Elli przez wzgórza i plantacje herbaty. Po południu wycieczka na szczyt Little Adams Peak i monumentalny most kolejowy.</p>
							<p><strong>Dzień 10.</strong><br>Wycieczka do wodospadu Ravany Falls i Ella Cave. Następnie przejazd do Udawalawa.</p>
							<p><strong>Dzień 11.</strong><br>Niezwykłe safari jeepami do Parku Narodowego Udawalawa, gdzie oprócz innych zwierząt, zobaczymy żyjące na wolności dzikie słonie. Później przejazd do Galle.</p>
							<p><strong>Dzień 12.</strong><br>Dla chętnych spacer po dawnym holenderskim forcie Galle z 1663 r.(wpisanym na listę UNESCO), zakończony zachodem słońca. Alternatywnie, plażowanie na pobliskiej Unawatuna Beach lub zakupy w mieście.</p>
							<p><strong>Dzień 13.</strong><br>Przejazd i zwiedzanie najciekawszych miejsc w Kolombo. Następnie przejazd do na lotnisko lub do Negombo.</p>
							<p><strong>Dzień 14.</strong><br>Nocny lot do Polski. Jeśli lot będzie w ciągu dnia, wcześniej odwiedzimy Negombo a potem udamy się na lotnisko.</p>
							<p><strong>Dzień 15.</strong><br>Przylot do Warszawy, pożegnanie na lotnisku Chopina.</p>

							<div class="arrows my-4 text-center fs-3">
								<a href="#top"><i class="bi bi-arrow-up-circle"></i></a>
							</div>

							<div class="d-flex justify-content-center">
								<a href="{{ route('register') }}" class="btn btn-warning w-100 shadow">Wyślij zgłoszenie</a>
							</div>
						</div>

						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-sri14.jpg') }}" alt="sm-sri_lanka14" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-sri2.jpg') }}" alt="sm-sri_lanka2" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-sri4.jpg') }}" alt="sm-sri_lanka4" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-sri5.jpg') }}" alt="sm-sri_lanka5" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-sri6.jpg') }}" alt="sm-sri_lanka6" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-sri13.jpg') }}" alt="sm-sri_lanka13" class="img-thumbnail img-fluid"></div>
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
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-sri11.jpg') }}" alt="sm-sri_lanka11" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
					<div class="col-12">
						<p><h5>Czas podróży: 15 dni</h5></p>
						<p><b>Cena zawiera:</b> ubezpieczenie KL 40.000 EUR i NNW 15.000 PLN, transport: pociągi, autobusy, ryksze, taksówki na trasie wycieczki, noclegi, koszty organizacyjne w Polsce i na miejscu wyprawy, opiekę pilota.</p>
						<p><b>Cena nie zawiera:</b> przelotu Warszawa - Kolombo - Warszawa (ok. 3500 PLN), wizy lankijskiej (pomagamy w uzyskaniu e-visy), kosztów wyżywienia (ok. 15 USD dziennie), biletów wstępu, zajęć fakultatywnych, napiwków.</p>
					</div>
				</div>

				<div class="tab-pane fade" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3> Praktyczne informacje</h3></p>
							<ul>
								<li>Paszport musi być ważny minimum 6 miesięcy od daty wjazdu na Sri Lankę i musi mieć 2 wolne strony. </li>
								<li>Wszyscy podróżujący na Sri Lankę w celach turystycznych lub biznesowych muszą posiadać e-wizę umożliwiającą wjazd na Sri Lankę. Aplikacja o e-wizę możliwa jest przez stronę internetową www.srilankaevisa.lk.</li>
								<li>Szczepienia nie są obowiązkowe acz zalecane (żółtaczka A i B, błonica, tężec, dur brzuszny).</li>
								<li>Brak wymogów wjazdowych związanych z COVID-19.</li>
								<li>Przed dokonaniem zgłoszenia na wyjazd zachęcamy do zapoznania się z wiadomościami na stronie Ministerstwa Spraw Zagranicznych RP - <a href="https://www.gov.pl/web/dyplomacja/informacje-dla-podrozujacych">Informacje dla podróżujących.</a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-sri15.jpg') }}" alt="sm-sri_lanka15" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="registration-tab-pane" role="tabpanel" aria-labelledby="registration-tab" tabindex="0">
					<div class="row g-5">
						@include('components.warunki')
						@include('components.warunki')

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<a href="{{ route('gallery.sri_lanka') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-sri9.jpg') }}" alt="sm-sri_lanka9" class="img-thumbnail img-fluid"></div>
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
