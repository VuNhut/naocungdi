<?php
/**
 * @package dazzling
 */
?>
<?php $all_gallery = sizeof(rwmb_meta( 'gallery' )); ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="header-project moveRight-500 duration-1000 hidden">
				<div class="container">
					<div class="row">
						<div class="header-title col-sm-8">
							<h1 class="project-title"><?php the_title(); ?></h1>
						</div>
						<div class="review-star col-sm-4">
							<div class="review-step1">
								<p class="text-step1">Theo bạn địa điểm này được mấy sao?</p>
								<p class="arrow-step1 text-xs-center"><i class="fas fa-arrow-down"></i></p>
							</div>
							<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
						</div>
					</div>
				</div>
				<p class="img-quality fadeIn duration-1000 delay-1000 hidden" data-toggle="tooltip" title="Xem <?php echo $all_gallery; ?> ảnh của dự án"><i class="far fa-images"></i><?php echo $all_gallery; ?> ảnh</p>
			</div>
		</div>
	</div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="gallery-project moveLeft-500 duration-1000 hidden">

		<?php
			$images = rwmb_meta( 'gallery', array( 'size' => 'thumbnail', 'limit' => 4 ) );
			$images_num = 0;
			foreach ( $images as $image ) {
				echo '<a href="#" class="showGallery" data-number="', $images_num ,'" data-target="view-photo" data-toggle="tooltip" title="Click vào để xem ảnh"><img src="', $image['url'], '"></a>';
				$images_num++;
			}
		?>

	</header><!-- .entry-header -->
	<div class="menu-project moveTop-500 duration-1000 hidden">
		<div class="container">
			<div class="row">
				<ul class="col-xs-12">
					<li class="active"><a href="#introdution">Giới thiệu</a></li>
					<li><a href="#location">Vị trí dự án</a></li>
					<li><a href="#utilities">Tiện ích</a></li>
					<li><a href="#progress">Tiến độ xây dựng</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="subinfo-project moveTop-500 duration-1000 hidden">
		<div class="container">
			<div class="row">
				<p class="project-location col-md-4 col-xs-6" data-toggle="tooltip" title="Địa điểm du lịch"><i class="fas fa-map-marker-alt"></i>Điểm đến: <span><?php rwmb_the_value('vi-tri'); ?></span></p>
				<?php if (rwmb_meta( 'chi-phi-du-lich' )) : ?>
					<p class="info-investment col-md-4 col-xs-6" data-toggle="tooltip" title="Chi phí du lịch"><i class="far fa-money-bill-alt"></i>Chi phí:<span><?php rwmb_the_value('chi-phi-du-lich'); ?><sup>đ</sup></span></p>
				<?php endif; ?>
				<?php if (rwmb_meta( 'so-ngay-du-lich' )) : ?>
					<p class="info-area col-md-4 col-xs-6" data-toggle="tooltip" title="Thời gian du lịch"><i class="fas fa-cube"></i>Số ngày:<span><?php rwmb_the_value('so-ngay-du-lich'); ?></span></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="info-project">
		<div class="container">
			<div class="row">
				<div class="info-left col-lg-8">
					<div class="info-introdution moveTop-500 duration-1000 hidden">
						<h2 id="introdution">Giới thiệu</h2>
						<div class="info-content">
							<?php the_content(); ?>
						</div>
						<?php if (get_the_content() != "") { ?>
							<span id="view-more">Xem thêm <i class="fas fa-angle-down"></i></span>
							<span id="view-collapse">Thu gọn <i class="fas fa-angle-up"></i></span>
						<?php } ?>
					</div>
					<?php $gallery = rwmb_meta( 'gallery', array( 'size' => 'medium-width', 'limit' => 5 ) ); ?>
					<?php $num_gallery = sizeof($gallery); if ($num_gallery > 0) : ?>
					<?php if ($all_gallery > $num_gallery) : $more_gallery = $all_gallery - $num_gallery; endif; ?>
					<div class="info-gallery moveTop-500 duration-1000 hidden">
						<div class="container">
							<div class="row">
								<?php if ($num_gallery == 5) : $col_1 = "w50"; $col_2 = "w33"; ?>
								<?php elseif ($num_gallery == 4 || $num_gallery == 2) : $col_1 = "w50"; $col_2 = "w50"; ?>
								<?php elseif ($num_gallery == 3) : $col_1 = "w33"; $col_2 = "w33"; ?>
								<?php else : $col_1 = "w100"; ?>
								<?php endif; ?>
								<?php
									$i = 1;
									foreach ( $gallery as $img ) {
										if ($i == 1 || $i == 2) {
											echo '<a href="#" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_1 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh" style="background:url(', $img['url'] ,') 50% / cover"></a>';
										} elseif ($i == 5) {
											if ($more_gallery) {
												echo '<a href="#" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_2 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh" style="background:url(', $img['url'] ,') 50% / cover"><div class="bg-more"><p>', $more_gallery ,'+</p></div></a>';
											} else {
												echo '<a href="#" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_2 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh" style="background:url(', $img['url'] ,') 50% / cover"></a>';
											}
										} else {
											echo '<a href="#" data-number="', $i-1 ,'" data-target="view-photo" class="', $col_2 ,' showGallery" data-toggle="tooltip" title="Click vào để xem ảnh" style="background:url(', $img['url'] ,') 50% / cover"></a>';
										}
										$i++;
									}
								?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div id="accordion">
						<div>
							<div class="card-header" id="title-location">
							<h3 id="location" class="mb-0">
								<p class="link">Địa điểm</p>
								<p class="type-location"><span class="traveling active">Điểm du lịch nổi tiếng</span><span class="eating">Quán ăn ngon</span><span class="staying">Khách sạn - Homestay tốt</span></p>
							</h3>
							</div>
							<div id="info-location" class="collapse in" aria-labelledby="title-location" data-parent="#accordion">
							<div class="card-body moveTop-500 duration-1000 hidden">
								<div class="map-location">
									<?php $viTriProject = rwmb_meta('dia-diem-du-lich'); $latLngProject = explode(',', $viTriProject); ?>
									<div id="map-project" data-lat="<?php echo $latLngProject[0]; ?>" data-lng="<?php echo $latLngProject[1]; ?>" data-name="<span class='info-window'><?php the_title(); ?></span><br/><?php rwmb_the_value('vi-tri') ?>"></div>
									<p id="name-project"><i class="fas fa-star"></i><?php the_title(); echo ' ('; rwmb_the_value('vi-tri'); echo ')'; ?></p>
								<?php
									$info_traveling = rwmb_meta( 'info-traveling' );
									$id_traveling = 1;
									if ($info_traveling[0][0] != "") {
								?>
									<div class="container list-traveling">
										<div class="row">
										<?php
											foreach ( $info_traveling as $value ) {
												$latLng_traveling = explode(',', $value[2]);
												$labels_traveling = explode('|', '0|A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z');
												echo '<div class="col-md-6 location-item location-traveling" data-lat="', $latLng_traveling[0] ,'" data-lng="', $latLng_traveling[1] ,'" data-name="<span class=', "info-window" ,'>', $value[0] ,'</span><br/>cách ', the_title() ,' ', $value[1] ,'"><i class="fas fa-map-marker"><span>', $labels_traveling[$id_traveling] ,'</span></i><span>', $value[0] ,'</span><span class="float-xs-right">', $value[1] ,'</span></div>';
												$id_traveling++;
											}
										?>
										</div>
									</div>
								<?php } ?>
								<?php
									$info_eating = rwmb_meta( 'info-eating' );
									$id_eating = 1;
									if ($info_eating[0][0] != "") {
								?>
									<div class="container list-eating">
										<div class="row">
										<?php
											foreach ( $info_eating as $value ) {
												$latLng_eating = explode(',', $value[2]);
												$labels_eating = explode('|', '0|A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z');
												echo '<div class="col-md-6 location-item location-eating" data-lat="', $latLng_eating[0] ,'" data-lng="', $latLng_eating[1] ,'" data-name="<span class=', "info-window" ,'>', $value[0] ,'</span><br/>cách ', the_title() ,' ', $value[1] ,'"><i class="fas fa-map-marker"><span>', $labels_eating[$id_eating] ,'</span></i><span>', $value[0] ,'</span><span class="float-xs-right">', $value[1] ,'</span></div>';
												$id_eating++;
											}
										?>
										</div>
									</div>
								<?php } ?>
								<?php
									$info_staying = rwmb_meta( 'info-staying' );
									$id_staying = 1;
									if ($info_staying[0][0] != "") {
								?>
									<div class="container list-staying">
										<div class="row">
										<?php
											foreach ( $info_staying as $value ) {
												$latLng_staying = explode(',', $value[2]);
												$labels_staying = explode('|', '0|A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z');
												echo '<div class="col-md-6 location-item location-staying" data-lat="', $latLng_staying[0] ,'" data-lng="', $latLng_staying[1] ,'" data-name="<span class=', "info-window" ,'>', $value[0] ,'</span><br/>cách ', the_title() ,' ', $value[1] ,'"><i class="fas fa-map-marker"><span>', $labels_staying[$id_staying] ,'</span></i><span>', $value[0] ,'</span><span class="float-xs-right">', $value[1] ,'</span></div>';
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
						<div>
							<div class="card-header" id="title-utilities">
							<h3 id="utilities" class="mb-0">
								<p class="link">Tiện ích</p>
							</h3>
							</div>
							<div id="info-utilities" class="collapse in" aria-labelledby="title-utilities" data-parent="#accordion">
							<div class="card-body">
							<?php $img_utilities = rwmb_meta( 'hinh-phoi-canh', array( 'size' => 'thumbnail', 'limit' => 1 ) ) ?>
								<div class="img-utilities">
								<?php
									foreach ( $img_utilities as $img_utility ) {
										echo '<img src="', $img_utility['url'] ,'" usemap="#maputilities" class="map-utilities moveTop-500 duration-1000 hidden" />';
										echo '<map name="maputilities">';
										$map_utilities = rwmb_meta( 'info-tien-ich' );
										$map_id = 1;
										foreach ( $map_utilities as $map_uti ) {
											echo '<area title="', $map_uti[0] ,'" data-mapid="utility-', $map_id ,'" shape="poly" coords="', $map_uti[1] ,'" data-img="', $map_uti[2] ,'" >';
											$map_id++;
										}
										echo '</map>';
									}
								?>
								<?php
									$info_utilities = rwmb_meta( 'info-tien-ich' );
									$id_utility = 1;
									if ($info_utilities[0][0] != "") {
								?>
									<div class="container moveRight-500 duration-1000 hidden">
										<div class="row">
										<?php
											foreach ( $info_utilities as $value ) {
												echo '<div id="utility-', $id_utility ,'" class="col-md-4 col-sm-6 utilities-item"><i class="fas fa-star"></i><span>', $value[0] ,'</span></div>';
												$id_utility++;
											}
										?>
										</div>
									</div>
								<?php } ?>
								</div>
							</div>
							</div>
						</div>
						<div>
						<?php $info_progress = rwmb_meta( 'info-tien-do' ); ?>
						<?php if(sizeof($info_progress) > 1) : ?>
							<div class="card-header" id="title-progress">
							<h3 id="progress" class="mb-0">
								<p class="link">Tiến độ xây dựng</p>
							</h3>
							</div>
							<div id="info-progress" class="collapse in" aria-labelledby="title-progress" data-parent="#accordion">
							<div class="card-body">
							<?php
								foreach ( $info_progress as $value ) {
									echo '<div class="container moveTop-500 duration-1000 hidden"><div class="row">';
									echo '<div class="col-sm-3 col-xs-6 img-progress"><img src="', $value[0] ,'" /></div>';
									echo '<div class="col-sm-9 col-xs-6 link-progress"><a href="', $value[2] ,'">', $value[1] ,'</a></div>';
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
				<div class="info-right col-lg-4">
					<div class="sidebar-project moveTop-500 duration-1000 hidden">
						<?php get_sidebar( 'project' ); ?>
					</div>
				</div>
				<div class="related-project col-xs-12">
					<h3 class="title-related moveTop-500 duration-1000 hidden">Xem thêm các dự án khác</h3>
					<?php $args_related = array('category_name' => 'dang-trien-khai', 'posts_per_page' => 6, 'post__not_in' => array( get_the_ID())); ?>
					<?php $query_related = new WP_Query($args_related); ?>
					<?php if ($query_related->have_posts()) : ?>
						<?php while ( $query_related->have_posts() ) : $query_related->the_post(); ?>
						<?php
							if (in_category('dang-trien-khai')) {
								get_template_part( 'content', 'project' );
							} else {
								get_template_part( 'content', 'projectdone' );
							}
						?>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
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
					echo '<li><img data-src="', $img_slide['url'] ,'" /></li>';
				}
			?>
		</ul>
		<div class="updating"><i class="fas fa-spinner"></i></div>
		<i id="previousImg" class="fas fa-angle-left"></i>
		<i id="nextImg" class="fas fa-angle-right"></i>
		<i id="closeGallery" class="fas fa-times"></i>
	</div>
</div>
<div class="map-img">
	<div class="popup-img">
		<img />
		<div class="updating"><i class="fas fa-spinner"></i></div>
		<i id="closeImgMap" class="fas fa-times"></i>
	</div>
</div>
<div class="review-step">
	<p>Cảm ơn bạn đã đánh giá địa điểm này!</p>
</div>