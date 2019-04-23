<?php
/**
 * @package dazzling
 */
?>
<?php $all_gallery = sizeof(rwmb_meta( 'gallery' )); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="gallery-project main-gallery moveLeft-500 duration-1000 hidden <?php echo ($all_gallery == 1) ? "one-pic" : "" ?>">
		<?php
			if($all_gallery == 1) {
				$images = rwmb_meta( 'gallery' );
			} else {
				$images = rwmb_meta( 'gallery', array( 'size' => 'medium-img', 'limit' => 6 ) );
			}
			$images_num = 0; $images_item;
			foreach ( $images as $image ) {
				$images_item.= '<a href="#" class="showGallery" data-slide=".all-gallery" data-number="'. $images_num .'" data-target="view-photo" data-toggle="tooltip" title="Click vào để xem ảnh"><img ';
				if ($images_num == 0) {
					$images_item.= 'data-no-lazy="1" src="'. $image['url'] .'" alt="'. $image['title'] .'" srcset="'. $image['srcset'] .'"></a>';
				} else {
					$images_item.= 'data-src="'. $image['url'] .'" alt="'. $image['title'] .'" srcset="'. $image['srcset'] .'"></a>';
				}
				$images_num++;
			}
			echo $images_item;
		?>
		<?php if($all_gallery > 1) : ?>
		<div class="container">
			<div class="row">
				<p class="img-quality fadeIn duration-1000 delay-1000 hidden" data-toggle="tooltip" title="Xem <?php echo $all_gallery; ?> ảnh của dự án"><i class="far fa-images"></i><?php echo $all_gallery; ?> ảnh</p>
			</div>
		</div>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="menu-project moveRight-500 duration-1000 hidden">
		<div class="container">
			<div class="row">
				<ul class="col-xs-12">
					<li class="active"><a href="#detail-ticket">Thông tin vé</a></li>
					<li><a href="#service">Gói dịch vụ</a></li>
					<li><a href="#experience">Trải nghiệm</a></li>
					<li><a href="#user-manual">Hướng dẫn sử dụng</a></li>
					<li><a href="#refund-policy">Chính sách hoàn vé</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
        <div class="row">
			<?php echo the_breadcrumb(); ?>
            <div class="col-xs-12">
                <div class="header-project moveRight-500 duration-1000 hidden">
                    <div class="container">
                        <div class="row">
                            <div class="header-title col-lg-8">
                                <h1 class="project-title">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="review-star col-lg-4">
                                <div class="review-step1">
                                    <p class="text-step1">Bạn đánh giá sản phẩm này được mấy sao?</p>
                                    <p class="arrow-step1 text-xs-center"><i class="fas fa-arrow-down"></i></p>
                                </div>
                                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="content-project">
		<div class="container">
			<div class="row">
				<div class="info-left col-lg-8">
					<div id="detail-ticket">
						<div class="subinfo-ticket border moveTop-500 duration-1000 hidden">
							<div class="container">
								<div class="row">
									<?php $info_ticket = rwmb_meta('chi-tiet-ve'); ?>
									<?php if ($info_ticket['hoan-huy'] != "") : ?>
									<p class="cancel-ticket">
										<svg class="icon icon-cancel" viewBox="0 0 24 24" width="100%" height="100%"><path d="M6.635 4.717l1.463.293a.5.5 0 0 1-.196.98l-2.5-.5a.5.5 0 0 1-.387-.614l.495-2.474a.5.5 0 0 1 .98.196L6.258 3.76A10.225 10.225 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12a.5.5 0 1 1 1 0 9 9 0 1 0 9-9 9.213 9.213 0 0 0-5.365 1.717zM11.5 15.99v-3.643c-1.693-.654-2.5-1.34-2.5-2.62 0-1.383 1.088-2.515 2.5-2.734V6.5a.5.5 0 1 1 1 0v.493c1.412.22 2.5 1.351 2.5 2.734a.5.5 0 1 1-1 0c0-.817-.632-1.519-1.5-1.717v3.633c1.674.6 2.5 1.328 2.5 2.63 0 1.383-1.088 2.515-2.5 2.734v.493a.5.5 0 1 1-1 0v-.493c-1.412-.22-2.5-1.351-2.5-2.734a.5.5 0 1 1 1 0c0 .817.632 1.519 1.5 1.717zm1 0c.868-.198 1.5-.9 1.5-1.717 0-.68-.443-1.135-1.5-1.561v3.278zm-1-4.722V8.01c-.868.198-1.5.9-1.5 1.717 0 .647.443 1.086 1.5 1.54z"></path></svg>
										<span><?php echo $info_ticket['hoan-huy']; ?></span>
									</p>
									<?php endif; ?>
									<?php if ($info_ticket['loai-ve'] != "") : ?>
									<p class="type-ticket">
										<svg class="icon icon-type" viewBox="0 0 24 24" width="100%" height="100%"><path d="M18 8h-3a1.5 1.5 0 0 1-1.5-1.5V4h-6A1.5 1.5 0 0 0 6 5.5V12h12V8zm-4.028-5a.49.49 0 0 1 .36.126l4.5 4c.126.112.177.26.168.402V12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2V5.5A2.5 2.5 0 0 1 7.5 3h6.472zM18.5 13H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-.5zm-4-6.5a.5.5 0 0 0 .5.5h2.185L14.5 4.613V6.5zM7 17a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
										<span><?php echo $info_ticket['loai-ve']; ?></span>
									</p>
									<?php endif; ?>
									<?php if ($info_ticket['vao-cong'] != "") : ?>
									<p class="gate-ticket">
										<svg class="icon icon-gate" viewBox="0 0 24 24" width="100%" height="100%"><path d="M6 4a1 1 0 0 0-1 1v15.365l1.36-1.133a1 1 0 0 1 1.265-.012l1.871 1.5 1.88-1.501a1 1 0 0 1 1.249 0l1.875 1.5 1.875-1.5a1 1 0 0 1 1.265.013L19 20.365V5a1 1 0 0 0-1-1H6zm0-1h12a2 2 0 0 1 2 2v15.365a1 1 0 0 1-1.64.768L17 20l-1.875 1.5a1 1 0 0 1-1.25 0L12 20l-1.88 1.5a1 1 0 0 1-1.249 0L7 20l-1.36 1.133A1 1 0 0 1 4 20.365V5a2 2 0 0 1 2-2zm2 4.5a.5.5 0 0 1 0-1h8a.5.5 0 1 1 0 1H8zm0 4a.5.5 0 1 1 0-1h8a.5.5 0 1 1 0 1H8zm0 4a.5.5 0 1 1 0-1h4a.5.5 0 1 1 0 1H8z"></path></svg>
										<span><?php echo $info_ticket['vao-cong']; ?></span>
									</p>
									<?php endif; ?>
									<?php if ($info_ticket['thoi-han'] != "") : ?>
									<p class="date-ticket">
										<svg class="icon icon-date" viewBox="0 0 24 24" width="100%" height="100%"><path d="M5.935 19.951a.5.5 0 0 1 .607-.794A8.957 8.957 0 0 0 12 21a9 9 0 1 0-9-9c0 2.004.656 3.903 1.85 5.461a.5.5 0 0 1-.794.608A9.94 9.94 0 0 1 2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.957 9.957 0 0 1-6.065-2.049zM12 11.997h5a.5.5 0 0 1 0 1h-5.5a.5.5 0 0 1-.5-.5V7a.5.5 0 1 1 1 0v4.997z"></path></svg>
										<span><?php echo $info_ticket['thoi-han']; ?></span>
									</p>
									<?php endif; ?>
									<?php
										if ($info_ticket['ngay-dat-ve-tu'] == "ngày mai") { $startDay = new DateTime('tomorrow'); }
										elseif ($info_ticket['ngay-dat-ve-tu'] == "hôm nay" || $info_ticket['ngay-dat-ve-tu'] == "") { $startDay = new DateTime(); }
										if ($info_ticket['ngay-dat-ve-den'] == "") { $endDay = date_modify(new DateTime(), "+58 days"); }
									?>
									<input type="hidden" name="startDay" value="<?php if ($startDay) { echo $startDay->format('d/m/Y'); } else { echo $info_ticket['ngay-dat-ve-tu']; } ?>">
									<input type="hidden" name="endDay" value="<?php if ($endDay) { echo $endDay->format('d/m/Y'); } else { echo $info_ticket['ngay-dat-ve-den']; } ?>">
								</div>
							</div>
						</div>
						<div class="hotline-project mobile-box">
							<div class="status-hotline">
								<p>Đặt vé tại <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong>Nào Cùng Đi</strong></a> sẽ tiết kiệm hơn so với mua vé trực tiếp tại quầy vé <?php rwmb_the_value('vi-tri'); ?></p>
								<div class="arrow"></div>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<p class="sales-off">Tiết kiệm đến <span>-<?php echo round((($info_ticket['gia-quay'] - $info_ticket['gia-naocungdi'])/$info_ticket['gia-quay'])*100); ?>%</span></p>
										<p class="price">Giá chỉ còn: <span class="price-agent"><?php echo number_format($info_ticket['gia-quay'], 0, ",", "."); ?><sup>đ</sup></span><span class="price-naocungdi"><?php echo number_format($info_ticket['gia-naocungdi'], 0, ",", "."); ?><sup>đ</sup></span></p>
									</div>
									<div class="col-xs-12 hotline-number">
										<a id="order-online-mobile"><i class="fas fa-bolt"></i>Đặt vé ngay</a>
										<a id="review-button-mobile"><i class="far fa-comments"></i>Đánh giá</a>
									</div>
									<div class="col-xs-12 footer-hotline">
										<p class="receive-ticket"><i class="fas fa-clock"></i>Nhận vé ngay trong vòng 24h</p>
										<p class="sold-ticket"><i class="fas fa-fire"></i><?php echo number_format($info_ticket['ve-da-ban'], 0, ",", "."); ?>+ người đã mua</p>
									</div>
								</div>
							</div>
						</div>
						<?php if (get_the_content()) : ?>
						<div class="description-ticket moveTop-500 duration-1000 hidden">
							<?php the_content(); ?>
						</div>
						<?php endif; ?>
					</div>
					<?php $info_service = rwmb_meta('goi-dich-vu'); ?>
					<?php if ($info_service[0]['ten-dich-vu'] != "") : $detail_service = rwmb_meta('mo-ta-goi-dich-vu'); ?>
					<div class="info-introdution info-ticket mb-2 moveTop-500 duration-1000 hidden">
						<h2 id="service">Các gói dịch vụ</h2>
						<div class="date-choose">
							<span class="icon-date">
								<i class="far fa-calendar-alt"></i>
							</span>
							<input class="date-ticket" placeholder="Chọn ngày đặt vé tham quan" readonly id="date">
						</div>
						<?php $i = 0; foreach ($info_service as $item_service) { ?>
						<div class="info-content container">
							<div class="item-service row">
								<div class="name-service col-md-8 col-sm-7">
									<p><?php echo $item_service['ten-dich-vu']; ?></p>
									<?php if ($detail_service[$i] != "") : ?>
									<p class="view-detail" data-toggle="collapse" data-target="#detail-service-<?php echo $i; ?>" aria-expanded="false" aria-controls="detail-service-<?php echo $i; ?>">Chi tiết gói dịch vụ <i class="fas fa-angle-down"></i></p>
									<?php endif; ?>
								</div>
								<div class="price-service col-md-2 col-sm-3 col-xs-6">
									<span><?php echo number_format($item_service['gia-naocungdi'], 0, ",", ".") ?><sup>đ</sup></span>
									<span><?php echo number_format($item_service['gia-quay'], 0, ",", ".") ?><sup>đ</sup></span>
								</div>
								<div class="button-service col-md-2 col-sm-2 col-xs-6">
									<a href="#" class="btn btn-service" data-form="#form-booking-<?php echo $i; ?>">Chọn</a>
								</div>
								<form id="form-booking-<?php echo $i; ?>" class="form-booking">
									<div class="container">
										<div class="row">
											<div class="col-md-4 col-sm-6">
												<label for="name">Họ tên</label>
												<input type="text" name="name" class="name" placeholder="Họ tên của bạn">
											</div>
											<div class="col-md-4 col-sm-6">
												<label for="email">Email</label>
												<input type="email" name="email" class="email" placeholder="Email nhận vé điện tử">
											</div>
											<div class="col-md-4 col-sm-6">
												<label for="phone">Số điện thoại</label>
												<input type="text" name="phone" class="phone" placeholder="Số điện thoại liên hệ">
											</div>
											<div class="col-md-4 col-sm-6">
												<label for="date-ticket">Ngày đặt vé</label>
												<input name="date-ticket" class="date-ticket" placeholder="Ngày đặt vé tham quan" readonly>
											</div>
											<?php if (has_tag('dat-xe') || in_category('xe-dua-don-tai-san-bay')) : ?>
											<div class="col-md-4 col-sm-6">
												<label for="adult-ticket">Số lượng xe</label>
												<input type="number" min="0" name="adult-ticket" class="adult-ticket" data-form="#form-booking-<?php echo $i; ?>" data-price="<?php echo number_format($item_service['gia-naocungdi'], 0, ",", "."); ?>" placeholder="<?php echo number_format($item_service['gia-naocungdi'], 0, ",", "."); ?>đ/xe">
											</div>
											<?php else : ?>
											<div class="col-md-4 col-sm-6">
												<label for="adult-ticket">Số lượng vé người lớn</label>
												<input type="number" min="0" name="adult-ticket" class="adult-ticket" data-form="#form-booking-<?php echo $i; ?>" data-price="<?php echo number_format($item_service['gia-naocungdi'], 0, ",", "."); ?>" placeholder="<?php echo number_format($item_service['gia-naocungdi'], 0, ",", "."); ?>đ/vé">
											</div>
											<div class="col-md-4 col-sm-6">
												<label for="child-ticket">Số lượng vé trẻ em (3 - 12 tuổi)</label>
												<?php if ($item_service['gia-ve-tre-em']) : ?>
												<input type="number" min="0" name="child-ticket" class="child-ticket" data-form="#form-booking-<?php echo $i; ?>" data-price="<?php echo number_format($item_service['gia-ve-tre-em'], 0, ",", "."); ?>" placeholder="<?php echo number_format($item_service['gia-ve-tre-em'], 0, ",", "."); ?>đ/vé">
												<?php else : ?>
												<input type="number" min="0" name="child-ticket" class="child-ticket" data-form="#form-booking-<?php echo $i; ?>" placeholder="Bằng giá vé người lớn" disabled>
												<?php endif; ?>
											</div>
											<?php endif; ?>
											<div class="col-md-8 col-sm-6 total-price"></div>
											<div class="col-md-4 col-sm-6">
												<input type="hidden" name="name-service" class="name-service" value="<?php the_title(); ?>">
												<input type="hidden" name="name-ticket" class="name-ticket" value="<?php echo $item_service['ten-dich-vu']; ?>">
												<input type="hidden" name="price-ticket" class="price-ticket" value="">
												<input class="btn btn-booking" type="submit" value="Đặt vé" data-form="#form-booking-<?php echo $i; ?>">
											</div>
										</div>
									</div>
									<div class="status-booking"></div>
								</form>
								<?php if ($detail_service[$i] != "") : ?>
								<div id="detail-service-<?php echo $i; ?>" class="detail-service collapse col-xs-12">
									<?php echo $detail_service[$i]; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php $i++; } ?>
					</div>
					<?php endif; ?>
					<?php if (rwmb_meta('trai-nghiem-gi')) : ?>
					<div class="info-introdution info-ticket moveTop-500 duration-1000 hidden">
						<h2 id="experience">Trải nghiệm thú vị</h2>
						<div class="info-content">
							<?php echo rwmb_meta('trai-nghiem-gi'); ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if (rwmb_meta('huong-dan-su-dung-ve')) : ?>
					<div class="info-introdution info-ticket moveTop-500 duration-1000 hidden">
						<h2 id="user-manual">Hướng dẫn sử dụng</h2>
						<div class="info-content">
							<?php echo rwmb_meta('huong-dan-su-dung-ve'); ?>
						</div>
					</div>
					<?php endif; ?>
					<?php
						$info_traveling = rwmb_meta( 'info-traveling' );
						$info_eating = rwmb_meta( 'info-eating' );
						$info_staying = rwmb_meta( 'info-staying' );
					?>
					<div id="accordion">
						<div>
							<div id="info-location" class="collapse in" aria-labelledby="title-location" data-parent="#accordion">
							<div class="card-body moveTop-500 duration-1000 hidden">
								<div class="map-location">
									<?php $viTriProject = rwmb_meta('dia-diem-du-lich'); $latLngProject = explode(',', $viTriProject); ?>
									<div id="map-project" data-lat="<?php echo $latLngProject[0]; ?>" data-lng="<?php echo $latLngProject[1]; ?>" data-name="<span class='info-window'><?php if (in_category('kinh-nghiem-du-lich')) { echo 'Trung tâm '; rwmb_the_value('vi-tri'); } else { the_title(); } ?></span><?php if (!in_category('kinh-nghiem-du-lich')) { echo '<br/>'; rwmb_the_value('vi-tri');  } ?><br/><a href='#' id='view-direction' data-lat='<?php echo $latLngProject[0]; ?>' data-lng='<?php echo $latLngProject[1]; ?>' data-window='all'>Chỉ đường từ vị trí của bạn đến nơi này</a>"></div>
									<div id="direction-panel">
										<a href="#" id="hidden-panel" data-status="hidden">Ẩn bảng chỉ đường</a>
									</div>
									<p id="name-project"><i class="fas fa-star"></i><?php rwmb_the_value('vi-tri'); ?></p>
								<?php
									$id_traveling = 1;
									if ($info_traveling[0][0] != "") {
								?>
									<div class="container list-traveling">
										<div class="row">
											<p class="guide-map">* Bấm vào tên những địa điểm bên dưới để xem chi tiết về địa điểm đó trong bản đồ</p>
										<?php
											foreach ( $info_traveling as $value ) {
												$latLng_traveling = explode(',', $value[2]);
												$labels_traveling = explode('|', '0|A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z');
												$content = '<div class="col-md-6 location-item location-traveling" data-lat="' . $latLng_traveling[0] . '" data-lng="'. $latLng_traveling[1] .'" data-name="<span class='. "info-window" .'>'. $value[0] .'</span>';
												if ($value[3] != "") {
													$content.= "<a class='more-info' href='". $value[3] ."' target='_blank'>Xem chi tiết</a>";
												}
												if (in_category('kinh-nghiem-du-lich')) {
													if ($value[1] !== "") {
														$content.= "<br/>cách Trung tâm ". rwmb_meta('vi-tri') ." ". $value[1];
													}
													$content.= "<br/><a href='#' id='view-direction' data-lat='". $latLng_traveling[0] ."' data-lng='". $latLng_traveling[1] ."' data-window='travel'>Chỉ đường từ vị trí của bạn đến nơi này</a>";
												} else {
													if ($value[1] !== "") {
														$content.= "<br/>cách ". get_the_title() ." ". $value[1];
													}
													$content.= "<br/><a href='#' id='view-direction' data-lat='". $latLng_traveling[0] ."' data-lng='". $latLng_traveling[1] ."' data-window='travel'>Chỉ đường từ vị trí của bạn đến nơi này</a>";
												}
												$content.= '"><i class="fas fa-map-marker"><span>'. $labels_traveling[$id_traveling] .'</span></i><span>'. $value[0] .'</span><span class="float-xs-right">'. $value[1] .'</span></div>';
												echo $content;
												$id_traveling++;
											}
										?>
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
							</div>
						</div>
					</div>
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>
				<?php
					$term_list = wp_get_post_terms($post->ID, 'category', ['fields' => 'all']);
					$tags = wp_get_post_tags($post->ID);
					$except_tag = array("Việt Nam", "Thái Lan", "Malaysia", "Indonesia", "Singapore", "Myanmar", "Campuchia", "Lào", "Đài Loan", "Hàn Quốc", "Nhật Bản", "Trung Quốc");
					if ($term_list) {
						foreach($term_list as $term) {
							if( get_post_meta($post->ID, '_yoast_wpseo_primary_category', true) == $term->term_id ) {
									$cat_ID = $term->term_id;
									if ($term->slug == "kinh-nghiem-du-lich") {
										$cat_name = "Địa điểm du lịch";
										$cat_url = "dia-diem-du-lich";
									} else {
										$cat_name = $term->name;
										$cat_url = $term->slug;
									}
							}
						}
					}
					if ($tags) {
						$tag_ids = array();
						foreach($tags as $individual_tag) {
							if (!in_array($individual_tag->name, $except_tag)) {
								$tag_ids[] = $individual_tag->term_id;
							}
							if (sizeof($tags) == 1) {
								$tag_ids[] = $individual_tag->term_id;
							}
							if (!$tags_name) {
								$tags_name = $individual_tag->name;
							} else {
								$tags_name = $tags_name . " - " . $individual_tag->name;
							}
						}
						$list_tags = implode(",", $tag_ids);
					}
				?>
				<div class="info-right col-lg-4">
					<div class="sidebar-project moveTop-500 duration-1000 hidden">
						<div class="hotline-project">
							<div class="status-hotline">
								<p>Đặt vé tại <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong>Nào Cùng Đi</strong></a> sẽ tiết kiệm hơn so với mua vé trực tiếp tại quầy vé <?php rwmb_the_value('vi-tri'); ?></p>
								<div class="arrow"></div>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<p class="sales-off">Tiết kiệm đến <span>-<?php echo round((($info_ticket['gia-quay'] - $info_ticket['gia-naocungdi'])/$info_ticket['gia-quay'])*100); ?>%</span></p>
										<p class="price">Giá chỉ còn: <span class="price-agent"><?php echo number_format($info_ticket['gia-quay'], 0, ",", "."); ?><sup>đ</sup></span><span class="price-naocungdi"><?php echo number_format($info_ticket['gia-naocungdi'], 0, ",", "."); ?><sup>đ</sup></span></p>
									</div>
									<div class="col-xs-12 hotline-number">
										<a id="order-online"><i class="fas fa-bolt"></i>Đặt vé ngay</a>
										<a id="review-button"><i class="far fa-comments"></i>Đánh giá</a>
									</div>
									<div class="col-xs-12 footer-hotline">
										<p class="receive-ticket"><i class="fas fa-clock"></i>Nhận vé ngay trong vòng 24h</p>
										<p class="sold-ticket"><i class="fas fa-fire"></i><?php echo number_format($info_ticket['ve-da-ban'], 0, ",", "."); ?>+ người đã mua</p>
									</div>
								</div>
							</div>
						</div>
						<?php
							$query_topposts = array('category_name' => $cat_url, 'tag__in' => $tag_ids, 'posts_per_page' => 3, 'post__not_in' => array( get_the_ID()), 'meta_key' => 'total-score', 'orderby' => array('meta_value_num' => "DESC"));
							$top_posts = new WP_Query($query_topposts);
							if ($top_posts->have_posts()) : $number_posts = 1;
						?>
						<div class="top-posts">
							<h3><span><i class="fas fa-award"></i>Top 3</span> <?php echo $cat_name; ?><?php if($tags_name) { echo '<p class="detail-location">tại ' . $tags_name . '</p>'; } ?></h3>
							<div class="container">
								<?php while ($top_posts->have_posts()) : $top_posts->the_post(); ?>
								<div class="row">
									<div class="col-sm-4 col-xs-5">
										<div class="img-top">
											<?php the_post_thumbnail('tiny-img'); ?>
											<?php
												if ($number_posts == 1) {
													$bg_rank = "rgba(237, 26, 36, 0.9)";
												} elseif ($number_posts == 2) {
													$bg_rank = "rgba(38, 182, 239, 0.9)";
												} else {
													$bg_rank = "rgba(77, 171, 46, 0.9)";
												}
											?>
											<span class="bg-rank" style="background-color:<?php echo $bg_rank; ?>"></span>
											<span class="number-rank"><?php echo $number_posts; ?></span>
										</div>
									</div>
									<div class="col-sm-8 col-xs-7 title-top">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
										<div class="top-score" style="background-color:<?php echo $bg_rank; ?>">
											<?php echo $score = get_post_meta(get_the_ID(), 'total-score', true); ?>
										</div>
										<p class="star-top">
										<?php
											$ratings_users = get_post_meta(get_the_ID(), 'ratings_users', true);
											if ($ratings_users > 0) :
												$ratings_average = get_post_meta(get_the_ID(), 'ratings_average', true);
										?>
											<i class="fas fa-star"></i><?php echo number_format($ratings_average, 1); ?><span><?php echo "(" . $ratings_users . " đánh giá)" ?></span>
										<?php
											endif;
											$tags = wp_get_post_tags($post->ID);
											if ($tags) {
												$tags_name = ""; $tag_country = "";
												foreach($tags as $individual_tag) {
													if (!in_array($individual_tag->name, $except_tag)) {
														if ($tags_name == "") {
															$tags_name = $individual_tag->name;
														} else {
															$tags_name = $tags_name . " - " . $individual_tag->name;
														}
													} else {
														$tag_country = $individual_tag->name;
													}
												}
												echo '<span class="location-country" data-toggle="tooltip" title="', $tags_name ,' - ', $tag_country ,'"><i class="fas fa-map-marker-alt"></i>', $tags_name ,'</span>';
											}
										?>
										</p>
									</div>
									<div class="col-sm-12 dotted-line"></div>
								</div>
								<?php $number_posts++; endwhile; ?>
							</div>
						</div>
						<?php endif; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
<div class="slide-gallery all-gallery" data-slide=".all-gallery" data-number="0">
	<div class="main-slide">
		<ul>
			<?php
				$slide_gallery = rwmb_meta( 'gallery' );
				foreach ( $slide_gallery as $img_slide ) {
					echo '<li><div class="img-gallery">';
                    echo '<img data-src="', $img_slide['url'] ,'" alt="'. $img_slide['title'] .'" />';
                    if ($img_slide['caption']) {
                        echo '<div class="title-gallery">', $img_slide['caption'] ,'</div>';
                    }
                    echo '</div></li>';
				}
			?>
		</ul>
		<div class="updating"><i class="fas fa-spinner"></i></div>
		<i class="previousImg fas fa-angle-left" data-slide=".all-gallery" data-number="0"></i>
		<i class="nextImg fas fa-angle-right" data-slide=".all-gallery" data-number="0"></i>
		<i class="closeGallery fas fa-times" data-number="0"></i>
	</div>
</div>
<div class="review-step">
	<p>Cảm ơn bạn đã đánh giá địa điểm này!</p>
</div>