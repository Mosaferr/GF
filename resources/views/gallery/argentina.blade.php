<!-- resources/views/gallery/argentina.blade.php -->
@extends('layouts.gallery')

@section('title', 'Galeria: Argentyna')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('gallery-header')
	<div class="mt-4 mb-5 d-flex align-items-center justify-content-center">
		<img src="{{ asset('img/flags/f_arg.png') }}" width="auto" height="30" class="me-1 my-1 shadow" alt="Flag of Argentina">
		<h5 class="menu-country mb-0 mx-4"> Argentyna </h5>
		<img src="{{ asset('img/flags/e_arg.png') }}" width="auto" height="50" class="me-1 my-1" alt="Emblem of Argentina">
	</div>
@endsection

@section('gallery-content')
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg1.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">	<!--  powiększony obrazek -->
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg1.jpg') }}" alt="sm-argentina1" class="img-thumbnail"></div>	<!--  mały obrazek -->
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg2.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg2.jpg') }}" alt="sm-argentina2" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg3.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg3.jpg') }}" alt="sm-argentina3" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg4.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg4.jpg') }}" alt="sm-argentina4" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg5.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg5.jpg') }}" alt="sm-argentina5" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg6.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg6.jpg') }}" alt="sm-argentina6" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg7.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg7.jpg') }}" alt="sm-argentina7" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg8.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg8.jpg') }}" alt="sm-argentina8" class="img-thumbnail"></div>
		</a>
	</div>

	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg9.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg9.jpg') }}" alt="sm-argentina9" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg10.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg10.jpg') }}" alt="sm-argentina10" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg11.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg11.jpg') }}" alt="sm-argentina11" class="img-thumbnail"></div>
		</a>
	</div>
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="{{ asset('img/trip/arg12.jpg') }}" data-toggle="lightbox" data-gallery="g-gallery">
			<div class="image shadow"><img src="{{ asset('img/trip/sm-arg12.jpg') }}" alt="sm-argentina12" class="img-thumbnail"></div>
		</a>
	</div>
	<h6 class="text-center mt-5 mb-0"><small>Autor zdjęć: &copy; Grzegorz Kowalczyk</small></h6>
@endsection