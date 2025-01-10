document.addEventListener('DOMContentLoaded', function () {
    const totalSeatsInput = document.getElementById('total_seats');
    const availableSeatsInput = document.getElementById('available_seats');

    if (totalSeatsInput && availableSeatsInput) {
        // Inicjalizacja wartości początkowych
        const initialTotalSeats = parseInt(totalSeatsInput.value, 10) || 0;
        const initialAvailableSeats = parseInt(availableSeatsInput.value, 10) || 0;
        const occupiedSeats = initialTotalSeats - initialAvailableSeats; // Liczba zajętych miejsc

        totalSeatsInput.addEventListener('input', function () {
            let totalSeats = parseInt(this.value, 10) || 0;

            // Blokada zmniejszania liczby członków grupy poniżej liczby zajętych miejsc
            if (totalSeats < occupiedSeats) {
                this.value = occupiedSeats; // Przywrócenie minimalnej dozwolonej wartości
                return;
            }

            // Obliczanie symulowanej liczby wolnych miejsc
            const simulatedAvailableSeats = Math.max(totalSeats - occupiedSeats, 0);

            // Wyświetlenie symulowanej liczby wolnych miejsc
            availableSeatsInput.value = simulatedAvailableSeats;
        });
    }
});
