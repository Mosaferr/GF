<!-- resources/views/excursions/indonesia.blade.php -->
@extends('layouts.app')
@section('title', 'Indonezja')

@section('content')
	<main class="custom-margin-top">
		<div class="container"   style="max-width: 1100px;">
            <x-tabs :flags="['Indonesia-xs.gif']" title="Indonezja"/>

			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="program-tab-pane" role="tabpanel" aria-labelledby="program-tab" tabindex="0">
					<div class="row ms-2 g-5">
						<div class="col-lg-7 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3>Program</h3></p>
							<p><strong>Dzień 1.</strong><br>Spotkanie na lotnisku w Warszawie, przelot do Dżakarty z międzylądowaniem w jednym z azjatyckich portów lotniczych.</p>
							<p><strong>Dzień 2.</strong><br>Przylot do Dżakarty w godzinach popołudniowych, nocleg w hotelu koło lotniska.</p>
							<p><strong>Dzień 3.</strong><br>Przelot do Yogyakarty. Zwiedzanie miasta: Jalan Malioboro, pałac sułtana (Keraton), Taman Sari), wieczorem dla chętnych Wayan Kulit - indonezyjski teatr cieni.</p>
							<p><strong>Dzień 4.</strong><br>Rano wyjazd i wizyta w największej i jednej z najwspanialszych świątyń buddyjskich w całej Azji – Borobudur. Zwiedzanie kolejnych rzeźbionych tarasów świątyni, wzniesionej na przełomie VIII i IX w. Następnie przejazd do kompleksu świątynnego Prambanan. Zbudowane w IX w. świątynie są najpiękniejszymi przykładami sakralnej architektury hinduistycznej poza Indiami. Po południu powrót do Jogji. </p>
							<p><strong>Dzień 5.</strong><br>Całodzienny przejazd do Cemoro Lawang w Parku Narodowym Bromo. Nocleg tamże, ale krótki.</p>
							<p><strong>Dzień 6.</strong><br>W środku nocy wyjazd jeepami do punktu widokowego, skąd będziemy podziwiać wschód słońca i zapierający dech w piersiach widok na stożki wulkanów Bromo i Semeru. Potem wejście na sam wulkan Bromo. Powrót do hotelu i przejazd nad wodospad Coban Sewu, ukryty klejnot Jawy. Nocleg w pobliskim Pronojiwo</p>
							<p><strong>Dzień 7.</strong><br>Całodzienny przejazd do Banyuwangi.</p>
							<p><strong>Dzień 8.</strong><br>Przed świtem przejazd i dla chętnych wejście na wulkan Kawah Ijen, gdzie mieści się kopalnia siarki. Prosto stamtąd przejazd do portu Ketapang, prom na Bali i przejazd do Loviny.</p>
							<p><strong>Dzień 9.</strong><br>Rano dla chętnych wycieczka łodzią w poszukiwaniu delfinów. Potem śniadanie i przejazd do Ubud. Po drodze odwiedzimy świątynię buddyjską - Bhrama Vihara Arama i świątynię hinduską nad jeziorem - Pura Ulun Danau Bratan.</p>
							<p><strong>Dzień 10-11.</strong><br>Zanurzamy się w jedynej w swoim rodzaju kulturze balijskiej, zwiedzamy Bali. Do wyboru: świątynie Pura Besakih, Tirta Empul, Gunung Kawi, pola ryżowe w Tegalang, punkt widokowy w Penelokan itp. W Ubud spacer po Małpim Gaju a wieczorem dla chętnych Kecak, spektakl balijskiego tańca. Noclegi w Ubud.</p>
							<p><strong>Dzień 12.</strong><br>Przejazd do Kuty, po drodze odwiedzimy dwie świątynie balijskie Tanah Ayun i Tanah Lot, położoną na małej, skalistej wysepce tuż przy wybrzeżu.</p>
							<p><strong>Dzień 13.</strong><br>Wolny dzień w Kucie, plażing, ostatnie zakupy, masaże itd. Wieczorem przejazd na lotnisko i wylot do Polski.</p>
							<p><strong>Dzień 14.</strong><br>Przylot na lotnisko Okęcie, pożegnanie z towarzyszami podróży.</p>

							<div class="arrows my-4 text-center fs-3">
								<a href="#top"><i class="bi bi-arrow-up-circle"></i></a>
							</div>

							<div class="d-flex justify-content-center">
								<a href="{{ route('register') }}" class="btn btn-warning w-100 shadow">Wyślij zgłoszenie</a>
							</div>
						</div>

						<div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-indo1.jpg') }}" alt="sm-indonesia1" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-indo2.jpg') }}" alt="sm-indonesia2" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-indo3.jpg') }}" alt="sm-indonesia3" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-indo6.jpg') }}" alt="sm-indonesia6" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-indo10.jpg') }}" alt="sm-indonesia10" class="img-thumbnail img-fluid"></div>
							</a>
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow"><img src="{{ asset('img/trip/sm-indo12.jpg') }}" alt="sm-indonesia12" class="img-thumbnail img-fluid"></div>
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
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-indo14.jpg') }}" alt="sm-indonesia14" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
					<div class="col-12">
						<p><h5>Czas podróży: 14 dni</h5></p>
						<p><b>Cena zawiera:</b> przelot Dżakarta - Yogyakarta ubezpieczenie KL 40.000 EUR i NNW 15.000 PLN, transport: autobusy, taksówki na trasie wyprawy, noclegi, koszty organizacyjne w Polsce i na miejscu wyprawy, opiekę pilota.</p>
						<p><b>Cena nie zawiera:</b> przelotu Warszawa - Dżakarta - Warszawa (ok. 4500 - 5500 PLN), kosztów wyżywienia (ok. 15 USD dziennie), zajęć fakultatywnych, biletów wstępu, napiwków.</p>
					</div>
				</div>

				<div class="tab-pane fade" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
					<div class="row g-5">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<p><h3> Praktyczne informacje</h3></p>
							<ul>
								<li>Paszport musi być ważny minimum 6 miesięcy od daty wjazdu do Indonezji. </li>
								<li>Wizę turystyczną można uzyskać między innymi na lotnisku Soekarno Hatta w Dżakarcie.</li>
								<li>Bali - od 14.02.2024 roku władze Bali wprowadziły obowiązkowy podatek turystyczny dla osób przybywających na Bali w wysokości 150 000 rupii indonezyjskich. Od osób przybywających z Jawy opłata zazwyczaj nie jest pobierana.</li>
								<li>Indonezja nie wymaga szczepień.</li>
								<li>Brak wymogów wjazdowych związanych z COVID-19.</li>
								<li>Przed dokonaniem zgłoszenia na wyjazd zachęcamy do zapoznania się z wiadomościami na stronie Ministerstwa Spraw Zagranicznych RP - <a href="https://www.gov.pl/web/dyplomacja/informacje-dla-podrozujacych">Informacje dla podróżujących.</a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-between">
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-indo13.jpg') }}" alt="sm-indonesia13" class="img-thumbnail img-fluid"></div>
							</a>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="registration-tab-pane" role="tabpanel" aria-labelledby="registration-tab" tabindex="0">
					<div class="row g-5">
						@include('components.warunki')

						<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
							<a href="{{ route('gallery.indonesia') }}">
								<div class="image shadow  mt-5"><img src="{{ asset('img/trip/sm-indo15.jpg') }}" alt="sm-indonesia15" class="img-thumbnail img-fluid"></div>
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
