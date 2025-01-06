<!-- resources/views/gallery/cambodia.blade.php -->
@extends('layouts.gallery')

@section('title', 'Galeria: Kambodża')
@section('head-scripts')
    @vite('resources/css/hide.css')
    <link rel="stylesheet" href="{{ asset('css/spotlight.min.css') }}">
    <script src="{{ asset('js/spotlight.min.js') }}"></script>
@endsection

@section('gallery-header')
	<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
		<img src="{{ asset('img/flags/f_cam.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of Cambodia">
		<h5 class="menu-country mb-0 mx-4"> Kambodża </h5>
		<img src="{{ asset('img/flags/e_cam.png') }}" width="auto" height="40" class="me-1 my-1" alt="Emblem of Cambodia">
	</div>
@endsection

@section('gallery-content')
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb1.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb1.jpg') }}" alt="sm-cambodia1" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb2.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb2.jpg') }}" alt="sm-cambodia2" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb3.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb3.jpg') }}" alt="sm-cambodia3" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb4.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb4.jpg') }}" alt="sm-cambodia4" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb5.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb5.jpg') }}" alt="sm-cambodia5" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb6.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb6.jpg') }}" alt="sm-cambodia6" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb7.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb7.jpg') }}" alt="sm-cambodia7" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb8.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb8.jpg') }}" alt="sm-cambodia8" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb9.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb9.jpg') }}" alt="sm-cambodia9" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb10.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb10.jpg') }}" alt="sm-cambodia10" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb11.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb11.jpg') }}" alt="sm-cambodia11" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a class="spotlight" href="{{ asset('img/trip/camb12.jpg') }}">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-camb12.jpg') }}" alt="sm-cambodia12" class="img-thumbnail"></div>
		</a>
	</div>
	<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
@endsection