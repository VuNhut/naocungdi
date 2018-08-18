window.onload = function (){
    var body = this.document.querySelector(".preload");
    body.classList.remove("preload");
    var ie = detectIE().search(/(MSIE|Trident|Edge)/);
    if (ie > -1) {
        body.classList.add('ie');
    }
    // Menu Mobile Effect
    var menu = document.getElementById('exCollapsingNavbar2');
    document.querySelector('.navbar-toggler').addEventListener('click', function () {
        if (menu.classList.contains('in') === true) {
            menu.classList.remove('in');
            this.classList.remove('in');
        } else {
            menu.classList.add('in');
            this.classList.add('in');
        }
    })
}

function foo(event) {
    if (event.stopPropagation) {
      // Stop propagation
      event.stopPropagation();
      // Stop default action
      event.preventDefault();
    }
  
    // IE model
    event.cancelBubble = true;
    event.returnValue = false;
    return false;
}

var rating = document.querySelectorAll('.post-ratings');
for (let i = 0; i < rating.length; i++) {
    rating[i].addEventListener('click', foo, false);
}

function detectIE() {
    var ua = window.navigator.userAgent;
    return ua;
}
var xuLyClassHieuUng = function(classHieuUng, searchStr) {
    var lastIndex = classHieuUng.lastIndexOf(searchStr);
    var before, after;
    if(lastIndex === -1){
        before = classHieuUng.slice(1);
        return {
            before: before,
            after: 0
        }
    } else {
        before = classHieuUng.slice(1, lastIndex);
        after = classHieuUng.slice(lastIndex+1);
        return {
            before: before,
            after: after
        };
    }
}
function getDelayDuration(elem) {
    var classElem = elem.className.split(" ");
    var delay = 0, duration = 500;
    for (let i = 0; i < classElem.length; i++) {
        if (classElem[i].search("delay") !== -1) {
            var nameDelay = elem.classList.item(i);
            var xuLyNameDelay = xuLyClassHieuUng(nameDelay, "-");
            delay = Number(xuLyNameDelay.after);
        }
        if (classElem[i].search("duration") !== -1) {
            var nameDuration = elem.classList.item(i);
            var xuLyNameDuration = xuLyClassHieuUng(nameDuration, "-");
            duration = Number(xuLyNameDuration.after);
        }
    }
    return {
        delay: delay,
        duration: duration
    };
}
function getPosE(el) {
    var yPos = 0;
    while(el) {
        yPos += el.offsetTop;
        el = el.offsetParent;
    }
    return yPos;
}
function addRemoveClass (elem, timeEndAnimation) {
    elem.classList.add("showing");
    if (timeEndAnimation !== 0) {
        var animateEnd = setInterval(addRemove, timeEndAnimation);
        function addRemove(){
            elem.classList.remove("hidden", "showing");
            elem.classList.add("show");
            clearInterval(animateEnd);
        }
    } else {
        elem.classList.remove("hidden", "showing");
        elem.classList.add("show");
    }
}
function elemShow(classHieuUng, elem) {
    var xuLyClass = xuLyClassHieuUng(classHieuUng, "-"),
        posMove = xuLyClass.after,
        timeDelayDuration = getDelayDuration(elem),
        delayTime = timeDelayDuration.delay,
        durationTime = timeDelayDuration.duration,
        timeEndAnimation = 0;
    if (delayTime !== 0) {
        timeEndAnimation = durationTime + delayTime;
    }
    if (xuLyClass.before == "moveLeft") {
        elem.animate([{transform: 'translateX('+ posMove +'px)', opacity: 0}, {transform: 'translateX(0px)', opacity: 1}], {duration: durationTime, easing: 'ease-in-out', delay: delayTime});
        addRemoveClass(elem, timeEndAnimation);
    }
    else if (xuLyClass.before == "moveRight") {
        elem.animate([{transform: 'translateX('+ (-posMove) +'px)', opacity: 0}, {transform: 'translateX(0px)', opacity: 1}], {duration: durationTime, easing: 'ease-in-out', delay: delayTime});
        addRemoveClass(elem, timeEndAnimation);
    }
    else if (xuLyClass.before == "moveTop") {
        elem.animate([{transform: 'translateY('+ posMove +'px)', opacity: 0}, {transform: 'translateY(0px)', opacity: 1}], {duration: durationTime, easing: 'ease-in-out', delay: delayTime});
        addRemoveClass(elem, timeEndAnimation);
    }
    else if (xuLyClass.before == "moveBottom") {
        elem.animate([{transform: 'translateY('+ (-posMove) +'px)', opacity: 0}, {transform: 'translateY(0px)', opacity: 1}], {duration: durationTime, easing: 'ease-in-out', delay: delayTime});
        addRemoveClass(elem, timeEndAnimation);
    }
    else if (xuLyClass.before == "fadeIn") {
        elem.animate([{opacity: 0}, {opacity: 1}], {duration: durationTime, easing: 'ease-in-out', delay: delayTime});
        addRemoveClass(elem, timeEndAnimation);
    }
}
function getPosHieuUng(classHieuUng) {
    var posHieuUng = [];
    var hieuUng = document.querySelectorAll(classHieuUng);
    var pos_scroll = document.documentElement.scrollTop;
    var windowHeight = window.innerHeight;
    var posShow = windowHeight + pos_scroll;
    for (let i = 0; i < hieuUng.length; i++) {
        posHieuUng[i] = getPosE(hieuUng[i]);
        if ((posShow > posHieuUng[i]) && (hieuUng[i].classList.contains("hidden") === true) && (hieuUng[i].classList.contains("showing") === false)) {
            elemShow(classHieuUng, hieuUng[i]);
        }
    }
}
function checkElementShow(className) {
    className = className.split(", ");
    for (let c = 0; c < className.length; c++) {
        const classSingle = className[c];
        var elem = document.querySelectorAll(classSingle);
        var winHeight = window.innerHeight;
        var posE = [];
        for (let i = 0; i < elem.length; i++) {
            const element = elem[i];
            posE[i] = getPosE(element);
            if ((posE[i] < winHeight) && (element.classList.contains("hidden") === true) && (element.classList.contains("showing") === false)) {
                elemShow(classSingle, element);
            }
        }
    }
}