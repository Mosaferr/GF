<!-- resources/views/components/warunki.blade.php -->
<div class="col-lg-6 col-md-6 col-sm-12 col-12 ps-lg-5 mt-lg-5 px-lg-4">
	<p><h3> Warunki uczestnictwa</h3></p>
	<p>Przed zarezerwowaniem wycieczki zapoznaj się z regulaminem serwisu, warunkami uczestnictwa oraz wymaganiami wizowymi i paszportowymi, które musisz spełnić, aby udać się w podróż.</p>
	<p>W razie pytań przejdź do zakładki <a href="{{ route('contact') }}">kontakt</a> i napisz do nas.</p>
	<ul>
		<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
			<a href="{{ asset('docs/regulamin_serwisu_internetowego.pdf') }}" target="_blank">Regulamin serwisu internetowego</a>
		</li>
		<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
			<a href="{{ asset('docs/polityka_prywatnosci.pdf') }}" target="_blank">Polityka prywatności</a>
		</li>
		<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
			<a href="{{ asset('docs/owu.pdf') }}" target="_blank">Ogólne warunki uczestnictwa</a>
		</li>
		<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
			<a href="{{ asset('docs/standardowy_formularz.pdf') }}" target="_blank">Standardowy formularz informacyjny</a>
		</li>
		<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
			<a href="{{ asset('docs/ow_ubezpieczenie_podrozy.pdf') }}" target="_blank">Ogólne warunki ubezpieczenia "Bezpieczne podróże"</a>
		</li>
		<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
			<a href="{{ asset('docs/ow_ubezpieczenie_rezygnacji.pdf') }}" target="_blank">Ogólne warunki ubezpieczenia "Bezpieczne rezerwacje"</a>
		</li>
		<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
			<a href="{{ asset('docs/instrkucja_dla_ubezpieczonych.pdf') }}" target="_blank">Instrukcja dla ubezpieczonych</a>
		</li>
	</ul>
</div>