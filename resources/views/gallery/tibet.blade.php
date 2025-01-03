<!-- resources/views/gallery/tibet.blade.php -->
@extends('layouts.app')

@section('title', 'Galeria: Tybet')
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
							<img src="{{ asset('img/flags/f_tib.png') }}" width="auto" height="35" class="me-1 my-1 shadow" alt="Flag of Tibet">
							<h5 class="menu-country mb-0 mx-4"> Tybet </h5>
							<img src="{{ asset('img/flags/e_tib.png') }}" width="auto" height="45" class="me-1 my-1" alt="Emblem of Tibet">
						</div>
					</div>
				</div>

				<div class="row g-4 mx-sm-3 mx-md-4 lg-md-0">
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet1.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet1.jpg') }}" alt="sm-tibet1" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet2.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet2.jpg') }}" alt="sm-tibet2" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet3.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet3.jpg') }}" alt="sm-tibet3" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet4.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet4.jpg') }}" alt="sm-tibet4" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet5.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet5.jpg') }}" alt="sm-tibet5" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet6.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet6.jpg') }}" alt="sm-tibet6" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet7.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet7.jpg') }}" alt="sm-tibet7" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet8.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet8.jpg') }}" alt="sm-tibet8" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet9.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet9.jpg') }}" alt="sm-tibet9" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet10.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet10.jpg') }}" alt="sm-tibet10" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet11.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet11.jpg') }}" alt="sm-tibet11" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/tibet12.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-tibet12.jpg') }}" alt="sm-tibet12" class="img-thumbnail"></div>
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