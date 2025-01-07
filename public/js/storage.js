document.addEventListener('DOMContentLoaded', function() {
    // Pobierz wartości z localStorage i ustaw je w odpowiednich polach
    const selectedTrip = localStorage.getItem('selectedTrip');
    const selectedDate = localStorage.getItem('selectedDate');

    const tripElement = document.getElementById('trip');
    const dateElement = document.getElementById('start_date');

    if (tripElement && selectedTrip) {
        tripElement.value = selectedTrip;
    } else {
        console.error('Element trip not found or selectedTrip is null');
    }

    if (dateElement && selectedDate) {
        dateElement.value = selectedDate;
    } else {
        console.error('Element start_date not found or selectedDate is null');
    }
});
