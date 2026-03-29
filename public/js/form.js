const textarea = document.getElementById('input-description');
const counter = document.getElementById('char-count');
const gameSelect = document.getElementById('input-game');
const versionSelect = document.getElementById('input-game-version');
const gameVersions = JSON.parse(
    document.getElementById('option-game-versions').value
);

document.addEventListener('DOMContentLoaded', function () {
    $('input').each(function (index, element) {
        element.addEventListener('invalid', function (e) {
            this.classList.add('is-invalid');
            verifySelects();
        });
    });

    $('input').on('input', function () {
        this.classList.remove('is-invalid');
    });

    $('textarea').on('input', function () {
        this.classList.remove('is-invalid');
    });

    $('textarea').each(function (index, element) {
        element.addEventListener('invalid', function (e) {
            this.classList.add('is-invalid');
        });
    });

    $('select').each(function (index, element) {
        element.addEventListener('invalid', function (e) {
            this.classList.add('is-invalid');
        });
    });

    $('#mods-store').on('submit', function (event) {
        let bSubmit = true;

        event.preventDefault();
        
        bSubmit = verifySelects();
        bSubmit = verifyLinks() && bSubmit;

        if (bSubmit) {
            this.submit();
        }
    });
});

function verifySelects() {
    let bSubmit = true;

    $('select').each(function (index, element) 
        {
            if($(element).val() === null) {
                $(element).addClass('is-invalid');
                bSubmit = false;
            }
        }
    );

    return bSubmit;
}

function verifyLinks() {
    let bSubmit = true;

    const texts = document.getElementsByName('txt_link[]');
    const links = document.getElementsByName('link[]');

    for (let i = 0; i < texts.length; i++) {
        const text = texts[i];
        const link = links[i];

        const hasText = text.value.trim() !== '';
        const hasLink = link.value.trim() !== '';

        text.classList.remove('is-invalid');
        link.classList.remove('is-invalid');
        
        if ((hasText && !hasLink) || (!hasText && hasLink)) {
            bSubmit = false;

            if (!hasText) {
                text.classList.add('is-invalid');
            }

            if (!hasLink) {
                link.classList.add('is-invalid');
            }
        }
    }

    return bSubmit;
}

textarea.addEventListener('input', () => {
    counter.textContent = `${textarea.value.length} / 2000`;
});

counter.textContent = `${textarea.value.length} / 2000`;

gameSelect.addEventListener('change', function () {
    updateSelectVersions();
});

function updateSelectVersions() {
    const gameId = gameSelect.value;

    versionSelect.innerHTML = '<option selected disabled>Selecione a versão do jogo</option>';

    const filtered = gameVersions.filter(v => v.game_mod_id == gameId);

    filtered.forEach(version => {
        const option = document.createElement('option');
        option.value = version.id;
        option.textContent = version.version;

        versionSelect.appendChild(option);
    });
}