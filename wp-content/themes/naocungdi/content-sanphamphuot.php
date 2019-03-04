<?php
/**
 * @package dazzling
 */
?>
<?php $all_gallery = sizeof(rwmb_meta( 'gallery' )); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="menu-project menu-shopphuot">
		<div class="container">
			<div class="row">
				<ul class="col-xs-12">
					<li class="active"><a href="#detail-ticket">Giới thiệu sản phẩm</a></li>
					<li><a href="#service">Đặt hàng</a></li>
					<li><a href="#user-manual">Hướng dẫn liên quan</a></li>
					<li><a href="#comments">Đánh giá sản phẩm</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header-project moveRight-500 duration-1000 hidden">
                    <div class="container">
                        <div class="row">
                            <div class="header-title col-lg-8">
                                <h1 class="project-title fw-600">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="review-star col-lg-4">
                                <div class="review-step1">
                                    <p class="text-step1">Theo bạn địa điểm này được mấy sao?</p>
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
						<div class="slide-img-product container">
							<div class="row">
								<div class='wrapper col-md-8'>
									<div class='thumbs'>
										<div class="swiper-container gallery-thumbs">
											<div class="swiper-wrapper">
											<?php
												$images = rwmb_meta( 'gallery', array( 'size' => 'medium-img' ) );
												foreach ( $images as $image ) {
													echo "<div class='swiper-slide'><img src='", $image['url'] ,"' ></div>";
												}
											?>
											</div>
										</div>
									</div>
									<div class='gallery'>
										<div class="swiper-container gallery-top">
											<div class="swiper-wrapper">
											<?php
												foreach ( $images as $image ) {
													echo "<div class='swiper-slide'><img src='", $image['url'] ,"' ></div>";
												}
											?>
											</div>
										</div>
									</div>
								</div>
								<div class="subinfo-ticket subinfo-product moveTop-500 duration-1000 hidden col-md-4">
									<?php $info_ticket = rwmb_meta('chi-tiet-san-pham'); ?>
									<?php if ($info_ticket['thuong-hieu'] != "") : ?>
									<p class="trademark">
										<svg class="icon icon-gate" viewBox="0 0 24 24" width="100%" height="100%"><path d="M6 4a1 1 0 0 0-1 1v15.365l1.36-1.133a1 1 0 0 1 1.265-.012l1.871 1.5 1.88-1.501a1 1 0 0 1 1.249 0l1.875 1.5 1.875-1.5a1 1 0 0 1 1.265.013L19 20.365V5a1 1 0 0 0-1-1H6zm0-1h12a2 2 0 0 1 2 2v15.365a1 1 0 0 1-1.64.768L17 20l-1.875 1.5a1 1 0 0 1-1.25 0L12 20l-1.88 1.5a1 1 0 0 1-1.249 0L7 20l-1.36 1.133A1 1 0 0 1 4 20.365V5a2 2 0 0 1 2-2zm2 4.5a.5.5 0 0 1 0-1h8a.5.5 0 1 1 0 1H8zm0 4a.5.5 0 1 1 0-1h8a.5.5 0 1 1 0 1H8zm0 4a.5.5 0 1 1 0-1h4a.5.5 0 1 1 0 1H8z"></path></svg>
										<span>Thương hiệu: <?php echo $info_ticket['thuong-hieu']; ?></span>
									</p>
									<?php endif; ?>
									<?php if ($info_ticket['doi-tra'] != "") : ?>
									<p class="returns">
										<svg class="icon icon-cancel" viewBox="0 0 24 24" width="100%" height="100%"><path d="M6.635 4.717l1.463.293a.5.5 0 0 1-.196.98l-2.5-.5a.5.5 0 0 1-.387-.614l.495-2.474a.5.5 0 0 1 .98.196L6.258 3.76A10.225 10.225 0 0 1 12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12a.5.5 0 1 1 1 0 9 9 0 1 0 9-9 9.213 9.213 0 0 0-5.365 1.717zM11.5 15.99v-3.643c-1.693-.654-2.5-1.34-2.5-2.62 0-1.383 1.088-2.515 2.5-2.734V6.5a.5.5 0 1 1 1 0v.493c1.412.22 2.5 1.351 2.5 2.734a.5.5 0 1 1-1 0c0-.817-.632-1.519-1.5-1.717v3.633c1.674.6 2.5 1.328 2.5 2.63 0 1.383-1.088 2.515-2.5 2.734v.493a.5.5 0 1 1-1 0v-.493c-1.412-.22-2.5-1.351-2.5-2.734a.5.5 0 1 1 1 0c0 .817.632 1.519 1.5 1.717zm1 0c.868-.198 1.5-.9 1.5-1.717 0-.68-.443-1.135-1.5-1.561v3.278zm-1-4.722V8.01c-.868.198-1.5.9-1.5 1.717 0 .647.443 1.086 1.5 1.54z"></path></svg>
										<span>Đổi trả: <?php echo $info_ticket['doi-tra']; ?></span>
									</p>
									<?php endif; ?>
									<?php if (rwmb_meta('thong-tin-chi-tiet')) : ?>
									<div class="detail-product">
										<?php echo rwmb_meta('thong-tin-chi-tiet'); ?>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="hotline-project mobile-box">
							<div class="status-hotline">
								<p>Đặt mua đồ phượt tại <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong>Nào Cùng Đi</strong></a> sẽ tiết kiệm nhất và chất lượng sản phẩm luôn được đảm bảo</p>
								<div class="arrow"></div>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<p class="sales-off">Tiết kiệm đến <span>-<?php echo round((($info_ticket['gia-thi-truong'] - $info_ticket['gia-khuyen-mai'])/$info_ticket['gia-thi-truong'])*100); ?>%</span></p>
										<p class="price">Giá chỉ còn: <span class="price-agent"><?php echo $info_ticket['gia-thi-truong']; ?><sup>đ</sup></span><span class="price-naocungdi"><?php echo $info_ticket['gia-khuyen-mai']; ?><sup>đ</sup></span></p>
									</div>
									<div class="col-xs-12 hotline-number">
										<a id="order-online"><i class="fas fa-bolt"></i>Đặt hàng ngay</a>
										<a id="review-button"><i class="far fa-comments"></i>Đánh giá</a>
									</div>
									<div class="col-xs-12 footer-hotline">
										<p class="receive-ticket"><i class="fas fa-clock"></i>Nhận hàng ngay trong vòng 1 - 3 ngày</p>
										<p class="sold-ticket"><i class="fas fa-fire"></i><?php echo $info_ticket['so-luong-da-ban']; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if (get_the_content()) : ?>
						<div class="description-ticket moveTop-500 duration-1000 hidden">
							<?php the_content(); ?>
						</div>
					<?php endif; ?>
					<?php $info_service = rwmb_meta('loai-san-pham'); ?>
					<?php if ($info_service[0]['ten-san-pham'] != "") : $detail_service = rwmb_meta('mo-ta-loai-san-pham'); ?>
					<div class="info-introdution info-ticket mb-2 moveTop-500 duration-1000 hidden">
						<h2 id="service">Đặt hàng</h2>
						<?php $i = 0; foreach ($info_service as $item_service) { ?>
						<div class="info-content container">
							<div class="item-service row">
								<div class="name-service col-md-8 col-sm-6">
									<?php if ($item_service['hinh-anh'] != "") : ?>
									<div class="img-service">
										<img src="<?php echo $item_service['hinh-anh'] ?>" alt="<?php echo $item_service['ten-san-pham']; ?>">
									</div>
									<?php endif; ?>
									<div class="name-product">
										<p><?php echo $item_service['ten-san-pham']; ?></p>
										<?php if ($detail_service[$i] != "") : ?>
										<p class="view-detail" data-toggle="collapse" data-target="#detail-service-<?php echo $i; ?>" aria-expanded="false" aria-controls="detail-service-<?php echo $i; ?>">Chi tiết sản phẩm <i class="fas fa-angle-down"></i></p>
										<?php endif; ?>
									</div>
								</div>
								<div class="price-service col-md-2 col-sm-3 col-xs-6">
									<span><?php echo $item_service['gia-khuyen-mai'] ?><sup>đ</sup></span>
									<span><?php echo $item_service['gia-thi-truong'] ?><sup>đ</sup></span>
								</div>
								<div class="button-service col-md-2 col-sm-3 col-xs-6">
									<a href="#" class="btn btn-service" data-form="#form-booking-<?php echo $i; ?>">Đặt mua</a>
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
											<!-- <div class="col-md-4 col-sm-6">
												<label for="date-ticket">Ngày đặt vé</label>
												<input name="date-ticket" class="date-ticket" placeholder="Ngày đặt vé tham quan" readonly>
											</div> -->
											<div class="col-md-4 col-sm-6">
												<label for="amount">Số lượng</label>
												<input type="number" min="0" name="amount" class="amount" data-form="#form-booking-<?php echo $i; ?>" data-price="<?php echo $item_service['gia-khuyen-mai']; ?>" placeholder="<?php echo $item_service['gia-khuyen-mai']; ?>đ/vé">
											</div>
											<?php if ($item_service['size']) : $size = explode(",", $item_service['size']); ?>
											<div class="col-md-4 col-sm-6">
												<label for="size">Size</label>
												<select name="size" class="size">
												<?php for ($s=0; $s < sizeof($size) ; $s++) { 
													echo "<option value='", strtolower($size[$s]) ,"'>", $size[$s] ,"</option>";
												} ?>
												</select>
											</div>
											<?php endif; ?>
											<div class="col-sm-12"></div>
											<div class="col-md-8 col-sm-6 total-price"></div>
											<div class="col-md-4 col-sm-6">
												<input type="hidden" name="name-product" class="name-product" value="<?php echo $item_service['ten-san-pham']; ?>">
												<input type="hidden" name="price-product" class="price-product" value="">
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
					<?php if (rwmb_meta('huong-dan-lien-quan')) : ?>
					<div class="info-introdution info-ticket moveTop-500 duration-1000 hidden">
						<h2 id="user-manual">Hướng dẫn liên quan</h2>
						<div class="info-content">
							<?php echo rwmb_meta('huong-dan-lien-quan'); ?>
						</div>
					</div>
					<?php endif; ?>
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
								<p>Đặt mua đồ phượt tại <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong>Nào Cùng Đi</strong></a> sẽ tiết kiệm nhất và chất lượng sản phẩm luôn được đảm bảo</p>
								<div class="arrow"></div>
							</div>
							<div class="container">
								<div class="row">
									<div class="col-xs-12">
										<p class="sales-off">Tiết kiệm đến <span>-<?php echo round((($info_ticket['gia-thi-truong'] - $info_ticket['gia-khuyen-mai'])/$info_ticket['gia-thi-truong'])*100); ?>%</span></p>
										<p class="price">Giá chỉ còn: <span class="price-agent"><?php echo $info_ticket['gia-thi-truong']; ?><sup>đ</sup></span><span class="price-naocungdi"><?php echo $info_ticket['gia-khuyen-mai']; ?><sup>đ</sup></span></p>
									</div>
									<div class="col-xs-12 hotline-number">
										<a id="order-online"><i class="fas fa-bolt"></i>Đặt hàng ngay</a>
										<a id="review-button"><i class="far fa-comments"></i>Đánh giá</a>
									</div>
									<div class="col-xs-12 footer-hotline">
										<p class="receive-ticket"><i class="fas fa-clock"></i>Nhận hàng ngay trong vòng 1 - 3 ngày</p>
										<p class="sold-ticket"><i class="fas fa-fire"></i><?php echo $info_ticket['so-luong-da-ban']; ?></p>
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
<div class="slide-gallery">
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
		<i id="previousImg" class="fas fa-angle-left"></i>
		<i id="nextImg" class="fas fa-angle-right"></i>
		<i id="closeGallery" class="fas fa-times"></i>
	</div>
</div>
<div class="review-step">
	<p>Cảm ơn bạn đã đánh giá địa điểm này!</p>
</div>