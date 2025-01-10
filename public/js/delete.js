document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.deleteButton');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Zatrzymaj domyślne zachowanie przycisku

            const formId = this.getAttribute('data-form-id');
            const deleteForm = document.getElementById(formId);

            if (!deleteForm) {
                console.error(`Nie znaleziono formularza z id "${formId}".`);
                return;
            }

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
});
