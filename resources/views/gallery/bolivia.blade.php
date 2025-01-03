<!-- resources/views/gallery/bolivia.blade.php -->
@extends('layouts.app')

@section('title', 'Galeria: Boliwia')
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
							<img src="{{ asset('img/flags/f_bol.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of Bolivia">
							<h5 class="menu-country mb-0 mx-4"> Boliwia </h5>
							<img src="{{ asset('img/flags/e_bol.png') }}" width="auto" height="40" class="me-1 my-1" alt="Emblem of Bolivia">
						</div>
					</div>
				</div>

				<div class="row g-4 mx-sm-3 mx-md-4 lg-md-0">
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol1.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol1.jpg') }}" alt="sm-bolivia1" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol2.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol2.jpg') }}" alt="sm-bolivia2" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol3.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol3.jpg') }}" alt="sm-bolivia3" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol4.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol4.jpg') }}" alt="sm-bolivia4" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol5.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol5.jpg') }}" alt="sm-bolivia5" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol6.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol6.jpg') }}" alt="sm-bolivia6" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol7.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol7.jpg') }}" alt="sm-bolivia7" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol8.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol8.jpg') }}" alt="sm-bolivia8" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol9.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol9.jpg') }}" alt="sm-bolivia9" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol10.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol10.jpg') }}" alt="sm-bolivia10" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol11.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol11.jpg') }}" alt="sm-bolivia11" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/bol12.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-bol12.jpg') }}" alt="sm-bolivia12" class="img-thumbnail"></div>
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