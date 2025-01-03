// Dodaj większy przesunięcie do miejsca docelowego, aby uniknąć zasłaniania przez navbar
document.addEventListener('DOMContentLoaded', function() {
    var navbarHeight = document.querySelector('.navbar').offsetHeight;
    // Zwiększ offset o 50 pikseli (lub dowolną inną wartość według potrzeb)
    var offset = navbarHeight + 50;
    var links = document.querySelectorAll('.navbar a, .arrows a');
    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            var href = this.getAttribute('href');
            if (href.startsWith('#')) {
            event.preventDefault();
            var targetId = href.substring(1);
            var targetElement = document.getElementById(targetId);
            if (targetElement) {
                var targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
            } else if (href === '#top') { // Jeśli link prowadzi do "#top"
            event.preventDefault();
            window.scrollTo({
                top: 0, // Przewiń do góry strony
                behavior: 'smooth'
            });
            }
        });
    });
});
