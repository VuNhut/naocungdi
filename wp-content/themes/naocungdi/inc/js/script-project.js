$.fn.scrollView = function () {
    return this.each(function () {
      $('html, body').animate({
        scrollTop: $(this).offset().top - $(".menu-project").height()
      }, 1000 );
    });
}

$(document).ready(function(){
    $(".menu-project li a").on('click', function(event) {
        event.preventDefault();
        var hash = $(this).attr('href');
        $(hash).scrollView();
        $(".menu-project ul li").removeClass('active');
        $(this).parent().addClass('active');
    });

    // Load Gallery
    var dataSrc = [];
    if ($(window).width() > 420 && $(window).width() <= 840) {
        dataSrc[0] = $('.gallery-project [data-number="1"] img').attr('data-src');
        $('.gallery-project [data-number="1"] img').attr('src', dataSrc[0]);
    } else if ($(window).width() > 840 && $(window).width() <= 1260) {
        dataSrc[0] = $('.gallery-project [data-number="1"] img').attr('data-src');
        dataSrc[1] = $('.gallery-project [data-number="2"] img').attr('data-src');
        $('.gallery-project [data-number="1"] img').attr('src', dataSrc[0]);
        $('.gallery-project [data-number="2"] img').attr('src', dataSrc[1]);
    } else if ($(window).width() > 1260) {
        dataSrc[0] = $('.gallery-project [data-number="1"] img').attr('data-src');
        dataSrc[1] = $('.gallery-project [data-number="2"] img').attr('data-src');
        dataSrc[2] = $('.gallery-project [data-number="3"] img').attr('data-src');
        $('.gallery-project [data-number="1"] img').attr('src', dataSrc[0]);
        $('.gallery-project [data-number="2"] img').attr('src', dataSrc[1]);
        $('.gallery-project [data-number="3"] img').attr('src', dataSrc[2]);
    }

    // Map Traveling - Eating - Staying
    $(".type-location .traveling").on('click', function () {
        $(this).addClass('active');
        $(".type-location .eating").removeClass('active');
        $(".type-location .staying").removeClass('active');
        $(".map-location .list-traveling").slideDown();
        $(".map-location .list-eating").slideUp();
        $(".map-location .list-staying").slideUp();
    })
    $(".type-location .eating").on('click', function () {
        $(this).addClass('active');
        $(".type-location .traveling").removeClass('active');
        $(".type-location .staying").removeClass('active');
        $(".map-location .list-eating").slideDown();
        $(".map-location .list-traveling").slideUp();
        $(".map-location .list-staying").slideUp();
    })
    $(".type-location .staying").on('click', function () {
        $(this).addClass('active');
        $(".type-location .traveling").removeClass('active');
        $(".type-location .eating").removeClass('active');
        $(".map-location .list-staying").slideDown();
        $(".map-location .list-traveling").slideUp();
        $(".map-location .list-eating").slideUp();
    })
    $(".type-location .traveling").click();

    // Review location
    $.fn.scrollTo = function (speed, margin) {
        if (typeof(speed) === 'undefined')
            speed = 1000;
        if (typeof(margin) === 'undefined')
            margin = 0;
    
        $('html, body').animate({
            scrollTop: parseInt($(this).offset().top + margin)
        }, speed);
    };

    $("#review-button").on('click', function () {
        $('.header-project .review-star').css({"text-align": "center"});
        $('.review-step1').scrollTo(700, -40);
        $('.review-step1').css({"visibility": "visible"});
        $('.review-step').css({"opacity": "1", "visibility": "visible"});
        $('body').css({"overflow": "hidden"});

        $('.post-ratings img').on('click', function () {
            $('.review-step1').removeAttr("style");
            $('.header-project .review-star').removeAttr("style");
            $('#wpcomm').scrollTo(700);
            $('#wpcomm form .wc_comm_submit').on('click', function () {
                $('#wpcomm form').css({"z-index": "100"});
                $('.review-step p').css({"visibility": "visible"});
                setInterval(clear, 1500);
                function clear() {
                    $('#wpcomm form').removeAttr("style");
                    $('.review-step p').removeAttr("style");
                    $('body').removeAttr("style");
                    $('.review-step').removeAttr("style");
                }
            })
        })
    })
});

document.addEventListener('DOMContentLoaded', function () {
    function getPosition( el ) {
        var x = 0;
        var y = 0;
        while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        x += el.offsetLeft - el.scrollLeft;
        y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
        }
        return { top: y, left: x };
    }

    var menuProject = document.querySelector('.menu-project');
    var sidebarProject = document.querySelector('.sidebar-project');
    var footerArea = document.querySelector('#footer-area');
    var infoRight = document.querySelector('.info-right');
    var possidebarProject = getPosition(sidebarProject).top;
    var posMenuProject = getPosition(menuProject).top;
    window.addEventListener('scroll', function () {
        
        // Effect scroll menu project
        if ((document.body.scrollTop > posMenuProject) || (document.documentElement.scrollTop > posMenuProject)) {
            menuProject.style.cssText = "position: fixed; top: 0; background-color: #fff; width: 100%; z-index: 10";
        } else {
            menuProject.style.position = "relative";
        }

        // Effect scroll sidebar project
        if (window.innerWidth >= 992) {
            if ((document.body.scrollTop > possidebarProject - menuProject.offsetHeight*2 - 15) || (document.documentElement.scrollTop > possidebarProject - menuProject.offsetHeight*2 - 15)) {
                var posrelatedArea = getPosition(footerArea).top;
                if ((document.body.scrollTop > (posrelatedArea - sidebarProject.offsetHeight - menuProject.offsetHeight*2)) || (document.documentElement.scrollTop > (posrelatedArea - sidebarProject.offsetHeight - menuProject.offsetHeight*2))) {
                    sidebarProject.style.cssText = "position: absolute; top: "+ (infoRight.offsetHeight - sidebarProject.offsetHeight) +"px; width: "+ sidebarProject.clientWidth + "px";
                } else {
                    sidebarProject.style.cssText = "position: fixed; top: "+ (menuProject.offsetHeight + 15) +"px; width: "+ sidebarProject.clientWidth + "px";
                }
            } else {
                sidebarProject.style.position = "relative";
                sidebarProject.style.top = "0";
            }   
        }
    })

    // Slide Gallery
    var slideGallery = document.querySelector('.main-slide ul');
    var nextImg = document.getElementById('nextImg');
    var previousImg = document.getElementById('previousImg');
    var updatingSlideGallery = document.querySelector('.slide-gallery .updating');
    var updatingMapImage = document.querySelector('.map-img .updating');
    var closeGallery = document.getElementById('closeGallery');
    var imgWidth = document.body.offsetWidth;
    var countImages = slideGallery.childElementCount;
    var posTranformStart = 0;
    var posTranformEnd = 0;
    slideGallery.style.width = imgWidth*countImages + "px";
    for (var i = 0; i < slideGallery.children.length; i++) {
        const img = slideGallery.children[i];
        img.style.width = imgWidth + "px";
    }
    eventNextPrevious(nextImg);
    eventNextPrevious(previousImg);

    function getPosTransform () {
        if (slideGallery.style.transform || slideGallery.style.msTransform || slideGallery.style.WebkitTransform) {
            var translateString;

            // Code for IE
            translateString = slideGallery.style.msTransform;
            // Code for Safari
            translateString = slideGallery.style.WebkitTransform;
            // Standard syntax
            translateString = slideGallery.style.transform;

            var translate = "translateX(";
            var posTranform = Number(translateString.substring(translate.length, translateString.indexOf('px')));
        } else {
            var posTranform = 0;
        }
        return posTranform;
    }
    function checkPosTransform (translateValue) {
        if (translateValue > posTranformStart) {
            translateValue = posTranformEnd + imgWidth;
        } else if (translateValue <= posTranformEnd) {
            translateValue = posTranformStart;
        }
        return translateValue;
    }
    function transform (button) {
        var posTranform = getPosTransform();
        if (button === nextImg) {
            var translateValue = posTranform - imgWidth;
        } else {
            var translateValue = posTranform + imgWidth;
        }
        translateValue = checkPosTransform(translateValue);

        // Code for IE
        slideGallery.style.msTransform = "translateX("+ translateValue +"px)";
        // Code for Safari
        slideGallery.style.WebkitTransform = "translateX("+ translateValue +"px)";
        // Standard syntax
        slideGallery.style.transform = "translateX("+ translateValue +"px)";
    }
    function eventNextPrevious (button) {
        button.addEventListener('click', function () {
            posTranformEnd = -(imgWidth*countImages);
            transform(button);
        });
    }

    closeGallery.addEventListener('click', function () {
        // Code for IE
        document.querySelector('.slide-gallery').style.msTransform = "translateY(100%)";
        // Code for Safari
        document.querySelector('.slide-gallery').style.WebkitTransform = "translateY(100%)";
        // Standard syntax
        document.querySelector('.slide-gallery').style.transform = "translateY(100%)";

        document.querySelector('.slide-gallery').style.opacity = "0";

        document.querySelector('article.post').style.filter = "blur(0px)";
        // Code for Safari, Opera
        document.querySelector('article.post').style.WebkitFilter = "blur(0px)";
    })

    window.onkeydown = function (e) {
        switch (e.keyCode) {
            case 37:
                previousImg.click();
                break;
            case 39:
                nextImg.click();
                break;
            case 27:
                closeGallery.click();
                break;
            default:
                break;
        }
    }

    var showGallery = document.querySelectorAll('.showGallery');
    for (var s = 0; s < showGallery.length; s++) {
        const elem = showGallery[s];
        elem.addEventListener('click', function (e) {
            e.preventDefault();
            var num = this.getAttribute('data-number');

            // Code for IE
            slideGallery.style.msTransform = "translateX("+ (-num*imgWidth) +"px)";
            document.querySelector('.slide-gallery').style.msTransform = "translateY(0%)";
            // Code for Safari
            slideGallery.style.WebkitTransform = "translateX("+ (-num*imgWidth) +"px)";
            document.querySelector('.slide-gallery').style.WebkitTransform = "translateY(0%)";
            // Standard syntax
            slideGallery.style.transform = "translateX("+ (-num*imgWidth) +"px)";
            document.querySelector('.slide-gallery').style.transform = "translateY(0%)";

            document.querySelector('.slide-gallery').style.opacity = "1";

            document.querySelector('article.post').style.filter = "blur(5px)";
            // Code for Safari, Opera
            document.querySelector('article.post').style.WebkitFilter = "blur(5px)";
        })
    }

    document.querySelector('.img-quality').addEventListener('click', function () {
        // Code for IE
        slideGallery.style.msTransform = "translateX(0px)";
        document.querySelector('.slide-gallery').style.msTransform = "translateY(0%)";
        // Code for Safari
        slideGallery.style.WebkitTransform = "translateX(0px)";
        document.querySelector('.slide-gallery').style.WebkitTransform = "translateY(0%)";
        // Standard syntax
        slideGallery.style.transform = "translateX(0px)";
        document.querySelector('.slide-gallery').style.transform = "translateY(0%)";

        document.querySelector('.slide-gallery').style.opacity = "1";

        document.querySelector('article.post').style.filter = "blur(5px)";
        // Code for Safari, Opera
        document.querySelector('article.post').style.WebkitFilter = "blur(5px)";
    })

    document.querySelector('.slide-gallery').addEventListener('transitionend', function () {
        checkSrc(slideGallery.firstElementChild);
        
    })

    // Touch Event Slide Gallery
    document.querySelector('.slide-gallery').addEventListener('touchstart', function (event) {
        var state = true;
        var posClick = event.touches[0].clientX;
        var moveNumberNews = 0, stateMove = false;
        posTranformEnd = -(imgWidth*(countImages - 1));
        var posTranform = getPosTransform();
        this.addEventListener('touchmove', function (e) {
            if (state === true) {
                var moveValue = posClick - e.touches[0].clientX;
                var translateValue = (-moveValue) + posTranform;
                translateValue = checkPosTransform(translateValue);
                if ((translateValue - imgWidth) === posTranformEnd) {
                    translateValue = posTranformEnd;
                }
                if (moveValue<0) {
                    moveNumberNews = Math.floor(Math.abs(translateValue)/imgWidth);
                } else {
                    moveNumberNews = Math.ceil(Math.abs(translateValue)/imgWidth);
                }

                // Code for IE
                slideGallery.style.msTransform = "translateX("+ translateValue +"px)";
                // Code for Safari
                slideGallery.style.WebkitTransform = "translateX("+ translateValue +"px)";
                // Standard syntax
                slideGallery.style.transform = "translateX("+ translateValue +"px)";

                stateMove = true;
            }
        })
        this.addEventListener('touchend', function () {
            if (state === true) {
                state = false;
            }
            if (state === false && stateMove === true) {
                // Code for IE
                slideGallery.style.msTransform = "translateX("+ (-(moveNumberNews*imgWidth)) +"px)";
                // Code for Safari
                slideGallery.style.WebkitTransform = "translateX("+ (-(moveNumberNews*imgWidth)) +"px)";
                // Standard syntax
                slideGallery.style.transform = "translateX("+ (-(moveNumberNews*imgWidth)) +"px)";

                stateMove = false;
            }
        });
    });

    // Mouse Move Event Slide Gallery
    document.querySelector('.slide-gallery').addEventListener('mousedown', function (event) {
        var state = true;
        var posClick = event.clientX;
        var moveNumberNews = 0, stateMove = false;
        posTranformEnd = -(imgWidth*(countImages - 1));
        var posTranform = getPosTransform();
        this.addEventListener('mousemove', function (e) {
            if (state === true) {
                var moveValue = posClick - e.clientX;
                var translateValue = (-moveValue) + posTranform;
                translateValue = checkPosTransform(translateValue);
                if ((translateValue - imgWidth) === posTranformEnd) {
                    translateValue = posTranformEnd;
                }
                if (moveValue<0) {
                    moveNumberNews = Math.floor(Math.abs(translateValue)/imgWidth);
                } else {
                    moveNumberNews = Math.ceil(Math.abs(translateValue)/imgWidth);
                }

                // Code for IE
                slideGallery.style.msTransform = "translateX("+ translateValue +"px)";
                // Code for Safari
                slideGallery.style.WebkitTransform = "translateX("+ translateValue +"px)";
                // Standard syntax
                slideGallery.style.transform = "translateX("+ translateValue +"px)";

                stateMove = true;
            }
        })
        this.addEventListener('mouseup', function () {
            if (state === true) {
                state = false;
            }
            if (state === false && stateMove === true) {
                // Code for IE
                slideGallery.style.msTransform = "translateX("+ (-(moveNumberNews*imgWidth)) +"px)";
                // Code for Safari
                slideGallery.style.WebkitTransform = "translateX("+ (-(moveNumberNews*imgWidth)) +"px)";
                // Standard syntax
                slideGallery.style.transform = "translateX("+ (-(moveNumberNews*imgWidth)) +"px)";
                
                stateMove = false;
            }
        });
    });

    function checkSrc(srcImg) {
        var checkSrc = srcImg.firstElementChild.firstElementChild.getAttribute('src');
        if (checkSrc === null) {
            addSrc(srcImg);
        }
    }

    function addSrc(element) {
        var img = element.firstElementChild.firstElementChild,
            src = img.getAttribute('data-src'),
            next = element.nextElementSibling;
        img.setAttribute('src', src);
        if (next) {
            addSrc(next);
        }
        checkLoaded(img);
    }

    function checkLoaded (e) {
        e.addEventListener('load', function () {
            if (e === document.querySelector('.popup-img img')) {
                updatingMapImage.style.display = "none";
            } else {
                updatingSlideGallery.style.display = "none";
            }
        })
    }

    // Search Header
    if (document.querySelector('.search-header')) {
        document.querySelector('.search-header p').addEventListener('click', function () {
            document.querySelector('.bg-search').style.opacity = 1;
            document.querySelector('.bg-search').style.visibility = "visible";
            document.querySelector('.review-star').style.transitionDelay = "0s"
            document.querySelector('.review-star').style.zIndex = "1000";
            document.querySelector('.bg-search').addEventListener('click', function () {
                document.querySelector('.bg-search').style.opacity = 0;
                document.querySelector('.bg-search').style.visibility = "hidden";
                document.querySelector('.review-star').style.transitionDelay = "0.3s"
                document.querySelector('.review-star').style.zIndex = "1001";
            })
        })
        document.querySelector('.search-header .search-mobile').addEventListener('click', function () {
            document.querySelector('.bg-search').style.opacity = 1;
            document.querySelector('.bg-search').style.visibility = "visible";
            document.querySelector('.review-star').style.transitionDelay = "0s"
            document.querySelector('.review-star').style.zIndex = "1000";
            document.querySelector('.bg-search').addEventListener('click', function () {
                document.querySelector('.bg-search').style.opacity = 0;
                document.querySelector('.bg-search').style.visibility = "hidden";
                document.querySelector('.review-star').style.transitionDelay = "0.3s"
                document.querySelector('.review-star').style.zIndex = "1001";
            })
        })
    }
})