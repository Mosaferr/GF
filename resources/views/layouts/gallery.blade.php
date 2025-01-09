<!-- resources/views/layouts/gallery.blade.php -->
@extends('layouts.app')

@section('content')
<main class="custom-margin-top">
    <section id="gallery" class="gallery-block grid-gallery">
        <div class="container" style="max-width: 1200px;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="gal-topic">
                        <a href="{{ route('gallery') }}" class="text-decoration-none text-reset">
							Galeria zdjęć
						</a>
                    </h2>

                    <div class="menu-text d-grid d-md-block mx-auto my-5">
                        <a href="{{ route('gallery.argentina') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Argentyna</a>
                        <a href="{{ route('gallery.bolivia') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Boliwia</a>
                        <a href="{{ route('gallery.chile') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Chile</a>
                        <a href="{{ route('gallery.china') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Chiny</a>
                        <a href="{{ route('gallery.indonesia') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Indonezja</a>
                        <a href="{{ route('gallery.cambodia') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Kambodża</a>
                        <a href="{{ route('gallery.peru') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Peru</a>
                        <a href="{{ route('gallery.sri_lanka') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Sri Lanka</a>
                        <a href="{{ route('gallery.tibet') }}" class="btn btn-outline-dark shadow btn-sm mx-1">Tybet</a>
                    </div>
                    @yield('gallery-header')
                </div>
            </div>
            <div class="row g-4 mx-sm-3 mx-md-4 lg-md-0">
                @yield('gallery-content')
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection
