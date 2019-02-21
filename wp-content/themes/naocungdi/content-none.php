<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dazzling
 */
?>

<section class="no-results not-found">
	<header class="page-header page-header">
	<?php if ( is_search() ) : ?>
	<h1 class="page-title"><?php printf( __( 'Không tìm thấy thông tin nào về từ khóa: %s', 'dazzling' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php else : ?>
		<h1 class="page-title moveLeft-500 duration-1000 hidden"><?php _e( 'Nội dung đang cập nhật', 'dazzling' ); ?></h1>
		<h2 class="updating"><i class="fas fa-spinner"></i></h2>
	<?php endif; ?>
	</header><!-- .page-header -->

	<div class="page-content moveRight-500 duration-1000 hidden">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dazzling' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Thông tin bạn muốn tìm không có trên Nào Cùng Đi. Bạn vui lòng thử tìm kiếm với một từ khóa khác.', 'dazzling' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'Hiện tại nội dung này đang trong quá trình cập nhật.', 'dazzling' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
