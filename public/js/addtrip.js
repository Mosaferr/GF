document.addEventListener('DOMContentLoaded', function () {
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const headerDestination = document.getElementById('header-destination');
    const headerDates = document.getElementById('header-dates');
    const totalSeatsInput = document.getElementById('total_seats');
    const availableSeatsInput = document.getElementById('available_seats');
    const destinationSelect = document.getElementById('destination');
    const tripNameSelect = document.getElementById('trip_name');
    const countrySelect = document.getElementById('country');

    // Funkcja do aktualizacji nagłówka na podstawie destynacji
    function updateHeaderDestination() {
        const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
        if (selectedOption) {
            headerDestination.textContent = selectedOption.text || 'Nowa wyprawa';
        }
    }

    // Aktualizacja nagłówka na podstawie dat
    if (startDateInput && endDateInput) {
        [startDateInput, endDateInput].forEach(input => {
            input.addEventListener('input', function () {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;

                if (startDate && endDate && headerDates) {
                    const formattedStartDate = new Date(startDate).toLocaleDateString('pl-PL');
                    const formattedEndDate = new Date(endDate).toLocaleDateString('pl-PL');
                    headerDates.textContent = `${formattedStartDate} - ${formattedEndDate}`;
                }
            });
        });
    }

    // Aktualizacja nagłówka destynacji przy zmianie w polu Destynacja
    if (destinationSelect && headerDestination) {
        destinationSelect.addEventListener('change', updateHeaderDestination);
    }

    // Aktualizacja nagłówka destynacji przy zmianie w polach Nazwa wyprawy i Kraje
    [tripNameSelect, countrySelect].forEach(select => {
        if (select) {
            select.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const tripId = selectedOption.getAttribute('data-trip-id');

                if (tripId) {
                    [...destinationSelect.options].forEach(option => {
                        option.selected = option.value === tripId;
                    });
                    updateHeaderDestination();
                }
            });
        }
    });

    // Ustawienie liczby wolnych miejsc na podstawie liczby członków grupy
    if (totalSeatsInput && availableSeatsInput) {
        totalSeatsInput.addEventListener('input', function () {
            availableSeatsInput.value = this.value;
        });
    }
});
