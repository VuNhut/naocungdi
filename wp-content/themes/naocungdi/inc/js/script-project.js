$(document).ready(function(){
    $(".menu-project li a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            window.scroll({
                top: $(hash).offset().top - $(this).parent().outerHeight(true), 
                left: 0, 
                behavior: 'smooth'
            });
            $(".menu-project ul li").removeClass('active');
            $(this).parent().addClass('active');
        }
    });

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

    var infoContentProject = document.querySelector('.info-introdution .info-content');
    var viewMore = document.getElementById('view-more');
    var viewCollapse = document.getElementById('view-collapse');
    if ((infoContentProject.firstElementChild !== null) && (infoContentProject.firstElementChild.nextElementSibling !== null)) {
        var heightInfoContentProject = infoContentProject.firstElementChild.offsetHeight + infoContentProject.firstElementChild.nextElementSibling.offsetHeight + 30;
        viewCollapse.style.display = "none";
        infoContentProject.style.maxHeight = heightInfoContentProject + "px";
        viewMore.addEventListener('click', function () {
            infoContentProject.style.maxHeight = "";
            this.style.display = "none";
            viewCollapse.style.display = "";
        })
        viewCollapse.addEventListener('click', function () {
            infoContentProject.style.maxHeight = heightInfoContentProject + "px";
            this.style.display = "none";
            viewMore.style.display = "";
        })
    }

    var menuProject = document.querySelector('.menu-project');
    var liMenuProject = document.querySelectorAll('.menu-project ul li');
    var sidebarProject = document.querySelector('.sidebar-project');
    var relatedArea = document.querySelector('.related-project');
    var infoRight = document.querySelector('.info-right');
    var possidebarProject = getPosition(sidebarProject).top;
    var posMenuProject = getPosition(menuProject).top,
        posIntrodution = getPosition(document.getElementById('introdution')).top,
        posLocation = getPosition(document.getElementById('location')).top,
        posUtilities = getPosition(document.getElementById('utilities')).top,
        posProgress = getPosition(document.getElementById('title-progress')).top;
    console.log(posProgress);
    window.addEventListener('scroll', function () {
        if ((document.body.scrollTop > posMenuProject) || (document.documentElement.scrollTop > posMenuProject)) {
            menuProject.style = "position: fixed; top: 0; background-color: #fff; width: 100%; z-index: 1000";
        } else {
            menuProject.style = "position: relative";
        }
        if ((document.body.scrollTop > possidebarProject - menuProject.offsetHeight*2) || (document.documentElement.scrollTop > possidebarProject - menuProject.offsetHeight*2)) {
            var posrelatedArea = getPosition(relatedArea).top;
            if ((document.body.scrollTop > (posrelatedArea - sidebarProject.offsetHeight - menuProject.offsetHeight*2)) || (document.documentElement.scrollTop > (posrelatedArea - sidebarProject.offsetHeight - menuProject.offsetHeight*2))) {
                sidebarProject.style = "position: absolute; top: "+ (infoRight.offsetHeight - sidebarProject.offsetHeight) +"px; width: "+ sidebarProject.clientWidth + "px";
            } else {
                sidebarProject.style = "position: fixed; top: "+ (menuProject.offsetHeight + 15) +"px; width: "+ sidebarProject.clientWidth + "px";
            }
        } else {
            sidebarProject.style = "position: relative";
        }
        if ((document.documentElement.scrollTop >= posIntrodution) && (document.documentElement.scrollTop < posLocation) && (liMenuProject[0].classList.contains('active') === false)) {
            removeActive(liMenuProject[1]);
            liMenuProject[0].classList.add('active');
            console.log('1');
        } else if ((document.documentElement.scrollTop >= posLocation) && (document.documentElement.scrollTop < posUtilities) && (liMenuProject[1].classList.contains('active') === false)) {
            removeActive(liMenuProject[0]);
            removeActive(liMenuProject[2]);
            liMenuProject[1].classList.add('active');
            console.log('2');
        } else {
            if (posProgress) {
                if ((document.documentElement.scrollTop >= posUtilities) && (document.documentElement.scrollTop < posProgress) && (liMenuProject[2].classList.contains('active') === false)) {
                    removeActive(liMenuProject[1]);
                    removeActive(liMenuProject[3]);
                    liMenuProject[2].classList.add('active');
                    console.log('3');
                } else if ((document.documentElement.scrollTop >= posProgress) && (liMenuProject[3].classList.contains('active') === false)) {
                    removeActive(liMenuProject[2]);
                    liMenuProject[3].classList.add('active');
                    console.log('4');
                }
            } else {
                if ((document.documentElement.scrollTop >= posUtilities) && (liMenuProject[2].classList.contains('active') === false)) {
                    removeActive(liMenuProject[1]);
                    liMenuProject[2].classList.add('active');
                    console.log('3');
                }
            }
        }
    })

    function removeActive(element) {
        element.classList.remove('active');
    }

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
    slideGallery.style = "width: " + imgWidth*countImages + "px";
    for (let i = 0; i < slideGallery.children.length; i++) {
        const img = slideGallery.children[i];
        img.style = "width: " + imgWidth + "px";
    }
    eventNextPrevious(nextImg);
    eventNextPrevious(previousImg);

    function getPosTransform () {
        if (slideGallery.style.transform) {
            var translateString = slideGallery.style.transform;
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
        slideGallery.style.transform = "translateX("+ translateValue +"px)";
    }
    function eventNextPrevious (button) {
        button.addEventListener('click', function () {
            posTranformEnd = -(imgWidth*countImages);
            transform(button);
        });
    }

    closeGallery.addEventListener('click', function () {
        document.querySelector('.slide-gallery').style = "transform: translateY(100%); opacity: 0";
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
                closeImgMap.click();
                break;
            default:
                break;
        }
    }

    var showGallery = document.querySelectorAll('.showGallery');
    for (let s = 0; s < showGallery.length; s++) {
        const elem = showGallery[s];
        elem.addEventListener('click', function (e) {
            e.preventDefault();
            var num = this.getAttribute('data-number');
            slideGallery.style.transform = "translateX("+ (-num*imgWidth) +"px)";
            document.querySelector('.slide-gallery').style = "transform: translateY(0%); opacity: 1";
        })
    }

    document.querySelector('.img-quality').addEventListener('click', function () {
        slideGallery.style.transform = "translateX(0px)";
        document.querySelector('.slide-gallery').style = "transform: translateY(0%); opacity: 1";
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
                slideGallery.style.transform = "translateX("+ translateValue +"px)";
                stateMove = true;
            }
        })
        this.addEventListener('touchend', function () {
            if (state === true) {
                state = false;
            }
            if (state === false && stateMove === true) {
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
                slideGallery.style.transform = "translateX("+ translateValue +"px)";
                stateMove = true;
            }
        })
        this.addEventListener('mouseup', function () {
            if (state === true) {
                state = false;
            }
            if (state === false && stateMove === true) {
                slideGallery.style.transform = "translateX("+ (-(moveNumberNews*imgWidth)) +"px)";
                stateMove = false;
            }
        });
    });

    // Hover Map Hilight
    if (document.querySelector('.img-location .container .row')) {
        var countLocation = document.querySelector('.img-location .container .row').childElementCount;
        for (let l = 1; l <= countLocation; l++) {
            var mapLocationID = 'location-' + l;
            var areaLocationID = 'area[data-mapid="' + mapLocationID + '"]';
            if (mapLocationID !== null) {
                hoverMap(mapLocationID, areaLocationID);
                clickMap(areaLocationID);
                clickNameMap(mapLocationID, areaLocationID);   
            }
        }
    }

    if (document.querySelector('.img-utilities .container .row')) {
        var countUtilities = document.querySelector('.img-utilities .container .row').childElementCount;
        for (let u = 1; u <= countUtilities; u++) {
            var mapUtilitiesID = 'utility-' + u;
            var areaUtilitiesID = 'area[data-mapid="' + mapUtilitiesID + '"]';
            if (mapUtilitiesID !== null) {
                hoverMap(mapUtilitiesID, areaUtilitiesID);
                clickMap(areaUtilitiesID);
                clickNameMap(mapUtilitiesID, areaUtilitiesID);   
            }
        }
    }

    var mapImg = document.querySelector('.map-img');
    var closeImgMap = document.getElementById('closeImgMap');
    var linkImg;
    closeImgMap.addEventListener('click', function () {
        mapImg.style = "transform: translateY(100%); opacity: 0";
        document.querySelector('.popup-img img').removeAttribute('src');
        updatingMapImage.style.display = "";
    })

    function hoverMap(mapID, areaID) {
        document.getElementById(mapID).addEventListener('mouseover', function () {
            const mouseoverEvent = new Event('mouseover');
            if (document.querySelector(areaID) !== null) {
                document.querySelector(areaID).dispatchEvent(mouseoverEvent);
                document.getElementById(mapID).addEventListener('mouseout', function () {
                    const mouseoutEvent = new Event('mouseout');
                    document.querySelector(areaID).dispatchEvent(mouseoutEvent);
                })
            }
        })
    }

    function clickMap(areaID) {
        if (document.querySelector(areaID) !== null) {
            document.querySelector(areaID).addEventListener('click', function () {
                linkImg = this.getAttribute('data-img');
                if (linkImg !=="") {
                    mapImg.style = "transform: translateY(0%); opacity: 1";
                    document.querySelector('.popup-img img').setAttribute('src', linkImg);
                    checkLoaded(document.querySelector('.popup-img img'));
                }
            })   
        }
    }


    function clickNameMap(mapID, areaID) {
        document.getElementById(mapID).addEventListener('click', function () {
            if (document.querySelector(areaID) !== null) {
                document.querySelector(areaID).click();
            }
        })
    }

    function checkSrc(srcImg) {
        var checkSrc = srcImg.firstElementChild.getAttribute('src');
        if (checkSrc === null) {
            addSrc(srcImg);
        }
    }

    function addSrc(element) {
        var img = element.firstElementChild,
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
})