$(document).ready(function(){
    // List Slide Swiper
    $(".list-slide").each(function(i, e){
        new Swiper(e, {
            slidesPerView: 3.2,
            spaceBetween: 15,
            watchOverflow: true,
            freeMode: true,
            nested: true,
            breakpoints: {
                1024: {
                    slidesPerView: 3.3,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2.2,
                    spaceBetween: 15,
                },
                414: {
                    slidesPerView: 1.5,
                    spaceBetween: 10,
                },
            }
        });
    });
})