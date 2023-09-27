"use strict";

var owl = $('.owl-carousel');
owl.owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dots: true,
    responsive: {
        0: {
            items: 1,
        },
        400: {
            items: 2,
        },
        620: {
            items: 3,
        }
    },
});