var worksgrid   = $('#works-grid'),
    worksgrid_mode;

if (worksgrid.hasClass('works-grid-masonry')) {
    worksgrid_mode = 'masonry';
} else {
    worksgrid_mode = 'fitRows';
}

worksgrid.imagesLoaded(function() {
    worksgrid.isotope({
        layoutMode: worksgrid_mode,
        itemSelector: '.work-item'
    });
});

$('#filters a').click(function() {
    $('#filters .current').removeClass('current');
    $(this).addClass('current');
    var selector = $(this).attr('data-filter');

    worksgrid.isotope({
        filter: selector,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });

    return false;
});

/* ---------------------------------------------- /*
 * Blog masonry
 /* ---------------------------------------------- */

$('.post-masonry').imagesLoaded(function() {
    $('.post-masonry').masonry();
});