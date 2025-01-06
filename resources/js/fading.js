document.addEventListener('DOMContentLoaded', function () {
    // Konfiguracja ScrollReveal
    window.sr = ScrollReveal();

    sr.reveal('.carousel-inner', {
        duration: 3000,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.container', {
        duration: 1000,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.row', {
        duration: 1000,
        //delay: 500,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.image', {
        duration: 2000,
        delay: 500, // Opóźnienie w milisekundach. XXXXXXXXXXXXXXXXXXXXX Dodac gdzie trzeba jeśli trzeba
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.card', {
        duration: 2000,
        delay: 500,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.gallery', {
        duration: 2000,
        delay: 1000,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.video-scale', {
        duration: 2000,
        delay: 500,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.footer', {
        duration: 1000,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.contact-form-box', {
        duration: 4000,
        delay: 500,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.login-form-box', {
        duration: 4000,
        delay: 500,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
    sr.reveal('.form-container', {
        duration: 3000,
        delay: 500,
        beforeReveal: function (el) {
            el.classList.remove('hidden');
        }
    });
});
