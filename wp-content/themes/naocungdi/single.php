<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dazzling
 */

get_header(); ?>
	<div id="primary" class="content-area col-sm-12 <?php if (!in_category(array('cam-nang-du-lich', 've-tham-quan'))) { echo "col-lg-8"; } else { echo "p-0"; }?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if (in_category(array('cam-nang-du-lich'))) : ?>

				<?php get_template_part( 'content', 'singleproject' ); ?>

			<?php elseif (in_category(array('ve-tham-quan'))) : ?>

				<?php get_template_part( 'content', 'vethamquan' ); ?>
			
			<?php else : ?>

				<?php get_template_part( 'content', 'single' ); ?>

			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php if (!in_category(array('cam-nang-du-lich', 've-tham-quan'))) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>