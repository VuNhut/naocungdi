<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dazzling
 */
?>
	<?php if(!is_home() && (!(is_single() && in_category(array('du-an')))) && (!is_page('tuyen-dung'))) : ?>
		<!-- Related Post -->
		<?php if(is_single()) : ?>
			<?php
				$orig_post = $post;
				global $post;
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
					$args=array(
						'tag__in' => $tag_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=>4, // Number of related posts to display.
						'caller_get_posts'=>1,
						'orderby'=>'rand'
					);
					$my_query = new wp_query( $args );
					if($my_query->have_posts()) {
			?>
			<div class="col-xs-12 related-post">
				<hr class="section-divider">
				<h3>Tin liên quan</h3>
				<div class="container">
					<div class="row">
			<?php
				while( $my_query->have_posts() ) {
				$my_query->the_post();
			?>
				<div class="col-sm-3 related-item">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
						<h4><?php the_title(); ?></h4>
					</a>
				</div>
			<?php }
				}
			?>
					</div>
				</div>
			</div>
			<?php
			}
				$post = $orig_post;
				wp_reset_query();
			?>
		<?php endif; ?>
		<!-- Close Related Post -->
                </div><!-- close .row -->
			</div><!-- close .container -->
			<?php if(is_page('gioi-thieu')) : ?>
			<div class="vision">
				<h2 class="moveTop-300 duration-800 hidden">Tầm nhìn - Sứ mệnh & Chiến lược</h1>
				<div class="line-title">
					<div class="line-one"></div>
					<div class="line-two"></div>
				</div>		
				<div class="container">
					<div class="row">
						<div class="col-md-6 left-vision moveRight-500 duration-1000 hidden">
							<div class="container">
								<div class="row">
									<div class="col-sm-4 icon">
										<img src="<?php echo home_url(); ?>/wp-content/themes/cityland/images/icon-tam-nhin-su-menh.jpg" alt="icon tầm nhìn sứ mệnh cityland">
									</div>
									<div class="col-sm-8 info">
										<?php echo rwmb_meta( 'tam-nhin-su-menh' ); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 right-vision moveLeft-500 duration-1000 hidden">
							<div class="container">
								<div class="row reverse-row">
									<div class="col-sm-4 icon">
										<img src="<?php echo home_url(); ?>/wp-content/themes/cityland/images/icon-chien-luoc.jpg" alt="icon chiến lược của cityland">
									</div>
									<div class="col-sm-8 info">
										<?php echo rwmb_meta( 'chien-luoc' ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="quality-policy">
				<h2 class="moveTop-300 duration-800 hidden">Chính sách chất lượng</h1>
				<div class="line-title">
					<div class="line-one"></div>
					<div class="line-two"></div>
				</div>
				<div class="container">
					<div class="row reverse-col">
						<div class="col-md-8 policy-content moveRight-500 duration-1000 hidden">
							<?php echo rwmb_meta( 'chinh-sach-chat-luong' ); ?>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-8 push-sm-3 push-md-0 push-xs-2 mb-2 policy-img moveTop-300 duration-1000 hidden">
							<img src="<?php echo home_url(); ?>/wp-content/themes/cityland/images/quality-policy.jpg" alt="chính sách chất lượng">
						</div>
					</div>
				</div>
			</div>
			<div class="company-member">
				<h2 class="moveTop-300 duration-800 hidden">Công ty thành viên</h1>
				<div class="line-title">
					<div class="line-one"></div>
					<div class="line-two"></div>
				</div>
				<div class="container moveTop-300 duration-1000 hidden">
					<div class="row">
						<?php $company_member = rwmb_meta( 'cong-ty-thanh-vien' ); ?>
						<?php foreach ($company_member as $member) {
							echo '<div class="col-md-4 col-xs-6 member-item"><div class="info-member">';
							echo '<img src="'. $member[0] .'" alt="logo '. $member[1] . '" />';
							echo '<h4>'. $member[1] .'</h4>';
							echo '<p>'. $member[2] . '</p>';
							echo '</div></div>';
						} ?>
					</div>
				</div>
			</div>
			<?php $video_introduce = rwmb_meta( 'video-introduce' ); ?>
			<?php if($video_introduce !== "") : ?>
			<div class="video-introduce">
				<h2 class="moveTop-300 duration-800 hidden">Video giới thiệu công ty</h1>
				<div class="line-title">
					<div class="line-one"></div>
					<div class="line-two"></div>
				</div>
				<div class="container">
					<div class="row">
						<div class="video col-md-10 col-lg-8 push-md-1 push-lg-2 moveLeft-500 duration-1000 hidden">
							<?php echo $video_introduce; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<?php endif; ?>
        </div><!-- close .site-content -->
	<?php endif; ?>
	<div id="footer-area">
		<div class="container moveRight-500 duration-1000 hidden">
			<div class="row">
				<nav role="navigation" class="menu-footer col-xs-12">
					<?php dazzling_footer_links(); ?>
				</nav>
			</div>
		</div>
		<div class="container footer-inner moveLeft-500 duration-1000 hidden">
			<?php get_sidebar( 'footer' ); ?>
		</div>

		<footer id="colophon" class="container site-footer" role="contentinfo">
			<div class="site-info container moveRight-500 duration-1000 hidden">
				<div class="copyright col-xs-12">
					<?php echo of_get_option( 'custom_footer_text', 'dazzling' ); ?>
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Enable Tool Tip Bootstrap -->
<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	var ie = detectIE().search(/(MSIE|Trident|Edge)/);
	if (ie === -1) {
        checkElementShow(".moveTop-500, .moveLeft-500, .moveRight-500, .moveTop-300, .moveBottom-300, .fadeIn");
		window.onscroll = function(){
			getPosHieuUng(".moveLeft-500");
			getPosHieuUng(".moveRight-500");
			getPosHieuUng(".moveTop-500");
			getPosHieuUng(".moveTop-300");
			getPosHieuUng(".moveBottom-300");
			getPosHieuUng(".fadeIn");
		}
    }
</script>
<?php if (is_single() && in_category('du-an')) : ?>
	<script type="text/javascript">
		$(window).load(function(){
			$("img[usemap]").mapTrifecta({
				fillColor: 'dc0e18',
				fillOpacity: 0.8,
				strokeColor: 'dc0e18',
			});
		}); 
		$('area[title]').qtip({
			style: "qtip-tipsy"
		});
	</script>
<?php endif; ?>
<?php if (is_page('tuyen-dung')) : ?>
	<script type="text/javascript">
		$(".paroller, [data-paroller-factor]").paroller({
			factor: 0.5,            // multiplier for scrolling speed and offset
			factorXs: 0.3,          // multiplier for scrolling speed and offset if window width is <576px
			factorSm: 0.4,          // multiplier for scrolling speed and offset if window width is <=768px
			factorMd: 0.5,          // multiplier for scrolling speed and offset if window width is <=1024px
			factorLg: 0.6,          // multiplier for scrolling speed and offset if window width is <=1200px
			direction: 'vertical' // vertical, horizontal
		});
	</script>
<?php endif; ?>
</body>
</html>