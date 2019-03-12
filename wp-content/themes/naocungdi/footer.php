<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dazzling
 */
?>
	<?php if(!is_home() && (!(is_single() && in_category(array('cam-nang-du-lich')))) ) : ?>
		<!-- Related Post -->
		<?php if(is_single()) : ?>
			<?php
				$orig_post = $post;
				global $post;
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
					$args = array(
						'tag__in' => $tag_ids,
						'post__not_in' => array($post->ID),
						'category__not_in' => 4, // Exclude category 'Cẩm nang du lịch'
						'posts_per_page'=> 7, // Number of related posts to display.
						'orderby'=>'rand'
					);
					$my_query = new wp_query( $args );
					if($my_query->have_posts()) {
			?>
			<div class="col-xs-12 related-post">
				<h3>Tin liên quan</h3>
				<div class="swiper-container swiper-tabs">
                    <div class="swiper-wrapper">
			<?php
				while( $my_query->have_posts() ) {
				$my_query->the_post();
			?>
				<div class="swiper-slide related-item">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('small-img'); ?>
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
			<?php if(is_page('san-ve-may-bay')) : ?>
			<div class="air-ticket">
				<h2 class="moveTop-300 duration-800 hidden">Vé máy bay khuyến mãi</h1>
				<div class="line-title">
					<div class="line-one"></div>
					<div class="line-two"></div>
				</div>
				<div class="container moveTop-300 duration-1000 hidden">
					<div class="row">
						<div class="col-sm-3">
							<p class="m-0"><i class="fas fa-plane"></i> Từ</p>
							<select class="mb-1" name="select-departure" id="select-departure">
								<option value="Hồ Chí Minh">Hồ Chí Minh</option>
								<option value="Hà Nội">Hà Nội</option>
							</select>
						</div>
						<div class="col-sm-3">
							<p class="m-0"><i class="fas fa-map-marker-alt"></i> Đi đến</p>
							<select class="mb-1" name="select-destination" id="select-destination">
								<option value="Tất cả">Tất cả</option>
								<option value="Hồ Chí Minh">Hồ Chí Minh</option>
								<option value="Hà Nội">Hà Nội</option>
								<option value="Đà Nẵng">Đà Nẵng</option>
								<option value="Nha Trang">Nha Trang</option>
								<option value="Quy Nhơn">Quy Nhơn</option>
								<option value="Đà Lạt">Đà Lạt</option>
								<option value="Huế">Huế</option>
								<option value="Hải Phòng">Hải Phòng</option>
								<option value="Đồng Hới">Đồng Hới</option>
								<option value="Phú Quốc">Phú Quốc</option>
								<option value="Tuy Hòa">Tuy Hòa</option>
							</select>
						</div>
					</div>
					<div class="row" id="ticket">
						<?php $list_ticket = rwmb_meta( 'danh-sach-ve-re' ); $number_ticket = 1; ?>
						<?php foreach ($list_ticket as $ticket) {
							if ($ticket[0] == "Hồ Chí Minh") {
								if ($number_ticket <= 3) {
									echo '<div class="col-md-4 ticket-item"><div class="info-ticket">';
									echo '<p class="departure"><i class="fas fa-plane"></i> '. $ticket[0] . ' đến</p>';
									echo '<p class="destination">'. $ticket[1] .'</p>';
									echo '<p class="date">Ngày bay: '. $ticket[3] . '</p>';
									echo '<p class="date">Thời gian khuyến mãi: '. $ticket[4] . '</p>';
									echo '<a href="', $ticket[5] ,'" class="affiliate-link btn">Đặt vé</span></a>';
									echo '<p class="price">chỉ từ <span>'. $ticket[2] . '</span></p>';
									echo '<div class="clearfix"></div></div></div>';
								} else {
									echo '<div class="col-xs-12 ticket-item">';
									if ($number_ticket == 4) {
										echo '<div class="row detail"><div class="col-sm-3 ">Chặng bay</div>';
										echo '<div class="col-sm-3">Giá vé</div>';
										echo '<div class="col-sm-2">Ngày bay</div>';
										echo '<div class="col-sm-2">Thời gian khuyến mãi</div>';
										echo '<div class="col-sm-2"></div></div>';
									}
									echo '<div class="info-ticket"><div class="row"><div class="col-xs-7 col-sm-3">
											<p class="departure"><i class="fas fa-plane"></i> '. $ticket[0] . ' đến</p>
											<p class="destination">'. $ticket[1] .'</p>
										 </div>';
									echo '<div class="col-xs-5 col-sm-3">
											<p class="price">chỉ từ <span>'. $ticket[2] . '</span></p>
										 </div>';
									echo '<div class="col-xs-4 col-sm-2">
											<p class="date">'. $ticket[3] . '</p>
										 </div>';
									echo '<div class="col-xs-4 col-sm-2">
											<p class="date">'. $ticket[4] . '</p>
										   </div>';
									echo '<div class="col-xs-4 col-sm-2">
									<a href="', $ticket[5] ,'" class="affiliate-link btn">Đặt vé</span></a>
										 </div>';
									echo '</div></div></div>';
								}
								$number_ticket++;
							}
						} ?>
					</div>
					<h2 class="updating"><i class="fas fa-spinner"></i></h2>
					<script type="text/javascript">
						(function($){
							$(document).ready(function(){
								$(".updating").hide();
								$('#select-departure, #select-destination').on('change', function(){
									var departure = $('select#select-departure').val();
									var destination = $('select#select-destination').val();
									$.ajax({
										type : "post", //Phương thức truyền post hoặc get
										dataType : "json", //Dạng dữ liệu trả về xml, json, script, or html
										url : '<?php echo admin_url('admin-ajax.php');?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
										data : {
											action: "loadpost", //Tên action
											departure: departure,
											destination: destination
										},
										beforeSend: function () {
											$('#ticket').hide();
											$(".updating").show();
										},
										success: function(response) {
											//Làm gì đó khi dữ liệu đã được xử lý
											if(response.success && (response.data !== "")) {
												$('#ticket').html(response.data);
											} else {
												$('#ticket').html("<p class='text-xs-center w-100 mt-1 mb-0'>Hiện tại không có vé khuyến mãi cho chặng bay này!</p>");
											}
											$(".updating").hide();
											$('#ticket').show();
										},
										error: function( jqXHR, textStatus, errorThrown ){
											//Làm gì đó khi có lỗi xảy ra
											console.log( 'The following error occured: ' + textStatus, errorThrown );
										}
									})
									return false;
								})
							})
						})(jQuery)
					</script>
				</div>
			</div>
			<div class="quality-policy">
				<h2>Điều kiện vé khuyến mãi</h1>
				<div class="line-title">
					<div class="line-one"></div>
					<div class="line-two"></div>
				</div>
				<div class="container">
					<div class="row reverse-col">
						<div class="col-xs-12 policy-content">
							<?php echo rwmb_meta( 'dieu-kien-ve-khuyen-mai' ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
        </div><!-- close .site-content -->
	<?php endif; ?>
	<div id="footer-area">
		<div class="container">
			<div class="row">
				<nav role="navigation" class="menu-footer col-xs-12">
					<?php dazzling_footer_links(); ?>
				</nav>
			</div>
		</div>
		<div class="container">
			<?php get_sidebar( 'footer' ); ?>
		</div>

		<footer id="colophon" class="container site-footer" role="contentinfo">
			<div class="site-info container">
				<div class="copyright col-xs-12">
					I <i class="fa fa-heart pulse-heart" style="color:red"></i> Wanderlust
				</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->
<?php if (!is_home()) : ?>
<div class="bg-search">
	<div class="inner-banner">
		<h2>Cẩm nang du lịch</h2>
		<p>Nào Cùng Đi sẽ giúp bạn khám phá chi tiết mọi địa điểm du lịch tại Việt Nam</p>
		<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
	</div>
</div>
	<?php if (!in_category(array('ve-tham-quan','shop-phuot'))) : ?>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<?php endif; ?>
<?php endif; ?>

<?php wp_footer(); ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i&amp;subset=vietnamese" rel="stylesheet">

<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	checkElementShow(".moveTop-500, .moveLeft-500, .moveRight-500, .moveTop-300, .moveBottom-300, .fadeIn");
	window.onscroll = function(){
		getPosHieuUng(".moveLeft-500");
		getPosHieuUng(".moveRight-500");
		getPosHieuUng(".moveTop-500");
		getPosHieuUng(".moveTop-300");
		getPosHieuUng(".moveBottom-300");
		getPosHieuUng(".fadeIn");
	}
</script>
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