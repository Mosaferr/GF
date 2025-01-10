document.addEventListener('DOMContentLoaded', function () {
    // Pobierz wszystkie przyciski z klasą submit-button
    const submitButtons = document.querySelectorAll('.submit-button');

    submitButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            // event.preventDefault(); // Zatrzymaj domyślną akcję (jeśli potrzebne)

            // Pobierz przypisany spinner-button dla tego konkretnego przycisku
            const loadingButton = this.nextElementSibling; // Zakładamy, że spinner jest obok w DOM
            if (loadingButton && loadingButton.classList.contains('loading-button')) {
                // Ukryj bieżący przycisk
                this.style.display = 'none';
                // Pokaż przycisk z animacją ładowania
                loadingButton.style.display = 'inline-block';
            }
        });
    });
});
