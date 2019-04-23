(function($){
    $(document).ready(function () {
        var startDay = $("input[name='startDay']").val();
        var endDay = $("input[name='endDay']").val();
        $('.date-ticket').datepicker({
            language: "vi",
            format: "dd/mm/yyyy",
            startDate: startDay,
            endDate: endDay,
			orientation: "bottom left",
			autoclose: true
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
        })
        $('#date').change(function(){
            $('form .date-ticket').val($(this).val());
            $('form .date-ticket').datepicker('setDate', $(this).val());
        });
        $('.adult-ticket, .child-ticket').change(function(){
            var e_adultTicket = $(this).attr('data-form') + " .adult-ticket",
                e_childTicket = $(this).attr('data-form') + " .child-ticket",
                e_totalPrice = $(this).attr('data-form') + " .total-price",
                e_priceTicket = $(this).attr('data-form') + " .price-ticket";
            var adultTicket = price_to_number($(e_adultTicket).attr('data-price'))*$(e_adultTicket).val();
            var totalTicket = "";
            if ($(e_childTicket).val() !== undefined) {
                var childTicket = price_to_number($(e_childTicket).attr('data-price'))*$(e_childTicket).val();
                if (adultTicket !== 0) {
                    totalTicket = totalTicket + "Vé người lớn x " + $(e_adultTicket).val();
                }
                if (childTicket !== 0) {
                    if (adultTicket !== 0) {
                        totalTicket = totalTicket + " ; "
                    }
                    totalTicket = totalTicket + "Vé trẻ em x " + $(e_childTicket).val();
                }
                var totalPrice = "<p>Tổng cộng: <span>" + number_to_price(adultTicket + childTicket) + "</span> " + totalTicket + "</p>";
                $(e_priceTicket).val(number_to_price(adultTicket + childTicket));
            } else {
                if (adultTicket !== 0) {
                    totalTicket = totalTicket + "Số lượng xe x " + $(e_adultTicket).val();
                }
                var totalPrice = "<p>Tổng cộng: <span>" + number_to_price(adultTicket) + "</span> " + totalTicket + "</p>";
                $(e_priceTicket).val(number_to_price(adultTicket));
            }
            
            $(e_totalPrice).text("");
            $(e_totalPrice).append(totalPrice);
        });
        $.validator.addMethod("phoneValidate", function(number, element) {
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
        function randomString() {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
            var string_length = 8;
            var randomstring = '';
            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            return  randomstring.toUpperCase();
        }
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
                    "date-ticket": {
                        required: true,
                    },
                    "adult-ticket": {
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
                    "date-ticket": {
                        required: "Xin chọn ngày đặt vé",
                    },
                    "adult-ticket": {
                        required: "Xin chọn số lượng",
                        min: "Số lượng ít nhất phải là 1"
                    }
                },
                submitHandler: function(form) {
                    form = "#" + $(form).attr('id');
                    var idOrder = randomString();
                    var name = form + " .name";
                    var email = form + " .email";
                    var phone = form + " .phone";
                    var nameService = form + " .name-service";
                    var nameTicket = form + " .name-ticket";
                    var dateTicket = form + " .date-ticket";
                    var priceTicket = form + " .price-ticket";
                    var adultTicket = form + " .adult-ticket";
                    var childTicket = form + " .child-ticket";
                    if($(childTicket)) {
                        if ($(childTicket).val()) {
                            childTicket = $(childTicket).val();
                        } else {
                            childTicket = 0;
                        }
                        var dataForm = {"idOrder": idOrder,"name": $(name).val(), "email": $(email).val(), "phone": $(phone).val(), "date": $(dateTicket).val(), "adult": $(adultTicket).val(), "child": childTicket, "service": $(nameService).val() , "ticket": $(nameTicket).val(), "total":$(priceTicket).val()};
                    } else {
                        var dataForm = {"idOrder": idOrder,"name": $(name).val(), "email": $(email).val(), "phone": $(phone).val(), "date": $(dateTicket).val(), "adult": $(adultTicket).val(), "service": $(nameService).val() , "ticket": $(nameTicket).val(), "total":$(priceTicket).val()};
                    }
                    var statusBooking = form + " .status-booking";
                    $.ajax({
                        url: 'https://script.google.com/macros/s/AKfycbyYiVfITGtjCao0DN1-9eSVM8VCZ0g_E4wd8ZozNugsFu2BgeI/exec',
                        method: "GET",
                        dataType: "json",
                        data: {"Mã đơn hàng": idOrder ,"Họ tên": $(name).val(), "Email": $(email).val(), "Số điện thoại": $(phone).val(), "Ngày đặt vé": $(dateTicket).val(), "Người lớn": $(adultTicket).val(), "Trẻ em": childTicket, "Tên dịch vụ": $(nameService).val() , "Sản phẩm": $(nameTicket).val(), "Tổng cộng":$(priceTicket).val()},
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
                                data: dataForm,
                                success: function(data){
                                    if (data === "1") {
                                        $(statusBooking).text("");
                                        $(statusBooking).append("<p class='status'>Bạn đã đặt vé thành công tại Nào Cùng Đi. Chúng tôi đã gửi thông tin đặt vé đến email của bạn</p>");
                                    } else {
                                        $(statusBooking).text("");
                                        $(statusBooking).append("<p class='status'>Bạn đã đặt vé thành công tại Nào Cùng Đi.</p>");
                                    }
                                },
                                error: function () {
                                    $(statusBooking).text("");
                                    $(statusBooking).append("<p class='status'>Bạn đã đặt vé thành công tại Nào Cùng Đi.</p>");
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