<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package dazzling
 */

get_header(); ?>
		<div id="primary" class="content-area col-sm-12">
			<main id="main" class="site-main" role="main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Lỗi! Trang này không tồn tại.', 'dazzling' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'Có vẻ như bài viết bạn muốn xem không có trong dữ liệu bài viết của <strong>Nào Cùng Đi</strong>. Bạn vui lòng tìm kiếm bài viết khác nhé!', 'dazzling' ); ?></p>

						<?php get_search_form(); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->

<?php get_footer(); ?>