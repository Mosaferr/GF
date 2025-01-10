<!-- resources/views/contact.blade.php -->
@extends('layouts.app')

@section('title', 'dashboard')
@section('head-scripts')
    @vite('resources/css/hide.css')
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1100px;">
			<div class="row">

				<div class="col-md-12 text-center pb-5">
					<h2 class="">Witamy w serwisie</h2>
					{{-- <h5>Pisz, chętnie odpowiemy</h5> --}}
				</div>

				<div class="col-md-12 text-center">

					<div class="py-12">
						<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
							<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
								<div class="p-6 text-gray-900">
									{{ __("Jesteś zalogowany!") }}
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection
