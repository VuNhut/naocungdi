<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dazzling
 */

get_header(); ?>
	<?php if (!in_category(array('cam-nang-du-lich', 'tham-quan-giai-tri', 'shop-phuot'))) { echo the_breadcrumb(); } ?>
	<div id="primary" class="content-area col-sm-12 <?php if (!in_category(array('cam-nang-du-lich', 'tham-quan-giai-tri', 'shop-phuot'))) { echo "col-lg-8"; } else { echo "p-0"; }?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if (in_category(array('cam-nang-du-lich'))) : ?>

				<?php get_template_part( 'content', 'singleproject' ); ?>

			<?php elseif (in_category(array('tham-quan-giai-tri'))) : ?>

				<?php get_template_part( 'content', 'vethamquan' ); ?>

			<?php elseif (in_category(array('shop-phuot'))) : ?>

				<?php get_template_part( 'content', 'sanphamphuot' ); ?>
			
			<?php else : ?>

				<?php get_template_part( 'content', 'single' ); ?>

			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php if (!in_category(array('cam-nang-du-lich', 'tham-quan-giai-tri', 'shop-phuot'))) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>