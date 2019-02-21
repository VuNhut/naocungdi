(function($){
    $(document).ready(function () {
        var hostname = window.location.protocol + "//" + window.location.hostname;
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
        $(".select-location .click-sort").click(function () {
            $(".box-sort .type-sort").slideToggle();
            if ($(".select-location .click-sort i").hasClass("fa-angle-down")) {
                $(".select-location .click-sort i").removeClass("fa-angle-down");
                $(".select-location .click-sort i").addClass("fa-angle-up");
            } else {
                $(".select-location .click-sort i").removeClass("fa-angle-up");
                $(".select-location .click-sort i").addClass("fa-angle-down");
            }
        })

        $(".main-location p").click(function () {
            var element = $(this).attr('data-name');
            $(".sub-location").hide();
            $(".main-location .active").removeClass('active');
            $(this).parent().addClass('active');
            $(element).show();
        })

        $('.sub-location p').on('click', 'a', function(e){
            e.preventDefault();
            var locationName = $(this).attr('data-name');
            var sort = $(this).attr('data-sort');
            var catName = $('#filter-location').attr('data-cat');
            $(".box-location").hide();
            $(".box-sort .type-sort").hide();
            if ($(this).parent().hasClass('all-location')) {
                if (typeof(sort) === typeof(undefined)) {
                    $('#name-location').html($(".main-location .active p").text() + " - " + $(this).text());
                    $('#name-sort').html("Điểm đánh giá cao đến thấp");
                } else {
                    $('#name-sort').html($(".main-location .active p").text() + " - " + $(this).text());
                }
            } else {
                if (typeof(sort) === typeof(undefined)) {
                    $('#name-location').html($(this).text());
                    $('#name-sort').html("Điểm đánh giá cao đến thấp");
                } else {
                    $('#name-sort').html($(this).text());
                }
            }
            $(".select-location p i").removeClass("fa-angle-up");
            $(".select-location p i").addClass("fa-angle-down");
            $.ajax({
                type : "post", //Phương thức truyền post hoặc get
                dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                url : hostname + '/wp-admin/admin-ajax.php', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data : {
                    action: "loadpostcat", //Tên action
                    location: locationName,
                    cat: catName,
                    sort: sort
                },
                beforeSend: function (){
                    $('#filter-location').hide();
                    $(".updating").show();
                    $("ul.page-numbers").remove();
                    if ($("body").height() < $(window).height()) {
                        $("#content").css("height", $(window).height() - $("#footer-area").height() - $(".header").height());	
                    }
                },
                success: function(response) {
                    //Làm gì đó khi dữ liệu đã được xử lý
                    if(response.success && (response.data !== "")) {
                        $('#filter-location').html(response.data);
                        $("#content").removeAttr('style');
                    } else {
                        $('#filter-location').html("<p class='text-xs-center w-100 mt-1 mb-0'>Hiện tại không bài viết nào về địa điểm này!</p>");
                        if ($("body").height() < $(window).height()) {
                            $("#content").css("height", $(window).height() - $("#footer-area").height() - $(".header").height());	
                        }
                    }
                    $(".updating").hide();
                    $('#filter-location').show();
                    $(".type-sort p a").attr('data-name', locationName);
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    //Làm gì đó khi có lỗi xảy ra
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            })
            return false;
        })

        $("#filter-location").on('click', '.load-more a', function (event) {
            event.preventDefault();
            var offset = $(this).attr('data-offset');
            var cat = $(this).attr('data-cat');
            var tag = $(this).attr('data-tag');
            var sort = $(this).attr('data-sort');
            $.ajax({
                type : "post", //Phương thức truyền post hoặc get
                dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
                url : hostname + '/wp-admin/admin-ajax.php', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
                data : {
                    action: "loadmorepost", //Tên action
                    offset: offset,
                    cat: cat,
                    tag: tag,
                    sort: sort
                },
                beforeSend: function (){
                    $(".load-more").remove();
                    $(".updating").show();
                },
                success: function(response) {
                    //Làm gì đó khi dữ liệu đã được xử lý
                    if(response.success && (response.data !== "")) {
                        $(".updating").hide();
                        $('#filter-location').append(response.data);
                    }
                },
                error: function( jqXHR, textStatus, errorThrown ){
                    //Làm gì đó khi có lỗi xảy ra
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            })
            return false;
        })
    })
})(jQuery)