document.addEventListener('DOMContentLoaded', function () {
    var lightboxElements = document.querySelectorAll('[data-toggle="lightbox"]');
    lightboxElements.forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            new Lightbox(element);
        });
    });
});
