document.addEventListener('DOMContentLoaded', function () {
    // Dodaj klasę hidden do elementów
    document.querySelectorAll('.carousel-inner, .container, .row, .image, .card .footer').forEach(function (el) {
        el.classList.add('hidden');
    });
});
