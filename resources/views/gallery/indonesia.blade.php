<!-- resources/views/gallery/indonesia.blade.php -->
@extends('layouts.gallery')

@section('title', 'Galeria: Indonezja')
@section('head-scripts')
    <style>
        .carousel-inner, .container, .row, .image, .card .footer {visibility: hidden;}
    </style>
    <link rel="stylesheet" href="{{ asset('css/spotlight.min.css') }}">
    <script src="{{ asset('js/spotlight.min.js') }}"></script>
@endsection

@section('gallery-header')
	<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
		<img src="{{ asset('img/flags/f_indo.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of Indonesia">
		<h5 class="menu-country mb-0 mx-4"> Indonezja </h5>
		<img src="{{ asset('img/flags/e_indo.png') }}" width="auto" height="40" class="me-1 my-1" alt="Emblem of Indonesia">
	</div>
@endsection

@section('gallery-content')
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo1.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo1.jpg') }}" alt="sm-indonesia1" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo2.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo2.jpg') }}" alt="sm-indonesia2" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo3.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo3.jpg') }}" alt="sm-indonesia3" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo4.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo4.jpg') }}" alt="sm-indonesia4" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo5.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo5.jpg') }}" alt="sm-indonesia5" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo6.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo6.jpg') }}" alt="sm-indonesia6" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo7.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo7.jpg') }}" alt="sm-indonesia7" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo8.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo8.jpg') }}" alt="sm-indonesia8" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo9.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo9.jpg') }}" alt="sm-indonesia9" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo10.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo10.jpg') }}" alt="sm-indonesia10" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo11.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo11.jpg') }}" alt="sm-indonesia11" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/indo12.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-indo12.jpg') }}" alt="sm-indonesia12" class="img-thumbnail"></div>
		</a>
	</div>
	<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
@endsection