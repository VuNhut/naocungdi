<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package dazzling
 */

get_header(); ?>
		<section id="primary" class="content-area col-sm-12 col-md-8">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Kết quả tìm kiếm từ khóa: %s', 'dazzling' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->
				<div class="row search-posts">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>
				</div>
				<?php wpex_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
