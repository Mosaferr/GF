document.addEventListener('DOMContentLoaded', function () {
    const destinationSelect = document.getElementById('destination');
    const tripNameSelect = document.getElementById('trip_name');
    const countrySelect = document.getElementById('country');

    // Funkcja do aktualizacji pól
    function updateFields(selectedOption, origin) {
        const tripId = selectedOption.getAttribute('data-trip-id');
        const tripName = selectedOption.getAttribute('data-trip-name');
        const country = selectedOption.getAttribute('data-country');

        // Aktualizacja destynacji, jeśli nie pochodzi z tego pola
        if (origin !== 'destination' && tripId && destinationSelect) {
            [...destinationSelect.options].forEach(option => {
                option.selected = option.value === tripId;
            });
        }

        // Aktualizacja nazwy wyprawy, jeśli nie pochodzi z tego pola
        if (origin !== 'trip_name' && tripName && tripNameSelect) {
            [...tripNameSelect.options].forEach(option => {
                option.selected = option.value === tripName;
            });
        }

        // Aktualizacja kraju, jeśli nie pochodzi z tego pola
        if (origin !== 'country' && country && countrySelect) {
            [...countrySelect.options].forEach(option => {
                option.selected = option.value === country;
            });
        }
    }

    // Obsługa zmiany w dowolnym polu
    [destinationSelect, tripNameSelect, countrySelect].forEach(select => {
        if (select) {
            select.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                updateFields(selectedOption, this.id);
            });
        }
    });
});
