document.addEventListener('DOMContentLoaded', function () {
    // Slide Gallery
    var linkFeaturedImg = document.querySelectorAll('.link-featured-img'),
        linkFeaturedVideo = document.querySelectorAll('.link-featured-video'),
        slideImg = document.querySelector('.slide-gallery .main-slide ul'),
        nextImg = document.getElementById('nextImg'),
        previousImg = document.getElementById('previousImg'),
        closeGallery = document.getElementById('closeGallery'),
        iconUpdating = document.querySelector('.updating'),
        imgWidth = 0, countImages = 0, posTranformStart = 0, posTranformEnd = 0, cloneLibrary, cloneVideo, statusClick;
    for (let i = 0; i < linkFeaturedImg.length; i++) {
        const element = linkFeaturedImg[i];
        element.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('.slide-gallery').style = 'transform: translateY(0%); opacity: 1';
            cloneLibrary = element.nextElementSibling.cloneNode(true).children;
            statusClick = "image";
        })
    }

    for (let v = 0; v < linkFeaturedVideo.length; v++) {
        const elementVideo = linkFeaturedVideo[v];
        elementVideo.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector('.slide-gallery').style = 'transform: translateY(0%); opacity: 1';
            cloneVideo = elementVideo.nextElementSibling.cloneNode(true).children;
            statusClick = "video";
        })
    }

    document.querySelector('.slide-gallery').addEventListener('transitionend', function () {
        if (statusClick === "image") {
            for (let c = 0; c < cloneLibrary.length; c++) {
                const elem = cloneLibrary[c].children[0];
                var src = elem.getAttribute("data-src");
                var li = document.createElement('li');
                elem.setAttribute('src', src);
                slideImg.appendChild(li).appendChild(elem);
            }
            imgWidth = document.querySelector('.main-slide').offsetWidth;
            countImages = slideImg.childElementCount;
            posTranformEnd = -(imgWidth*countImages);
            slideImg.style = "width: " + imgWidth*countImages + "px";
            for (let i = 0; i < slideImg.children.length; i++) {
                const img = slideImg.children[i];
                img.style = "width: " + imgWidth + "px";
            }
            checkLoaded(slideImg.firstElementChild.firstElementChild);
            nextImg.style.display = "";
            previousImg.style.display = "";
        } else if (statusClick === "video") {
            for (let d = 0; d < cloneVideo.length; d++) {
                const eVideo = cloneVideo[d].children[0];
                var embed = eVideo.getAttribute("data-src");
                var li = document.createElement('li');
                li.classList.add('video');
                slideImg.appendChild(li);
                slideImg.firstElementChild.innerHTML = embed;
                slideImg.firstElementChild.style.float = 'none';
            }
            nextImg.style.display = "none";
            previousImg.style.display = "none";
            checkLoaded(slideImg.firstElementChild.firstElementChild);
        } else {
            iconUpdating.style.display = "";
            while (slideImg.firstElementChild) {
                slideImg.removeChild(slideImg.firstElementChild);
            }
            slideImg.style = "";
        }
    })

    nextImg.addEventListener('click', function () {
        var posTranform = getPosTransform(),
        translateValue = posTranform - imgWidth;
        translateValue = checkPosTransform(translateValue);
        slideImg.style.transform = "translateX("+ translateValue +"px)";
    });

    previousImg.addEventListener('click', function () {
        var posTranform = getPosTransform(),
        translateValue = posTranform + imgWidth;
        translateValue = checkPosTransform(translateValue);
        slideImg.style.transform = "translateX("+ translateValue +"px)";
    });
    
    closeGallery.addEventListener('click', function () {
        statusClick = "close";
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
                break;
            default:
                break;
        }
    }

    function getPosTransform () {
        if (slideImg.style.transform) {
            var translateString = slideImg.style.transform;
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
    function checkLoaded (e) {
        e.addEventListener('load', function () {
            iconUpdating.style.display = "none";
        })
    }
})