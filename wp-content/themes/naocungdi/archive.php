<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dazzling
 */

get_header(); ?>

		<section id="primary" class="content-area col-sm-12 <?php echo of_get_option( 'site_layout' ); ?>">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header moveTop-300 duration-800 hidden">
					<h1 class="page-title">
						<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Author: %s', 'dazzling' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'dazzling' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'dazzling' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'dazzling' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'dazzling' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'dazzling' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'dazzling');

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'dazzling');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'dazzling' );

							else :
								_e( 'Archives', 'dazzling' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
					<div class="<?php if(is_category('thu-vien')) { echo 'library'; } ?> line-title">
                        <div class="line-one"></div>
                        <div class="line-two"></div>
                	</div>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				
				<?php
					if (in_category(array('cam-nang-du-lich')) && !is_tag()) {
						include get_template_directory() . '/location-sort.php';
				?>
				
				<div id="filter-location" class="row" data-cat="<?php echo $category = get_query_var( 'category_name' ); ?>">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'project' );
					?>

				<?php endwhile; ?>
				</div>
				<h2 class="updating"><i class="fas fa-spinner"></i></h2>
				<?php } elseif (is_category(array('thu-vien', 'hinh-anh', 'video'))) { ?>
					<div class="container library-img">
						<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php
						get_template_part( 'content', 'library' );
					?>
					<?php endwhile; ?>
						</div>
					</div>
					<div class="slide-gallery">
						<div class="main-slide">
							<ul></ul>
							<div class="updating"><i class="fas fa-spinner"></i></div>
							<i id="previousImg" class="fas fa-angle-left"></i>
							<i id="nextImg" class="fas fa-angle-right"></i>
							<i id="closeGallery" class="fas fa-times"></i>
						</div>
					</div>
				<?php } elseif (is_tag()) { ?>
					<div class="row tag-posts">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php
						get_template_part( 'content', 'tag' );
					?>
					<?php endwhile; ?>
					</div>
				<?php } else { ?>
				<div class="container">
					<div class="row">
						<?php if(is_category('bi-quyet-du-lich-tiet-kiem')) : include get_template_directory() . '/location-sort.php'; ?>
						<div id="filter-location" data-cat="<?php echo $category = get_query_var( 'category_name' ); ?>" class="card-columns">
						<?php else : ?>
						<div class="card-columns">
						<?php endif; ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								/* Include the Post-Format-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Format name) and that will be used instead.
								*/
									get_template_part( 'content', get_post_format() );
							?>

						<?php endwhile; } ?>
						</div>
						<?php if(is_category('bi-quyet-du-lich-tiet-kiem')) : ?>
							<h2 class="updating"><i class="fas fa-spinner"></i></h2>
						<?php endif; ?>	
					</div>
				</div>
				<div class="clearfix"></div>
				<?php wpex_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-6">
						<ins class="adsbygoogle"
							 style="display:block"
							 data-ad-format="fluid"
							 data-ad-layout-key="-6i+e0+16-3i+89"
							 data-ad-client="ca-pub-7392610376438714"
							 data-ad-slot="6342392432">
						</ins>
					</div>
					<div class="col-lg-4 col-sm-6">
						<ins class="adsbygoogle"
							 style="display:block"
							 data-ad-format="fluid"
							 data-ad-layout-key="-6i+e0+16-3i+89"
							 data-ad-client="ca-pub-7392610376438714"
							 data-ad-slot="9946595524">
						</ins>
					</div>
					<div class="col-lg-4 col-sm-6">
						<ins class="adsbygoogle"
							 style="display:block; text-align:center;"
							 data-ad-layout="in-article"
							 data-ad-format="fluid"
							 data-ad-client="ca-pub-7392610376438714"
							 data-ad-slot="8056721361">
						</ins>
					</div>
				</div>
			</div>
			</main><!-- #main -->
		</section><!-- #primary -->

<?php get_footer(); ?>
