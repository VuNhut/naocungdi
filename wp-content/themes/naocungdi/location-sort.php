<?php
    global $wp_query;
    if($_GET['tags']) {
        $list_tags = $_GET['tags'];
        $args_tags = array_merge( $wp_query->query_vars, array( 'tag__in' => $list_tags ) );
        query_posts( $args_tags );
        $tags_ID = explode(',', $list_tags);
        $tags_url = array();
        $tags_name = array();
        foreach ($tags_ID as $value) {
            $tags_url[] = get_tag($value)->slug;
            $tags_name[] = get_tag($value)->name;
        }
        $list_tags_url = implode(",", $tags_url);
        $list_tags_name = implode(" - ", $tags_name);
    }
?>
<div class="col-xs-12 select-location <?php if (is_category('bi-quyet-du-lich-tiet-kiem')) echo 'tips'; ?>">
    <p class="click-select moveRight-500 duration-1000 hidden"><?php if (is_category('bi-quyet-du-lich-tiet-kiem')) { echo 'Bí quyết du lịch tại: '; } else { echo 'Chọn địa điểm: '; } ?><span id="name-location"><?php ($list_tags_name) ? print($list_tags_name) : print("Tùy chọn") ?></span><i class="fas fa-angle-down"></i></p>
    <?php if (!is_category('bi-quyet-du-lich-tiet-kiem')) : ?>
    <div class="box-sort float-sm-right">
        <div class="click-sort moveLeft-500 duration-1000 hidden">
            <p>Sắp xếp theo: <span id="name-sort">Không sắp xếp</span><i class="fas fa-angle-down"></i></p>
        </div>
        <div class="type-sort sub-location">
            <p><a href="#" data-sort="DESC" data-name="<?php echo $list_tags_url ?>">Điểm đánh giá cao đến thấp</a></p>
            <p><a href="#" data-sort="ASC" data-name="<?php echo $list_tags_url ?>">Điểm đánh giá thấp đến cao</a></p>
        </div>
    </div>
    <?php endif; ?>
    <div class="box-location">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 col-sm-4 col-md-2 main-location">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 active">
                                <p data-name=".viet-nam">Việt Nam</p>
                            </div>
                            <div class="col-xs-12">
                                <p data-name=".thai-lan">Thái Lan</p>
                            </div>
                            <div class="col-xs-12">
                                <p data-name=".malaysia">Malaysia</p>
                            </div>
							<div class="col-xs-12">
                                <p data-name=".singapore">Singapore</p>
                            </div>
							<div class="col-xs-12">
                                <p data-name=".indonesia">Indonesia</p>
                            </div>
							<div class="col-xs-12">
                                <p data-name=".myanmar">Myanmar</p>
                            </div>
							<div class="col-xs-12">
                                <p data-name=".campuchia">Campuchia</p>
                            </div>
							<div class="col-xs-12">
                                <p data-name=".dai-loan">Đài Loan</p>
                            </div>
							<div class="col-xs-12">
                                <p data-name=".han-quoc">Hàn Quốc</p>
                            </div>
							<div class="col-xs-12">
                                <p data-name=".trung-quoc">Trung Quốc</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-7 col-sm-8 col-md-10">
                    <div class="container sub-location viet-nam">
                        <div class="row">
                            <div class="col-sm-4 col-md-2">
                                <p class="all-location"><a href="#" data-name="viet-nam">Tất cả</a></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-2 main-sub">
                                <p>Miền Bắc</p>
                            </div>
                            <div class="col-sm-8 col-md-10">
                                <div class="container">
                                    <div class="row">
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="ha-noi">Hà Nội</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="moc-chau">Mộc Châu</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="hai-phong">Hải Phòng</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="co-to">Cô Tô</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="quan-lan">Quan Lạn</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="thanh-hoa">Thanh Hóa</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="sapa">Sapa</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-2 main-sub">
                                <p>Miền Trung</p>
                            </div>
                            <div class="col-sm-8 col-md-10">
                                <div class="container">
                                    <div class="row">
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="quang-binh">Quảng Bình</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="hue">Huế</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="da-nang">Đà Nẵng</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="hoi-an">Hội An</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="ly-son">Lý Sơn</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="quy-nhon">Quy Nhơn</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="phu-yen">Phú Yên</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="nha-trang">Nha Trang</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-md-2 main-sub">
                                <p>Miền Nam</p>
                            </div>
                            <div class="col-sm-8 col-md-10">
                                <div class="container">
                                    <div class="row">
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="lagi">Lagi</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="da-lat">Đà Lạt</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="ho-chi-minh">Hồ Chí Minh</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="phu-quoc">Phú Quốc</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="nam-du">Nam Du</a></p>
                                        <p class="col-sm-6 col-md-3"><a href="#" data-name="con-dao">Côn Đảo</a></p>
										<p class="col-sm-6 col-md-3"><a href="#" data-name="can-tho">Cần Thơ</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container sub-location thai-lan">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="thai-lan">Tất cả</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="bangkok">Bangkok</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="pattaya">Pattaya</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="hua-hin">Hua Hin</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="phuket">Phuket</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="krabi">Krabi</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="chiang-mai">Chiang Mai</a></p>
                        </div>
                    </div>
                    <div class="container sub-location malaysia">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="malaysia">Tất cả</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="kuala-lumpur">Kuala Lumpur</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="penang">Penang</a></p>
                        </div>
                    </div>
					<div class="container sub-location indonesia">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="indonesia">Tất cả</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="bali">Bali</a></p>
                        </div>
                    </div>
					<div class="container sub-location singapore">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="singapore">Tất cả</a></p>
                        </div>
                    </div>
					<div class="container sub-location campuchia">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="campuchia">Tất cả</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="koh-rong-samloem">Koh Rong Samloem</a></p>
                        </div>
                    </div>
					<div class="container sub-location han-quoc">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="han-quoc">Tất cả</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="seoul">Seoul</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="jeju">Jeju</a></p>
                        </div>
                    </div>
					<div class="container sub-location dai-loan">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="dai-loan">Tất cả</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="dai-bac">Đài Bắc</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="cao-hung">Cao Hùng</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="dai-trung">Đài Trung</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="gia-nghia">Gia Nghĩa</a></p>
                        </div>
                    </div>
					<div class="container sub-location trung-quoc">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="trung-quoc">Tất cả</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="bac-kinh">Bắc Kinh</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="hongkong">HongKong</a></p>
                        </div>
                    </div>
					<div class="container sub-location myanmar">
                        <div class="row">
                            <p class="col-sm-4 col-md-3 col-lg-2 all-location"><a href="#" data-name="myanmar">Tất cả</a></p>
                            <p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="yangon">Yangon</a></p>
							<p class="col-sm-4 col-md-3 col-lg-2"><a href="#" data-name="bagan">Bagan</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>