<!-- resources/views/XXXXX.blade.php -->
@extends('layouts.app')

@section('title', 'XXXXX')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1200px;">
			<div class="row">
				<div class="col-md-12 text-center pb-5">
					<h2 class="">Nasze wyprawy</h2>
					<h5>Podróżować jest bosko...</h5>
				</div>
			</div>

			<div class="row g-5 mx-sm-3 mx-md-4 lg-md-0">
				<div class="col-sm-6 col-md-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-argetina.html">
								<img src="{{ asset('img/main/trip-arg.jpg') }}" class="img-fluid"/>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Argentyna i Chile</h5>
							<p class="card-text">Boskie Buenos, Północna Patagonia, Valparaiso, Aconcagua. I wodospady Iguazu. I inne atrakcje...</p>
							<div class="text-center">
								<a href="exc-argetina.html" class="btn btn-success btn-sm shadow">Zobacz program</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-indonesia.html">
								<img src="{{ asset('img/main/trip-indo.jpg') }}" class="img-fluid"/>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Indonezja</h5>
							<p class="card-text">Starożytne świątynie, wyjątkowe wulkany, jedyna w swoim rodzaju kultura i religia Bali. I może delfiny...</p>
							<div class="text-center">
								<a href="exc-indonesia.html" class="btn btn-success btn-sm shadow">Zobacz program</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-cambodia.html">
								<img src="{{ asset('img/main/trip-camb.jpg') }}" class="img-fluid"/>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Kambodża</h5>
							<p class="card-text">Z Bangkoku do Batambang i łodzią do Siem Reap. Angkor Wat. Phnom Penh i interior. I plaża...</p>
							<div class="text-center">
								<a href="exc-cambodia.html" class="btn btn-success btn-sm shadow">Zobacz program</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-peru.html">
								<img src="{{ asset('img/main/trip-peru.jpg') }}" class="img-fluid"/>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Peru i Boliwia</h5>
							<p class="card-text">Lima, Cusco, La Paz, pływające wioski na jeziorze Titicaca, dawne stolice Inków. I Machu Picchu...</p>
							<div class="text-center">
								<a href="exc-peru.html" class="btn btn-success btn-sm shadow">Zobacz program</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-sri_lanka.html">
								<img src="{{ asset('img/main/trip-sri.jpg') }}" class="img-fluid"/>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Sri Lanka</h5>
							<p class="card-text">Pradawne stolice, wyjątkowe świątnie i niesamowita przyroda. Herbaciane wzgórza i dzikie słonie...</p>
							<div class="text-center">
								<a href="exc-sri_lanka.html" class="btn btn-success btn-sm shadow">Zobacz program</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="card shadow">
						<div class="bg-image">
							<a href="exc-tibet.html">
								<img src="{{ asset('img/main/trip-tibet.jpg') }}" class="img-fluid"/>
							</a>
						</div>
						<div class="card-body">
							<h5 class="card-title">Tybet, Chiny</h5>
							<p class="card-text">Chińskie pandy i Wielki Mur. Tybetańska kultura, wizyta w Pałacu Dalajlamy i pod Mount Everestem... </p>
							<div class="text-center">
								<a href="exc-tibet.html" class="btn btn-success btn-sm shadow">Zobacz program</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection