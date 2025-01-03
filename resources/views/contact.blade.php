<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>GlobFrotter: Kontakt</title>
	<link rel="icon" type="image/svg" href="img/logo_green.svg">
	<meta name="description" content="Biuro podróży trampingowych GlobFrotter">
	<meta name="keywords" content="tramping, podróż, wycieczka">
	<meta name="author" content="Grzegorz Kowalczyk">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins|Tenor+Sans&subset=latin,latin-ext" rel="stylesheet">

	<script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script defer src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<script src="js/hidden.js"></script>

	<header>
		<nav class="navbar fixed-top navbar-light bg-body-secondary shadow navbar-expand-lg">
			<a class="navbar-brand" href="index.html">
				<img src="img/logo_black.svg" width="23" height="auto" class="d-inline-block ms-sm-4 align-text-bottom" alt="logo">  Glob<i>Frotter</i>.pl
			</a>

			<button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-end" id="mainmenu">
				<ul class="navbar-nav nav-underline mx-5">
					<li class="nav-item">
						<a class="nav-link" href="about.html">O nas</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="excursions.html" id="wyprawyLink" role="button" aria-expanded="false">
							Wyprawy
						</a>
						<ul class="dropdown-menu" aria-labelledby="wyprawyLink">
							<li><a class="dropdown-item" href="exc-argetina.html">Argentyna i Chile</a></li>
							<li><a class="dropdown-item" href="exc-indonesia.html">Indonezja</a></li>
							<li><a class="dropdown-item" href="exc-cambodia.html">Kambodża</a></li>
							<li><a class="dropdown-item" href="exc-peru.html">Peru i Boliwia</a></li>
							<li><a class="dropdown-item" href="exc-sri_lanka.html">Sri Lanka</a></li>
							<li><a class="dropdown-item" href="exc-tibet.html">Tybet, w Chinach</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="terms.html">Terminy</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="gallery.html" id="galeriaLink" role="button" aria-expanded="false">
							Galeria
						</a>
						<ul class="dropdown-menu " aria-labelledby="galeriaLink">
							<li><a class="dropdown-item" href="g-argentina.html">Argentyna</a></li>
							<li><a class="dropdown-item" href="g-bolivia.html">Boliwia</a></li>
							<li><a class="dropdown-item" href="g-chile.html">Chile</a></li>
							<li><a class="dropdown-item" href="g-china.html">Chiny</a></li>
							<li><a class="dropdown-item" href="g-indonesia.html">Indonezja</a></li>
							<li><a class="dropdown-item" href="g-cambodia.html">Kambodża</a></li>
							<li><a class="dropdown-item" href="g-peru.html">Peru</a></li>
							<li><a class="dropdown-item" href="g-sri_lanka.html">Sri Lanka</a></li>
							<li><a class="dropdown-item" href="g-tibet.html">Tybet</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="information.html">Informacje</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="contact.html">Kontakt</a>
					</li>
				</ul>

				<a class="nav-link me-5" href="f-login.html">
					<i class="bi bi-box-arrow-in-right fs-3"></i></i>
				</a>
			</div>
		</nav>
	</header>

	<main class="custom-margin-top">
		<div class="container" style="max-width: 1100px;">
			<div class="row">

				<div class="col-md-12 text-center pb-5">
					<h2 class="">Kontakt</h2>
					<h5>Pisz, chętnie odpowiemy</h5>
				</div>

				<div class="col-md-12 text-center">
					<div class="contact-image shadow position-relative mx-md-4">
						<img src="img/main/contact.jpg" alt="Chinese man" class="img-fluid">
						<div class="contact-form-box">
							<form>
								<div class="form-group">
									<input type="text" class="form-control" id="name" placeholder=" ">
									<label for="name" class="floating-label">Imię:</label>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" id="email" placeholder=" ">
									<label for="email" class="floating-label">Email:</label>
								</div>
								<div class="form-group">
									<textarea class="form-control" id="message" rows="5" placeholder=" "></textarea>
									<label for="message" class="floating-label">Wiadomość:</label>
								</div>
								<button type="submit" class="btn btn-warning">Wyślij</button>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</main>

	<footer class="footer bg-dark">
		<div class="container">
			<div class="row g-3 py-3 text-white">

				<div class="col-sm-6 col-lg-3">
					<b>Klub Podróżników</b><br>
					<img src="img/logo_white.svg" width="30" height="30" class="d-inline-block align-text-bottom" alt="logo"><b class="fs-5">  Glob<i>Frotter</i>.pl</b><p></p>
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
							<a href="index.html">Strona główna</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
							<a href="about.html">O nas</a>
							</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
							<a href="excursions.html">Wyprawy</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
							<a href="terms.html">Terminy</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
							<a href="gallery.html">Galeria</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
							<a href="information.html">Informacje</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
							<a href="contact.html">Kontakt</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-text"></i>&nbsp;
							<a href="f-login.html">Logowanie</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3">
					<p><b>Wyprawy</b></p>
					<ul>
						<li class="list-group-item">
							<i class="bi bi-globe-americas"></i>&nbsp;
							<a href="exc-argetina.html">Argentyna i Chile</a>
						</li>
						<li class="list-group-item">
							<i class="bi bi-globe-central-south-asia"></i>&nbsp;
							<a href="exc-indonesia.html">Indonezja</a>
						</li>
						<li class="list-group-item">
							<i class="bi bi-globe-central-south-asia"></i>&nbsp;
							<a href="exc-cambodia.html">Kambodża</a>
						</li>
						<li class="list-group-item">
							<i class="bi bi-globe-americas"></i>&nbsp;
							<a href="exc-peru.html">Peru i Boliwia</a>
						</li>
						<li class="list-group-item">
							<i class="bi bi-globe-central-south-asia"></i>&nbsp;
							<a href="exc-sri_lanka.html">Sri Lanka</a>
						</li>
						<li class="list-group-item">
							<i class="bi bi-globe-central-south-asia"></i>&nbsp;
							<a href="exc-tibet.html">Tybet. W Chinach</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3">
					<p><b>Ważne dokumenty</b></p>
					<ul>
						<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
							<a href="docs/regulamin_serwisu_internetowego.pdf" target = "_blanc">Regulamin serwisu</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
							<a href="docs/polityka_prywatnosci.pdf" target = "_blanc">Polityka prywatności</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
							<a href="docs/owu.pdf" target = "_blanc">Warunki uczestnictwa</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
							<a href="docs/standardowy_formularz.pdf" target = "_blanc">Formularz informacyjny</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
							<a href="docs/ow_ubezpieczenie_podrozy.pdf" target = "_blanc">Ubezpieczenie podróży</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
							<a href="docs/ow_ubezpieczenie_rezygnacji.pdf" target = "_blanc">Ubezpieczenie rezygnacji</a>
						</li>
						<li class="list-group-item"><i class="bi bi-file-earmark-pdf"></i>&nbsp;
							<a href="docs/instrkucja_dla_ubezpieczonych.pdf" target = "_blanc">Instrukcja dla ubezpieczonych</a>
						</li>
					</ul>
					<p class="text-center mb-0">&copy; 2024 Glob<i>Frotter</i>.pl</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="bootstrap/js/scrollreveal.min.js"></script>
	<script src="js/fading.js"></script>
</body>
</html>