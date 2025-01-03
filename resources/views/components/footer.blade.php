<!-- resources/views/components/footer.blade.php -->
<footer class="footer bg-dark">
    <div class="container">
        <div class="row g-3 py-3 text-white">

            <div class="col-sm-6 col-lg-3">
                <b>Klub Podróżników</b><br>
                <img src="{{ asset('img/logo_white.svg') }}" width="30" height="30" class="d-inline-block align-text-bottom" alt="logo"><b class="fs-5">  Glob<i>Frotter</i>.pl</b><p></p>
                <ul>
                    <li class="list-group-item"><b>Kontakt</b></li>
                    <li class="list-group-item"><i class="bi bi-house-door"></i>&nbsp; ul. S. Sterlinga 26, 90-212 Łódź</li>
                    <li class="list-group-item"><i class="bi bi-telephone"></i>&nbsp; +48 601 360 856</li>
                    <li class="list-group-item"><i class="bi bi-envelope"></i>&nbsp;&nbsp; mosafer@wp.pl</li>
                </ul>
                <p class="mt-4">Zdjęcia (wszystkie): &copy; Grzegorz Kowalczyk<p>
            </div>

            <div class="col-sm-6 col-lg-3">
                <p><b>Mapa strony</b></p>
                <ul>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('home') }}">Strona główna</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('about') }}">O nas</a>
                        </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('excursions') }}">Wyprawy</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('terms') }}">Terminy</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('gallery') }}">Galeria</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('information') }}">Informacje</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('contact') }}">Kontakt</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
                        <a href="{{ route('login') }}">Logowanie</a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3">
                <p><b>Wyprawy</b></p>
                <ul>
                    <li class="list-group-item">
                        <i class="bi bi-globe-americas"></i>&nbsp;
                        <a href="{{ route('excursions.argentina') }}">Argentyna i Chile</a>
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-globe-central-south-asia"></i>&nbsp;
                        <a href="{{ route('excursions.indonesia') }}">Indonezja</a>
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-globe-central-south-asia"></i>&nbsp;
                        <a href="{{ route('excursions.cambodia') }}">Kambodża</a>
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-globe-americas"></i>&nbsp;
                        <a href="{{ route('excursions.peru') }}">Peru i Boliwia</a>
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-globe-central-south-asia"></i>&nbsp;
                        <a href="{{ route('excursions.sri_lanka') }}">Sri Lanka</a>
                    </li>
                    <li class="list-group-item">
                        <i class="bi bi-globe-central-south-asia"></i>&nbsp;
                        <a href="{{ route('excursions.tibet') }}">Tybet. W Chinach</a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3">
                <p><b>Ważne dokumenty</b></p>
                <ul>
                    <li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
                        <a href="{{ asset('docs/regulamin_serwisu_internetowego.pdf') }}" target="_blank">Regulamin serwisu</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
                        <a href="{{ asset('docs/polityka_prywatnosci.pdf') }}" target="_blank">Polityka prywatności</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
                        <a href="{{ asset('docs/owu.pdf') }}" target="_blank">Warunki uczestnictwa</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
                        <a href="{{ asset('docs/standardowy_formularz.pdf') }}" target="_blank">Formularz informacyjny</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
                        <a href="{{ asset('docs/ow_ubezpieczenie_podrozy.pdf') }}" target="_blank">Ubezpieczenie podróży</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
                        <a href="{{ asset('docs/ow_ubezpieczenie_rezygnacji.pdf') }}" target="_blank">Ubezpieczenie rezygnacji</a>
                    </li>
                    <li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
                        <a href="{{ asset('docs/instrkucja_dla_ubezpieczonych.pdf') }}" target="_blank">instrukcja dla ubezpieczonych</a>
                    </li>
                </ul>
                <p class="text-center mb-0">&copy; 2024 Glob<i>Frotter</i>.pl</p>
            </div>
        </div>
    </div>
</footer>