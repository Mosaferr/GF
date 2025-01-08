
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('trip').addEventListener('change', function () {
        const trip_id = this.value;
        const trip_destination = this.options[this.selectedIndex].text;         // Zmiana: Pobierz nazwę wybranej destynacji
        const startDateSelect = document.getElementById('start_date');

        startDateSelect.innerHTML = '<option value="" selected>Wybierz...</option>';     // Wyczyść pole wyboru daty
        // startDateSelect.innerHTML = '<option selected>Wybierz...</option>';     // Wyczyść pole wyboru daty

        if (trip_id) {
            fetch(`/dates/by-trip/${trip_id}`)
                .then(response => response.json())
                .then(dates => {
                    dates.forEach(date => {
                        const option = document.createElement('option');
                        const startDate = new Date(date.start_date);
                        const endDate = new Date(date.end_date);

                        // Formaty dat
                        const startDayMonth = new Intl.DateTimeFormat('pl', {
                            day: '2-digit', month: '2-digit'
                        }).format(startDate);

                        const endDayMonthYear = new Intl.DateTimeFormat('pl', {
                            day: '2-digit', month: '2-digit', year: 'numeric'
                        }).format(endDate);

                        option.value = date.id;
                        option.textContent = `${startDayMonth} - ${endDayMonthYear}`;
                        startDateSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
        }

        localStorage.setItem('selectedTrip', trip_destination);         // Zmiana:  Zapisywanie wybranej destynacji w localStorage
    });

    document.getElementById('start_date').addEventListener('change', function() {
        const start_date = this.value;
        const selectedText = this.options[this.selectedIndex].text;

        localStorage.setItem('selectedDate', selectedText);             // Zmiana:  Zapisywanie wybranego terminu w localStorage
    });
});
