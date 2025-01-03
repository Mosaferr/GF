<!-- resources/views/gallery/china.blade.php -->
@extends('layouts.gallery')

@section('title', 'Galeria: Chiny')
@section('head-scripts')
    <style>
        .carousel-inner, .container, .row, .image, .card .footer {visibility: hidden;}
    </style>
@endsection

@section('gallery-header')
	<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
		<img src="{{ asset('img/flags/f_chin.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of China">
		<h5 class="menu-country mb-0 mx-4"> Chiny </h5>
		<img src="{{ asset('img/flags/e_chin.png') }}" width="auto" height="40" class="me-1 my-1" alt="Emblem of China">
	</div>
@endsection

@section('gallery-content')
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china1.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china1.jpg') }}" alt="sm-china1" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china2.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china2.jpg') }}" alt="sm-china2" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china3.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china3.jpg') }}" alt="sm-china3" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china4.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china4.jpg') }}" alt="sm-china4" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china5.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china5.jpg') }}" alt="sm-china5" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china6.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china6.jpg') }}" alt="sm-china6" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china7.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china7.jpg') }}" alt="sm-china7" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china8.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china8.jpg') }}" alt="sm-china8" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china9.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china9.jpg') }}" alt="sm-china9" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china10.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china10.jpg') }}" alt="sm-china10" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china11.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china11.jpg') }}" alt="sm-china11" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/china12.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-china12.jpg') }}" alt="sm-china12" class="img-thumbnail"></div>
		</a>
	</div>
	<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
@endsection