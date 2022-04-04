jQuery( document ).ready( function( $ ) {
    lazyLoadOnScroll();
    window.addEventListener('scroll', lazyLoadOnScroll);

    $related_product = $('.related');
    $related_product.find('.products').flickity ({
        cellAlign: 'left',
        groupCells: 2,
        lazyLoad: 1,
        watchCSS: true,
        wrapAround: true,
    });

} );

// Lazy load image on scroll

const lazyLoadOnScroll = () => {
    const images = document.querySelectorAll('.lazy-load-image');
    const windowHeight = window.innerHeight;
    const windowTop = window.pageYOffset;
    const windowBottom = windowTop + windowHeight;

    images.forEach(image => {
        if(image.getBoundingClientRect().top < windowBottom) {
            image.src = image.dataset.src;
            image.classList.remove('lazy-load-image');
        }
    });

    if(images.length === 0) {
        window.removeEventListener('scroll', lazyLoadOnScroll);
    }
    
}


