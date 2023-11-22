jQuery(document).ready(function ($) {
    var swiper = new Swiper(".swiper", {
        handleElementorBreakpoints: true,

        slidesPerView: 6,
        spaceBetween: 45,
        slidesPerGroup: 1,
        loop: true,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            480: {
                slidesPerView: 2,
                spaceBetween: 5
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 45
            },
        },

        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 2,
            slideShadows: true
        },
        keyboard: {
            enabled: true
        },
        mousewheel: {
            thresholdDelta: 10
        },
        spaceBetween: 50,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        }
    });
});
