<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header moveTop-300 duration-800 hidden">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="line-title">
			<div class="line-one"></div>
			<div class="line-two"></div>
		</div>
		<?php if (is_page('tuyen-dung')) : ?>
		<p class="sub-recruitment">
			<span class="recruitment-policy active">Chính sách nhân sự</span>
			<span class="career-opportunity">Cơ hội nghề nghiệp</span>
		</p>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content <?php if (is_page('gioi-thieu')) { echo 'introduce'; } elseif (is_page('lien-he')) { echo 'contact'; } ?> moveTop-500 duration-1000 hidden">
		<?php if (is_page('tuyen-dung')) : ?>
			<div class="container policy-main">
				<!-- Vì sao chọn CityLand -->
				<?php if (rwmb_meta('vi-sao-chon-cityland') != "") : ?>
				<div class="row reverse-col">
					<div class="col-md-6 why-cityland moveRight-500 duration-1000 hidden">
						<?php rwmb_the_value('vi-sao-chon-cityland') ?>
					</div>
					<?php $why_cityland = rwmb_meta( 'bg-vi-sao-chon-cityland' ); ?>
					<div class="col-md-6 paroller moveLeft-500 duration-1000 hidden" style="<?php echo 'background: url(', $why_cityland['url'] ,') no-repeat center; background-size: cover;'; ?>"></div>
				</div>
				<?php endif; ?>
				<!-- Môi trường làm việc -->
				<?php if (rwmb_meta('moi-truong-lam-viec') != "") : ?>
				<div class="row">
					<?php $work_space = rwmb_meta( 'bg-moi-truong-lam-viec' ); ?>
					<div class="col-md-6 paroller moveRight-500 duration-1000 hidden" style="<?php echo 'background: url(', $work_space['url'] ,') no-repeat center; background-size: cover;'; ?>"></div>
					<div class="col-md-6 work-space moveLeft-500 duration-1000 hidden">
						<?php rwmb_the_value('moi-truong-lam-viec') ?>
					</div>
				</div>
				<?php endif; ?>
				<!-- Hệ thống lương thưởng -->
				<?php if (rwmb_meta('he-thong-luong-thuong') != "") : ?>
				<div class="row reverse-col">
					<div class="col-md-6 bonus moveRight-500 duration-1000 hidden">
						<?php rwmb_the_value('he-thong-luong-thuong') ?>
					</div>
					<?php $bonus = rwmb_meta( 'bg-he-thong-luong-thuong' ); ?>
					<div class="col-md-6 paroller moveLeft-500 duration-1000 hidden" style="<?php echo 'background: url(', $bonus['url'] ,') no-repeat center; background-size: cover;'; ?>"></div>
				</div>
				<?php endif; ?>
				<!-- Chính sách phúc lợi -->
				<?php if (rwmb_meta('chinh-sach-phuc-loi') != "") : ?>
				<div class="row">
					<?php $welfare_policy = rwmb_meta( 'bg-chinh-sach-phuc-loi' ); ?>
					<div class="col-md-6 paroller moveRight-500 duration-1000 hidden" style="<?php echo 'background: url(', $welfare_policy['url'] ,') no-repeat center; background-size: cover;'; ?>"></div>
					<div class="col-md-6 welfare-policy moveLeft-500 duration-1000 hidden">
						<?php rwmb_the_value('chinh-sach-phuc-loi') ?>
					</div>
				</div>
				<?php endif; ?>
				<!-- Chính sách đào tạo -->
				<?php if (rwmb_meta('chinh-sach-dao-tao') != "") : ?>
				<div class="row reverse-col">
					<div class="col-md-6 training-policy moveRight-500 duration-1000 hidden">
						<?php rwmb_the_value('chinh-sach-dao-tao') ?>
					</div>
					<?php $training_policy = rwmb_meta( 'bg-chinh-sach-dao-tao' ); ?>
					<div class="col-md-6 paroller moveLeft-500 duration-1000 hidden" style="<?php echo 'background: url(', $training_policy['url'] ,') no-repeat center; background-size: cover;'; ?>"></div>
				</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if(is_page('lien-he')) { echo '<div class="container"><div class="row"><div class="col-md-6 contact-info">'; the_content(); echo '<div id="googleMap"></div></div>'; } else { the_content(); } ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'dazzling' ),
				'after'  => '</div>',
			) );
		?>
		<?php if (is_page('lien-he')) {
			echo '<div class="col-md-6 contact-form"><h4>Form liên hệ</h4>';
			echo do_shortcode('[contact-form-7 id="140" title="Form liên hệ"]');
			echo '</div></div>';
			echo '<div class="row"><div class="col-xs-12 trading-system"><h2 id="he-thong-san" class="moveTop-300 duration-800 hidden">Hệ thống sàn giao dịch</h2><div class="line-title"><div class="line-one"></div><div class="line-two"></div></div></div></div>';
			$trading_system = rwmb_meta('san-giao-dich');
			$num_trading = 1;
			foreach ($trading_system as $trading) {
				if ($num_trading%2 == 0) {
					echo '<div class="row"><div id="mapTrading-', $num_trading ,'" class="map-trading col-md-6 mb-2 moveRight-500 duration-1200 hidden"></div>';
					echo '<div class="col-md-6 trading-box mb-2 moveLeft-500 duration-1200 hidden">';
					echo $trading;
					echo '</div></div>';
					$num_trading++;
				} else {
					echo '<div class="row reverse-col"><div class="col-md-6 trading-box mb-2 moveRight-500 duration-1200 hidden">';
					echo $trading;
					echo '</div><div id="mapTrading-', $num_trading ,'" class="map-trading col-md-6 mb-2 moveLeft-500 duration-1200 hidden"></div></div>';
					$num_trading++;
				}
			}
			echo '</div></div>';
		} ?>
            <?php
            // Checks if this is homepage to enable homepage widgets
            if ( is_front_page() ) :
              get_sidebar( 'home' );
            endif;
          ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'dazzling' ), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
