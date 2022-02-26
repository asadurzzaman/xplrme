(function ($) {
    "use strict";

    jQuery('.slick-area').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 4000,
        arrows: true,
        centerPadding: '50px',
        prevArrow:'<button type="button" class="slick-prev"><i class="fas fa-angle-left    "></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right    "></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });

    jQuery('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        dots:true,
        arrows: false,
    });
});
