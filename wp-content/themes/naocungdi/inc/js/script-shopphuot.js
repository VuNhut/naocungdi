(function($){
    $(document).ready(function () {
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            direction: 'vertical',
            spaceBetween: 10,
            slideToClickedSlide: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            thumbs: {
                swiper: galleryThumbs
            }
        });
        
        $(".gallery-thumbs .swiper-slide").on('click', function () {
            if (!$(this).hasClass("swiper-slide-active")) {
                $(".gallery-thumbs .swiper-slide").removeClass("swiper-slide-active");
                $(this).addClass("swiper-slide-active");
            }
        });
        $('.item-service .button-service .btn-service').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            } else {
                $(this).addClass("active");
            }
            $($(this).attr('data-form')).slideToggle();
            if (typeof(Storage) !== "undefined" && localStorage.getItem("infoCustomer")) {
                var inputName = $(this).attr('data-form') + " input[name='name']",
                    inputEmail = $(this).attr('data-form') + " input[name='email']",
                    inputPhone = $(this).attr('data-form') + " input[name='phone']",
                    infoCustomer = JSON.parse(localStorage.getItem("infoCustomer"));
                $(inputName).val(infoCustomer.name);
                $(inputEmail).val(infoCustomer.email);
                $(inputPhone).val(infoCustomer.phone);
            }
        });
        jQuery.validator.addMethod("phoneValidate", function(number, element) {
            var dt_array = number.split("");
            for (var i = 0; i < dt_array.length; i++) {
                if ((dt_array[i]!=='0') && (dt_array[i]!=='1') && (dt_array[i]!=='2') && (dt_array[i]!=='3') && (dt_array[i]!=='4')
                    && (dt_array[i]!=='5') && (dt_array[i]!=='6') && (dt_array[i]!=='7') && (dt_array[i]!=='8')
                    && (dt_array[i]!=='9')) {
                        dt_array[i]='del';
                }
            }
            var dt_chuan = "";
            for (var i = 0; i < dt_array.length; i++) {
                if (dt_array[i]!=='del') {
                    dt_chuan = dt_chuan + dt_array[i];
                }
            }
            return this.optional(element) || dt_chuan.match(/^(03|05|07|08|09)[0-9]{8}$/);
        }, "Số điện thoại không đúng");
        $('.form-booking .btn-booking').on('click', function () {
            $($(this).attr('data-form')).validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "name": {
                        required: true,
                    },
                    "email": {
                        required: true,
                        email: true
                    },
                    "phone": {
                        required: true,
                        phoneValidate: true
                    },
                    "amount": {
                        required: true,
                        min: 1
                    }
                },
                messages: {
                    "name": {
                        required: "Xin vui lòng nhập Họ Tên",
                    },
                    "email": {
                        required: "Xin vui lòng nhập email",
                        email: "Địa chỉ email không tồn tại"
                    },
                    "phone": {
                        required: "Xin nhập số điện thoại",
                    },
                    "amount": {
                        required: "Xin chọn số lượng sản phẩm",
                        min: "Số lượng ít nhất phải là 1"
                    }
                },
                submitHandler: function(form) {
                    form = "#" + $(form).attr('id');
                    var name = form + " .name";
                    var email = form + " .email";
                    var phone = form + " .phone";
                    var nameProduct = form + " .name-product";
                    var priceProduct = form + " .price-product";
                    var amount = form + " .amount";
                    var e_size = form + " .size";
                    var statusBooking = form + " .status-booking";
                    var size = "";
                    if ($(e_size)) {
                        size =  $(e_size).val();
                    }
                    $.ajax({
                        url: 'https://script.google.com/macros/s/AKfycbzkf1e9VpEEiMf6eeEHJjH63gSMb7qmsgSBPPXKw5ZTEzRlzDM/exec',
                        method: "GET",
                        dataType: "json",
                        data: {"Họ tên": $(name).val(), "Email": $(email).val(), "Số điện thoại": $(phone).val(), "Tên sản phẩm": $(nameProduct).val(), "Số lượng": $(amount).val(), "Size": size, "Tổng cộng":$(priceProduct).val()},
                        beforeSend: function () {
                            $(form).children(".container").hide();
                            $(statusBooking).text("");
                            $(statusBooking).append("<div class='lds-ellipsis'><div></div><div></div><div></div><div></div></div>");
                            if (typeof(Storage) !== "undefined") {
                                var infoCustomer = {name: $(name).val(), email: $(email).val(), phone: $(phone).val()};
                                localStorage.setItem('infoCustomer', JSON.stringify(infoCustomer));
                            }
                        },
                        success: function(){
                            $.ajax({
                                url: "/naocungdi/wp-content/themes/naocungdi/sendmail.php",
                                method: "POST",
                                dataType: "text",
                                data: {"name": $(name).val(), "email": $(email).val(), "phone": $(phone).val(), "product": $(nameProduct).val(), "amount": $(amount).val(), "size": size, "total":$(priceProduct).val()},
                                success: function(data){
                                    if (data === "1") {
                                        $(statusBooking).text("");
                                        $(statusBooking).append("<p class='status'>Bạn đã đặt mua thành công. Chúng tôi đã gửi thông tin đặt hàng đến email của bạn</p>");
                                    } else {
                                        $(statusBooking).text("");
                                        $(statusBooking).append("<p class='status'>Bạn đã đặt mua thành công.</p>");
                                    }
                                },
                                error: function () {
                                    $(statusBooking).text("");
                                    $(statusBooking).append("<p class='status'>Bạn đã đặt mua thành công.</p>");
                                }
                            });
                        },
                        error: function(){
                            $(statusBooking).text("");
                            $(statusBooking).append("<p class='status'>Hệ thống đặt vé đang quá tải. Vui lòng đặt lại sau ít phút hoặc liên hệ <a href='tel:0787547947'>0787 547 947</a></p>");
                        }
                    });
                }
            });
        });
        $('.form-booking .amount').change(function(){
            var e_amount = $(this).attr('data-form') + " .amount",
                e_totalPrice = $(this).attr('data-form') + " .total-price",
                e_priceProduct = $(this).attr('data-form') + " .price-product";
            var amount = price_to_number($(e_amount).attr('data-price'))*$(e_amount).val();
            var totalPrice = "<p>Tổng cộng: <span>" + number_to_price(amount) + "</span> Số lượng x " + $(e_amount).val() + "</p>";
            $(e_totalPrice).text("");
            $(e_totalPrice).append(totalPrice);
            $(e_priceProduct).val(number_to_price(amount));
        });
        function price_to_number(v){
            if(!v){return 0;}
            v=v.split('.').join('');
            v=v.split(',').join('.');
            return Number(v.replace(/[^0-9.]/g, ""));
        }
        
        function number_to_price(v){
            if(v==0){return '0';}
            v=parseFloat(v);
            v=v.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            v=v.split('.').join('*').split(',').join('.').split('*').join(',');
            return v;
        }
    })
})(jQuery)