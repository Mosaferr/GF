<!-- resources/views/gallery/index.blade.php -->
@extends('layouts.app')

@section('title', 'Galeria zdjęć')
@section('head-scripts')
    @vite('resources/css/hide.css')
@endsection

@section('content')
	<main class="custom-margin-top">
		<section id=gallery class="gallery-block grid-gallery"">
			<div class="container" style="max-width: 1200px;">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="">Galeria zdjęć</h2>
					</div>

					<div class="menu-text col-md-12 text-center">
						<div class="d-grid d-md-block mx-auto my-5">
							<a href="{{ route('gallery.argentina') }}" class="btn btn-outline-secondary shadow mx-1">Argentyna</a>
							<a href="{{ route('gallery.bolivia') }}" class="btn btn-outline-secondary shadow mx-1">Boliwia</a>
							<a href="{{ route('gallery.chile') }}" class="btn btn-outline-secondary shadow mx-1">Chile</a>
							<a href="{{ route('gallery.china') }}" class="btn btn-outline-secondary shadow mx-1">Chiny</a>
							<a href="{{ route('gallery.indonesia') }}" class="btn btn-outline-secondary shadow mx-1">Indonezja</a>
							<a href="{{ route('gallery.cambodia') }}" class="btn btn-outline-secondary shadow mx-1">Kambodża</a>
							<a href="{{ route('gallery.peru') }}" class="btn btn-outline-secondary shadow mx-1">Peru</a>
							<a href="{{ route('gallery.sri_lanka') }}" class="btn btn-outline-secondary shadow mx-1">Sri Lanka</a>
							<a href="{{ route('gallery.tibet') }}" class="btn btn-outline-secondary shadow mx-1">Tybet</a>
						</div>
					</div>
				</div>

				<div class="gallery row g-4 mt-1 mx-sm-3 mx-md-4 lg-md-0">
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.argentina') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-arg10.jpg') }}" class="img-thumbnail ">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Argentyna</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.bolivia') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-bol1.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Boliwia</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.chile') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-chile7.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Chile</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.china') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-china5.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Chiny</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.indonesia') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-indo6.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Indonezja</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.cambodia') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-camb8.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Kambodża</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.peru') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-peru8.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Peru</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.sri_lanka') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-sri2.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Sri Lanka</div>
									</div>
								</div>
							</div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
						<a href="{{ route('gallery.tibet') }}">
							<div class="gal-image shadow position-relative overflow-hidden">
								<img src="{{ asset('img/trip/sm-tibet3.jpg') }}" class="img-thumbnail">
								<div class="overlay d-flex justify-content-center align-items-center">
									<div class="text-box">
										<div class="text">Tybet</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection
