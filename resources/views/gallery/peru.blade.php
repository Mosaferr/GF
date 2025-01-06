<!-- resources/views/gallery/peru.blade.php -->
@extends('layouts.gallery')

@section('title', 'Galeria: Peru')
@section('head-scripts')
    @vite('resources/css/hide.css')
    <link rel="stylesheet" href="{{ asset('css/spotlight.min.css') }}">
    <script src="{{ asset('js/spotlight.min.js') }}"></script>
@endsection

@section('gallery-header')
	<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
		<img src="{{ asset('img/flags/f_peru.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of Peru">
		<h5 class="menu-country mb-0 mx-4"> Peru </h5>
		<img src="{{ asset('img/flags/e_peru.png') }}" width="auto" height="45" class="me-1 my-1" alt="Emblem of Peru">
	</div>
@endsection

@section('gallery-content')
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru1.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru1.jpg') }}" alt="sm-peru" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru2.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru2.jpg') }}" alt="sm-peru2" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru3.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru3.jpg') }}" alt="sm-peru3" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru4.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru4.jpg') }}" alt="sm-peru4" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru5.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru5.jpg') }}" alt="sm-peru5" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru6.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru6.jpg') }}" alt="sm-peru6" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru7.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru7.jpg') }}" alt="sm-peru7" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru8.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru8.jpg') }}" alt="sm-peru8" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru9.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru9.jpg') }}" alt="sm-peru9" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru10.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru10.jpg') }}" alt="sm-peru10" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru11.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru11.jpg') }}" alt="sm-peru11" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/peru12.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-peru12.jpg') }}" alt="sm-peru12" class="img-thumbnail"></div>
		</a>
	</div>
	<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
@endsection