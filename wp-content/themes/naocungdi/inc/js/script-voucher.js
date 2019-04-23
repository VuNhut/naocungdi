(function($){
    $(document).ready(function () {
        $(".updating").hide();
        $(".sub-location").hide();
        $(".viet-nam").show();
        $(".select-location .click-select").click(function () {
            $(".box-location").slideToggle();
            if ($(".select-location .click-select i").hasClass("fa-angle-down")) {
                $(".select-location .click-select i").removeClass("fa-angle-down");
                $(".select-location .click-select i").addClass("fa-angle-up");
            } else {
                $(".select-location .click-select i").removeClass("fa-angle-up");
                $(".select-location .click-select i").addClass("fa-angle-down");
            }
        })

        $(".main-location p").click(function () {
            var element = $(this).attr('data-name');
            $(".sub-location").hide();
            $(".main-location .active").removeClass('active');
            $(this).parent().addClass('active');
            $(element).show();
        })

        $(".list-sim-airport .multiple-slides .swiper-container").each(function(i, e){
            new Swiper(e, {
                slidesPerView: 2,
                spaceBetween: 15,
                watchOverflow: true,
                freeMode: true,
                navigation: {
                    nextEl: e.nextElementSibling.nextElementSibling,
                    prevEl: e.nextElementSibling,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 4,
                    },
                    1024: {
                        slidesPerView: 3.3,
                    },
                    768: {
                        slidesPerView: 2.3,
                    },
                    576: {
                        slidesPerView: 1.3,
                    },
                }
            });
        });

        $(".list-ticket .multiple-slides .swiper-container, .header-voucher .multiple-slides .swiper-container, .list-sim .multiple-slides .swiper-container, .list-tour .multiple-slides .swiper-container").each(function(i, e){
            new Swiper(e, {
                slidesPerView: 4,
                spaceBetween: 15,
                watchOverflow: true,
                freeMode: true,
                navigation: {
                    nextEl: e.nextElementSibling.nextElementSibling,
                    prevEl: e.nextElementSibling,
                },
                autoplay: {
                    delay: 4000,
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 3.3,
                    },
                    768: {
                        slidesPerView: 2.3,
                    },
                    576: {
                        slidesPerView: 1.3,
                    },
                }
            });
        });
    })
})(jQuery)