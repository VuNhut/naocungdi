$(document).ready(function(){
    // List Slide Swiper
    $(".weather-slides .swiper-container").each(function(i, e){
        new Swiper(e, {
            slidesPerView: 3,
            watchOverflow: true,
            freeMode: true,
            nested: true,
            autoplay: {
                delay: 3000,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                575: {
                    slidesPerView: 3,
                },
            }
        });
    });
})