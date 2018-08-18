<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package dazzling
 */
?>
	<div id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<div class="list-category moveLeft-500 duration-1000 delay-800 hidden">
			<a class="parent-cat" href="<?php echo home_url(); ?>/tin-tuc-su-kien/">Tin tức - sự kiện</a>
			<a class="sub-cat" href="<?php echo home_url(); ?>/tin-tuc-su-kien/tin-cong-ty"><i class="fas fa-angle-right"></i>Tin công ty</a>
			<a class="sub-cat" href="<?php echo home_url(); ?>/tin-tuc-su-kien/tin-du-an"><i class="fas fa-angle-right"></i>Tin dự án</a>
			<a class="sub-cat none-border" href="<?php echo home_url(); ?>/tin-tuc-su-kien/tin-thi-truong"><i class="fas fa-angle-right"></i>Tin thị trường</a>
			<a class="parent-cat" href="<?php echo home_url(); ?>/du-an/">Dự án Cityland</a>
			<a class="sub-cat" href="<?php echo home_url(); ?>/du-an/khu-dan-cu/"><i class="fas fa-angle-right"></i>Dự án khu dân cư</a>
			<a class="sub-cat" href="<?php echo home_url(); ?>/du-an/can-ho/"><i class="fas fa-angle-right"></i>Dự án căn hộ</a>
			<a class="sub-cat" href="<?php echo home_url(); ?>/du-an/khu-thuong-mai-cho-thue/"><i class="fas fa-angle-right"></i>Dự án khu thương mại cho thuê</a>
			<a class="sub-cat" href="<?php echo home_url(); ?>/du-an/dang-trien-khai/"><i class="fas fa-angle-right"></i>Dự án đang triển khai</a>
			<a class="sub-cat" href="<?php echo home_url(); ?>/du-an/da-hoan-thanh/"><i class="fas fa-angle-right"></i>Dự án đã hoàn thành</a>
		</div>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
