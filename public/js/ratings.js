document.addEventListener('DOMContentLoaded', function () {

    $('.rating').each(function () {

        let ratingDiv = $(this);
        let rating = ratingDiv.data('rating');
        let id = ratingDiv.data('id');

        ratingDiv.find('.star').each(function () {
            let value = $(this).data('value');

            if (value <= rating) {
                $(this).addClass('text-warning');
            } else {
                $(this).addClass('empty-star');
            }
        });

    });

});