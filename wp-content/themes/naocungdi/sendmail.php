<?php
    //goi thu vien
    include("class.smtp.php");
    include("class.phpmailer.php");
    $nFrom = "Nào Cùng Đi";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'webnaocungdi@gmail.com';  //dia chi email cua ban 
    $mPass = 'vunhut1703';       //mat khau email cua ban
    $nTo = $_POST['name']; //Ten nguoi nhan
    $mTo = $_POST['email'];   //dia chi nhan mail
    $phone = $_POST['phone'];
    if ($_POST['ticket']) {
        $ticket = $_POST['ticket'];
        $date = $_POST['date'];
        $adult = $_POST['adult'];
        $child = $_POST['child'];
        $total = $_POST['total'];
        $mail = new PHPMailer;
        $body = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto;width:600px!important;min-width:600px!important" class="m_-3446373304322528000container">
            <tbody>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="width:500px">
                                        <a href="https://naocungdi.com/" style="border:0" target="_blank">
                                            <img src="https://naocungdi.com/wp-content/uploads/2018/08/logo-naocungdi.png" height="55" width="190" style="display:block;border:0px" class="CToWUd">
                                        </a>
                                    </td>
                                    <td align="right" valign="middle" style="padding-right:15px">
                                        <a href="#m_-3446373304322528000_" style="border:0">
                                            <img src="https://naocungdi.com/wp-content/themes/naocungdi/images/nhan-ve-trong-24-gio.jpg" height="40" width="112" style="display:block;border:0px" class="CToWUd">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">Thông báo đặt vé thành công</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">Chào '. $nTo .', <br> Cám ơn bạn đã đặt vé tại <span class="il">NaoCungDi</span>.com <br> <br> Đơn hàng của bạn đang <b>chờ thanh toán (trong vòng 24h)</b><br> Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng.</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border:1px solid #ff3333;border-top:3px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td colspan="2" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666666;padding:10px 10px 20px 15px;line-height:17px"> <b>Đơn hàng của bạn</b></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> <b>Sản phẩm</b></td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#333;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        <b>'. $ticket .'</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> <b>Ngày sử dụng</b></td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        '. $date .'
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> <b>Số lượng vé</b></td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                        <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                            Vé người lớn x '. $adult .' ; Vé trẻ em x '. $child .'
                                                        </td>
                                                    </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> <b>Tổng thanh toán</b></td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#ec1a23;line-height:20px;padding-left:10px;padding-bottom:5px"><b>'. $total .'đ</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> <b>Người đặt vé</b></td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px"> <b>'. $nTo .'</b> - Phone: '. $phone .' <br>Email nhận vé điện tử: '. $mTo .'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                        <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px"> Nếu có bất kỳ thắc mắc hay cần giúp đỡ, bạn có thể trả lời lại email này hoặc liên hệ trực tiếp thông qua hotline <a href="tel:0787547947" style="font-weight:bold">0787 547 947</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                        <table style="width:600px;padding:20px 0 0 0" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="top" width="49" style="width:49px;padding-left:10px">
                                        <a href="https://naocungdi.com" style="border:0" target="_blank">
                                            <img src="https://naocungdi.com/wp-content/uploads/2018/08/favicon-naocungdi-60x60.png" height="50" width="49" style="display:block;border:0px" class="CToWUd">
                                        </a>
                                    </td>
                                    <td align="left" width="390" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#3c3c3c;padding:0 0 0 10px;line-height:17px;width:390px">Nào Cùng Đi - Cẩm nang du lịch <br> Hotline: <a href="tel:0787547947" style="font-weight:bold">0787 547 947</a><br> Email: <a href="mailto:webnaocungdi@gmail.com" style="font-weight:bold">webnaocungdi@gmail.com</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width:600px;padding:12px 20px 50px 20px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" colspan="3" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#999999;line-height:18px">Bạn nhận được email này vì địa chỉ email của bạn 
                                        <a href="mailto:'. $mTo .'" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#ff3333;text-decoration:none" target="_blank">'. $mTo .'</a> đã đặt hàng tại <a href="https://naocungdi.com/" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#999999;text-decoration:none" target="_blank"><span class="il">NaoCungDi</span>.com</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>';   // Noi dung email
        $title = 'Nào Cùng Đi - Thông báo đặt vé thành công';   //Tieu de gui mail
    } else {
        $product = $_POST['product'];
        $amount = $_POST['amount'];
        $size = $_POST['size'];
        $total = $_POST['total'];
        if ($size != "") {
            $textSize = '<tr>
                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> <b>Size</b></td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                '. strtoupper($size) .'
                            </td>
                        </tr>';
        } else {
            $textSize = "";
        }
        $mail = new PHPMailer;
        $body = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto;width:600px!important;min-width:600px!important" class="m_-3446373304322528000container">
            <tbody>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="width:500px">
                                        <a href="https://naocungdi.com/" style="border:0" target="_blank">
                                            <img src="https://naocungdi.com/wp-content/uploads/2018/08/logo-naocungdi.png" height="55" width="190" style="display:block;border:0px" class="CToWUd">
                                        </a>
                                    </td>
                                    <td align="right" valign="middle" style="padding-right:15px">
                                        <a href="#m_-3446373304322528000_" style="border:0">
                                            <img src="https://naocungdi.com/wp-content/themes/naocungdi/images/doi-tra-hang-trong-48-gio.jpg" height="40" width="112" style="display:block;border:0px" class="CToWUd">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">Thông báo đặt hàng thành công</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">Chào '. $nTo .', <br> Cám ơn bạn đã đặt hàng tại <span class="il">NaoCungDi</span>.com <br> <br> Đơn hàng của bạn đang <b>chờ thanh toán (trong vòng 24h)</b><br> Chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng.</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border:1px solid #ff3333;border-top:3px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td colspan="2" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666666;padding:10px 10px 20px 15px;line-height:17px"> <b>Đơn hàng của bạn</b></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">
                                        <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> <b>Sản phẩm</b></td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#333;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        <b>'. $product .'</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px"> <b>Số lượng</b></td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        '. $amount .'
                                                    </td>
                                                </tr>
                                                '. $textSize .'
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> <b>Tổng thanh toán</b></td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#ec1a23;line-height:20px;padding-left:10px;padding-bottom:5px"><b>'. $total .'đ</b></td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px"> <b>Người đặt hàng</b></td>
                                                    <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td><td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px"> <b>'. $nTo .'</b> - Phone: '. $phone .' <br>Email nhận vé điện tử: '. $mTo .'</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                        <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px"> Nếu có bất kỳ thắc mắc hay cần giúp đỡ, bạn có thể trả lời lại email này hoặc liên hệ trực tiếp thông qua hotline <a href="tel:0787547947" style="font-weight:bold">0787 547 947</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" valign="top">
                        <table style="width:600px;padding:20px 0 0 0" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="top" width="49" style="width:49px;padding-left:10px">
                                        <a href="https://naocungdi.com" style="border:0" target="_blank">
                                            <img src="https://naocungdi.com/wp-content/uploads/2018/08/favicon-naocungdi-60x60.png" height="50" width="49" style="display:block;border:0px" class="CToWUd">
                                        </a>
                                    </td>
                                    <td align="left" width="390" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#3c3c3c;padding:0 0 0 10px;line-height:17px;width:390px">Nào Cùng Đi - Cẩm nang du lịch <br> Hotline: <a href="tel:0787547947" style="font-weight:bold">0787 547 947</a><br> Email: <a href="mailto:webnaocungdi@gmail.com" style="font-weight:bold">webnaocungdi@gmail.com</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width:600px;padding:12px 20px 50px 20px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top" colspan="3" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#999999;line-height:18px">Bạn nhận được email này vì địa chỉ email của bạn 
                                        <a href="mailto:'. $mTo .'" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#ff3333;text-decoration:none" target="_blank">'. $mTo .'</a> đã đặt hàng tại <a href="https://naocungdi.com/" style="font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#999999;text-decoration:none" target="_blank"><span class="il">NaoCungDi</span>.com</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>';   // Noi dung email
        $title = 'Nào Cùng Đi - Thông báo đặt hàng thành công';   //Tieu de gui mail
    }
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass; // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('webnaocungdi@gmail.com', 'Nào Cùng Đi'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo '0';  
    } else { 
        echo '1';
    }
?>