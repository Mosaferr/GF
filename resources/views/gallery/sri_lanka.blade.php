<!-- resources/views/gallery/sri_lanka.blade.php -->
@extends('layouts.app')

@section('title', 'Galeria: Srli Lanka')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('content')
	<main class="custom-margin-top">
		<section id=gallery class="gallery-block grid-gallery"">
			<div class="container" style="max-width: 1200px;">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="gal-topic">
							<a href="/gallery.html" class="text-decoration-none text-reset">Galeria zdjęć</a>
						</h2>

						<div class="menu-text d-grid d-md-block mx-auto my-5">
							<a href="g-argentina.html" class="btn btn-outline-dark btn-sm mx-1">Argentyna</a>
							<a href="g-bolivia.html" class="btn btn-outline-dark btn-sm mx-1">Boliwia</a>
							<a href="g-chile.html" class="btn btn-outline-dark btn-sm mx-1">Chile</a>
							<a href="g-china.html" class="btn btn-outline-dark btn-sm mx-1">Chiny</a>
							<a href="g-indonesia.html" class="btn btn-outline-dark btn-sm mx-1">Indonezja</a>
							<a href="g-cambodia.html" class="btn btn-outline-dark btn-sm mx-1">Kambodża</a>
							<a href="g-peru.html" class="btn btn-outline-dark btn-sm mx-1">Peru</a>
							<a href="g-sri_lanka.html" class="btn btn-outline-dark btn-sm mx-1">Sri Lanka</a>
							<a href="g-tibet.html" class="btn btn-outline-dark btn-sm mx-1">Tybet</a>
						</div>

						<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
							<img src="{{ asset('img/flags/f_sri.png') }}" width="auto" height="35" class="me-1 my-1 shadow" alt="Flag of Sri Lanka">
							<h5 class="menu-country mb-0 mx-4"> Sri Lanka </h5>
							<img src="{{ asset('img/flags/e_sri.png') }}" width="auto" height="50" class="me-1 my-1" alt="Emblem of Sri Lanka">
						</div>
					</div>
				</div>

				<div class="row g-4 mx-sm-3 mx-md-4 lg-md-0">
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri1.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri1.jpg') }}" alt="sm-sri_lanka1" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri2.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri2.jpg') }}" alt="sm-sri_lanka2" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri3.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri3.jpg') }}" alt="sm-sri_lanka3" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri4.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri4.jpg') }}" alt="sm-sri_lanka4" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri5.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri5.jpg') }}" alt="sm-sri_lanka5" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri6.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri6.jpg') }}" alt="sm-sri_lanka6" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri7.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri7.jpg') }}" alt="sm-sri_lanka7" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri8.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri8.jpg') }}" alt="sm-sri_lanka8" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri9.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri9.jpg') }}" alt="sm-sri_lanka9" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri10.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri10.jpg') }}" alt="sm-sri_lanka910 class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri11.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri11.jpg') }}" alt="sm-sri_lanka11" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/sri12.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-sri12.jpg') }}" alt="sm-sri_lanka12" class="img-thumbnail"></div>
						</a>
					</div>
					<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
				</div>
			</div>
		</section>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
    <script src="{{ asset('js/lightbox.bundle.min.js') }}"></script>
@endsection