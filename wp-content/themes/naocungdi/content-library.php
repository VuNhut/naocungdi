<?php
/**
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 col-sm-6 mb-2 moveTop-500 duration-1000 hidden'); ?>>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content category">
		<?php if ( has_post_thumbnail()) : ?>
			<?php if (in_category('hinh-anh')) : ?>
			<a class="link-featured-img" href="#" title="<?php the_title_attribute(); ?>" >
				<div class="bg-gray"></div>
				<?php the_post_thumbnail( 'dazzling-featured', array( 'class' => 'thumbnail' )); ?>
				<i class="far fa-folder-open"></i>
			</a>
			<div class="images-library">
				<?php
					$images_library = rwmb_meta('gallery_images');
					foreach ($images_library as $img) {
						echo '<li><img data-src="', $img['url'] ,'" /></li>';
					}
				?>
			</div>
			<?php else : ?>
			<a class="link-featured-video" href="#" title="<?php the_title_attribute(); ?>" >
				<div class="bg-gray"></div>
				<?php the_post_thumbnail( 'dazzling-featured', array( 'class' => 'thumbnail' )); ?>
				<i class="fas fa-play"></i>
			</a>
			<div class="video-link">
				<?php
					$images_video = rwmb_meta('gallery_videos');
					echo "<li><img data-src='", $images_video , "' />";
				?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		<div>
			<header class="entry-header page-header">
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php dazzling_posted_on(); ?>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
			<?php the_excerpt(); ?>

			<?php
				wp_link_pages( array(
					'before'            => '<div class="page-links">'.__( 'Pages:', 'dazzling' ),
					'after'             => '</div>',
					'link_before'       => '<span>',
					'link_after'        => '</span>',
					'pagelink'          => '%',
					'echo'              => 1
				) );
			?>
		</div>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->