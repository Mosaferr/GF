<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Strona Główna')
@section('head-scripts')
    @vite('resources/js/hidden.js')
@endsection

@section('content')
    <main class="index-margin-top">
        <section id=carousel>
            <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <a href="exc-argetina.html">
                            <img src="{{ asset('img/carousel/car_arg.jpg') }}" class="d-block w-100" alt="Iguazu">
                        </a>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <a href="exc-tibet.html">
                            <img src="{{ asset('img/carousel/car_tibet.jpg') }}" class="d-block w-100" alt="Mount Everest">
                        </a>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <a href="exc-sri_lanka.html">
                            <img src="{{ asset('img/carousel/car_sri.jpg') }}" class="d-block w-100" alt="Słoń">
                        </a>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <a href="exc-peru.html">
                            <img src="{{ asset('img/carousel/car_bol.jpg') }}" class="d-block w-100" alt="La Paz">
                        </a>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <a href="exc-indonesia.html">
                            <img src="{{ asset('img/carousel/car_indo.jpg') }}" class="d-block w-100" alt="Bromo">
                        </a>
                    </div>
                </div>

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section id=about>
            <div class="container mt-5" style="max-width: 1100px;">
                <div class="row ">
                    <div class="col-md-12 text-center pb-5">
                        <h1><img src="{{ asset('img/logo_black.svg') }}" width="45" height="45" class="d-inline-block ms-sm-4 align-text-top" alt="logo">  Glob<i>Frotter</i>.pl</h1>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12 text-center mb-4">
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

                    <div class="col-lg-4 col-md-6 col-sm-12 col-12  px-md-3 px-lg-4 d-flex flex-column justify-content-center">
                        <div class="about-text">
                            <p>Każdy urlop zamieniamy w niezapomnianą przygodę dbając jednocześnie o wyjatkowe wrażenia i bezpieczeństwo osób, które nam zaufały.</p>
                            <p>Koncentrujemy się na eksplorowaniu odległych zakątków Świata. Szczególny nacisk kładziemy na poznaniu obcych kultur poprzez obcowanie z mieszkańcami, poznawanie Świata od kuchni i przemieszczanie się lokalnymi środkami transportu.</p>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12 text-center mt-4">
                        <h5>Gwarantujemy niezapomniane doświadczenia i niesamowite przygody.</h5>
                    </div>
                </div>
            </div>
        </section>

        <div class="arrows my-5 text-center fs-4">
            <a href="#trips"><i class="bi bi-arrow-down-circle"></i></a>
            <a href="#carousel"><i class="bi bi-arrow-up-circle"></i></a>
        </div>

        <section id=trips>
            <div class="container" style="max-width: 1200px;">
                <div class="row">
                    <div class="col-md-12 text-center pb-5">
                        <h2 class="">Polecane wyprawy</h2>
                        <p><h5>Zapraszamy do zapoznania się z naszą ofertą:</h5></p>
                    </div>
                </div>

                <div class="row g-lg-5 g-md-4 g-sm-3 mx-sm-1 mx-md-3 lg-md-0">
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="bg-image">
                                <a href="exc-peru.html">
                                    <img src="{{ asset('img/main/trip-peru.jpg') }}" class="img-fluid"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title shadow accordion bg-success-subtle rounded p-2">Peru i Boliwia</h5>
                                <p class="card-text mt-3">Lima, Cusco, La Paz. Królestwo Inków z Machu Picchu na czele. Lamy, wioski na jeziorze Titicaca...</p>
                                <div class="text-center">
                                    <a href="exc-peru.html" class="btn btn-success shadow"><small>Zobacz program</small></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="bg-image">
                                <a href="exc-tibet.html">
                                    <img src="{{ asset('img/main/trip-tibet.jpg') }}" class="img-fluid"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title shadow bg-success-subtle rounded p-2">Tybet, w Chinach</h5>
                                <p class="card-text mt-3">Święta Lhasa, odległe klasztory, spotkania z michami, wycieczka pod Mout Everest...</p>
                                <div class="text-center">
                                    <a href="exc-tibet.html" class="btn btn-success shadow"><small>Zobacz program</small></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="bg-image">
                                <a href="exc-cambodia.html">
                                    <img src="{{ asset('img/main/trip-camb.jpg') }}" class="img-fluid"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title shadow bg-success-subtle rounded p-2">Kambodża</h5>
                                <p class="card-text mt-3">Angkor Wat i starożytne świątynie. Czerwoni Khmerzy i dzisiejsze królestwo. I relaks nad oceanem...</p>
                                <div class="text-center">
                                    <a href="exc-cambodia.html" class="btn btn-success shadow"><small>Zobacz program</small></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <a href="excursions.html" class="btn btn-warning w-100 shadow">Poznaj więcej naszych wypraw</a>
                    </div>
                </div>
            </div>
        </section>

        <div class="arrows my-5 text-center fs-4">
            <a href="#timetable"><i class="bi bi-arrow-down-circle"></i></a>
            <a href="#about"><i class="bi bi-arrow-up-circle"></i></a>
        </div>

        <section id=timetable>
            <div class="container" style="max-width: 1100px;">
                <div class="row">
                    <div class="col-md-12 text-center pb-5">
                        <h2 class="">Najbliższe wyjazdy</h2>
                        <h5>Leć z nami, póki nie jest za późno:</h5>
                    </div>
                </div>
                <div class="row g-md-1 g-lg-5 mx-sm-1 mx-md-2 lg-md-0">
                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 px-4 d-flex flex-column justify-content-center">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Termin</th>
                                    <th scope="col">Wyprawa</th>
                                    <th scope="col">Kraj</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <img src="{{ asset('img/flags/f_arg.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Argentina">
                                        <img src="{{ asset('img/flags/f_chile.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Chile">
                                    </td>
                                    <th scope="row">14.07 - 27.07.2024</th>
                                    <td>W tango pod Andami</td>
                                    <td>Argentyna, Chile</td>
                                    <td class="text-center"><a href="exc-argetina.html" class="btn btn-primary btn-sm shadow">Program</a></td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <img src="{{ asset('img/flags/f_cam.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Cambodia">
                                    </td>
                                    <th scope="row">28.07 - 11.08.2024</th>
                                    <td>Królestwo w dżungli</td>
                                    <td>Kambodża</td>
                                    <td class="text-center"><a href="exc-cambodia.html" class="btn btn-primary btn-sm shadow">Program</a></td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <img src="{{ asset('img/flags/f_tib.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Tibet">
                                        <img src="{{ asset('img/flags/f_chin.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of China">
                                    </td>
                                    <th scope="row">04.08 - 17.08.2024</th>
                                    <td>Na Dachu Świata</td>
                                    <td>Tybet, Chiny</td>
                                    <td class="text-center"><a href="exc-tibet.html" class="btn btn-primary btn-sm shadow">Program</a></td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <img src="{{ asset('img/flags/f_peru.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Peru">
                                        <img src="{{ asset('img/flags/f_bol.png') }}" width="auto" height="25" class="me-1 my-1 shadow" alt="Flag of Bolivia">
                                    </td>
                                    <th scope="row">13.09 - 23.09.2024</th>
                                    <td>W krainie kultu Słońca</td>
                                    <td>Peru, Boliwia</td>
                                    <td class="text-center"><a href="exc-peru.html" class="btn btn-primary btn-sm shadow">Program</a></td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <img src="{{ asset('img/flags/f_indo.png') }}" width="auto" height="25" class="mx-1 shadow" alt="Flag of Indonesia">
                                    </td>
                                    <th scope="row">03.10 - 13.10.2024</th>
                                    <td>W świecie kontrastów</td>
                                    <td>Indonezja</td>
                                    <td class="text-center"><a href="exc-indonesia.html" class="btn btn-primary btn-sm shadow">Program</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <a href="terms.html" class="btn btn-warning w-100 mt-2 shadow">Zobacz inne terminy</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-12 col-12 px-4 d-flex flex-column justify-content-center">
                        <div class="image shadow mt-3">
                            <a href="{{ asset('img/main/term.jpg') }}" data-toggle="lightbox">
                                <img src="{{ asset('img/main/term.jpg') }}" alt="Apsara in Angkor Wat" class="img-thumbnail">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="arrows my-5 text-center fs-4">
            <a href="#onrequest"><i class="bi bi-arrow-down-circle"></i></a>
            <a href="#trips"><i class="bi bi-arrow-up-circle"></i></a>
        </div>

        <section id=onrequest>
            <div class="container" style="max-width: 1100px;">

                <div class="row">
                    <div class="col-md-12 text-center pb-5">
                        <h2 class="">Szyte na miarę</h2>
                        <h5>Zorganizujemy podróż Twoich marzeń:</h5>
                    </div>
                </div>

                <div class="row g-md-4 g-lg-5 mx-sm-1 mx-md-2 lg-md-0">
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12 d-flex flex-column justify-content-center">
                        <div class="image shadow mb-3">
                            <a href="{{ asset('img/main/szyte.jpg') }}" data-toggle="lightbox">
                                <img src="{{ asset('img/main/szyte.jpg') }}" alt="Bamboo train" class="img-thumbnail">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-12 col-12 d-flex flex-column justify-content-center">
                        <div class="onrequest-text">
                            <p>Podróż na zamówienie to spojrzenie na świat w taki sposób, w jaki chcesz go zobaczyć. W terminie, który Ci odpowiada i do miejsc, które Cię interesują.</p>
                            <p>Ruszaj w świat w gronie przyjaciół, z rodziną lub z grupą współpracowników w ramach wyjazdów firmowych. Albo indywidualnie. Zorganizujemy wyprawę dopasowaną do Twoich gustów.</p>
                            <p>Jeśli jesteś gotów rozpocząć planowanie lub potrzebujesz inspiracji, <b>skontaktuj się z nami</b> i stwórzmy dla Ciebie wymarzoną podróż.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="arrows my-5 text-center fs-4">
            <a href="#contact"><i class="bi bi-arrow-down-circle"></i></a>
            <a href="#timetable"><i class="bi bi-arrow-up-circle"></i></a>
        </div>

        <section id=contact>
            <div class="container" style="max-width: 1100px;">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center pb-2">Napisz do nas</h2>
                    </div>
                </div>

                <div class="row m-0">
                    <form action="#" class="bg-light p-4 m-auto">
                        <div class="col-md-12 p-0 pt-4 pb-4 m-auto">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" required placeholder="Imię i nazwisko">
                                    </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input type="email" class="form-control" required placeholder="Adres e-mail">
                                    </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea rows="3" required class="form-control" placeholder="Treść wiadomości"></textarea>
                                    </div>
                                </div>

                                <button class="btn btn-warning w-100 mt-2 shadow">Wyślij</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <!-- Warunkowo załaduj dodatkowe skrypty -->
    {{-- <script src="{{ asset('js/hidden.js') }}"></script> --}}
    <script src="{{ asset('js/scrollreveal.min.js') }}"></script>
    {{-- <script src="{{ asset('js/fading.js') }}"></script> --}}
    @vite('resources/js/fading.js')
    @vite('resources/js/links.js')
    {{-- @vite('resources/js/index.bundle.min.js') --}}
    <script src="{{ asset('lightbox.bundle.min.js') }}"></script>
@endsection