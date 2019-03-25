document.addEventListener("DOMContentLoaded", function () {
    var ws_images = document.querySelector(".ws_images");
    var del = ws_images.lastChild.previousSibling;
    ws_images.removeChild(del);

    document.querySelectorAll('.multiple-slides .swiper-container').forEach(function(elem) {
        new Swiper(elem, {
            slidesPerView: 4,
            spaceBetween: 20,
            watchOverflow: true,
            freeMode: true,
            navigation: {
                nextEl: elem.nextElementSibling.nextElementSibling,
                prevEl: elem.nextElementSibling,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3.2,
                    spaceBetween: 15,
                },
                576: {
                    slidesPerView: 2.2,
                    spaceBetween: 10,
                },
            }
        });
    });

    document.querySelectorAll('.cat-slides .swiper-container').forEach(function(elem) {
        new Swiper(elem, {
            slidesPerView: 4,
            spaceBetween: 20,
            watchOverflow: true,
            freeMode: true,
            autoplay: {
                delay: 4000,
            },
            navigation: {
                nextEl: elem.nextElementSibling.nextElementSibling,
                prevEl: elem.nextElementSibling,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 2.2,
                    spaceBetween: 15,
                },
                576: {
                    slidesPerView: 1.2,
                },
            }
        });
    });
    
    // Add height for info item list project
    if (document.getElementById('img-get-height')) {
        var imgGetHeight = document.getElementById('img-get-height');
        var infoItemProject = document.querySelectorAll('.bg-absolute');
        var heightImgListProject = imgGetHeight.clientHeight;
        if (heightImgListProject === 0) {
            imgGetHeight.addEventListener('load', function () {
                heightImgListProject = this.clientHeight;
                for (var i = 0; i < infoItemProject.length; i++) {
                    const element = infoItemProject[i];
                    element.style.height = heightImgListProject+"px";
                }
            });
        } else {
            for (var i = 0; i < infoItemProject.length; i++) {
                const element = infoItemProject[i];
                element.style.height = heightImgListProject+"px";
            }
        }
    }
});
$(function(){
    if($('.swiper-tabs').length) {
        var swiperTabs = new Swiper('.swiper-tabs', {
            allowTouchMove: false,
        });
        swiperTabs.slideTo(1);
    }

    $(".swiper-tab").each(function(i, e){
        new Swiper(e, {
            slidesPerView: 3,
            spaceBetween: 20,
            watchOverflow: true,
            freeMode: true,
            nested: true,
            navigation: {
                nextEl: ".swiper-button-next.slide-" + i,
                prevEl: ".swiper-button-prev.slide-" + i,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3.3,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 2.3,
                    spaceBetween: 15,
                },
                576: {
                    slidesPerView: 1.3,
                    spaceBetween: 10,
                },
            }
        });
    });
    $(".news .swiper-button-prev.slide-0").hide();
    $(".news .swiper-button-next.slide-0").hide();
    $(".news .swiper-button-prev.slide-2").hide();
    $(".news .swiper-button-next.slide-2").hide();
    
	$(".group-news span").bind('touchstart',function(e){
		$(".group-news span.active").removeClass('active');
        $(this).addClass('active');
        $(".news .line-two").css({
            '-webkit-transform' : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            '-moz-transform'    : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            '-ms-transform'     : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            '-o-transform'      : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            'transform'         : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)'
        });
        swiperTabs.slideTo($(this).index());
        $(".news .swiper-button-prev").hide();
        $(".news .swiper-button-next").hide();
        var prev = ".news .swiper-button-prev.slide-" + $(".group-news span").index(this);
        var next = ".news .swiper-button-next.slide-" + $(".group-news span").index(this);
        $(prev).show();
        $(next).show();
	});
	
	$(".group-news span").mousedown(function(e){
		$(".group-news span.active").removeClass('active');
        $(this).addClass('active');
        $(".news .line-two").css({
            '-webkit-transform' : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            '-moz-transform'    : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            '-ms-transform'     : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            '-o-transform'      : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)',
            'transform'         : 'translateX(' + ($(".group-news span").index(this)*100 -100) + '%)'
        });
        swiperTabs.slideTo($(this).index());
        $(".news .swiper-button-prev").hide();
        $(".news .swiper-button-next").hide();
        var prev = ".news .swiper-button-prev.slide-" + $(".group-news span").index(this);
        var next = ".news .swiper-button-next.slide-" + $(".group-news span").index(this);
        $(prev).show();
        $(next).show();
    });
})