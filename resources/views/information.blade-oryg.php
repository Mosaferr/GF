<!-- resources/views/information.blade.php -->
@extends('layouts.app')

@section('title', 'Informacje')
@section('head-scripts')
	@vite('resources/js/hidden.js')
{{-- <style>
        .carousel-inner, .container, .row, .image, .card .footer {visibility: hidden;}
    </style> --}}
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1200px;">

			<div class="row">
				<div class="col-md-12 text-center pb-5">
					<h2 class="">Informacje</h2>
					<h5>Jak podróżujemy</h5>
				</div>
			</div>

			<div class="row">

				<div class="table-term col-lg-8 col-md-6 col-sm-12 col-12 px-4">
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Tramping
								</button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-person-walking  float-start me-3 fs-1"></i>Wyprawy trampingowe różnią się znacznie od standardowych wycieczek objazdowych proponowanych przez biura podróży. Trampingi to często wyjazdy „budżetowe”. W trakcie podróży nocujemy w skromnych hotelach, korzystamy z miejscowej komunikacji i jemy w lokalnych restauracjach. Pozwala nam to głebiej poznać specyfikę danego kraju i daje dużą swobodę w odkrywaniu lokalnej kultury i obyczajów.</p>
									<p class="mb-0">Programy wyjazdów często oferują zajęcia fakultatywne, w których uczestnik bierze udział zgodnie z własnymi upodobaniami. Daje mu to możliwość organizowania sobie czasu wedle własnych potrzeb i możliwości finansowych.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Transport
								</button>
							</h2>
							<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-bus-front-fill float-start me-3 fs-2"></i>Na miejscu korzystamy głównie z lokalnych środków komunikacji, wykorzystując wszystkie dostępne formy transportu w danym kraju, z których korzysta również miejscowa ludność. Staramy się jednak omijać te skrajnie niekomfortowe. Wybierane przez nas środki transportu są uzależnione od specyfiki danego kraju, a także ogólnego planu podróży. W przypadku wynajmowanych busów, dżipów czy samochodów osobowych trzeba pamiętać o zwyczajowych napiwkach dla kierowców.</p>
									<p class="mb-0">W związku z intensywnymi programami wielu wypraw, często w grę wchodzą długie przejazdy dzienne i nocne. Trzeba mieć tego świadomość i dobrze przygotować się na trudy podróży.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Zwiedzanie
								</button>
							</h2>
							<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-bank2 float-start me-3 fs-2"></i>Zwiedzanie odbywa się pod opieką pilota, zgodnie z wyznaczoną przez niego trasą według programu wyprawy. Zmiany w programie są możliwe, jeżeli zgodę na zmiany wyrazi pilot oraz cała grupa, a ewentualne dodatkowe koszty zmian w programie pokrywają wszyscy uczestnicy.</p>
									<p>Uczestnicy muszą mieć świadomość, że w czasie wyprawy mogą nastąpić trudności (pertraktacje w sprawie noclegu, transportu, awarie pojazdów, gwałtowne zmiany pogody, klęski żywiołowe, niepokoje polityczne), które mogą prowadzić do zmiany programu wyprawy w związku z koniecznością dostosowania się do nowych warunków.</p>
									<p class="mb-0">Pilot nie jest przewodnikiem, ale chętnie dzieli się swoją wiedzą i doświadczeniem. W niektórych miejscach można wynająć za dodatkową opłatą lokalnego przewodnika. Warto zaopatrzyć się w przewodniki: Lonely Planet, Pascal itp.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
									Rezerwacje
								</button>
							</h2>
							<div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-file-earmark-text-fill float-start me-3 fs-2"></i>Rezerwacje są prowadzone do wyczerpania wolnych miejsc lub sporadycznie do 30 dni przed terminem wyjazdu. Termin ten jest uzależniony od kupna biletów lotniczych w optymalnej taryfie, dokonania niezbędnych rezerwacji i formalności wizowych.</p>
									<p>Rezerwacji można dokonać poprzez formularz dostępny na stronie internetowej. Osoba rezerwująca, po potwierdzeniu przez Biuro wolnego miejsca na dany wyjazd, wypełnia formularz Umowy-Zgłoszenia, która również dostepna jest na naszej stronie internetowej. Jeżeli w ciągu trzech dni formularz Umowy-Zgłoszenia nie zostanie wypełniony, rezerwacja zostaje anulowana</p>
									<p class="mb-0">W terminie trzech dni od zawarcia Umowy-Zgłoszenia uczestnik dokonuje wpłaty zaliczki w wysokości 30% ceny wyprawy w PLN na konto Biura. Po zaksięgowaniu wpłaconej kwoty zaliczki na koncie Biura osoba rezerwująca zostaje wpisana na listę uczestników. Kwoty w USD nie należy wpłacać, tylko przekazać pilotowi wycieczki pierwszego dnia wyprawy.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
									Noclegi
								</button>
							</h2>
							<div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-house-check-fill float-start me-3 fs-2"></i>W zależności od kraju, do którego podróżujemy, standardy noclegów mogą znacznie różnić się od siebie. Najczęściej są to pokoje dwu lub trzyosobowe z łazienkami, czasem, w uzasadnionym przypadku, skromne pokoje bez łazienek. Sporadycznie korzystamy z zamkniętych kompleksów hotelowych.</p>
									<p class="mb-0">Szczegóły dotyczące noclegów są omawiane przy konkretnej wyprawie, ponieważ nawet w trakcie jednego wyjazdu standardy noclegów mogą bardzo różnić się od siebie.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseTwo">
									Jedzenie
								</button>
							</h2>
							<div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-cup-hot-fill float-start me-3 fs-2"></i>W trakcie wyjazdów korzystamy wspólnie z lokalnych restauracji, jadłodajni, hoteli lub gościny u lokalnych mieszkańców. W ten sposób poznajemy regionalną, często dość egzotyczną kuchnię. Pilot często doradza w wyborze odpowiedniego miejsca posiłku.</p>
									<p class="mb-0">W celu uniknięcia ewentualnych zatruć pokarmowych, które mogą utrudniać podróż, najlepiej zachować zdrowy rozsądek i umiar. Zaleca się picie wody wyłącznie butelkowanej lub przegotowanej, unikanie napojów z lodem niewiadomego pochodzenia.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
									Bagaż
								</button>
							</h2>
							<div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-luggage-fill float-start me-3 fs-2"></i>Warunki przelotów rejsowymi liniami lotniczymi ograniczają ciężar bagażu głównego do około 20 kg, a bagażu podręcznego do około 5 kg. Trzeba pamiętać, że nadbagaż może skutkować koniecznością dopłaty do przelotu. Najlepiej więc ograniczyć wielkość bagażu (do 12-15 kg), tym bardziej że często przywozimy z podróży sporo pamiątek.</p>
									<p class="mb-0">Polecamy spakowanie rzeczy w duży plecak (60-80 litrów), zabezpieczony pokrowcem na czas podróży, oraz w mały plecak podręczy, który będziemy zabierać ze sobą na całodzienne zwiedzanie. Unikamy walizek, walizek na kółkach i dużych toreb, ponieważ są mało poręczne. Dobrze jest opisać i oznaczyć wszystkie sztuki bagażu. Przed wyprawą bagaż można ubezpieczyć samodzielnie przed kradzieżą lub zniszczeniem.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseTwo">
									Dokumenty
								</button>
							</h2>
							<div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-passport-fill float-start me-3 fs-1"></i>Ważne jest posiadanie kserokopii dokumentów potrzebnych do podróżowania: paszportu wraz z wizą, biletu lotniczego i ubezpieczenia. Warto również zrobić skany tych dokumentów i umieścić je w skrzynce mailowej. Dokumenty w trakcie wyjazdu muszą być dobrze ukryte, najlepiej w miejscu innym niż pieniądze.</p>
									<p>W przypadku zaginięcia paszportu uczestnik wyprawy może być zmuszony do pozostania w danym kraju. Procedury uzyskania paszportu tymczasowego mogą potrwać nawet kilka tygodni, zwłaszcza w krajach, gdzie nie ma polskiego konsulatu.</p>
									<p class="mb-0">Wszelkie koszty związane z uzyskaniem nowego dokumentu i przedłużonego pobytu ponosi uczestnik. Jeśli jest taka potrzeba, uczestnik pozostaje w kraju sam lub pod płatną opieką miejscowego kontrahenta, po podpisaniu stosownych dokumentów.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseThree">
									Zdrowie
								</button>
							</h2>
							<div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-heart-pulse-fill float-start me-3 fs-2"></i>Przed większością wyjazdów zaleca się szczepienia na żółtaczkę typu A i B, polio, błonicę, dur brzuszny. W każdym punkcie szczepień trzeba postarać się o tzw. Żółtą Książeczkę, gdzie należy wpisywać daty wszystkich szczepień (Międzynarodowe Świadectwo Szczepień – International Certificates of Vaccination).</p>
									<p>W niektórych krajach wymagana jest profilaktyka antymalaryczna. Należy wcześniej uzgodnić z lekarzem rodzaj stosowanych leków przeciwmalarycznych oraz sposób ich przyjmowania. Leki te pomagają, nie dają jednak 100% pewności odporności. Należy więc zaopatrzyć się dodatkowo w środki chroniące przed ukąszeniami komarów.</p>
									<p class="mb-0">Większość wypraw to wyjazdy do krajów, gdzie wymagane jest zachowanie maksymalnych środków ostrożności, szczególnie w zakresie troski o własne zdrowie. Uczestnicy muszą mieć świadomość czekających ich potencjalnych niebezpieczeństw mogących prowadzić do zachorowania lub zranienia, takich jak: siły natury, obcowanie z przyrodą, podróże różnymi środkami lokomocji itp.</p>
								</div>
							</div>
						</div>

						<div class="accordion-item">
							<h2 class="accordion-header">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTwo">
									Pieniądze
								</button>
							</h2>
							<div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<p><i class="bi bi-currency-exchange float-start me-3 fs-2"></i>Najlepiej zaopatrzyć się w odpowiednią ilość gotówki przed wyjazdem. Wskazane są dolary amerykańskie lub Euro. Zdarza się, że w krajach do których się udajemy nie ma banków albo bankomatów (a jeżeli są to tylko w miastach), co może powodować problemy w uzyskaniu dostępu do pieniędzy. W wielu krajach nie ma również możliwości korzystania z kart płatniczych lub są one bardzo ograniczone, a usługi bankowe są utrudnione i skomplikowane</p>
									<p>Pieniądze zawsze trzeba nosić przy sobie, najlepiej ukryte w kilku miejscach (w pasku, saszetce na pasku, torebce na szyi itp.). Dotyczy to szczególnie krajów Ameryki Południowej, gdzie zdarzają się częste kradzieże. W wielu krajach pieniądze stare lub zniszczone nie są akceptowane lub wymieniane po niższym kursie.</p>
									<p class="mb-0">Każdy uczestnik dysponuje samodzielnie funduszami przeznaczonymi na wyżywienie, bilety wstępów, fakultety i zakupy, powinien więc mieć świadomość własnych możliwości finansowych, tak aby pieniędzy wystarczyło do końca wyjazdu. Orientacyjne ceny są podane w programie wyprawy, trzeba jednak pamiętać, że mogą się one zmieniać.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-12 col-12 px-4">
					<div class="image shadow">
						<a href="{{ asset('img/main/info.jpg') }}" data-toggle="lightbox">
							<img src="{{ asset('img/main/info.jpg') }}" alt="Monk in Angkor" class="img-thumbnail shadow">
						</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="f-reservation.html" class="btn btn-warning w-100 mt-4 shadow">Wyślij zgłoszenie</a>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
    @vite('resources/js/lightbox.js')
@endsection