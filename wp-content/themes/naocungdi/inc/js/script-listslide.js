$(document).ready(function(){
    // List Slide Swiper
    $(".list-slide, .related-post .swiper-tabs").each(function(i, e){
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
    $(".related-post .swiper-tabs").each(function(i, e){
        new Swiper(e, {
            slidesPerView: 4,
            spaceBetween: 15,
            watchOverflow: true,
            freeMode: true,
            nested: true,
            autoplay: {
                delay: 4000,
            },
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

    // Fixed "object-fit" in IE
    var userAgent, ieReg, ie;
    userAgent = window.navigator.userAgent;
    ieReg = /msie|Trident.*rv[ :]*11\./gi;
    ie = ieReg.test(userAgent);

    if(ie) {
        $(".showGallery").each(function () {
            var $container = $(this),
                imgUrl = $container.find("img").prop("src");
            if (imgUrl) {
            $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("custom-object-fit");
            }
        });
    }
})