document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('submitButton').addEventListener('click', function (event) {
        // Ukryj oryginalny przycisk
        this.style.display = 'none';
        // Pokaż przycisk z animacją ładowania
        document.getElementById('loadingButton').style.display = 'inline-block';
    });
});

