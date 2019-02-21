document.addEventListener('DOMContentLoaded', function () {
    // Xử lý scroll phần header menu
    var hostname = window.location.protocol + "//" + window.location.hostname + "/naocungdi/";
    window.addEventListener('scroll', function () {
        if (document.documentElement.scrollTop) {
            document.querySelector('.header').classList.add('fixed');
            if (document.querySelector('body').classList.contains('home')) {
                document.querySelector('.header .navbar-brand img').setAttribute('src', hostname + '/wp-content/uploads/2018/08/logo-naocungdi.png');
            }
        } else {
            document.querySelector('.header').classList.remove('fixed');
            if (document.querySelector('body').classList.contains('home')) {
                document.querySelector('.header .navbar-brand img').setAttribute('src', hostname + '/wp-content/uploads/2018/08/logo-naocungdi-white.png');
            }
        }
    })
    
    // Search Header
    if (document.querySelector('.search-header')) {
        document.querySelector('.search-header p').addEventListener('click', function () {
            document.querySelector('.bg-search').style.opacity = 1;
            document.querySelector('.bg-search').style.visibility = "visible";
            document.querySelector('.bg-search').addEventListener('click', function () {
                document.querySelector('.bg-search').style.opacity = 0;
                document.querySelector('.bg-search').style.visibility = "hidden";
            })
        })
        document.querySelector('.search-header .search-mobile').addEventListener('click', function () {
            document.querySelector('.bg-search').style.opacity = 1;
            document.querySelector('.bg-search').style.visibility = "visible";
            document.querySelector('.bg-search').addEventListener('click', function () {
                document.querySelector('.bg-search').style.opacity = 0;
                document.querySelector('.bg-search').style.visibility = "hidden";
            })
        })
    }
})