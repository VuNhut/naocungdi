document.addEventListener('DOMContentLoaded', function () {
    // Xử lý scroll phần header menu
    var heightHeader = document.querySelector('.navbar-brand').offsetHeight;
    window.addEventListener('scroll', function () {
        if (document.documentElement.scrollTop > heightHeader) {
            document.querySelector('.header').classList.add('fixed');
        } else {
            document.querySelector('.header').classList.remove('fixed');
        }
    })
})