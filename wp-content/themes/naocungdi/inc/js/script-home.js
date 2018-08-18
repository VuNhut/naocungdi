document.addEventListener("DOMContentLoaded", function () {
    var ws_images = document.querySelector(".ws_images");
    var del = ws_images.lastChild.previousSibling;
    ws_images.removeChild(del);
    
    // Add height for info item list project
    var imgGetHeight = document.getElementById('img-get-height');
    var infoItemProject = document.querySelectorAll('.bg-absolute');
    var heightImgListProject = imgGetHeight.clientHeight;
    if (heightImgListProject === 0) {
        imgGetHeight.addEventListener('load', function () {
            heightImgListProject = this.clientHeight;
            for (let i = 0; i < infoItemProject.length; i++) {
                const element = infoItemProject[i];
                element.style.height = heightImgListProject+"px";
            }
        });
    } else {
        for (let i = 0; i < infoItemProject.length; i++) {
            const element = infoItemProject[i];
            element.style.height = heightImgListProject+"px";
        }
    }

    // Slide News
    var boxSlide = document.querySelector('.box-slide');
    var slideNews = document.querySelector('.slide-news');
    var newsItem = document.querySelectorAll('.slide-news .news-item');
    var nextNews = document.querySelector('.news .fa-chevron-right');
    var previousNews = document.querySelector('.news .fa-chevron-left');
    var companyNewsItem = document.querySelectorAll('#slide-company-news .news-item');
    var marketNewsItem = document.querySelectorAll('#slide-market-news .news-item');
    var projectNewsItem = document.querySelectorAll('#slide-project-news .news-item');
    var countNewsItem = projectNewsItem.length;
    var widthOneNews = newsItem[0].offsetWidth;
    var winWidth = window.outerWidth;
    if (winWidth > 768) {
        var newsShowInSlide = 3;
    } else if (winWidth > 500 && winWidth < 768) {
        var newsShowInSlide = 2;
    } else {
        var newsShowInSlide = 1;
    }
    var widthOneNews = Math.floor((boxSlide.offsetWidth)/newsShowInSlide);
    var widthSlideNews = widthOneNews*countNewsItem;
    var posTranformStart = 0;
    var posTranformEnd = -((countNewsItem - newsShowInSlide)*widthOneNews);
    for (let i = 0; i < newsItem.length; i++) {
        const ele_item = newsItem[i];
        ele_item.style.width = widthOneNews+"px";
        eleItemChildren = ele_item.firstElementChild.firstElementChild.nextElementSibling;
    }
    if (newsItem.length === newsShowInSlide) {
        nextNews.style.display = "none";
    }
    slideNews.style.width = widthSlideNews+"px";
    previousNews.style.display = "none";
    var slideMarketNews = document.getElementById('slide-market-news');
    var slideCompanyNews = document.getElementById('slide-company-news');
    var slideProjectNews = document.getElementById('slide-project-news');
    var slideMarketNewsClone = slideMarketNews.cloneNode(true);
    var slideCompanyNewsClone = slideCompanyNews.cloneNode(true);
    var slideProjectNewsClone = slideProjectNews.cloneNode(true);
    slideNews.removeChild(slideMarketNews);
    slideNews.removeChild(slideProjectNews);
    slideNews.removeChild(slideCompanyNews);
    slideNews.appendChild(slideProjectNewsClone);
    document.getElementById('project-news').style.color = "#ed1a24";

    // Xử lý height cho box slide
    var imgNewsItem = document.querySelector('.news-item img');
    if (imgNewsItem.offsetHeight === 0) {
        imgNewsItem.addEventListener('load', function () {
            boxSlide.style.maxHeight = imgNewsItem.offsetHeight + document.querySelector('.news-item .info-news').offsetHeight + "px";
        })
    } else {
        boxSlide.style.maxHeight = imgNewsItem.offsetHeight + document.querySelector('.news-item .info-news').offsetHeight + "px";
    }

    // Sự kiện click cho các tab tin tức
    document.getElementById('market-news').addEventListener('click', function () {
        slideMarketNews = document.getElementById('slide-market-news');
        if (!slideMarketNews) {
            slideCompanyNews = document.getElementById('slide-company-news');
            slideProjectNews = document.getElementById('slide-project-news');
            if (slideCompanyNews) {
                slideNews.removeChild(slideCompanyNews);
            }
            if (slideProjectNews) {
                slideNews.removeChild(slideProjectNews);
            }
            slideNews.appendChild(slideMarketNewsClone);
            countNewsItem = marketNewsItem.length;
            widthSlideNews = widthOneNews*countNewsItem;
            posTranformEnd = -((countNewsItem - newsShowInSlide)*widthOneNews);
            slideNews.style.width = widthSlideNews+"px";
            slideNews.style.transform = "translateX(0px)";
            previousNews.style.display = "none";
            nextNews.style.display = null;
            this.style.color = "#ed1a24";
            document.getElementById('company-news').style.color = "";
            document.getElementById('project-news').style.color = "";
            document.querySelector('.news .line-two').style.transform = "translateX(100%)";
        }
    })
    document.getElementById('company-news').addEventListener('click', function () {
        slideCompanyNews = document.getElementById('slide-company-news');
        if (!slideCompanyNews) {
            slideMarketNews = document.getElementById('slide-market-news');
            slideProjectNews = document.getElementById('slide-project-news');
            if (slideMarketNews) {
                slideNews.removeChild(slideMarketNews);
            }
            if (slideProjectNews) {
                slideNews.removeChild(slideProjectNews);
            }
            slideNews.appendChild(slideCompanyNewsClone);
            countNewsItem = companyNewsItem.length;
            widthSlideNews = widthOneNews*countNewsItem;
            posTranformEnd = -((countNewsItem - newsShowInSlide)*widthOneNews);
            slideNews.style.width = widthSlideNews+"px";
            slideNews.style.transform = "translateX(0px)";
            previousNews.style.display = "none";
            nextNews.style.display = null;
            this.style.color = "#ed1a24";
            document.getElementById('market-news').style.color = "";
            document.getElementById('project-news').style.color = "";
            document.querySelector('.news .line-two').style.transform = "translateX(-100%)";
        }
    })
    document.getElementById('project-news').addEventListener('click', function () {
        slideProjectNews = document.getElementById('slide-project-news');
        if (!slideProjectNews) {
            slideMarketNews = document.getElementById('slide-market-news');
            slideCompanyNews = document.getElementById('slide-company-news');
            if (slideMarketNews) {
                slideNews.removeChild(slideMarketNews);
            }
            if (slideCompanyNews) {
                slideNews.removeChild(slideCompanyNews);
            }
            slideNews.appendChild(slideProjectNewsClone);
            countNewsItem = projectNewsItem.length;
            widthSlideNews = widthOneNews*countNewsItem;
            posTranformEnd = -((countNewsItem - newsShowInSlide)*widthOneNews);
            slideNews.style.width = widthSlideNews+"px";
            slideNews.style.transform = "translateX(0px)";
            previousNews.style.display = "none";
            nextNews.style.display = null;
            this.style.color = "#ed1a24";
            document.getElementById('market-news').style.color = "";
            document.getElementById('company-news').style.color = "";
            document.querySelector('.news .line-two').style.transform = "translateX(0)";
        }
    })

    // Xử lý nút next và previous của slide tin tức
    eventNextPrevious(nextNews);
    eventNextPrevious(previousNews);

    // MouseDown and Mouse Move in Slide News
    function getPosTransform () {
        if (slideNews.style.transform) {
            var translateString = slideNews.style.transform;
            var translate = "translateX(";
            var posTranform = Number(translateString.substring(translate.length, translateString.indexOf('px')));
        } else {
            var posTranform = 0;
        }
        return posTranform;
    }
    function checkPosTransform (translateValue) {
        if (translateValue > posTranformStart) {
            translateValue = posTranformStart;
        } else if (translateValue < posTranformEnd) {
            translateValue = posTranformEnd;
        }
        return translateValue;
    }
    function eventNextPrevious (button) {
        button.addEventListener('click', function () {
            var posTranform = getPosTransform();
            if (button === nextNews) {
                var translateValue = posTranform - widthOneNews;
            } else {
                var translateValue = posTranform + widthOneNews;
            }
            slideNews.style.transform = "translateX("+ translateValue +"px)";
            stateButtonNextPrevious(translateValue);
        });
    }
    function stateButtonNextPrevious (translateValue) {
        if (translateValue === posTranformEnd) {
            nextNews.style.display = "none";
        } else {
            nextNews.style.display = null;
        }
        if (translateValue === posTranformStart) {
            previousNews.style.display = "none";
        } else {
            previousNews.style.display = null;
        }
    }
    document.querySelector('.box-slide').addEventListener('mousedown', function (event) {
        var state = true;
        var posClick = event.clientX;
        var moveNumberNews = 0, stateMove = false;
        var posTranform = getPosTransform();
        document.body.addEventListener('mousemove', function (e) {
            if (state === true) {
                var moveValue = posClick - e.clientX;
                var translateValue = (-moveValue) + posTranform;
                translateValue = checkPosTransform(translateValue);
                if (moveValue<0) {
                    moveNumberNews = Math.floor(Math.abs(translateValue)/widthOneNews);
                } else {
                    moveNumberNews = Math.ceil(Math.abs(translateValue)/widthOneNews);
                }
                slideNews.style.transform = "translateX("+ translateValue +"px)";
                stateMove = true;
            }
        })
        document.body.addEventListener('mouseup', function () {
            if (state === true) {
                state = false;
            }
            if (state === false && stateMove === true) {
                slideNews.style.transform = "translateX("+ (-(moveNumberNews*widthOneNews)) +"px)";
                if (moveNumberNews === 0) {
                    previousNews.style.display = 'none';
                } else {
                    previousNews.style.display = null;
                }
                if (moveNumberNews === (countNewsItem - newsShowInSlide)) {
                    nextNews.style.display = 'none';
                } else {
                    nextNews.style.display = null;
                }
                stateMove = false;
            }
        });
    });

    document.querySelector('.box-slide').addEventListener('touchstart', function (event) {
        var state = true;
        var posClick = event.touches[0].clientX;
        var moveNumberNews = 0, stateMove = false;
        var posTranform = getPosTransform();
        document.body.addEventListener('touchmove', function (e) {
            if (state === true) {
                var moveValue = posClick - e.touches[0].clientX;
                var translateValue = (-moveValue) + posTranform;
                translateValue = checkPosTransform(translateValue);
                if (moveValue<0) {
                    moveNumberNews = Math.floor(Math.abs(translateValue)/widthOneNews);
                } else {
                    moveNumberNews = Math.ceil(Math.abs(translateValue)/widthOneNews);
                }
                slideNews.style.transform = "translateX("+ translateValue +"px)";
                stateMove = true;
            }
        })
        document.body.addEventListener('touchend', function () {
            if (state === true) {
                state = false;
            }
            if (state === false && stateMove === true) {
                slideNews.style.transform = "translateX("+ (-(moveNumberNews*widthOneNews)) +"px)";
                if (moveNumberNews === 0) {
                    previousNews.style.display = 'none';
                } else {
                    previousNews.style.display = null;
                }
                if (moveNumberNews === (countNewsItem - newsShowInSlide)) {
                    nextNews.style.display = 'none';
                } else {
                    nextNews.style.display = null;
                }
                stateMove = false;
            }
        });
    });
    // window.addEventListener('resize', function () {
    //     location.reload();
    // })
});