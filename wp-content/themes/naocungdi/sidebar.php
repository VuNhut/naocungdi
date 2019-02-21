<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package dazzling
 */
?>
	<div id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php
			$sidebar = array("kinh-nghiem-du-lich" => "kinh nghiệm du lịch", "dia-diem-du-lich" => "địa điểm du lịch");
			foreach ($sidebar as $key => $value) {
				$query_topposts = array('category_name' => $key, 'posts_per_page' => 5, 'meta_key' => 'total-score', 'orderby' => array('meta_value_num' => "DESC"));
				$top_posts = new WP_Query($query_topposts);
				if ($top_posts->have_posts()) : $number_posts = 1;
		?>
		<div class="top-posts moveTop-500 duration-1000 hidden">
			<h3><span><i class="fas fa-award"></i>Top 5</span> <?php echo $value; ?></h3>
			<div class="container">
				<?php while ($top_posts->have_posts()) : $top_posts->the_post(); ?>
				<div class="row">
					<div class="col-sm-4 col-xs-5">
						<div class="img-top">
							<?php the_post_thumbnail('tiny-img', ['sizes' => '42vw']); ?>
							<?php
								if ($number_posts == 1) {
									$bg_rank = "rgba(237, 26, 36, 0.9)";
								} elseif ($number_posts == 2) {
									$bg_rank = "rgba(38, 182, 239, 0.9)";
								} elseif ($number_posts == 3) {
									$bg_rank = "rgba(77, 171, 46, 0.9)";
								} else {
									$bg_rank = "rgba(56, 79, 245, 0.9)";
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
								$except_tag = array("Việt Nam", "Thái Lan", "Malaysia", "Indonesia", "Singapore", "Myanmar", "Campuchia", "Lào", "Đài Loan", "Hàn Quốc", "Nhật Bản");
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
		<?php
			endif;
			wp_reset_postdata();
		}
		?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-format="fluid"
			 data-ad-layout-key="-6i+e0+16-3i+89"
			 data-ad-client="ca-pub-7392610376438714"
			 data-ad-slot="9946595524"></ins>
	</div><!-- #secondary -->
