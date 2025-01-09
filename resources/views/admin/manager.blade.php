<!-- resources/views/admin/manager.blade.php -->
@extends('layouts.app')

@section('title', 'Panel managera')

@section('content')
	<main class="custom-margin-top">
		<div class="container my-5" style="max-width: 1000px;">
			<div class="col-md-12 text-center pb-1 mt-3">
				<h2>Panel managera</h2>
			</div>
			<hr>
		</div>

		<div class="form-container">
            <div class="menu-text col-md-12 text-center">
                <div class="d-grid d-md-block mx-auto my-5">
                    <a href="{{ route('admin.clientlist') }}" class="btn btn-outline-primary btn-lg mx-4">Lista <br>klientów</a>
                    <a href="{{ route('admin.triplist') }}" class="btn btn-outline-secondary shadow btn-lg mx-4">Lista <br>wycieczek</a>
                    <a href="{{ route('gallery.chile') }}" class="btn btn-outline-success btn-lg mx-4">Wyszukaj <br>klientów</a>
                    <a href="{{ route('gallery.china') }}" class="btn btn-outline-danger btn-lg mx-4">Wyszukaj <br>wycieczkę</a>
                </div>
            </div>
        </div>
	</main>
@endsection
