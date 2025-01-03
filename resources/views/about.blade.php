<!-- resources/views/about.blade.php -->
@extends('layouts.app')

@section('title', 'O Nas')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('content')
    <main class="custom-margin-top">
        <div class="container mt-5" style="max-width: 1100px;">
            <div class="row ">
                <div class="col-md-12 text-center pb-5 mt-3">
                    <h1><img src="{{ asset('img/logo_black.svg') }}" width="35" height="auto" class="d-inline-block ms-sm-4 align-text-top" alt="logo"> Glob<i>Frotter</i>.pl</h1>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12 text-center">
                    <h5><p>Klub podróżników <strong>&nbsp;Glob<i>Frotter</i>&nbsp;</strong> to grupa miłośników wypraw, którzy swoją pasję zmienili w pracę.</p></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12 col-12  px-md-3 px-lg-4 d-flex flex-column justify-content-center">
                    <video controls class="video-scale mb-3 shadow">
                        <source src="{{ asset('img/main/Papuasi.mp4') }}" type="video/mp4">
                        Twoja przeglądarka nie obsługuje odtwarzacza wideo.
                    </video>
                </div>

                <div class="about-text col-lg-4 col-md-6 col-sm-12 col-12 mt-sm-3 px-md-3 px-lg-4 d-flex flex-column justify-content-center">
                        <p>Każdy urlop zamieniamy w niezapomnianą przygodę dbając jednocześnie o wyjątkowe wrażenia i bezpieczeństwo osób, które nam zaufały.</p>
                        <p>Koncentrujemy się na eksplorowaniu odległych zakątków Świata. Szczególny nacisk kładziemy na poznaniu obcych kultur poprzez obcowanie z mieszkańcami, poznawanie Świata od kuchni i przemieszczanie się lokalnymi środkami transportu.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p><h5>Gwarantujemy niezapomniane doświadczenia i niesamowite przygody.</h5></p>
                    <blockquote class=" col-md-12 text-end mt-4">
                        <p class="line1 mb-1"><b><i>„Podążaj za swoimi marzeniami.  One znają drogę.”</i></b></p>
                        <p class="line2 mt-0"> – Kobi Yamada</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    @vite('resources/js/fading.js')
@endsection
