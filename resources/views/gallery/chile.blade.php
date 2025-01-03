<!-- resources/views/gallery/chile.blade.php -->
@extends('layouts.gallery')

@section('title', 'Galeria: Chile')
@section('head-scripts')
    <style>
        .carousel-inner, .container, .row, .image, .card .footer {visibility: hidden;}
    </style>
@endsection

@section('gallery-header')
	<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
		<img src="{{ asset('img/flags/f_chile.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of Chile">
		<h5 class="menu-country mb-0 mx-4"> Chile </h5>
		<img src="{{ asset('img/flags/e_chile.png') }}" width="auto" height="45" class="me-1 my-1" alt="Emblem of Chile">
	</div>
@endsection

@section('gallery-content')
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile1.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile1.jpg') }}" alt="sm-chile1" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile2.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile2.jpg') }}" alt="sm-chile2" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile3.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile3.jpg') }}" alt="sm-chile3" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile4.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile4.jpg') }}" alt="sm-chile4" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile5.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile5.jpg') }}" alt="sm-chile5" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile6.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile6.jpg') }}" alt="sm-chile6" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile7.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile7.jpg') }}" alt="sm-chile7" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile8.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile8.jpg') }}" alt="sm-chile8" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile9.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile9.jpg') }}" alt="sm-chile9" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile10.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile10.jpg') }}" alt="sm-chile10" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile11.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile11.jpg') }}" alt="sm-chile11" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/chile12.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-chile12.jpg') }}" alt="sm-chile12" class="img-thumbnail"></div>
		</a>
	</div>
	<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
@endsection