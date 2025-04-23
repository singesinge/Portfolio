const error = document.getElementById('errorMessage');
if (error) {
    setTimeout(() => {
        error.style.opacity = '0';
    }, 3000);
}

const success = document.getElementById('successMessage');
if (success) {
    setTimeout(() => {
        window.location.href = '../HTML/Profil.php';
    }, 3000);
}