document.addEventListener("DOMContentLoaded", function () {
    $('.img_clicked').on('click', function () { 
        let imgSrc = $(this).attr('src');

        $('#imageOverlay').remove();

        $('body').append(`
            <div id="imageOverlay" class="overlay">
                <img id="fullImage" src="${imgSrc}" alt="Imagem ampliada">
            </div>
        `);

        $('#imageOverlay').fadeIn(300);

        $('#imageOverlay').click(function () {
            $(this).fadeOut(300, function () {
                $(this).remove();
            });
        });
    });
});
