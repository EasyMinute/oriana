// import Swiper
import Swiper, { Navigation, Pagination } from 'swiper';

// import Swiper styles bundle
import "swiper/css/bundle";

// import Swiper styles by modules
import "swiper/css";
// import "swiper/css/navigation";
// import "swiper/css/pagination";


console.log(new Swiper())

const swiper = new Swiper('.resistance_block__articles .swiper', {
    // Optional parameters
    modules: [Navigation, Pagination],
    direction: 'horizontal',
    loop: true,
    spaceBetween: 16,
    slidesPerView: 1,

    breakpoints: {
        640:{
          spaceBetween: 24,
        },
        920: {
            slidesPerView: 3,
            loop: false,
        },
    },

    // If we need pagination
    pagination: {
        el: '.resistance_block__articles .swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.resistance_block__articles .swiper-button-next',
        prevEl: '.resistance_block__articles .swiper-button-prev',
    },

});

console.log(document.body.clientWidth < 980)
if (document.body.clientWidth < 980) {
    const feed_swiper = new Swiper('.feed_categories__wrap .swiper', {
        // Optional parameters
        direction: 'horizontal',
        spaceBetween: 16,
        slidesPerView: 1,
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },

        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
        },

    });
}