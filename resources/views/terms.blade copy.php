<!-- resources/views/terms.blade.php -->
@extends('layouts.app')

@section('title', 'Terminy')
@section('head-scripts')
	@vite('resources/js/hidden.js')
@endsection

@section('content')
	<div class="image shadow">
		<a href="{{ asset('img/main/term.jpg') }}" data-toggle="lightbox">
			<img src="{{ asset('img/main/term.jpg') }}" alt="Apsara in Angkor Wat" class="img-thumbnail shadow">
		</a>
	</div>

	<div class="image shadow">
		<a href="{{ asset('img/main/info.jpg') }}" data-toggle="lightbox">
			<img src="{{ asset('img/main/info.jpg') }}" alt="Monk in Angkor" class="img-thumbnail shadow">
		</a>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
    @vite('resources/js/lightbox.js')
@endsection