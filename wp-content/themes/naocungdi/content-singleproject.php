<?php
/**
 * @package dazzling
 */
require_once("yahoo-weather.php");
$viTriProject = rwmb_meta('dia-diem-du-lich');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if ($viTriProject != "") {
	$latLngProject = explode(',', $viTriProject);
	$query = array(
		'lat' => $latLngProject[0],
		'lon' => $latLngProject[1],
		'format' => 'json',
	);
	$oauth = array(
		'oauth_consumer_key' => $consumer_key,
		'oauth_nonce' => uniqid(mt_rand(1, 1000)),
		'oauth_signature_method' => 'HMAC-SHA1',
		'oauth_timestamp' => time(),
		'oauth_version' => '1.0'
	);
	$base_info = buildBaseString($url, 'GET', array_merge($query, $oauth));
	$composite_key = rawurlencode($consumer_secret) . '&';
	$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
	$oauth['oauth_signature'] = $oauth_signature;
	$header = array(
		buildAuthorizationHeader($oauth),
		'X-Yahoo-App-Id: ' . $app_id
	);
	$options = array(
		CURLOPT_HTTPHEADER => $header,
		CURLOPT_HEADER => false,
		CURLOPT_URL => $url . '?' . http_build_query($query),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false
	);
	$ch = curl_init();
	curl_setopt_array($ch, $options);
	$response = curl_exec($ch);
	curl_close($ch);
	$return_data = json_decode($response);
}
?>
<?php $all_gallery = sizeof(rwmb_meta( 'gallery' )); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="gallery-project main-gallery moveLeft-500 duration-1000 hidden">
		<?php
			$images = rwmb_meta( 'gallery', array( 'size' => 'medium-img', 'limit' => 6 ) );
			$images_num = 0; $images_item;
			foreach ( $images as $image ) {
				$images_item.= '<a href="#" class="showGallery" data-slide=".all-gallery" data-number="'. $images_num .'" data-target="view-photo" data-toggle="tooltip" title="Click vào để xem ảnh"><img ';
				if ($images_num == 0) {
					$images_item.= 'data-no-lazy="1" src="'. $image['url'] .'" alt="'. $image['title'] .'" srcset="'. $image['srcset'] .'"></a>';
				} else {
					$images_item.= 'data-lazyloaded="1" data-src="'. $image['url'] .'" alt="'. $image['title'] .'" srcset="'. $image['srcset'] .'"></a>';
				}
				$images_num++;
			}
			echo $images_item;
		?>
		<div class="container">
			<div class="row">
				<p class="img-quality fadeIn duration-1000 delay-1000 hidden" data-toggle="tooltip" title="Xem <?php echo $all_gallery; ?> ảnh"><i class="far fa-images"></i><?php echo $all_gallery; ?> ảnh</p>
				<?php if ($viTriProject != "") : ?>
				<p class="weather-header fadeIn duration-1000 delay-1000 hidden">
					<?php if ($iconWeather[$return_data->current_observation->condition->code]) : ?>
					<img width="31" src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/weather-icon/<?php echo $iconWeather[$return_data->current_observation->condition->code] ?>.svg" alt="">
					<?php endif; $tempCurrent = round(($return_data->current_observation->condition->temperature - 32)/1.8) ?>
					<span class="temp-current <?php if ($tempCurrent <= 20) : echo "color-low"; elseif ($tempCurrent > 20 && $tempCurrent <= 30) : echo "color-medium"; else : echo "color-high"; endif; ?>"><?php echo $tempCurrent; ?>°C</span>
					<span class="temp-low"><?php echo round(($return_data->forecasts[0]->low - 32)/1.8) ?>°C</span>
				</p>
				<?php endif; ?>
			</div>
		</div>
	</header><!-- .entry-header -->
	<div class="menu-project moveTop-500 duration-1000 hidden">
		<div class="container">
			<div class="row">
				<ul class="col-xs-12">
					<li class="active"><a href="#introdution">Chi tiết</a></li>
					<li><a href="#location">Địa điểm</a></li>
					<li><a href="#utilities">Đánh giá</a></li>
					<?php if ($viTriProject != "") : ?>
					<li><a href="#weather">Thời tiết</a></li>
					<?php endif; ?>
					<?php $info_progress = rwmb_meta( 'info-tien-do' ); ?>
					<?php if($info_progress[0][2] != "") : ?>
						<li><a href="#progress">Hướng dẫn</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php echo the_breadcrumb(); ?>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="header-project moveRight-500 duration-1000 hidden">
					<div class="container">
						<div class="row">
							<div class="header-title col-lg-8">
								<h1 class="project-title">
									<?php the_title(); ?>
									<?php
										if (in_category('khach-san-homestay')) {
											$star = rwmb_meta('so-sao');
											if ($star != "") {
												for ($i=0; $i < (int)$star; $i++) { 
													echo '<i class="fas fa-star"></i>';
												}
											}
										}
									?>
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
					<div class="subinfo-project moveTop-500 duration-1000 hidden">
						<p class="project-location" data-toggle="tooltip" title="Địa điểm du lịch"><i class="fas fa-map-marker-alt"></i>Điểm đến: <span><?php rwmb_the_value('vi-tri'); ?></span></p>
						<?php
							if (rwmb_meta( 'chi-phi-du-lich' )) :
								if (in_category('dia-chi-an-uong')) {
									$type_value = array('Mức giá trung bình', 'Mức giá');
								} elseif (in_category('khach-san-homestay')) {
									$type_value = array('Giá phòng tham khảo', 'Giá phòng');
								} elseif (in_category('dia-diem-du-lich')) {
									$type_value = array('Chi phí tham quan điểm du lịch', 'Giá vé');
								} elseif (in_category('kinh-nghiem-du-lich')) {
									$type_value = array('Tổng chi phí chuyến du lịch', 'Chi phí');
								}
						?>
							<p class="info-investment" data-toggle="tooltip" title="<?php echo $type_value[0]; ?>"><i class="far fa-money-bill-alt"></i><?php echo $type_value[1]; ?>:<span><?php rwmb_the_value('chi-phi-du-lich'); if (rwmb_meta('chi-phi-du-lich') != "Miễn phí") { echo '<sup>đ</sup>'; } ?></span></p>
						<?php endif; ?>
						<?php if (rwmb_meta( 'so-ngay-du-lich' )) : ?>
							<p class="info-area" data-toggle="tooltip" title="Thời gian du lịch"><i class="fas fa-cube"></i>Thời gian:<span><?php rwmb_the_value('so-ngay-du-lich'); ?></span></p>
						<?php endif; ?>
					</div>
					<ins class="adsbygoogle"
						 style="display:block"
						 data-ad-client="ca-pub-7392610376438714"
						 data-ad-slot="6964089400"
						 data-ad-format="auto"
						 data-full-width-responsive="true">
					</ins>
					<div class="info-introdution">
						<h2 id="introdution">Chi tiết</h2>
						<div class="info-content">
							<?php the_content(); ?>
							<?php if ($viTriProject != "") : ?>
							<h2 id="weather">Thời tiết 10 ngày tới</h2>
							<div class="container">
								<div class="row weather">
									<div class="col-md-5 col-sm-6 info-weather-current">
										<div class="row">
											<p class="col-sm-12 weather-location"><?php echo (rwmb_meta("vi-tri") != "") ? rwmb_meta("vi-tri") : $return_data->location->city . ", " . $return_data->location->region; ?></p>
											<?php if ($iconWeather[$return_data->current_observation->condition->code]) : ?>
											<img class="col-lg-4 col-md-5 col-sm-5 col-xs-5" src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/weather-icon/<?php echo $iconWeather[$return_data->current_observation->condition->code] ?>.svg" alt="">
											<?php endif; ?>
											<div class="col-lg-8 col-md-7 col-sm-7 col-xs-7 temp">
												<p class="temp-current"><?php echo round(($return_data->current_observation->condition->temperature - 32)/1.8) ?>°</p>
												<p class="temp-high-low">
													<span class="temp-high"><?php echo round(($return_data->forecasts[0]->high - 32)/1.8) ?>°</span>
													<span class="temp-low"><?php echo round(($return_data->forecasts[0]->low - 32)/1.8) ?>°</span>
												</p>
												<?php if ($textWeather[strtolower($return_data->current_observation->condition->text)]) : ?>
												<p class="text-weather"><?php echo $textWeather[strtolower($return_data->current_observation->condition->text)] ?></p><br>
												<?php endif; ?>
											</div>
											<p class="col-sm-12 today-info"><span>Hôm nay</span><span><?php echo date("d/m", $return_data->current_observation->pubDate) ?></span></p>
										</div>
									</div>
									<div class="col-md-7 col-sm-6 weather-slides">
										<div class="swiper-container">
											<div class="swiper-wrapper">
											<?php foreach ($return_data->forecasts as $key => $forecasts) { ?>
												<?php if ($key != 0) : ?>
												<div class="swiper-slide">
													<p class="day-info"><span><?php echo ($key == 1) ? "Ngày mai" : $day[$forecasts->day] ?></span><span><?php echo date("d/m", $forecasts->date) ?></span></p>
													<?php if ($iconWeather[$forecasts->code]) : ?>
														<img width="60" src="<?php echo home_url(); ?>/wp-content/themes/naocungdi/images/weather-icon/<?php echo $iconWeather[$forecasts->code] ?>.svg" alt="">
													<?php endif; ?>
													<p class="temp-high"><?php echo round(($forecasts->high - 32)/1.8) ?>°</p>
													<p class="temp-low"><?php echo round(($forecasts->low - 32)/1.8) ?>°</p>
												</div>
												<?php endif; ?>
											<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</div>
					<!-- Cuối bài viết -->
					<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-7392610376438714"
						data-ad-slot="1407586607"
						data-ad-format="auto"
						data-full-width-responsive="true"></ins>
					<?php
						$travel_time = rwmb_meta( 'travel-time' );
						if ($travel_time[0][0] != "") {
					?>
					<div class="travel-time moveRight-500 duration-1000 hidden">
						<?php
							foreach ($travel_time as $time) {
								echo '<span class="data-time" data-time="', $time[0] , '" data-suitable="', $time[1] ,'"></span>';
							}
						?>
						<h3>Thời điểm thích hợp để du lịch <?php rwmb_the_value('vi-tri'); ?></h3>
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<canvas id="suitable-time"></canvas>
								</div>
								<?php
									$detail_time = rwmb_meta( 'detail-travel-time' );
									if ($detail_time != "") :
								?>
								<div class="col-xs-12">
									<?php echo $detail_time; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php } ?>
					<div id="accordion">
						<?php
							if ($viTriProject != "") :
								$info_traveling = rwmb_meta( 'info-traveling' );
								$info_eating = rwmb_meta( 'info-eating' );
								$info_staying = rwmb_meta( 'info-staying' );
						?>
						<div>
							<div class="card-header moveTop-500 duration-1000 hidden" id="title-location">
								<h3 id="location" class="mb-0">
									<p class="link">Địa điểm</p>
									<p class="type-location">
									<?php if ($info_traveling[0][0] != "") : ?>
										<span class="traveling active">Địa điểm du lịch <?php if (!in_category('kinh-nghiem-du-lich')) { echo 'lân cận'; } ?></span>
									<?php endif; if ($info_eating[0][0] != "") : ?>
										<span class="eating">Địa chỉ ăn uống <?php if (!in_category('kinh-nghiem-du-lich')) { echo 'lân cận'; } ?></span>
									<?php endif; if ($info_staying[0][0] != "") : ?>
										<span class="staying">Khách sạn - Homestay <?php if (!in_category('kinh-nghiem-du-lich')) { echo 'lân cận'; } ?></span></p>
									<?php endif; ?>
								</h3>
							</div>
							<div id="info-location" class="collapse in" aria-labelledby="title-location" data-parent="#accordion">
							<div class="card-body moveTop-500 duration-1000 hidden">
								<div class="map-location">
									<div id="map-project" data-lat="<?php echo $latLngProject[0]; ?>" data-lng="<?php echo $latLngProject[1]; ?>" data-name="<span class='info-window'><?php if (in_category('kinh-nghiem-du-lich')) { echo 'Trung tâm '; rwmb_the_value('vi-tri'); } else { the_title(); } ?></span><?php if (!in_category('kinh-nghiem-du-lich')) { echo '<br/>'; rwmb_the_value('vi-tri');  } ?><br/><a href='#' id='view-direction' data-lat='<?php echo $latLngProject[0]; ?>' data-lng='<?php echo $latLngProject[1]; ?>' data-window='all'>Chỉ đường từ vị trí của bạn đến nơi này</a>"></div>
									<div id="direction-panel">
										<a href="#" id="hidden-panel" data-status="hidden">Ẩn bảng chỉ đường</a>
									</div>
									<p id="name-project"><i class="fas fa-star"></i><?php if (in_category('kinh-nghiem-du-lich')) { echo 'Trung tâm '; rwmb_the_value('vi-tri'); } else { the_title(); echo ' ('; rwmb_the_value('vi-tri'); echo ')'; } ?></p>
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
								<?php
									$id_eating = 1;
									if ($info_eating[0][0] != "") {
								?>
									<div class="container list-eating">
										<div class="row">
											<p class="guide-map">* Bấm vào tên những địa điểm bên dưới để xem chi tiết về địa điểm đó trong bản đồ</p>
										<?php
											foreach ( $info_eating as $value ) {
												$latLng_eating = explode(',', $value[2]);
												$labels_eating = explode('|', '0|A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z');
												$content = '<div class="col-md-6 location-item location-eating" data-lat="'. $latLng_eating[0] .'" data-lng="'. $latLng_eating[1] .'" data-name="<span class='. "info-window" .'>'. $value[0] .'</span>';
												if ($value[3] != "") {
													$content.= "<a class='more-info' href='". $value[3] ."' target='_blank'>Xem chi tiết</a>";
												}
												if (in_category('kinh-nghiem-du-lich')) {
													$content.= "<br/>cách Trung tâm ". rwmb_meta('vi-tri') ." ". $value[1] ."<br/><a href='#' id='view-direction' data-lat='". $latLng_eating[0] ."' data-lng='". $latLng_eating[1] ."' data-window='eating'>Chỉ đường từ vị trí của bạn đến nơi này</a>";
												} else {
													$content.= "<br/>cách ". get_the_title() ." ". $value[1] ."<br/><a href='#' id='view-direction' data-lat='". $latLng_eating[0] ."' data-lng='". $latLng_eating[1] ."' data-window='eating'>Chỉ đường từ vị trí của bạn đến nơi này</a>";
												}
												$content.= '"><i class="fas fa-map-marker"><span>'. $labels_eating[$id_eating] .'</span></i><span>'. $value[0] .'</span><span class="float-xs-right">'. $value[1] .'</span></div>';
												echo $content;
												$id_eating++;
											}
										?>
										</div>
									</div>
								<?php } ?>
								<?php
									$id_staying = 1;
									if ($info_staying[0][0] != "") {
								?>
									<div class="container list-staying">
										<div class="row">
											<p class="guide-map">* Bấm vào tên những địa điểm bên dưới để xem chi tiết về địa điểm đó trong bản đồ</p>
										<?php
											foreach ( $info_staying as $value ) {
												$latLng_staying = explode(',', $value[2]);
												$labels_staying = explode('|', '0|A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z');
												$content = '<div class="col-md-6 location-item location-staying" data-lat="'. $latLng_staying[0] .'" data-lng="'. $latLng_staying[1] .'" data-name="<span class='. "info-window" .'>'. $value[0] .'</span>';
												if ($value[3] != "") {
													$content.= "<a class='more-info' href='". $value[3] ."' target='_blank'>Xem chi tiết</a>";
												}
												if (in_category('kinh-nghiem-du-lich')) {
													$content.= "<br/>cách Trung tâm ". rwmb_meta('vi-tri') ." ". $value[1] ."<br/><a href='#' id='view-direction' data-lat='". $latLng_staying[0] ."' data-lng='". $latLng_staying[1] ."' data-window='staying'>Chỉ đường từ vị trí của bạn đến nơi này</a>";
												} else {
													$content.= "<br/>cách ". get_the_title() ." ". $value[1] ."<br/><a href='#' id='view-direction' data-lat='". $latLng_staying[0] ."' data-lng='". $latLng_staying[1] ."' data-window='staying'>Chỉ đường từ vị trí của bạn đến nơi này</a>";
												}
												$content.= '"><i class="fas fa-map-marker"><span>'. $labels_staying[$id_staying] .'</span></i><span>'. $value[0];
												if ($value[4] != "") {
													for ($i=0; $i < (int)$value[4] ; $i++) { 
														$content.= '<i class="fas fa-star"></i>';
													}
												}
												$content.= '</span><span class="float-xs-right">'. $value[1] .'</span></div>';
												echo $content;
												$id_staying++;
											}
										?>
										</div>
									</div>
								<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div>
							<div class="card-header moveRight-500 duration-1000 hidden" id="title-utilities">
								<h3 id="utilities" class="mb-0">
									<p class="link">Điểm đánh giá</p>
								</h3>
							</div>
							<div class="container my-review">
								<?php
									$my_review = rwmb_meta( 'my-review' );
									if ($my_review[0][0] != "") {
										foreach ($my_review as $review) {
											echo '<span class="data-review" data-name="', $review[0] , '" data-score="', $review[1] ,'"></span>';
										}
									}
								?>
								<div class="row">
									<div class="col-sm-7 info moveRight-500 duration-1000 hidden">
										<canvas id="info-review"></canvas>
									</div>
									<div class="col-sm-5 moveLeft-500 duration-1000 hidden">
										<canvas id="review-progress"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div>
						<?php if($info_progress[0][2] != "") : ?>
							<div class="card-header moveTop-500 duration-1000 hidden" id="title-progress">
								<h3 id="progress" class="mb-0">
									<p class="link">Hướng dẫn</p>
								</h3>
							</div>
							<div id="info-progress" class="collapse in" aria-labelledby="title-progress" data-parent="#accordion">
							<div class="card-body">
							<?php
								foreach ( $info_progress as $value ) {
									echo '<div class="container moveTop-500 duration-1000 hidden"><div class="row">';
									echo '<div class="col-sm-3 col-xs-5 img-progress"><img src="', $value[0] ,'" alt="Hướng dẫn cách du lịch tiết kiệm" /></div>';
									echo '<div class="col-sm-9 col-xs-7 link-progress"><a href="', $value[2] ,'">', $value[1] ,'</a></div>';
									echo '</div></div>';
								}
							?>
							</div>
							</div>
						<?php endif; ?>
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
						<?php get_sidebar( 'project' ); ?>
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
						<!-- Sidebar Widget -->
						<ins class="adsbygoogle"
							style="display:block"
							data-ad-client="ca-pub-7392610376438714"
							data-ad-slot="3402715622"
							data-ad-format="auto"
							data-full-width-responsive="true"></ins>
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
<?php for ($i=0; $i < 9; $i++) { 
	$album = 'album-'. ($i+1);
	$album_gallery = rwmb_meta($album);
	if (sizeof($album_gallery) > 0) {
		echo '<div class="slide-gallery ', $album ,'" data-slide=".', $album ,'" data-number="', $i+1 ,'">';
		echo '<div class="main-slide">';
		echo '<ul>';
		foreach ( $album_gallery as $img_album ) {
			echo '<li><div class="img-gallery">';
			echo '<img data-src="', $img_album['url'] ,'" alt="'. $img_album['title'] .'" />';
			if ($img_album['caption']) {
				echo '<div class="title-gallery">', $img_album['caption'] ,'</div>';
			}
			echo '</div></li>';
		}
		echo '</ul>';
		echo '<div class="updating"><i class="fas fa-spinner"></i></div>';
		echo '<i class="previousImg fas fa-angle-left" data-slide=".', $album ,'" data-number="', $i+1 ,'"></i>';
		echo '<i class="nextImg fas fa-angle-right" data-slide=".', $album ,'" data-number="', $i+1 ,'"></i>';
		echo '<i class="closeGallery fas fa-times" data-number="', $i+1 ,'"></i>';
		echo '</div></div>';
	}
} ?>
<div class="review-step">
	<p>Cảm ơn bạn đã đánh giá địa điểm này!</p>
</div>