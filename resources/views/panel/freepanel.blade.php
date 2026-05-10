<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Truck Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
<style>

{!! $panel->css !!}

.floating {
    font-family: sans-serif;
    background-color: rgba(0, 0, 0, 0.74);
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    z-index: 2000;
}

/* botão fechar */
.floating .close {
    position: absolute;
    top: 15px;
    right: 15px;
    height: 30px;
    font-weight: bold;
    width: 200px;
}

/* container do banner */
.banner {
    background: #111;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    max-width: 400px;
    width: 100%;
}

/* título */
.banner h1 {
    color: white;
    margin-bottom: 15px;
}

/* imagem */
.banner img {
    width: 100%;
    max-height: 200px;
    object-fit: contain;
    margin-bottom: 15px;
}

/* descrição */
.banner p {
    color: #ccc;
    margin-bottom: 20px;
    font-size: 25px;  
}

/* botão principal */
.banner .cta {
    background: #d39000;
    border: none;
    padding: 12px;
    width: 100%;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
}

</style>
</head>

<body>
{!! $panel->html !!}

<div class="floating">
    <button class="close">fechar</button>

    <div class="banner">
        <h1 id="ad-title"></h1>

        <img id="ad-image" src="" alt="Produto">

        <p id="ad-description"></p>

        <a id="ad-link" href="" target="_blank" class="cta"></a>
    </div>
</div>

<script>
    const ads = @json($ads);
</script>

<script>
    const floating = document.querySelector('.floating');
    const closeBtn = document.querySelector('.close');

    const adTitle = document.querySelector('#ad-title');
    const adImage = document.querySelector('#ad-image');
    const adDescription = document.querySelector('#ad-description');
    const adLink = document.querySelector('#ad-link');

    const INTERVAL = 5 * 60 * 1000; // 5 minutos
    const AUTO_CLOSE = 10 * 1000;   // 10 segundos

    let timer = null;
    let autoCloseTimer = null;

    // índice atual do anúncio
    let currentAd = 0;

    function loadAd() {

        // pega anúncio atual
        const ad = ads[currentAd];

        // preenche banner
        adTitle.textContent = ad.title;
        adImage.src = ad.image;
        adDescription.textContent = ad.description;

        adLink.textContent = ad.product_link_text;
        adLink.href = ad.product_link;

        // próximo anúncio
        currentAd++;

        // volta pro primeiro quando acabar
        if (currentAd >= ads.length) {
            currentAd = 0;
        }
    }

    function showBanner() {

        // troca anúncio antes de mostrar
        loadAd();

        floating.style.display = 'flex';

        // fecha sozinho após 10 segundos
        autoCloseTimer = setTimeout(() => {
            hideBanner();
            startTimer();
        }, AUTO_CLOSE);
    }

    function hideBanner() {
        floating.style.display = 'none';

        if (autoCloseTimer) {
            clearTimeout(autoCloseTimer);
        }
    }

    function startTimer() {

        if (timer) {
            clearTimeout(timer);
        }

        timer = setTimeout(() => {
            showBanner();
        }, INTERVAL);
    }

    closeBtn.addEventListener('click', () => {
        hideBanner();
        startTimer();
    });

    // mostra ao abrir página
    showBanner();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"></script>
</body>
</html>