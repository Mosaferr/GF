<!-- resources/views/gallery/indonesia.blade.php -->
@extends('layouts.app')

@section('title', 'Galeria: Indonezja')
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
							<img src="{{ asset('img/flags/f_indo.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of Indonesia">
							<h5 class="menu-country mb-0 mx-4"> Indonezja </h5>
							<img src="{{ asset('img/flags/e_indo.png') }}" width="auto" height="40" class="me-1 my-1" alt="Emblem of Indonesia">
						</div>
					</div>
				</div>

				<div class="row g-4 mx-sm-3 mx-md-4 lg-md-0">
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo1.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo1.jpg') }}" alt="sm-indonesia1" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo2.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo2.jpg') }}" alt="sm-indonesia2" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo3.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo3.jpg') }}" alt="sm-indonesia3" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo4.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo4.jpg') }}" alt="sm-indonesia4" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo5.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo5.jpg') }}" alt="sm-indonesia5" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo6.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo6.jpg') }}" alt="sm-indonesia6" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo7.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo7.jpg') }}" alt="sm-indonesia7" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo8.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo8.jpg') }}" alt="sm-indonesia8" class="img-thumbnail"></div>
						</a>
					</div>

                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo9.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo9.jpg') }}" alt="sm-indonesia9" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo10.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo10.jpg') }}" alt="sm-indonesia10" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo11.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo11.jpg') }}" alt="sm-indonesia11" class="img-thumbnail"></div>
						</a>
					</div>
                    <div class="col-sm-6 col-md-4 col-lg-3">
						<a href="{{ asset('img/trip/indo12.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
							<div class="image shadow"><img src="{{ asset('img/trip/sm-indo12.jpg') }}" alt="sm-indonesia12" class="img-thumbnail"></div>
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