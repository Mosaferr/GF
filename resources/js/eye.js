document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Zmiana ikony
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    const confirmPasswordField = document.getElementById('confirm_password');
    const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPasswordField.setAttribute('type', type);

    // Zmiana ikony
    this.classList.toggle('bi-eye');
    this.classList.toggle('bi-eye-slash');
});

