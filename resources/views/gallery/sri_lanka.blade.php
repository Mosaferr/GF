<!-- resources/views/gallery/sri_lanka.blade.php -->
@extends('layouts.gallery')

@section('title', 'Galeria: Srli Lanka')
@section('head-scripts')
    @vite('resources/css/hide.css')
    <link rel="stylesheet" href="{{ asset('css/spotlight.min.css') }}">
    <script src="{{ asset('js/spotlight.min.js') }}"></script>
@endsection

@section('gallery-header')
	<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
		<img src="{{ asset('img/flags/f_sri.png') }}" width="auto" height="35" class="me-1 my-1 shadow" alt="Flag of Sri Lanka">
		<h5 class="menu-country mb-0 mx-4"> Sri Lanka </h5>
		<img src="{{ asset('img/flags/e_sri.png') }}" width="auto" height="50" class="me-1 my-1" alt="Emblem of Sri Lanka">
	</div>
@endsection

@section('gallery-content')
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri1.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri1.jpg') }}" alt="sm-sri_lanka1" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri2.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri2.jpg') }}" alt="sm-sri_lanka2" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri3.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri3.jpg') }}" alt="sm-sri_lanka3" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri4.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri4.jpg') }}" alt="sm-sri_lanka4" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri5.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri5.jpg') }}" alt="sm-sri_lanka5" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri6.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri6.jpg') }}" alt="sm-sri_lanka6" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri7.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri7.jpg') }}" alt="sm-sri_lanka7" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri8.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri8.jpg') }}" alt="sm-sri_lanka8" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri9.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri9.jpg') }}" alt="sm-sri_lanka9" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri10.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri10.jpg') }}" alt="sm-sri_lanka910 class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri11.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri11.jpg') }}" alt="sm-sri_lanka11" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/sri12.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-sri12.jpg') }}" alt="sm-sri_lanka12" class="img-thumbnail"></div>
		</a>
	</div>
	<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
@endsection