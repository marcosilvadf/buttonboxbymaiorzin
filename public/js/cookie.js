document.addEventListener("DOMContentLoaded", function () {
    if (!localStorage.getItem("cookiesAccepted")) {
        document.getElementById("cookie-consent").classList.remove("cookie-hidden");
    }
});

function acceptCookies() {
    localStorage.setItem("cookiesAccepted", "true");
    document.getElementById("cookie-consent").classList.add("cookie-hidden");
}