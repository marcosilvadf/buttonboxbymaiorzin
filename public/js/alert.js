let alertResolve;

function showAlert(type, title, message) {
    return new Promise((resolve) => {
        alertResolve = resolve;

        const alert = document.getElementById('custom-alert');
        const icon = document.getElementById('alert-icon');

        document.getElementById('alert-title').innerText = title;
        document.getElementById('alert-message').innerText = message;

        icon.className = 'alert-icon ' + type;

        if (type === 'success') icon.innerHTML = '✔';
        if (type === 'error') icon.innerHTML = '✖';
        if (type === 'info') icon.innerHTML = 'ℹ';

        alert.classList.remove('alert-hidden');
    });
}

function confirmAlert() {
    document.getElementById('custom-alert').classList.add('alert-hidden');
    if (alertResolve) alertResolve(true);
}

function closeAlert() {
    document.getElementById('custom-alert').classList.add('alert-hidden');
    if (alertResolve) alertResolve(false);
}