<!-- resources/views/contact.blade.php -->
@extends('layouts.app')

@section('title', 'Profil')
@section('head-scripts')
    <style>
        .carousel-inner, .container, .row, .image, .card .footer {visibility: hidden;}
    </style>
@endsection

@section('content')
	<main class="custom-margin-top">
		<div class="container" style="max-width: 1100px;">
			<div class="row">

				<div class="col-md-12 text-center pb-5">
					<h2 class="">Dashboard</h2>
					<h5>Pisz, chętnie odpowiemy</h5>
				</div>

				<div class="col-md-12 text-center">

					<div class="py-12">
						<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
							<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
								<div class="max-w-xl">
									@include('profile.partials.update-profile-information-form')
								</div>
							</div>
				
							<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
								<div class="max-w-xl">
									@include('profile.partials.update-password-form')
								</div>
							</div>
				
							<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
								<div class="max-w-xl">
									@include('profile.partials.delete-user-form')
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
