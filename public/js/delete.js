document.addEventListener('DOMContentLoaded', function () {
    const submitButton = document.getElementById('submitButton');
    const deleteForm = document.querySelector('form');
    const loadingButton = document.getElementById('loadingButton');

    submitButton.addEventListener('click', function (event) {
        event.preventDefault(); // Zatrzymaj domyślne zachowanie przycisku

        Swal.fire({
            title: 'Czy na pewno?',
            text: "Nie będziesz mógł cofnąć tej akcji!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Tak, usuń!',
            cancelButtonText: 'Anuluj'
        }).then((result) => {
            if (result.isConfirmed) {
                // Pokaż animację ładowania dopiero po potwierdzeniu
                submitButton.style.display = 'none';
                loadingButton.style.display = 'inline-block';

                deleteForm.submit(); // Wysyłanie formularza tylko po potwierdzeniu
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Anulowano',
                    'Operacja usunięcia została anulowana',
                    'info'
                );
            }
        });
    });
});
